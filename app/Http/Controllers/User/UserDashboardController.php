<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        ->orderBy('created_at', 'desc')
        ->get();

    return view('user.announcements', compact('announcements'));
}
}