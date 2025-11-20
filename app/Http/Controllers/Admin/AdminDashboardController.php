<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

}