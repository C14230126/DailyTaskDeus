@extends('layouts.app')

@section('title', 'Pengumuman - Admin')

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
                </div>
                <h1 class="text-xl font-bold text-gray-800">Task Management</h1>
            </div>

            <nav class="space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
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
                <a href="{{ route('admin.announcements') }}" class="flex items-center gap-3 px-4 py-3 bg-gray-100 text-gray-800 rounded-lg font-medium">
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
                <p class="text-gray-600 text-sm">{{ now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</p>
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

        <!-- Announcements Section -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Pengumuman</h3>
                    <p class="text-sm text-gray-600">Informasi penting dan update untuk seluruh tim</p>
                </div>
                <button onclick="openAnnouncementOverlay()" 
                        class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Buat Pengumuman
                </button>
            </div>

            <!-- Announcements List -->
            <div class="space-y-4">
                @forelse($announcements as $announcement)
                <div class="border-l-4 p-5 bg-gray-50 rounded-lg hover:shadow-md transition
                            {{ $announcement->type == 'Penting' ? 'border-red-400' : '' }}
                            {{ $announcement->type == 'Event' ? 'border-purple-400' : '' }}
                            {{ $announcement->type == 'Medium' ? 'border-yellow-400' : '' }}
                            {{ $announcement->type == 'Cuti' ? 'border-green-400' : '' }}
                            {{ $announcement->type == 'Semua' ? 'border-blue-400' : '' }}">
                    
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <!-- Title and Badge -->
                            <div class="flex items-start gap-3 mb-3">
                                <h4 class="text-lg font-bold text-gray-800 flex-1">{{ $announcement->title }}</h4>
                                <span class="text-xs px-3 py-1 rounded-full font-medium whitespace-nowrap
                                           {{ $announcement->type == 'Penting' ? 'bg-red-100 text-red-800' : '' }}
                                           {{ $announcement->type == 'Event' ? 'bg-purple-100 text-purple-800' : '' }}
                                           {{ $announcement->type == 'Medium' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                           {{ $announcement->type == 'Cuti' ? 'bg-green-100 text-green-800' : '' }}
                                           {{ $announcement->type == 'Semua' ? 'bg-blue-100 text-blue-800' : '' }}">
                                    {{ $announcement->type }}
                                </span>
                            </div>

                            <!-- Content -->
                            <p class="text-gray-700 mb-4 leading-relaxed">{{ $announcement->content }}</p>

                            <!-- Meta Info -->
                            <div class="flex items-center gap-4 text-sm text-gray-500">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    <span>{{ $announcement->creator->name }} (Manager)</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>{{ $announcement->created_at->format('d M Y, H:i') }}</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>Berakhir pada {{ $announcement->created_at->addDays(7)->format('d M Y, H:i') }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center gap-2 ml-4">
    <button onclick='openEditAnnouncementOverlay(@json($announcement))' 
            class="p-2 hover:bg-blue-50 rounded-lg transition"
            title="Edit Pengumuman">
        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
        </svg>
    </button>
    <button onclick="deleteAnnouncement({{ $announcement->id }})" 
            class="p-2 hover:bg-red-50 rounded-lg transition" 
            title="Hapus Pengumuman">
        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
        </svg>
    </button>
</div>
                    </div>
                </div>
                @empty
                <div class="text-center py-16">
                    <svg class="w-20 h-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                    </svg>
                    <p class="text-gray-600 text-lg mb-2">Belum ada pengumuman</p>
                    <p class="text-gray-500 text-sm mb-4">Buat pengumuman pertama untuk tim</p>
                    <button onclick="openAnnouncementOverlay()" class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition">
                        Buat Pengumuman
                    </button>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- Overlay Popup Tambah Pengumuman -->
<div id="announcementOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4 p-6 transform transition-all">
        <h3 class="text-xl font-bold text-gray-800 mb-1">Buat Pengumuman Baru</h3>
        <p class="text-sm text-gray-600 mb-6">Buat pengumuman untuk seluruh tim atau grup tertentu.</p>
        
        <form id="announcementForm">
            @csrf
            <!-- Judul Pengumuman -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Judul Pengumuman
                </label>
                <input type="text" name="title" id="announcementTitle" 
                       placeholder="Masukkan judul pengumuman"
                       class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                       minlength="5"
                       required>
            </div>

            <!-- Isi Pengumuman -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Isi Pengumuman
                </label>
                <textarea name="content" id="announcementContent" rows="3"
                          placeholder="Tulis isi pengumuman di sini"
                          class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm resize-none"
                          required></textarea>
            </div>

            <!-- Prioritas & Tipe -->
<div class="grid grid-cols-2 gap-4 mb-4">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
            Prioritas <span class="text-red-500">*</span>
        </label>
        <select name="priority" id="announcementPriority"
                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm appearance-none"
                required>
            <option value="">Pilih Prioritas</option>
            <option value="Sedang" selected>Sedang</option>
            <option value="Tinggi">Tinggi</option>
            <option value="Rendah">Rendah</option>
        </select>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
            Tipe <span class="text-red-500">*</span>
        </label>
        <select name="type" id="announcementType"
                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm appearance-none"
                required>
            <option value="">Pilih Tipe</option>
            <option value="Umum" selected>Umum</option>
            <option value="Penting">Penting</option>
            <option value="Event">Event</option>
            <option value="Cuti">Cuti</option>
        </select>
    </div>
</div>
            <!-- Target Audience & Tanggal Berakhir -->
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Target Audience
                    </label>
                    <select name="target_audience" id="announcementTarget"
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm appearance-none">
                        <option value="Semua">Semua</option>
                        <option value="Manager">Manager</option>
                        <option value="Staff">Staff</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal Berakhir (Opsional)
                    </label>
                    <input type="date" name="end_date" id="announcementEndDate"
                           placeholder="mm/dd/yyyy"
                           class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex gap-3">
                <button type="button" onclick="closeAnnouncementOverlay()"
                        class="flex-1 px-4 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition font-medium text-sm">
                    Batal
                </button>
                <button type="submit"
                        class="flex-1 px-4 py-2.5 bg-black text-white rounded-lg hover:bg-gray-800 transition font-medium text-sm">
                    Publikasikan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Overlay Popup Edit Pengumuman -->
<!-- Overlay Popup Edit Pengumuman -->
<div id="editAnnouncementOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4 p-6 transform transition-all">
        <h3 class="text-xl font-bold text-gray-800 mb-1">Edit Pengumuman</h3>
        <p class="text-sm text-gray-600 mb-6">Ubah informasi pengumuman</p>
        
        <form id="editAnnouncementForm">
            @csrf
            @method('PUT')
            <input type="hidden" id="editAnnouncementId">
            
            <!-- Judul Pengumuman -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Judul Pengumuman
                </label>
                <input type="text" name="title" id="editAnnouncementTitle" 
                       placeholder="Masukkan judul pengumuman"
                       class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                       minlength="5"
                       required>
            </div>

            <!-- Isi Pengumuman -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Isi Pengumuman
                </label>
                <textarea name="content" id="editAnnouncementContent" rows="3"
                          placeholder="Tulis isi pengumuman di sini"
                          class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm resize-none"
                          required></textarea>
            </div>

            <!-- Prioritas & Tipe -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Prioritas <span class="text-red-500">*</span>
                    </label>
                    <select name="priority" id="editAnnouncementPriority"
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm appearance-none"
                            required>
                        <option value="Sedang">Sedang</option>
                        <option value="Tinggi">Tinggi</option>
                        <option value="Rendah">Rendah</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Tipe <span class="text-red-500">*</span>
                    </label>
                    <select name="type" id="editAnnouncementType"
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm appearance-none"
                            required>
                        <option value="Umum">Umum</option>
                        <option value="Penting">Penting</option>
                        <option value="Event">Event</option>
                        <option value="Cuti">Cuti</option>
                    </select>
                </div>
            </div>

            <!-- Target Audience & Tanggal Berakhir -->
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Target Audience
                    </label>
                    <select name="target_audience" id="editAnnouncementTarget"
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm appearance-none">
                        <option value="Semua">Semua</option>
                        <option value="Manager">Manager</option>
                        <option value="Staff">Staff</option>
                        <option value="Developer">Developer</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal Berakhir (Opsional)
                    </label>
                    <input type="date" name="end_date" id="editAnnouncementEndDate"
                           placeholder="mm/dd/yyyy"
                           class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex gap-3">
                <button type="button" onclick="closeEditAnnouncementOverlay()"
                        class="flex-1 px-4 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition font-medium text-sm">
                    Batal
                </button>
                <button type="submit"
                        class="flex-1 px-4 py-2.5 bg-black text-white rounded-lg hover:bg-gray-800 transition font-medium text-sm">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Open overlay
    function openAnnouncementOverlay() {
        document.getElementById('announcementOverlay').classList.remove('hidden');
        document.getElementById('announcementOverlay').classList.add('flex');
    }

    // Close overlay
    function closeAnnouncementOverlay() {
        document.getElementById('announcementOverlay').classList.add('hidden');
        document.getElementById('announcementOverlay').classList.remove('flex');
        document.getElementById('announcementForm').reset();
    }

    // Handle form submission
document.getElementById('announcementForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const title = document.getElementById('announcementTitle').value.trim();
    const content = document.getElementById('announcementContent').value.trim();
    const type = document.getElementById('announcementType').value;
    const priority = document.getElementById('announcementPriority').value;
    
    // Validasi client-side
    if (!title || title.length < 5) {
        Swal.fire({
            title: 'Perhatian!',
            text: 'Judul pengumuman minimal 5 karakter',
            icon: 'warning',
            confirmButtonColor: '#f59e0b',
            confirmButtonText: 'OK'
        });
        return;
    }
    
    if (!content || content.length < 10) {
        Swal.fire({
            title: 'Perhatian!',
            text: 'Isi pengumuman minimal 10 karakter',
            icon: 'warning',
            confirmButtonColor: '#f59e0b',
            confirmButtonText: 'OK'
        });
        return;
    }
    
    if (!type) {
        Swal.fire({
            title: 'Perhatian!',
            text: 'Tipe pengumuman wajib dipilih',
            icon: 'warning',
            confirmButtonColor: '#f59e0b',
            confirmButtonText: 'OK'
        });
        return;
    }
    
    if (!priority) {
        Swal.fire({
            title: 'Perhatian!',
            text: 'Prioritas wajib dipilih',
            icon: 'warning',
            confirmButtonColor: '#f59e0b',
            confirmButtonText: 'OK'
        });
        return;
    }
    
    const formData = new FormData(this);
    
    try {
        const response = await fetch('{{ route('admin.announcements.store') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
            },
            body: formData
        });

        const data = await response.json();

        if (data.success) {
            closeAnnouncementOverlay();
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
            text: 'Terjadi kesalahan saat menambahkan pengumuman',
            icon: 'error',
            confirmButtonColor: '#ef4444',
            confirmButtonText: 'OK'
        });
    }
});

   // Open edit overlay
function openEditAnnouncementOverlay(announcement) {
    document.getElementById('editAnnouncementId').value = announcement.id;
    document.getElementById('editAnnouncementTitle').value = announcement.title;
    document.getElementById('editAnnouncementContent').value = announcement.content;
    document.getElementById('editAnnouncementType').value = announcement.type;
    document.getElementById('editAnnouncementPriority').value = announcement.priority || 'Sedang';
    document.getElementById('editAnnouncementTarget').value = announcement.target_audience || 'Semua';
    document.getElementById('editAnnouncementEndDate').value = announcement.end_date || '';
    
    document.getElementById('editAnnouncementOverlay').classList.remove('hidden');
    document.getElementById('editAnnouncementOverlay').classList.add('flex');
}

// Close edit overlay
function closeEditAnnouncementOverlay() {
    document.getElementById('editAnnouncementOverlay').classList.add('hidden');
    document.getElementById('editAnnouncementOverlay').classList.remove('flex');
    document.getElementById('editAnnouncementForm').reset();
}

// Handle edit form submission
document.getElementById('editAnnouncementForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const announcementId = document.getElementById('editAnnouncementId').value;
    const title = document.getElementById('editAnnouncementTitle').value.trim();
    const content = document.getElementById('editAnnouncementContent').value.trim();
    const type = document.getElementById('editAnnouncementType').value;
    const priority = document.getElementById('editAnnouncementPriority').value;
    
    // Validasi client-side
    if (!title || title.length < 5) {
        Swal.fire({
            title: 'Perhatian!',
            text: 'Judul pengumuman minimal 5 karakter',
            icon: 'warning',
            confirmButtonColor: '#f59e0b',
            confirmButtonText: 'OK'
        });
        return;
    }
    
    if (!content || content.length < 10) {
        Swal.fire({
            title: 'Perhatian!',
            text: 'Isi pengumuman minimal 10 karakter',
            icon: 'warning',
            confirmButtonColor: '#f59e0b',
            confirmButtonText: 'OK'
        });
        return;
    }
    
    if (!type) {
        Swal.fire({
            title: 'Perhatian!',
            text: 'Tipe pengumuman wajib dipilih',
            icon: 'warning',
            confirmButtonColor: '#f59e0b',
            confirmButtonText: 'OK'
        });
        return;
    }
    
    if (!priority) {
        Swal.fire({
            title: 'Perhatian!',
            text: 'Prioritas wajib dipilih',
            icon: 'warning',
            confirmButtonColor: '#f59e0b',
            confirmButtonText: 'OK'
        });
        return;
    }
    
    const formData = new FormData(this);
    
    try {
        const response = await fetch(`/admin/announcements/${announcementId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
            },
            body: formData
        });

        const data = await response.json();

        if (data.success) {
            closeEditAnnouncementOverlay();
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
            text: 'Terjadi kesalahan saat mengupdate pengumuman',
            icon: 'error',
            confirmButtonColor: '#ef4444',
            confirmButtonText: 'OK'
        });
    }
});
    // Delete announcement function
    async function deleteAnnouncement(announcementId) {
        const result = await Swal.fire({
            title: 'Hapus Pengumuman?',
            text: 'Pengumuman yang dihapus tidak dapat dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        });

        if (result.isConfirmed) {
            try {
                const response = await fetch(`/admin/announcements/${announcementId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
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
                    text: 'Terjadi kesalahan saat menghapus pengumuman',
                    icon: 'error',
                    confirmButtonColor: '#ef4444',
                    confirmButtonText: 'OK'
                });
            }
        }
    }

    // Close overlays when clicking outside
    document.getElementById('announcementOverlay').addEventListener('click', function(e) {
        if (e.target === this) {
            closeAnnouncementOverlay();
        }
    });
    
    document.getElementById('editAnnouncementOverlay').addEventListener('click', function(e) {
        if (e.target === this) {
            closeEditAnnouncementOverlay();
        }
    });


    // Close overlays when clicking outside
document.getElementById('announcementOverlay').addEventListener('click', function(e) {
    if (e.target === this) {
        closeAnnouncementOverlay();
    }
});

document.getElementById('editAnnouncementOverlay').addEventListener('click', function(e) {
    if (e.target === this) {
        closeEditAnnouncementOverlay();
    }
    
});

</script>

@endsection