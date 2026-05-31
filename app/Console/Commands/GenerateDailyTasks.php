<?php

namespace App\Console\Commands;

use App\Models\RecurringTask;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Console\Command;

class GenerateDailyTasks extends Command
{
    protected $signature   = 'tasks:generate-daily';
    protected $description = 'Buat task harian dari template recurring task dan update status overdue';

    public function handle()
    {
        $today = Carbon::today();

        // Jangan buat task di hari Minggu
        if ($today->isSunday()) {
            $this->info('Hari Minggu — tidak ada task yang dibuat.');
            return;
        }

        // 1. Generate recurring tasks
        $templates = RecurringTask::where('is_active', true)->with('assignedUser')->get();
        $created   = 0;

        foreach ($templates as $template) {
            // Cek apakah task dari template ini sudah dibuat hari ini
            $alreadyExists = Task::where('assigned_to', $template->assigned_to)
                ->where('title', $template->title)
                ->whereDate('created_at', $today)
                ->exists();

            if (!$alreadyExists) {
                Task::create([
                    'title'       => $template->title,
                    'description' => $template->description,
                    'status'      => 'Dalam Proses',
                    'priority'    => $template->priority,
                    'due_date'    => $today->toDateString(),
                    'user_id'     => $template->created_by,
                    'assigned_to' => $template->assigned_to,
                ]);
                $created++;
            }
        }

        $this->info("$created task harian berhasil dibuat.");

        // 2. Update status overdue
        $overdue = Task::whereNotIn('status', ['Selesai', 'Terlambat'])
            ->whereDate('due_date', '<', $today)
            ->update(['status' => 'Terlambat']);

        $this->info("$overdue task diupdate menjadi Terlambat.");
    }
}
