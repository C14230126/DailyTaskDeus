<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function destroy(Task $task)
    {
        // User cannot delete tasks that are "Dalam Proses" or "Selesai"
        if (Auth::user()->role !== 'admin') {
            if (in_array($task->status, ['Dalam Proses', 'Selesai'])) {
                return redirect()->back()->with('error', 'Tidak dapat menghapus task yang sudah diproses atau selesai.');
            }
        }

        $task->delete();
        $user = Auth::user();
        $redirectRoute = ($user && $user->role === 'admin') ? 'admin.dashboard' : 'user.dashboard';
        return redirect()->route($redirectRoute)
            ->with('success', 'Task berhasil dihapus!');
    }
}
