@extends('layouts.app')

@section('title', 'Pengajuan Cuti')

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
                <a href="{{ route('user.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('user.tasks') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Semua Task
                </a>
                <a href="{{ route('user.announcements') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                    </svg>
                    Pengumuman
                </a>
                <a href="{{ route('user.leaves') }}" class="flex items-center gap-3 px-4 py-3 bg-gray-100 text-gray-800 rounded-lg font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Cuti
                </a>

                <a href="{{ route('user.team') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Tim
                </a>

                <a href="{{ route('user.settings') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
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
                    <button type="submit"
                        class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h3 class="text-lg font-bold text-gray-800 mb-1">Pengajuan Cuti Saya</h3>
                    <p class="text-sm text-gray-600">Kelola pengajuan cuti dan izin Anda</p>
                </div>
                <button onclick="openLeaveOverlay()"
                    class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Ajukan Cuti
                </button>
            </div>

            <div class="grid grid-cols-4 gap-4">
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-sm text-gray-600 mb-1">Total Pengajuan</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $totalLeaves }}</p>
                </div>
                <div class="bg-yellow-50 rounded-lg p-4">
                    <p class="text-sm text-gray-600 mb-1">Menunggu</p>
                    <p class="text-2xl font-bold text-yellow-600">{{ $menunggu }}</p>
                </div>
                <div class="bg-green-50 rounded-lg p-4">
                    <p class="text-sm text-gray-600 mb-1">Disetujui</p>
                    <p class="text-2xl font-bold text-green-600">{{ $disetujui }}</p>
                </div>
                <div class="bg-red-50 rounded-lg p-4">
                    <p class="text-sm text-gray-600 mb-1">Ditolak</p>
                    <p class="text-2xl font-bold text-red-600">{{ $ditolak }}</p>
                </div>
            </div>
        </div>

        <!-- Leaves List -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="mb-6">
                <h3 class="text-lg font-bold text-gray-800 mb-2">Daftar Pengajuan Cuti</h3>
                <p class="text-sm text-gray-600">Riwayat dan status pengajuan cuti Anda</p>
            </div>

            @if($leaves->count() > 0)
            <div class="space-y-4">
                @foreach($leaves as $leave)
                <div class="border-l-4 p-5 rounded-lg
                    {{ $leave->status == 'Menunggu' ? 'border-yellow-400 bg-yellow-50' : '' }}
                    {{ $leave->status == 'Disetujui' ? 'border-green-400 bg-green-50' : '' }}
                    {{ $leave->status == 'Ditolak' ? 'border-red-400 bg-red-50' : '' }}">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-2">
                                <span class="text-xs px-3 py-1 rounded-full font-medium bg-blue-100 text-blue-800">
                                    {{ $leave->type }}
                                </span>
                                <span class="text-xs px-3 py-1 rounded-full font-medium
                                    {{ $leave->status == 'Menunggu' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                    {{ $leave->status == 'Disetujui' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $leave->status == 'Ditolak' ? 'bg-red-100 text-red-800' : '' }}">
                                    {{ $leave->status }}
                                </span>
                            </div>

                            <div class="space-y-2 mb-3">
                                <div class="flex items-center gap-4 text-sm text-gray-600">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span>Periode: {{ $leave->start_date->format('d M Y') }} - {{ $leave->end_date->format('d M Y') }}</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>Durasi: {{ $leave->duration }} hari</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>Diajukan: {{ $leave->created_at->format('d M Y, H:i') }}</span>
                                    </div>
                                </div>
                                <div class="text-sm text-gray-700">
                                    <span class="font-medium">Alasan:</span> {{ $leave->reason }}
                                </div>
                                @if($leave->attachment)
                                <div class="text-sm text-gray-700">
                                    <div class="flex items-start gap-2 mb-2">
                                        <svg class="w-4 h-4 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                                        </svg>
                                        <div class="flex-1">
                                            <span class="font-medium">Lampiran:</span>
                                            <a href="{{ asset('storage/' . $leave->attachment) }}" target="_blank" 
                                               class="text-blue-600 hover:text-blue-800 underline ml-2">
                                                {{ basename($leave->attachment) }}
                                            </a>
                                            @php
                                                $extension = pathinfo($leave->attachment, PATHINFO_EXTENSION);
                                                $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png']);
                                            @endphp
                                            @if($isImage)
                                            <div class="mt-2">
                                                <img src="{{ asset('storage/' . $leave->attachment) }}" 
                                                     alt="Lampiran" 
                                                     class="max-w-xs rounded border border-gray-300 cursor-pointer hover:opacity-90"
                                                     onclick="window.open(this.src, '_blank')">
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($leave->status == 'Ditolak' && $leave->rejection_reason)
                                <div class="text-sm text-red-700 bg-red-100 p-3 rounded">
                                    <span class="font-medium">Alasan Penolakan:</span> {{ $leave->rejection_reason }}
                                </div>
                                @endif
                                @if($leave->status == 'Disetujui' && $leave->approved_at)
                                <div class="text-sm text-green-700 bg-green-100 p-3 rounded">
                                    <span class="font-medium">Disetujui pada:</span> {{ $leave->approved_at->format('d M Y, H:i') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center gap-2 ml-4">
                            @if($leave->status == 'Menunggu')
                            <button onclick='openEditLeaveOverlay(@json($leave))'
                                class="p-2 hover:bg-white rounded-lg transition" title="Edit">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>
                            <button onclick="deleteLeave({{ $leave->id }})"
                                class="p-2 hover:bg-white rounded-lg transition" title="Hapus">
                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                            @else
                            <button class="p-2 opacity-50 cursor-not-allowed" disabled title="Tidak dapat diedit">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-12">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <p class="text-gray-600">Belum ada pengajuan cuti</p>
                <p class="text-sm text-gray-500 mt-1">Klik tombol "Ajukan Cuti" untuk membuat pengajuan baru</p>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Overlay Pengajuan Cuti Baru -->
<div id="leaveOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4 p-6 transform transition-all">
        <h3 class="text-xl font-bold text-gray-800 mb-1">Pengajuan Cuti Baru</h3>
        <p class="text-sm text-gray-600 mb-6">Isi form berikut untuk mengajukan cuti atau izin</p>

        <form id="leaveForm" enctype="multipart/form-data">
            @csrf
            <!-- Jenis Cuti -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Jenis Cuti <span class="text-red-500">*</span>
                </label>
                <select name="type" id="leaveType"
                    class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                    required>
                    <option value="">Pilih jenis cuti</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Izin">Izin</option>
                    <option value="Cuti Tahunan">Cuti Tahunan</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>

            <!-- Tanggal Mulai & Selesai -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal Mulai <span class="text-red-500">*</span>
                    </label>
                    <input type="date" name="start_date" id="leaveStartDate"
                        class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                        min="{{ date('Y-m-d') }}" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal Selesai <span class="text-red-500">*</span>
                    </label>
                    <input type="date" name="end_date" id="leaveEndDate"
                        class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                        min="{{ date('Y-m-d') }}" required>
                </div>
            </div>

            <!-- Alasan -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Alasan <span class="text-red-500">*</span>
                </label>
                <textarea name="reason" id="leaveReason" rows="3"
                    placeholder="Jelaskan alasan pengajuan cuti"
                    class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm resize-none"
                    required></textarea>
                <p class="text-xs text-gray-500 mt-1">Minimal 10 karakter</p>
            </div>

            <!-- Lampiran Dokumen -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Lampiran Dokumen (Opsional)
                </label>
                <div class="relative">
                    <input type="file" name="attachment" id="leaveAttachment" accept=".pdf,.jpg,.jpeg,.png"
                        class="hidden">
                    <button type="button" onclick="document.getElementById('leaveAttachment').click()"
                        class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg hover:bg-gray-100 transition text-sm text-gray-700 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                        Upload File
                    </button>
                    <p class="text-xs text-gray-500 mt-1" id="fileNameDisplay">Format: PDF, JPG, PNG (Max 2MB)</p>
                </div>
            </div>

            <!-- Info Required -->
            <p class="text-xs text-gray-500 mb-4">
                <span class="text-red-500">*</span> Field wajib diisi
            </p>

            <!-- Buttons -->
            <div class="flex gap-3">
                <button type="button" onclick="closeLeaveOverlay()"
                    class="flex-1 px-4 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition font-medium text-sm">
                    Batal
                </button>
                <button type="submit"
                    class="flex-1 px-4 py-2.5 bg-black text-white rounded-lg hover:bg-gray-800 transition font-medium text-sm">
                    Kirim Pengajuan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Overlay Edit Cuti -->
<div id="editLeaveOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4 p-6 transform transition-all">
        <h3 class="text-xl font-bold text-gray-800 mb-1">Edit Pengajuan Cuti</h3>
        <p class="text-sm text-gray-600 mb-6">Ubah informasi pengajuan cuti</p>

        <form id="editLeaveForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" id="editLeaveId">

            <!-- Jenis Cuti -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Jenis Cuti <span class="text-red-500">*</span>
                </label>
                <select name="type" id="editLeaveType"
                    class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                    required>
                    <option value="Sakit">Sakit</option>
                    <option value="Izin">Izin</option>
                    <option value="Cuti Tahunan">Cuti Tahunan</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>

            <!-- Tanggal Mulai & Selesai -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal Mulai <span class="text-red-500">*</span>
                    </label>
                    <input type="date" name="start_date" id="editLeaveStartDate"
                        class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                        min="{{ date('Y-m-d') }}" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal Selesai <span class="text-red-500">*</span>
                    </label>
                    <input type="date" name="end_date" id="editLeaveEndDate"
                        class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                        min="{{ date('Y-m-d') }}" required>
                </div>
            </div>

            <!-- Alasan -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Alasan <span class="text-red-500">*</span>
                </label>
                <textarea name="reason" id="editLeaveReason" rows="3"
                    placeholder="Jelaskan alasan pengajuan cuti"
                    class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm resize-none"
                    required></textarea>
                <p class="text-xs text-gray-500 mt-1">Minimal 10 karakter</p>
            </div>

            <!-- Lampiran Dokumen -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Lampiran Dokumen (Opsional)
                </label>
                <div class="relative">
                    <input type="file" name="attachment" id="editLeaveAttachment" accept=".pdf,.jpg,.jpeg,.png"
                        class="hidden">
                    <button type="button" onclick="document.getElementById('editLeaveAttachment').click()"
                        class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg hover:bg-gray-100 transition text-sm text-gray-700 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                        Upload File
                    </button>
                    <p class="text-xs text-gray-500 mt-1" id="editFileNameDisplay">Format: PDF, JPG, PNG (Max 2MB)</p>
                </div>
            </div>

            <!-- Info Required -->
            <p class="text-xs text-gray-500 mb-4">
                <span class="text-red-500">*</span> Field wajib diisi
            </p>

            <!-- Buttons -->
            <div class="flex gap-3">
                <button type="button" onclick="closeEditLeaveOverlay()"
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
    // Open leave overlay
    function openLeaveOverlay() {
        document.getElementById('leaveOverlay').classList.remove('hidden');
        document.getElementById('leaveOverlay').classList.add('flex');
    }

    // Close leave overlay
    function closeLeaveOverlay() {
        document.getElementById('leaveOverlay').classList.add('hidden');
        document.getElementById('leaveOverlay').classList.remove('flex');
        document.getElementById('leaveForm').reset();
        document.getElementById('fileNameDisplay').textContent = 'Format: PDF, JPG, PNG (Max 2MB)';
    }

    // Show selected file name
    document.getElementById('leaveAttachment').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name;
        if (fileName) {
            document.getElementById('fileNameDisplay').textContent = fileName;
        }
    });

    // Handle leave form submission
    document.getElementById('leaveForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const type = document.getElementById('leaveType').value;
        const startDate = document.getElementById('leaveStartDate').value;
        const endDate = document.getElementById('leaveEndDate').value;
        const reason = document.getElementById('leaveReason').value.trim();

        // Validasi
        if (!type) {
            Swal.fire({
                title: 'Perhatian!',
                text: 'Jenis cuti wajib dipilih',
                icon: 'warning',
                confirmButtonColor: '#f59e0b',
                confirmButtonText: 'OK'
            });
            return;
        }

        if (!startDate || !endDate) {
            Swal.fire({
                title: 'Perhatian!',
                text: 'Tanggal mulai dan selesai wajib diisi',
                icon: 'warning',
                confirmButtonColor: '#f59e0b',
                confirmButtonText: 'OK'
            });
            return;
        }

        if (new Date(endDate) < new Date(startDate)) {
            Swal.fire({
                title: 'Perhatian!',
                text: 'Tanggal selesai tidak boleh kurang dari tanggal mulai',
                icon: 'warning',
                confirmButtonColor: '#f59e0b',
                confirmButtonText: 'OK'
            });
            return;
        }

        if (!reason || reason.length < 10) {
            Swal.fire({
                title: 'Perhatian!',
                text: 'Alasan minimal 10 karakter',
                icon: 'warning',
                confirmButtonColor: '#f59e0b',
                confirmButtonText: 'OK'
            });
            return;
        }

        const formData = new FormData(this);

        try {
            const response = await fetch('{{ route('user.leaves.store') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                },
                body: formData
            });

            const data = await response.json();

            if (data.success) {
                closeLeaveOverlay();
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
                text: 'Terjadi kesalahan saat mengajukan cuti',
                icon: 'error',
                confirmButtonColor: '#ef4444',
                confirmButtonText: 'OK'
            });
        }
    });

    // Close leave overlay when clicking outside
    document.getElementById('leaveOverlay').addEventListener('click', function(e) {
        if (e.target === this) {
            closeLeaveOverlay();
        }
    });

    // Open edit leave overlay
    function openEditLeaveOverlay(leave) {
        document.getElementById('editLeaveId').value = leave.id;
        document.getElementById('editLeaveType').value = leave.type;
        document.getElementById('editLeaveStartDate').value = leave.start_date;
        document.getElementById('editLeaveEndDate').value = leave.end_date;
        document.getElementById('editLeaveReason').value = leave.reason;

        if (leave.attachment) {
            const fileName = leave.attachment.split('/').pop();
            document.getElementById('editFileNameDisplay').textContent = fileName;
        }

        document.getElementById('editLeaveOverlay').classList.remove('hidden');
        document.getElementById('editLeaveOverlay').classList.add('flex');
    }

    // Close edit leave overlay
    function closeEditLeaveOverlay() {
        document.getElementById('editLeaveOverlay').classList.add('hidden');
        document.getElementById('editLeaveOverlay').classList.remove('flex');
        document.getElementById('editLeaveForm').reset();
        document.getElementById('editFileNameDisplay').textContent = 'Format: PDF, JPG, PNG (Max 2MB)';
    }

    // Show selected file name for edit
    document.getElementById('editLeaveAttachment').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name;
        if (fileName) {
            document.getElementById('editFileNameDisplay').textContent = fileName;
        }
    });

    // Handle edit leave form submission
    document.getElementById('editLeaveForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const leaveId = document.getElementById('editLeaveId').value;
        const type = document.getElementById('editLeaveType').value;
        const startDate = document.getElementById('editLeaveStartDate').value;
        const endDate = document.getElementById('editLeaveEndDate').value;
        const reason = document.getElementById('editLeaveReason').value.trim();

        // Validasi
        if (!type) {
            Swal.fire({
                title: 'Perhatian!',
                text: 'Jenis cuti wajib dipilih',
                icon: 'warning',
                confirmButtonColor: '#f59e0b',
                confirmButtonText: 'OK'
            });
            return;
        }

        if (!startDate || !endDate) {
            Swal.fire({
                title: 'Perhatian!',
                text: 'Tanggal mulai dan selesai wajib diisi',
                icon: 'warning',
                confirmButtonColor: '#f59e0b',
                confirmButtonText: 'OK'
            });
            return;
        }

        if (new Date(endDate) < new Date(startDate)) {
            Swal.fire({
                title: 'Perhatian!',
                text: 'Tanggal selesai tidak boleh kurang dari tanggal mulai',
                icon: 'warning',
                confirmButtonColor: '#f59e0b',
                confirmButtonText: 'OK'
            });
            return;
        }

        if (!reason || reason.length < 10) {
            Swal.fire({
                title: 'Perhatian!',
                text: 'Alasan minimal 10 karakter',
                icon: 'warning',
                confirmButtonColor: '#f59e0b',
                confirmButtonText: 'OK'
            });
            return;
        }

        const formData = new FormData(this);

        try {
            const response = await fetch(`/user/leaves/${leaveId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                },
                body: formData
            });

            const data = await response.json();

            if (data.success) {
                closeEditLeaveOverlay();
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
                text: 'Terjadi kesalahan saat mengupdate cuti',
                icon: 'error',
                confirmButtonColor: '#ef4444',
                confirmButtonText: 'OK'
            });
        }
    });

    // Close edit leave overlay when clicking outside
    document.getElementById('editLeaveOverlay').addEventListener('click', function(e) {
        if (e.target === this) {
            closeEditLeaveOverlay();
        }
    });

    // Delete leave function
    async function deleteLeave(leaveId) {
        const result = await Swal.fire({
            title: 'Hapus Pengajuan Cuti?',
            text: 'Pengajuan cuti akan dihapus secara permanen',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal'
        });

        if (result.isConfirmed) {
            try {
                const response = await fetch(`/user/leaves/${leaveId}`, {
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
                    text: 'Terjadi kesalahan saat menghapus cuti',
                    icon: 'error',
                    confirmButtonColor: '#ef4444',
                    confirmButtonText: 'OK'
                });
            }
        }
    }
</script>

@endsection