<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        // Admin can see all tasks
        $tasks = Task::with(['user', 'assignedUser'])->get();

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

        // Count total users (excluding admin)
        $totalUsers = User::where('role', 'user')->count();

        // Get all users for assign dropdown
        $users = User::all();

        return view('admin.dashboard', compact(
            'totalTasks',
            'selesai',
            'dalamProses',
            'menunggu',
            'terlambat',
            'selectedDateTasks',
            'selectedDate',
            'weekTasks',
            'totalUsers',
            'users'
        ));
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

            // Admin's task automatically goes to "Dalam Proses"
            Task::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => 'Dalam Proses',
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
            $request->validate([
                'title' => 'required|string|min:3|max:255',
                'description' => 'required|string|min:10',
                'assigned_to' => 'required|exists:users,id',
                'priority' => 'required|in:Sedang,Tinggi',
                'due_date' => 'required|date|after_or_equal:today',
                'status' => 'required|in:Menunggu,Dalam Proses,Selesai,Terlambat',
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
                'status.required' => 'Status wajib dipilih',
            ]);

            $task->update([
                'title' => $request->title,
                'description' => $request->description,
                'priority' => $request->priority,
                'due_date' => $request->due_date,
                'assigned_to' => $request->assigned_to,
                'status' => $request->status,
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

    public function approveTask(Request $request, Task $task)
    {
        try {
            // Only approve tasks that are in "Menunggu" status
            if ($task->status !== 'Menunggu') {
                return response()->json([
                    'success' => false,
                    'message' => 'Task ini sudah diproses'
                ], 400);
            }

            $task->update([
                'status' => 'Dalam Proses'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Task berhasil di-approve!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal approve task: ' . $e->getMessage()
            ], 500);
        }
    }

    public function tasks(Request $request)
{
    // Get all users for filter
    $users = User::all();

    // Base query
    $query = Task::with(['user', 'assignedUser']);

    // Apply filters
    if ($request->filled('search')) {
        $query->where(function($q) use ($request) {
            $q->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('description', 'like', '%' . $request->search . '%');
        });
    }

    if ($request->filled('date')) {
        $query->whereDate('due_date', $request->date);
    }

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    if ($request->filled('priority')) {
        $query->where('priority', $request->priority);
    }

    if ($request->filled('assigned_to')) {
        $query->where('assigned_to', $request->assigned_to);
    }

    $tasks = $query->orderBy('created_at', 'desc')->get();

    // Count tasks by status
    $allTasks = Task::all();
    $totalTasks = $allTasks->count();
    $selesai = $allTasks->where('status', 'Selesai')->count();
    $dalamProses = $allTasks->where('status', 'Dalam Proses')->count();
    $menunggu = $allTasks->where('status', 'Menunggu')->count();
    $terlambat = $allTasks->where('status', 'Terlambat')->count();

    return view('admin.tasks', compact(
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
    try {
        $task->delete();

        return response()->json([
            'success' => true,
            'message' => 'Task berhasil dihapus!'
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal menghapus task: ' . $e->getMessage()
        ], 500);
    }
}

public function announcements()
{
    $announcements = \App\Models\Announcement::with('creator')
        ->orderBy('created_at', 'desc')
        ->get();

    return view('admin.announcements', compact('announcements'));
}

public function storeAnnouncement(Request $request)
{
    try {
        $validated = $request->validate([
            'title' => 'required|string|min:5|max:255',
            'content' => 'required|string|min:10',
            'type' => 'required|in:Penting,Event,Umum,Cuti',
            'priority' => 'required|in:Sedang,Tinggi,Rendah',
            'target_audience' => 'nullable|string',
            'end_date' => 'nullable|date|after_or_equal:today',
        ], [
            'title.required' => 'Judul pengumuman wajib diisi',
            'title.min' => 'Judul minimal 5 karakter',
            'content.required' => 'Konten pengumuman wajib diisi',
            'content.min' => 'Konten minimal 10 karakter',
            'type.required' => 'Tipe pengumuman wajib dipilih',
            'priority.required' => 'Prioritas wajib dipilih',
        ]);

        \App\Models\Announcement::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'type' => $validated['type'],
            'priority' => $validated['priority'],
            'target_audience' => $validated['target_audience'] ?? 'Semua',
            'end_date' => $validated['end_date'] ?? null,
            'created_by' => Auth::id(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pengumuman berhasil ditambahkan!'
        ]);

    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => $e->validator->errors()->first()
        ], 422);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal menambahkan pengumuman: ' . $e->getMessage()
        ], 500);
    }
}

public function updateAnnouncement(Request $request, $id)
{
    try {
        $announcement = \App\Models\Announcement::findOrFail($id);
        
$request->validate([
    'title' => 'required|string|min:5|max:255',
    'content' => 'required|string|min:10',
    'type' => 'required|in:Penting,Event,Umum,Cuti',
    'priority' => 'nullable|in:Sedang,Tinggi,Rendah',
    'target_audience' => 'nullable|string',
    'end_date' => 'nullable|date|after_or_equal:today',
]);

                    $announcement->update([
                        'title' => $request->title,
                        'content' => $request->input('content'),
                        'type' => $request->type,
                        'priority' => $request->priority ?? 'Sedang',
                        'target_audience' => $request->target_audience ?? 'Semua',
                        'end_date' => $request->end_date,
                ]);

        return response()->json([
            'success' => true,
            'message' => 'Pengumuman berhasil diupdate!'
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal mengupdate pengumuman: ' . $e->getMessage()
        ], 500);
    }
}

public function destroyAnnouncement($id)
{
    try {
        $announcement = \App\Models\Announcement::findOrFail($id);
        $announcement->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pengumuman berhasil dihapus!'
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal menghapus pengumuman: ' . $e->getMessage()
        ], 500);
    }
}
public function leaves()
{
    $leaves = \App\Models\Leave::with(['user', 'approver'])
        ->orderBy('created_at', 'desc')
        ->get();

    // Count leaves by status
    $totalLeaves = $leaves->count();
    $menunggu = $leaves->where('status', 'Menunggu')->count();
    $disetujui = $leaves->where('status', 'Disetujui')->count();
    $ditolak = $leaves->where('status', 'Ditolak')->count();

    return view('admin.leaves', compact(
        'leaves',
        'totalLeaves',
        'menunggu',
        'disetujui',
        'ditolak'
    ));
}

public function approveLeave(Request $request, $id)
{
    try {
        $leave = \App\Models\Leave::findOrFail($id);
        
        if ($leave->status !== 'Menunggu') {
            return response()->json([
                'success' => false,
                'message' => 'Pengajuan cuti sudah diproses'
            ], 400);
        }

        $leave->update([
            'status' => 'Disetujui',
            'approved_by' => Auth::id(),
            'approved_at' => now(),
            'rejection_reason' => null,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan cuti berhasil disetujui!'
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal menyetujui cuti: ' . $e->getMessage()
        ], 500);
    }
}

public function rejectLeave(Request $request, $id)
{
    try {
        $leave = \App\Models\Leave::findOrFail($id);
        
        if ($leave->status !== 'Menunggu') {
            return response()->json([
                'success' => false,
                'message' => 'Pengajuan cuti sudah diproses'
            ], 400);
        }

        $request->validate([
            'rejection_reason' => 'required|string|min:10',
        ], [
            'rejection_reason.required' => 'Alasan penolakan wajib diisi',
            'rejection_reason.min' => 'Alasan penolakan minimal 10 karakter',
        ]);

        $leave->update([
            'status' => 'Ditolak',
            'approved_by' => Auth::id(),
            'approved_at' => now(),
            'rejection_reason' => $request->rejection_reason,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan cuti berhasil ditolak!'
        ]);

    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => $e->validator->errors()->first()
        ], 422);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal menolak cuti: ' . $e->getMessage()
        ], 500);
    }
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
        ]);

        $startDate = \Carbon\Carbon::parse($request->start_date);
        $endDate = \Carbon\Carbon::parse($request->end_date);
        $duration = $startDate->diffInDays($endDate) + 1;

        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('leave_attachments', 'public');
        }

        // Admin tetap mengajukan dengan status "Menunggu" seperti user biasa
        // Tapi bisa langsung approve sendiri jika mau
        \App\Models\Leave::create([
            'user_id' => Auth::id(),
            'type' => $request->type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'duration' => $duration,
            'reason' => $request->reason,
            'status' => 'Menunggu', // Ubah ke Menunggu
            'attachment' => $attachmentPath,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan cuti berhasil diajukan!'
        ]);

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
        $leave = \App\Models\Leave::findOrFail($id);
        
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


// Tambahkan methods ini di dalam class AdminDashboardController

public function team()
{
    $users = User::orderBy('created_at', 'desc')->get();
    
    // Count users by role
    $totalUsers = $users->count();
    $adminCount = $users->where('role', 'admin')->count();
    $userCount = $users->where('role', 'user')->count();
    
    return view('admin.team', compact('users', 'totalUsers', 'adminCount', 'userCount'));
}

public function updateUserRole(Request $request, $id)
{
    try {
        $user = User::findOrFail($id);
        
        // Tidak boleh mengubah role diri sendiri
        if ($user->id === Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak dapat mengubah role Anda sendiri'
            ], 403);
        }
        
        $request->validate([
            'role' => 'required|in:admin,user',
        ]);
        
        $user->update([
            'role' => $request->role,
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Role berhasil diupdate!'
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal mengupdate role: ' . $e->getMessage()
        ], 500);
    }
}

public function destroyUser($id)
{
    try {
        $user = User::findOrFail($id);
        
        // Tidak boleh menghapus diri sendiri
        if ($user->id === Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak dapat menghapus akun Anda sendiri'
            ], 403);
        }
        
        // Hapus user beserta semua data terkait
        $user->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'User berhasil dihapus!'
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal menghapus user: ' . $e->getMessage()
        ], 500);
    }
}
public function settings()
{
    $user = Auth::user();
    return view('admin.settings', compact('user'));
}

public function updateProfile(Request $request)
{
    try {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ], [
            'name.required' => 'Nama lengkap wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah digunakan',
        ]);
        
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
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
}