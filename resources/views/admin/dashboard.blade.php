@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="min-h-screen bg-gray-50">
        <!-- Sidebar -->
<aside class="fixed left-0 top-0 h-full w-64 bg-white shadow-lg">
    <div class="p-6">
        <div class="flex items-center gap-2 mb-8">
            <div class="w-10 h-10 bg-yellow-400 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
            </div>
            <h1 class="text-xl font-bold text-gray-800">Task Management</h1>
        </div>

        <nav class="space-y-2">
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 px-4 py-3 bg-gray-100 text-gray-800 rounded-lg font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Dashboard
            </a>
            <a href="{{ route('admin.all-tasks') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Semua Task
            </a>
            <a href="{{ route('admin.recurring') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                Task Berulang
            </a>
            <a href="{{ route('admin.calendar') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Kalender
            </a>
            <a href="{{ route('admin.announcements') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                </svg>
                Pengumuman
            </a>
            <a href="{{ route('admin.leaves') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Cuti
            </a>
            <a href="{{ route('admin.team') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Tim
            </a>
            <a href="{{ route('admin.settings') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Pengaturan
            </a>
        </nav>
    </div>
</aside>

        <!-- Main Content -->
        <div class="ml-64 p-8">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-1">Selamat datang, {{ auth()->user()->name }}!</h2>
                    <p class="text-gray-600 text-sm">{{ now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                    </p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-3 bg-white px-4 py-2 rounded-lg shadow">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=3b82f6&color=fff" 
                         alt="Avatar" class="w-10 h-10 rounded-full">
                    <div>
                        <p class="font-semibold text-gray-800">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-600">{{ auth()->user()->email }}</p>
                    </div>
                </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            @if (session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Stats Cards -->
            <div class="grid grid-cols-6 gap-4 mb-8">
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <p class="text-gray-600 text-sm mb-2">Total Task</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $totalTasks }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <p class="text-gray-600 text-sm mb-2">Selesai</p>
                    <p class="text-3xl font-bold text-green-600">{{ $selesai }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <p class="text-gray-600 text-sm mb-2">Dalam Proses</p>
                    <p class="text-3xl font-bold text-yellow-600">{{ $dalamProses }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <p class="text-gray-600 text-sm mb-2">Menunggu</p>
                    <p class="text-3xl font-bold text-orange-600">{{ $menunggu }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <p class="text-gray-600 text-sm mb-2">Terlambat</p>
                    <p class="text-3xl font-bold text-red-600">{{ $terlambat }}</p>
                </div>
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-6 shadow-sm">
                    <p class="text-blue-100 text-sm mb-2">Total Users</p>
                    <p class="text-3xl font-bold text-white">{{ $totalUsers }}</p>
                </div>
            </div>

            <!-- Task Calendar -->
            <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Task Harian</h3>
                <p class="text-sm text-gray-600 mb-6">Klik tanggal untuk melihat task pada hari tersebut</p>

                <div class="grid grid-cols-7 gap-4">
                    @foreach ($weekTasks as $day)
                        <a href="{{ route('admin.dashboard', ['date' => $day['date']->format('Y-m-d')]) }}"
                            class="text-center transition-all hover:scale-105">
                            <p class="text-sm font-medium text-gray-600 mb-2">{{ $day['day'] }}</p>
                            <div
                                class="rounded-lg p-4 cursor-pointer transition-all
                                {{ $day['isSelected'] ? 'bg-blue-500 text-white shadow-lg' : 'bg-gray-50 hover:bg-gray-100' }}">
                                <p
                                    class="text-2xl font-bold mb-1
                                  {{ $day['isSelected'] ? 'text-white' : 'text-gray-800' }}">
                                    {{ $day['date']->format('d') }}
                                </p>
                                <p class="text-xs {{ $day['isSelected'] ? 'text-blue-100' : 'text-gray-600' }}">
                                    {{ $day['count'] }} Task
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Selected Date Tasks -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 mb-1">
                            Task untuk {{ $selectedDate->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                        </h3>
                        <p class="text-sm text-gray-600">
                            @if ($selectedDate->isToday())
                                Task yang perlu diselesaikan hari ini
                            @elseif($selectedDate->isTomorrow())
                                Task yang perlu diselesaikan besok
                            @elseif($selectedDate->isPast())
                                Task yang sudah lewat
                            @else
                                Task yang dijadwalkan
                            @endif
                        </p>
                    </div>
                    <button onclick="openTaskOverlay()"
                        class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Task
                    </button>
                </div>

                @if ($selectedDateTasks->count() > 0)
                    <div class="space-y-3">
                        @foreach ($selectedDateTasks as $task)
                            <div
                                class="flex items-center gap-4 p-4 border-l-4 
                                {{ $task->status == 'Menunggu' ? 'border-yellow-400 bg-yellow-50' : '' }}
                                {{ $task->status == 'Dalam Proses' ? 'border-blue-400 bg-blue-50' : '' }}
                                {{ $task->status == 'Selesai' ? 'border-green-400 bg-green-50' : '' }}
                                {{ $task->status == 'Terlambat' ? 'border-red-400 bg-red-50' : '' }}
                                rounded-lg">
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-800 mb-1">{{ $task->title }}</h4>
                                    <p class="text-sm text-gray-600">{{ Str::limit($task->description, 100) }}</p>
                                    <div class="flex items-center gap-2 mt-2">
                                        <span
                                            class="text-xs px-2 py-1 rounded
                                           {{ $task->status == 'Menunggu' ? 'bg-yellow-200 text-yellow-800' : '' }}
                                           {{ $task->status == 'Dalam Proses' ? 'bg-blue-200 text-blue-800' : '' }}
                                           {{ $task->status == 'Selesai' ? 'bg-green-200 text-green-800' : '' }}
                                           {{ $task->status == 'Terlambat' ? 'bg-red-200 text-red-800' : '' }}">
                                            {{ $task->status }}
                                        </span>
                                        <span
                                            class="text-xs px-2 py-1 rounded
                                           {{ $task->priority == 'Tinggi' ? 'bg-red-200 text-red-800' : 'bg-gray-200 text-gray-800' }}">
                                            {{ $task->priority }}
                                        </span>
                                        @if ($task->assignedUser)
                                            <span class="text-xs text-gray-600">
                                                <svg class="w-3 h-3 inline mr-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                                {{ $task->assignedUser->name }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    @if ($task->status == 'Menunggu')
                                        <button onclick="approveTask({{ $task->id }})"
                                            class="p-2 hover:bg-green-50 rounded-lg transition" title="Approve Task">
                                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </button>
                                    @endif
                                    <button onclick="openEditTaskOverlay(@json($task))"
                                        class="p-2 hover:bg-white rounded-lg">
                                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <form action="{{ route('admin.tasks.destroy', $task) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus task ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 hover:bg-white rounded-lg">
                                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <p class="text-gray-600">Tidak ada task untuk tanggal ini</p>
                    </div>
                @endif
            </div>
        </div>
        <!-- Overlay Popup Tambah Task -->
        <div id="taskOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4 p-6 transform transition-all">
                <h3 class="text-xl font-bold text-gray-800 mb-2">Tambah Task Baru</h3>
                <p class="text-sm text-gray-600 mb-6">Buat task baru untuk anggota tim</p>

                <form id="taskForm">
                    @csrf
                    <!-- Judul Task -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Judul Task <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" id="taskTitle" placeholder="Masukkan judul task"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            minlength="3" required>
                        <p class="text-xs text-gray-500 mt-1">Minimal 3 karakter</p>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi <span class="text-red-500">*</span>
                        </label>
                        <textarea name="description" id="taskDescription" rows="3" placeholder="Deskripsi detail task"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            required></textarea>
                        <p class="text-xs text-gray-500 mt-1">Jelaskan detail task yang harus dikerjakan</p>
                    </div>

                    <!-- Assign ke -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Assign ke <span class="text-red-500">*</span>
                        </label>
                        <select name="assigned_to" id="taskAssignedTo"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            required>
                            <option value="">Pilih karyawan</option>
                            @foreach ($users as $assignUser)
                                <option value="{{ $assignUser->id }}">{{ $assignUser->name }} ({{ $assignUser->role }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Prioritas & Deadline -->
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Prioritas <span class="text-red-500">*</span>
                            </label>
                            <select name="priority" id="taskPriority"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                required>
                                <option value="Sedang">Sedang</option>
                                <option value="Tinggi">Tinggi</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Deadline <span class="text-red-500">*</span>
                            </label>
                            <input type="date" name="due_date" id="taskDueDate"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                min="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>

                    <!-- Info Required -->
                    <p class="text-xs text-gray-500 mb-4">
                        <span class="text-red-500">*</span> Semua field wajib diisi
                    </p>

                    <!-- Buttons -->
                    <div class="flex gap-3">
                        <button type="button" onclick="closeTaskOverlay()"
                            class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition font-medium">
                            Batal
                        </button>
                        <button type="submit"
                            class="flex-1 px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition font-medium">
                            Simpan Task
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Overlay Popup Edit Task -->
        <div id="editTaskOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4 p-6 transform transition-all">
                <h3 class="text-xl font-bold text-gray-800 mb-2">Edit Task</h3>
                <p class="text-sm text-gray-600 mb-6">Ubah informasi task</p>

                <form id="editTaskForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editTaskId">

                    <!-- Judul Task -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Judul Task <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" id="editTaskTitle" placeholder="Masukkan judul task"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            minlength="3" required>
                        <p class="text-xs text-gray-500 mt-1">Minimal 3 karakter</p>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi <span class="text-red-500">*</span>
                        </label>
                        <textarea name="description" id="editTaskDescription" rows="3" placeholder="Deskripsi detail task"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            required></textarea>
                        <p class="text-xs text-gray-500 mt-1">Jelaskan detail task yang harus dikerjakan</p>
                    </div>

                    <!-- Assign ke -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Assign ke <span class="text-red-500">*</span>
                        </label>
                        <select name="assigned_to" id="editTaskAssignedTo"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            required>
                            <option value="">Pilih karyawan</option>
                            @foreach ($users as $assignUser)
                                <option value="{{ $assignUser->id }}">{{ $assignUser->name }} ({{ $assignUser->role }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Status -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select name="status" id="editTaskStatus"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            required>
                            <option value="Menunggu">Menunggu</option>
                            <option value="Dalam Proses">Dalam Proses</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Terlambat">Terlambat</option>
                        </select>
                    </div>

                    <!-- Prioritas & Deadline -->
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Prioritas <span class="text-red-500">*</span>
                            </label>
                            <select name="priority" id="editTaskPriority"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                required>
                                <option value="Sedang">Sedang</option>
                                <option value="Tinggi">Tinggi</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Deadline <span class="text-red-500">*</span>
                            </label>
                            <input type="date" name="due_date" id="editTaskDueDate"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                min="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>

                    <!-- Info Required -->
                    <p class="text-xs text-gray-500 mb-4">
                        <span class="text-red-500">*</span> Semua field wajib diisi
                    </p>

                    <!-- Buttons -->
                    <div class="flex gap-3">
                        <button type="button" onclick="closeEditTaskOverlay()"
                            class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition font-medium">
                            Batal
                        </button>
                        <button type="submit"
                            class="flex-1 px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition font-medium">
                            Update Task
                        </button>
                    </div>
                </form>
            </div>
        </div>


        <script>
            // Open overlay
            function openTaskOverlay() {
                document.getElementById('taskOverlay').classList.remove('hidden');
                document.getElementById('taskOverlay').classList.add('flex');
            }

            // Close overlay
            function closeTaskOverlay() {
                document.getElementById('taskOverlay').classList.add('hidden');
                document.getElementById('taskOverlay').classList.remove('flex');
                document.getElementById('taskForm').reset();
            }

            // Handle form submission
            document.getElementById('taskForm').addEventListener('submit', async function(e) {
                e.preventDefault();

                const title = document.getElementById('taskTitle').value.trim();
                const description = document.getElementById('taskDescription').value.trim();
                const assignedTo = document.getElementById('taskAssignedTo').value;
                const priority = document.getElementById('taskPriority').value;
                const dueDate = document.getElementById('taskDueDate').value;

                if (!title || !description || !assignedTo || !priority || !dueDate) {
                    Swal.fire({
                        title: 'Perhatian!',
                        text: 'Ada bagian yang belum diisi. Mohon lengkapi semua field yang wajib diisi.',
                        icon: 'warning',
                        confirmButtonColor: '#f59e0b',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                if (title.length < 3) {
                    Swal.fire({
                        title: 'Perhatian!',
                        text: 'Judul task minimal 3 karakter.',
                        icon: 'warning',
                        confirmButtonColor: '#f59e0b',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                if (description.length < 10) {
                    Swal.fire({
                        title: 'Perhatian!',
                        text: 'Deskripsi minimal 10 karakter.',
                        icon: 'warning',
                        confirmButtonColor: '#f59e0b',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                const selectedDate = new Date(dueDate);
                const today = new Date();
                today.setHours(0, 0, 0, 0);

                if (selectedDate < today) {
                    Swal.fire({
                        title: 'Perhatian!',
                        text: 'Deadline tidak boleh kurang dari hari ini.',
                        icon: 'warning',
                        confirmButtonColor: '#f59e0b',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                const formData = new FormData(this);

                try {
                    const response = await fetch("{{ route('admin.dashboard.storeTask') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                        },
                        body: formData
                    });

                    const data = await response.json();

                    if (data.success) {
                        closeTaskOverlay();
                        Swal.fire({
                            title: 'Berhasil!',
                            text: data.message,
                            icon: 'success',
                            confirmButtonColor: '#000000',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: 'Gagal!',
                            text: data.message,
                            icon: 'error',
                            confirmButtonColor: '#ef4444',
                            confirmButtonText: 'OK'
                        });
                    }
                } catch (error) {
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan saat menambahkan task',
                        icon: 'error',
                        confirmButtonColor: '#ef4444',
                        confirmButtonText: 'OK'
                    });
                }
            });

            // Open edit overlay
            function openEditTaskOverlay(task) {
                document.getElementById('editTaskId').value = task.id;
                document.getElementById('editTaskTitle').value = task.title;
                document.getElementById('editTaskDescription').value = task.description;
                document.getElementById('editTaskAssignedTo').value = task.assigned_to;
                document.getElementById('editTaskStatus').value = task.status;
                document.getElementById('editTaskPriority').value = task.priority;
                document.getElementById('editTaskDueDate').value = task.due_date;

                document.getElementById('editTaskOverlay').classList.remove('hidden');
                document.getElementById('editTaskOverlay').classList.add('flex');
            }

            // Close edit overlay
            function closeEditTaskOverlay() {
                document.getElementById('editTaskOverlay').classList.add('hidden');
                document.getElementById('editTaskOverlay').classList.remove('flex');
                document.getElementById('editTaskForm').reset();
            }

            // Handle edit form submission
            document.getElementById('editTaskForm').addEventListener('submit', async function(e) {
                e.preventDefault();

                const taskId = document.getElementById('editTaskId').value;
                const title = document.getElementById('editTaskTitle').value.trim();
                const description = document.getElementById('editTaskDescription').value.trim();
                const assignedTo = document.getElementById('editTaskAssignedTo').value;
                const status = document.getElementById('editTaskStatus').value;
                const priority = document.getElementById('editTaskPriority').value;
                const dueDate = document.getElementById('editTaskDueDate').value;

                if (!title || !description || !assignedTo || !status || !priority || !dueDate) {
                    Swal.fire({
                        title: 'Perhatian!',
                        text: 'Ada bagian yang belum diisi. Mohon lengkapi semua field yang wajib diisi.',
                        icon: 'warning',
                        confirmButtonColor: '#f59e0b',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                if (title.length < 3) {
                    Swal.fire({
                        title: 'Perhatian!',
                        text: 'Judul task minimal 3 karakter.',
                        icon: 'warning',
                        confirmButtonColor: '#f59e0b',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                if (description.length < 10) {
                    Swal.fire({
                        title: 'Perhatian!',
                        text: 'Deskripsi minimal 10 karakter.',
                        icon: 'warning',
                        confirmButtonColor: '#f59e0b',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                const selectedDate = new Date(dueDate);
                const today = new Date();
                today.setHours(0, 0, 0, 0);

                if (selectedDate < today) {
                    Swal.fire({
                        title: 'Perhatian!',
                        text: 'Deadline tidak boleh kurang dari hari ini.',
                        icon: 'warning',
                        confirmButtonColor: '#f59e0b',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                const formData = new FormData(this);

                try {
                    const response = await fetch(`/admin/dashboard/task/${taskId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                        },
                        body: formData
                    });

                    const data = await response.json();

                    if (data.success) {
                        closeEditTaskOverlay();
                        Swal.fire({
                            title: 'Berhasil!',
                            text: data.message,
                            icon: 'success',
                            confirmButtonColor: '#000000',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: 'Gagal!',
                            text: data.message,
                            icon: 'error',
                            confirmButtonColor: '#ef4444',
                            confirmButtonText: 'OK'
                        });
                    }
                } catch (error) {
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan saat mengupdate task',
                        icon: 'error',
                        confirmButtonColor: '#ef4444',
                        confirmButtonText: 'OK'
                    });
                }
            });



            // Approve task function
            async function approveTask(taskId) {
                const result = await Swal.fire({
                    title: 'Approve Task?',
                    text: 'Task akan berubah status menjadi "Dalam Proses"',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#10b981',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'Ya, Approve',
                    cancelButtonText: 'Batal'
                });

                if (result.isConfirmed) {
                    try {
                        const response = await fetch(`/admin/dashboard/task/${taskId}/approve`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json',
                                'Content-Type': 'application/json',
                            }
                        });

                        const data = await response.json();

                        if (data.success) {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: data.message,
                                icon: 'success',
                                confirmButtonColor: '#000000',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: 'Gagal!',
                                text: data.message,
                                icon: 'error',
                                confirmButtonColor: '#ef4444',
                                confirmButtonText: 'OK'
                            });
                        }
                    } catch (error) {
                        Swal.fire({
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan saat approve task',
                            icon: 'error',
                            confirmButtonColor: '#ef4444',
                            confirmButtonText: 'OK'
                        });
                    }
                }
            }

            // Close overlay when clicking outside
            document.getElementById('taskOverlay').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeTaskOverlay();
                }
            });

            // Close edit overlay when clicking outside
            document.getElementById('editTaskOverlay').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeEditTaskOverlay();
                }
            });
        </script>
    </div>
@endsection
