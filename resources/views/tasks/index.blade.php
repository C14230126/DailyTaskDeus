@extends('layouts.app')

@section('title', 'Semua Task')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Sidebar (sama seperti dashboard) -->
    <aside class="fixed left-0 top-0 h-full w-64 bg-white shadow-lg">
        <div class="p-6">
            <div class="flex items-center gap-2 mb-8">
                <div class="w-10 h-10 bg-yellow-400 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
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
                <h2 class="text-2xl font-bold text-gray-800 mb-1">Semua Task</h2>
                <p class="text-gray-600 text-sm">Kelola semua task Anda</p>
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
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Task List -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-bold text-gray-800">Daftar Task</h3>
                <a href="{{ route('tasks.create') }}" class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Tambah Task
                </a>
            </div>

            @if($tasks->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="text-left py-3 px-4 font-semibold text-gray-700">Task</th>
                                <th class="text-left py-3 px-4 font-semibold text-gray-700">Status</th>
                                <th class="text-left py-3 px-4 font-semibold text-gray-700">Prioritas</th>
                                <th class="text-left py-3 px-4 font-semibold text-gray-700">Deadline</th>
                                <th class="text-left py-3 px-4 font-semibold text-gray-700">Ditugaskan Ke</th>
                                <th class="text-center py-3 px-4 font-semibold text-gray-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="py-4 px-4">
                                    <h4 class="font-semibold text-gray-800">{{ $task->title }}</h4>
                                    <p class="text-sm text-gray-600">{{ Str::limit($task->description, 60) }}</p>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="text-xs px-3 py-1 rounded-full font-medium
                                               {{ $task->status == 'Menunggu' ? 'bg-yellow-200 text-yellow-800' : '' }}
                                               {{ $task->status == 'Dalam Proses' ? 'bg-blue-200 text-blue-800' : '' }}
                                               {{ $task->status == 'Selesai' ? 'bg-green-200 text-green-800' : '' }}
                                               {{ $task->status == 'Terlambat' ? 'bg-red-200 text-red-800' : '' }}">
                                        {{ $task->status }}
                                    </span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="text-xs px-3 py-1 rounded-full font-medium
                                               {{ $task->priority == 'Tinggi' ? 'bg-red-200 text-red-800' : 'bg-gray-200 text-gray-800' }}">
                                        {{ $task->priority }}
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-sm text-gray-700">
                                    {{ $task->due_date->locale('id')->isoFormat('D MMM YYYY') }}
                                </td>
                                <td class="py-4 px-4">
                                    @if($task->assignedUser)
                                        <div class="flex items-center gap-2">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($task->assignedUser->name) }}&size=32&background=random" 
                                                 alt="Avatar" class="w-8 h-8 rounded-full">
                                            <span class="text-sm text-gray-700">{{ $task->assignedUser->name }}</span>
                                        </div>
                                    @else
                                        <span class="text-sm text-gray-400">Belum ditugaskan</span>
                                    @endif
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('tasks.edit', $task) }}" 
                                           class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </a>
                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" 
                                              onsubmit="return confirm('Yakin ingin menghapus task ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <p class="text-gray-600 mb-4">Belum ada task</p>
                    <a href="{{ route('tasks.create') }}" class="inline-block px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition">
                        Tambah Task Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection