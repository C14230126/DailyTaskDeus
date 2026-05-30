<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 

class UserDashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        // Update overdue tasks before displaying
        $this->updateOverdueTasks();

        // User can only see their own tasks
        $tasks = Task::where('assigned_to', $user->id)
            ->orWhere('user_id', $user->id)
            ->with(['user', 'assignedUser'])
            ->get();

        // Count tasks by status
        $totalTasks = $tasks->count();
        $selesai = $tasks->where('status', 'Selesai')->count();
        $dalamProses = $tasks->where('status', 'Dalam Proses')->count();
        $menunggu = $tasks->where('status', 'Menunggu')->count();
        $terlambat = $tasks->where('status', 'Terlambat')->count();

        // Get selected date or default to today
        $selectedDate = $request->has('date') ? Carbon::parse($request->date) : Carbon::today();

        // Get tasks for selected date
        $selectedDateTasks = $tasks->filter(function ($task) use ($selectedDate) {
            return Carbon::parse($task->due_date)->isSameDay($selectedDate);
        });

        // Get tasks for the week
        $startOfWeek = Carbon::now()->startOfWeek();
        $weekTasks = collect();

        for ($i = 0; $i < 7; $i++) {
            $date = $startOfWeek->copy()->addDays($i);
            $count = $tasks->filter(function ($task) use ($date) {
                return Carbon::parse($task->due_date)->isSameDay($date);
            })->count();

            $weekTasks->push([
                'date' => $date,
                'count' => $count,
                'day' => $date->locale('id')->isoFormat('ddd'),
                'isSelected' => $selectedDate->isSameDay($date),
            ]);
        }

        // Get all users for assign dropdown
        $users = User::where('role', 'user')->get();

        return view('user.dashboard', compact(
            'totalTasks',
            'selesai',
            'dalamProses',
            'menunggu',
            'terlambat',
            'selectedDateTasks',
            'selectedDate',
            'weekTasks',
            'users'
        ));
    }

    public function tasks(Request $request)
    {
        $user = Auth::user();

        // Update overdue tasks
        $this->updateOverdueTasks();

        // Query builder
        $query = Task::where(function ($q) use ($user) {
            $q->where('assigned_to', $user->id)
                ->orWhere('user_id', $user->id);
        })->with(['user', 'assignedUser']);

        // Search
        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filter by date
        if ($request->has('date') && $request->date) {
            $query->whereDate('due_date', $request->date);
        }

        // Filter by status
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        // Filter by priority
        if ($request->has('priority') && $request->priority) {
            $query->where('priority', $request->priority);
        }

        // Filter by assigned user
        if ($request->has('assigned_to') && $request->assigned_to) {
            $query->where('assigned_to', $request->assigned_to);
        }

        $tasks = $query->latest()->get();

        // Get all users for filter
        $users = User::where('role', 'user')->get();

        // Count all user's tasks
        $allTasks = Task::where('assigned_to', $user->id)
            ->orWhere('user_id', $user->id)
            ->get();

        $totalTasks = $allTasks->count();
        $selesai = $allTasks->where('status', 'Selesai')->count();
        $dalamProses = $allTasks->where('status', 'Dalam Proses')->count();
        $menunggu = $allTasks->where('status', 'Menunggu')->count();
        $terlambat = $allTasks->where('status', 'Terlambat')->count();

        return view('user.tasks', compact(
            'tasks',
            'users',
            'totalTasks',
            'selesai',
            'dalamProses',
            'menunggu',
            'terlambat'
        ));
    }

    public function destroyTask(Task $task)
    {
        $user = Auth::user();

        // Check ownership
        if ($task->user_id !== $user->id && $task->assigned_to !== $user->id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk menghapus task ini.');
        }

        // User cannot delete tasks that are "Dalam Proses" or "Selesai"
        if (in_array($task->status, ['Dalam Proses', 'Selesai'])) {
            return redirect()->back()->with('error', 'Tidak dapat menghapus task yang sudah diproses atau selesai.');
        }

        $task->delete();
        return redirect()->route('user.tasks')->with('success', 'Task berhasil dihapus!');
    }

    private function updateOverdueTasks()
    {
        $today = Carbon::today();

        Task::where('due_date', '<', $today)
            ->whereIn('status', ['Menunggu', 'Dalam Proses'])
            ->update(['status' => 'Terlambat']);
    }

    public function storeTask(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|min:3|max:255',
                'description' => 'required|string|min:10',
                'assigned_to' => 'required|exists:users,id',
                'priority' => 'required|in:Sedang,Tinggi',
                'due_date' => 'required|date|after_or_equal:today',
            ], [
                'title.required' => 'Judul task wajib diisi',
                'title.min' => 'Judul task minimal 3 karakter',
                'description.required' => 'Deskripsi wajib diisi',
                'description.min' => 'Deskripsi minimal 10 karakter',
                'assigned_to.required' => 'Assign ke harus dipilih',
                'assigned_to.exists' => 'User yang dipilih tidak valid',
                'priority.required' => 'Prioritas wajib dipilih',
                'due_date.required' => 'Deadline wajib diisi',
                'due_date.after_or_equal' => 'Deadline tidak boleh kurang dari hari ini',
            ]);

            Task::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => 'Menunggu',
                'priority' => $request->priority,
                'due_date' => $request->due_date,
                'user_id' => Auth::id(),
                'assigned_to' => $request->assigned_to,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Task berhasil ditambahkan!'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->validator->errors()->first()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan task: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updateTask(Request $request, Task $task)
    {
        try {
            // Check if task belongs to user and status is still "Menunggu"
            if ($task->user_id !== Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Anda tidak memiliki akses untuk mengedit task ini'
                ], 403);
            }

            if ($task->status !== 'Menunggu') {
                return response()->json([
                    'success' => false,
                    'message' => 'Task yang sudah di-approve tidak dapat diedit'
                ], 400);
            }

            $request->validate([
                'title' => 'required|string|min:3|max:255',
                'description' => 'required|string|min:10',
                'assigned_to' => 'required|exists:users,id',
                'priority' => 'required|in:Sedang,Tinggi',
                'due_date' => 'required|date|after_or_equal:today',
            ], [
                'title.required' => 'Judul task wajib diisi',
                'title.min' => 'Judul task minimal 3 karakter',
                'description.required' => 'Deskripsi wajib diisi',
                'description.min' => 'Deskripsi minimal 10 karakter',
                'assigned_to.required' => 'Assign ke harus dipilih',
                'assigned_to.exists' => 'User yang dipilih tidak valid',
                'priority.required' => 'Prioritas wajib dipilih',
                'due_date.required' => 'Deadline wajib diisi',
                'due_date.after_or_equal' => 'Deadline tidak boleh kurang dari hari ini',
            ]);

            $task->update([
                'title' => $request->title,
                'description' => $request->description,
                'priority' => $request->priority,
                'due_date' => $request->due_date,
                'assigned_to' => $request->assigned_to,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Task berhasil diupdate!'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->validator->errors()->first()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengupdate task: ' . $e->getMessage()
            ], 500);
        }
    }
public function announcements()
{
    $announcements = \App\Models\Announcement::with('creator')
        ->orderByRaw("
            CASE 
                WHEN priority = 'Tinggi' THEN 1 
                WHEN priority = 'Sedang' THEN 2 
                WHEN priority = 'Rendah' THEN 3 
                ELSE 999 
            END
        ")
        ->orderBy('created_at', 'desc')
        ->get();

    return view('user.announcements', compact('announcements'));
}
public function leaves()
{
    $leaves = \App\Models\Leave::where('user_id', auth()->id())
        ->orderBy('created_at', 'desc')
        ->get();

    // Count leaves by status
    $totalLeaves = $leaves->count();
    $menunggu = $leaves->where('status', 'Menunggu')->count();
    $disetujui = $leaves->where('status', 'Disetujui')->count();
    $ditolak = $leaves->where('status', 'Ditolak')->count();

    return view('user.leaves', compact(
        'leaves',
        'totalLeaves',
        'menunggu',
        'disetujui',
        'ditolak'
    ));
}

public function storeLeave(Request $request)
{
    try {
        $request->validate([
            'type' => 'required|in:Sakit,Izin,Cuti Tahunan,Lainnya',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string|min:10',
            'attachment' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ], [
            'type.required' => 'Jenis cuti wajib dipilih',
            'start_date.required' => 'Tanggal mulai wajib diisi',
            'start_date.after_or_equal' => 'Tanggal mulai tidak boleh kurang dari hari ini',
            'end_date.required' => 'Tanggal selesai wajib diisi',
            'end_date.after_or_equal' => 'Tanggal selesai tidak boleh kurang dari tanggal mulai',
            'reason.required' => 'Alasan cuti wajib diisi',
            'reason.min' => 'Alasan minimal 10 karakter',
            'attachment.mimes' => 'File harus berformat PDF, JPG, JPEG, atau PNG',
            'attachment.max' => 'Ukuran file maksimal 2MB',
        ]);

        // Calculate duration
        $startDate = \Carbon\Carbon::parse($request->start_date);
        $endDate = \Carbon\Carbon::parse($request->end_date);
        $duration = $startDate->diffInDays($endDate) + 1;

        // Handle file upload
        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('leave_attachments', 'public');
        }

        \App\Models\Leave::create([
            'user_id' => auth()->id(),
            'type' => $request->type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'duration' => $duration,
            'reason' => $request->reason,
            'status' => 'Menunggu',
            'attachment' => $attachmentPath,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan cuti berhasil diajukan!'
        ]);

    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => $e->validator->errors()->first()
        ], 422);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal mengajukan cuti: ' . $e->getMessage()
        ], 500);
    }
}

public function updateLeave(Request $request, $id)
{
    try {
        $leave = \App\Models\Leave::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();
        
        // Hanya bisa edit cuti yang masih menunggu
        if ($leave->status !== 'Menunggu') {
            return response()->json([
                'success' => false,
                'message' => 'Hanya cuti dengan status Menunggu yang bisa diedit'
            ], 400);
        }

        $request->validate([
            'type' => 'required|in:Sakit,Izin,Cuti Tahunan,Lainnya',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string|min:10',
            'attachment' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $startDate = \Carbon\Carbon::parse($request->start_date);
        $endDate = \Carbon\Carbon::parse($request->end_date);
        $duration = $startDate->diffInDays($endDate) + 1;

        // Handle file upload
        $attachmentPath = $leave->attachment;
        if ($request->hasFile('attachment')) {
            // Delete old file if exists
            if ($attachmentPath && \Storage::disk('public')->exists($attachmentPath)) {
                \Storage::disk('public')->delete($attachmentPath);
            }
            $attachmentPath = $request->file('attachment')->store('leave_attachments', 'public');
        }

        $leave->update([
            'type' => $request->type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'duration' => $duration,
            'reason' => $request->reason,
            'attachment' => $attachmentPath,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan cuti berhasil diupdate!'
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal mengupdate cuti: ' . $e->getMessage()
        ], 500);
    }
}

public function destroyLeave($id)
{
    try {
        $leave = \App\Models\Leave::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();
        
        // Hanya bisa hapus cuti yang masih menunggu
        if ($leave->status !== 'Menunggu') {
            return response()->json([
                'success' => false,
                'message' => 'Hanya cuti dengan status Menunggu yang bisa dihapus'
            ], 400);
        }

        // Delete attachment if exists
        if ($leave->attachment && \Storage::disk('public')->exists($leave->attachment)) {
            \Storage::disk('public')->delete($leave->attachment);
        }

        $leave->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan cuti berhasil dihapus!'
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal menghapus cuti: ' . $e->getMessage()
        ], 500);
    }
}
public function settings()
{
    $user = Auth::user();
    return view('user.settings', compact('user'));
}

public function updateProfile(Request $request)
{
    try {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
        ], [
            'name.required' => 'Nama lengkap wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah digunakan',
        ]);
        
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Profil berhasil diupdate!'
        ]);
        
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => $e->validator->errors()->first()
        ], 422);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal mengupdate profil: ' . $e->getMessage()
        ], 500);
    }
}

public function resetPassword(Request $request)
{
    try {
        $user = Auth::user();
        
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ], [
            'current_password.required' => 'Password saat ini wajib diisi',
            'new_password.required' => 'Password baru wajib diisi',
            'new_password.min' => 'Password baru minimal 8 karakter',
            'new_password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);
        
        // Check current password
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Password saat ini tidak sesuai'
            ], 422);
        }
        
        // Update password
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Password berhasil diubah!'
        ]);
        
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => $e->validator->errors()->first()
        ], 422);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal mengubah password: ' . $e->getMessage()
        ], 500);
    }
}

public function team()
{
    $users = User::orderBy('name')->get();
    $totalUsers = $users->count();
    $adminCount = $users->where('role', 'admin')->count();
    $userCount  = $users->where('role', 'user')->count();

    return view('user.team', compact('users', 'totalUsers', 'adminCount', 'userCount'));
}

public function showProfile($id)
{
    $profileUser = User::findOrFail($id);
    $tasks = $profileUser->assignedTasks()->orderBy('created_at', 'desc')->get();

    $taskStats = [
        'total'        => $tasks->count(),
        'selesai'      => $tasks->where('status', 'selesai')->count(),
        'dalam_proses' => $tasks->where('status', 'dalam_proses')->count(),
        'menunggu'     => $tasks->where('status', 'menunggu')->count(),
        'terlambat'    => $tasks->where('status', 'terlambat')->count(),
    ];

    return view('user.profile', compact('profileUser', 'tasks', 'taskStats'));
}
}