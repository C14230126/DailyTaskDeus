@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Sidebar -->
    <aside class="fixed left-0 top-0 h-full w-64 bg-white shadow-lg">
        <div class="p-6">
            <div class="flex items-center gap-2 mb-8">
                <div class="w-10 h-10 bg-yellow-400 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
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
                <h2 class="text-2xl font-bold text-gray-800 mb-1">Edit Task</h2>
                <p class="text-gray-600 text-sm">Perbarui informasi task</p>
            </div>
            <a href="{{ route('tasks.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                Kembali
            </a>
        </div>

        @if($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <div class="bg-white rounded-xl shadow-sm p-8">
            <form action="{{ route('tasks.update', $task) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-2 gap-6">
                    <!-- Judul Task -->
                    <div class="col-span-2">
                        <label class="block text-gray-700 font-medium mb-2">Judul Task *</label>
                        <input type="text" name="title" value="{{ old('title', $task->title) }}" 
                               placeholder="Masukkan judul task"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               required>
                    </div>

                    <!-- Deskripsi -->
                    <div class="col-span-2">
                        <label class="block text-gray-700 font-medium mb-2">Deskripsi</label>
                        <textarea name="description" rows="4" 
                                  placeholder="Masukkan deskripsi task"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('description', $task->description) }}</textarea>
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Status *</label>
                        <select name="status" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                required>
                            <option value="Menunggu" {{ old('status', $task->status) == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="Dalam Proses" {{ old('status', $task->status) == 'Dalam Proses' ? 'selected' : '' }}>Dalam Proses</option>
                            <option value="Selesai" {{ old('status', $task->status) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="Terlambat" {{ old('status', $task->status) == 'Terlambat' ? 'selected' : '' }}>Terlambat</option>
                        </select>
                    </div>

                    <!-- Prioritas -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Prioritas *</label>
                        <select name="priority" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                required>
                            <option value="Sedang" {{ old('priority', $task->priority) == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                            <option value="Tinggi" {{ old('priority', $task->priority) == 'Tinggi' ? 'selected' : '' }}>Tinggi</option>
                        </select>
                    </div>

                    <!-- Deadline -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Deadline *</label>
                        <input type="date" name="due_date" value="{{ old('due_date', $task->due_date->format('Y-m-d')) }}" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               required>
                    </div>

                    <!-- Tugaskan Ke -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Tugaskan Ke</label>
                        <select name="assigned_to" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Pilih pengguna</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('assigned_to', $task->assigned_to) == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} ({{ $user->email }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex gap-4 mt-8">
                    <button type="submit" 
                            class="px-6 py-3 bg-black text-white rounded-lg hover:bg-gray-800 transition font-medium">
                        Update Task
                    </button>
                    <a href="{{ route('tasks.index') }}" 
                       class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition font-medium">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
                </div>
                <h1 class="text-xl font-bold text-gray-800">Task Management</h1>
            </div>

            <nav class="space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('tasks.index') }}" class="flex items-center gap-3 px-4 py-3 bg-gray-100 text-gray-800 rounded-lg font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Semua Task
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    Pengguna
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Cuti
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Tim
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>