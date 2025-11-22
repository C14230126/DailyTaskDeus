@extends('layouts.app')

@section('title', 'Pengajuan Cuti - Admin')

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
                <a href="{{ route('admin.announcements') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                    </svg>
                    Pengumuman
                </a>
                <a href="{{ route('admin.leaves') }}" class="flex items-center gap-3 px-4 py-3 bg-gray-100 text-gray-800 rounded-lg font-medium">
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

       <!-- Stats Section -->
<div class="bg-white rounded-xl shadow-sm p-6 mb-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h3 class="text-lg font-bold text-gray-800 mb-1">Pengajuan Cuti</h3>
            <p class="text-sm text-gray-600">Kelola pengajuan cuti dan izin karyawan</p>
        </div>
        <button onclick="openLeaveOverlay()" 
                class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
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
            <p class="text-sm text-gray-600 mb-1">Menunggu Persetujuan</p>
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
                <h3 class="text-lg font-bold text-gray-800 mb-2">Menunggu Persetujuan ({{ $menunggu }})</h3>
                <p class="text-sm text-gray-600">Pengajuan cuti yang perlu disetujui</p>
            </div>

            <div class="space-y-4 mb-8">
                @forelse($leaves->where('status', 'Menunggu') as $leave)
                <div class="border-l-4 border-yellow-400 p-5 bg-yellow-50 rounded-lg">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-2">
                                <h4 class="font-bold text-gray-800">{{ $leave->user->name }}</h4>
                                <span class="text-xs px-3 py-1 rounded-full font-medium bg-blue-100 text-blue-800">
                                    {{ $leave->type }}
                                </span>
                                <span class="text-xs px-3 py-1 rounded-full font-medium bg-yellow-100 text-yellow-800">
                                    Menunggu
                                </span>
                            </div>

                            <div class="space-y-2 mb-3">
                                <div class="flex items-center gap-4 text-sm text-gray-600">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <span>Periode: {{ $leave->start_date->format('d M Y') }} - {{ $leave->end_date->format('d M Y') }}</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span>Durasi: {{ $leave->duration }} hari</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span>Diajukan: {{ $leave->created_at->format('d M Y, H:i') }}</span>
                                    </div>
                                </div>
                                <div class="text-sm text-gray-700">
                                    <span class="font-medium">Alasan:</span> {{ $leave->reason }}
                                </div>
                            </div>
                        </div>

<!-- Action Buttons -->
<div class="flex items-center gap-2 ml-4">
    <button onclick='openEditLeaveOverlay(@json($leave))' 
            class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition text-sm font-medium flex items-center gap-2"
            title="Edit">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
        </svg>
        Edit
    </button>
    <button onclick="approveLeave({{ $leave->id }})" 
            class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition text-sm font-medium flex items-center gap-2"
            title="Setujui">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
        </svg>
        Setujui
    </button>
    <button onclick="openRejectModal({{ $leave->id }})" 
            class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition text-sm font-medium flex items-center gap-2" 
            title="Tolak">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
        Tolak
    </button>
</div>
                    </div>
                </div>
                @empty
                <div class="text-center py-8 text-gray-500">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <p>Tidak ada pengajuan cuti yang menunggu</p>
                </div>
                @endforelse
            </div>

            <!-- Riwayat Pengajuan Cuti -->
            <div class="mb-6 pt-6 border-t">
                <h3 class="text-lg font-bold text-gray-800 mb-2">Riwayat Pengajuan Cuti</h3>
                <p class="text-sm text-gray-600">Semua pengajuan cuti dan status persetujuan</p>
            </div>

            <div class="space-y-4">
                @forelse($leaves->whereIn('status', ['Disetujui', 'Ditolak']) as $leave)
                <div class="border-l-4 p-5 bg-gray-50 rounded-lg
                            {{ $leave->status == 'Disetujui' ? 'border-green-400' : 'border-red-400' }}">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-2">
                                <h4 class="font-bold text-gray-800">{{ $leave->user->name }}</h4>
                                <span class="text-xs px-3 py-1 rounded-full font-medium bg-blue-100 text-blue-800">
                                    {{ $leave->type }}
                                </span>
                                <span class="text-xs px-3 py-1 rounded-full font-medium
                                           {{ $leave->status == 'Disetujui' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $leave->status }}
                                </span>
                            </div>

                            <div class="space-y-2 mb-3">
                                <div class="flex items-center gap-4 text-sm text-gray-600">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <span>Periode: {{ $leave->start_date->format('d M Y') }} - {{ $leave->end_date->format('d M Y') }}</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span>Durasi: {{ $leave->duration }} hari</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span>Disetujui: {{ $leave->approved_at ? $leave->approved_at->format('d M Y, H:i') : '-' }}</span>
                                    </div>
                                </div>
                                <div class="text-sm text-gray-700">
                                    <span class="font-medium">Alasan:</span> {{ $leave->reason }}
                                </div>
                                @if($leave->status == 'Ditolak' && $leave->rejection_reason)
                                <div class="text-sm text-red-700 bg-red-50 p-3 rounded">
                                    <span class="font-medium">Alasan Penolakan:</span> {{ $leave->rejection_reason }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="ml-4">
                            <button class="p-2 hover:bg-gray-100 rounded-lg transition" title="Lihat Detail">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-8 text-gray-500">
                    <p>Belum ada riwayat pengajuan cuti</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- Modal Penolakan -->
<div id="rejectModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4 p-6 transform transition-all">
        <h3 class="text-xl font-bold text-gray-800 mb-2">Tolak Pengajuan Cuti</h3>
        <p class="text-sm text-gray-600 mb-6">Berikan alasan penolakan pengajuan cuti ini</p>
        
        <form id="rejectForm">
            @csrf
            <input type="hidden" id="rejectLeaveId">
            
            <!-- Alasan Penolakan -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Alasan Penolakan <span class="text-red-500">*</span>
                </label>
                <textarea name="rejection_reason" id="rejectionReason" rows="4"
                          placeholder="Jelaskan alasan penolakan cuti..."
                          class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm resize-none"
                          required></textarea>
                <p class="text-xs text-gray-500 mt-1">Minimal 10 karakter</p>
            </div>

            <!-- Buttons -->
            <div class="flex gap-3">
                <button type="button" onclick="closeRejectModal()"
                        class="flex-1 px-4 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition font-medium text-sm">
                    Batal
                </button>
                <button type="submit"
                        class="flex-1 px-4 py-2.5 bg-red-500 text-white rounded-lg hover:bg-red-600 transition font-medium text-sm">
                    Tolak Cuti
                </button>
            </div>
        </form>

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
                    Jenis Cuti
                </label>
                <select name="type" id="leaveType"
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
                        Tanggal Mulai
                    </label>
                    <input type="date" name="start_date" id="leaveStartDate"
                           placeholder="mm/dd/yyyy"
                           class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                           min="{{ date('Y-m-d') }}"
                           required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal Selesai
                    </label>
                    <input type="date" name="end_date" id="leaveEndDate"
                           placeholder="mm/dd/yyyy"
                           class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                           min="{{ date('Y-m-d') }}"
                           required>
                </div>
            </div>

            <!-- Alasan -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Alasan
                </label>
                <textarea name="reason" id="leaveReason" rows="3"
                          placeholder="Tulis isi pengumuman di sini"
                          class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm resize-none"
                          required></textarea>
            </div>

            <!-- Lampiran Dokumen -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Lampiran Dokumen (Opsional)
                </label>
                <div class="relative">
                    <input type="file" name="attachment" id="leaveAttachment" 
                           accept=".pdf,.jpg,.jpeg,.png"
                           class="hidden">
                    <button type="button" onclick="document.getElementById('leaveAttachment').click()"
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg hover:bg-gray-100 transition text-sm text-gray-700 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                        Upload File
                    </button>
                    <p class="text-xs text-gray-500 mt-1" id="fileNameDisplay">Format: PDF, JPG, PNG (Max 2MB)</p>
                </div>
            </div>

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
                    Jenis Cuti
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
                        Tanggal Mulai
                    </label>
                    <input type="date" name="start_date" id="editLeaveStartDate"
                           class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                           min="{{ date('Y-m-d') }}"
                           required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal Selesai
                    </label>
                    <input type="date" name="end_date" id="editLeaveEndDate"
                           class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                           min="{{ date('Y-m-d') }}"
                           required>
                </div>
            </div>

            <!-- Alasan -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Alasan
                </label>
                <textarea name="reason" id="editLeaveReason" rows="3"
                          placeholder="Tulis alasan pengajuan cuti"
                          class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm resize-none"
                          required></textarea>
            </div>

            <!-- Lampiran Dokumen -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Lampiran Dokumen (Opsional)
                </label>
                <div class="relative">
                    <input type="file" name="attachment" id="editLeaveAttachment" 
                           accept=".pdf,.jpg,.jpeg,.png"
                           class="hidden">
                    <button type="button" onclick="document.getElementById('editLeaveAttachment').click()"
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg hover:bg-gray-100 transition text-sm text-gray-700 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                        Upload File
                    </button>
                    <p class="text-xs text-gray-500 mt-1" id="editFileNameDisplay">Format: PDF, JPG, PNG (Max 2MB)</p>
                </div>
            </div>

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
    // Approve leave
    async function approveLeave(leaveId) {
        const result = await Swal.fire({
            title: 'Setujui Pengajuan Cuti?',
            text: 'Pengajuan cuti akan disetujui dan dikonfirmasi ke karyawan',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#10b981',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, Setujui',
            cancelButtonText: 'Batal'
        });

        if (result.isConfirmed) {
            try {
                const response = await fetch(`/admin/leaves/${leaveId}/approve`, {
                    method: 'POST',
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
                    text: 'Terjadi kesalahan saat menyetujui cuti',
                    icon: 'error',
                    confirmButtonColor: '#ef4444',
                    confirmButtonText: 'OK'
                });
            }
        }
    }

    // Open reject modal
    function openRejectModal(leaveId) {
        document.getElementById('rejectLeaveId').value = leaveId;
        document.getElementById('rejectModal').classList.remove('hidden');
        document.getElementById('rejectModal').classList.add('flex');
    }

    // Close reject modal
    function closeRejectModal() {
        document.getElementById('rejectModal').classList.add('hidden');
        document.getElementById('rejectModal').classList.remove('flex');
        document.getElementById('rejectForm').reset();
    }

    // Handle reject form submission
    document.getElementById('rejectForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const leaveId = document.getElementById('rejectLeaveId').value;
        const reason = document.getElementById('rejectionReason').value.trim();
        
        if (!reason || reason.length < 10) {
            Swal.fire({
                title: 'Perhatian!',
                text: 'Alasan penolakan minimal 10 karakter',
                icon: 'warning',
                confirmButtonColor: '#f59e0b',
                confirmButtonText: 'OK'
            });
            return;
        }
        
        const formData = new FormData(this);
        
        try {
            const response = await fetch(`/admin/leaves/${leaveId}/reject`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                },
                body: formData
            });

            const data = await response.json();

            if (data.success) {
                closeRejectModal();
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
                text: 'Terjadi kesalahan saat menolak cuti',
                icon: 'error',
                confirmButtonColor: '#ef4444',
                confirmButtonText: 'OK'
            });
        }
    });

    // Close modal when clicking outside
    document.getElementById('rejectModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeRejectModal();
        }
    });

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
        const response = await fetch('{{ route('admin.leaves.store') }}', {
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
        const response = await fetch(`/admin/leaves/${leaveId}`, {
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
</script>

@endsection