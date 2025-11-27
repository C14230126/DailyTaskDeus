@extends('layouts.app')

@section('title', 'Pengaturan - Admin')

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
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.all-tasks') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Semua Task
                </a>
                <a href="{{ route('admin.announcements') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                    </svg>
                    Pengumuman
                </a>
                <a href="{{ route('admin.leaves') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Cuti
                </a>
                <a href="{{ route('admin.team') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Tim
                </a>
                <a href="{{ route('admin.settings') }}"
                    class="flex items-center gap-3 px-4 py-3 bg-gray-100 text-gray-800 rounded-lg font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
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

        <!-- Settings Content -->
        <div class="bg-white rounded-xl shadow-sm p-8">
            <!-- Pengaturan Section -->
            <div class="mb-8">
                <h3 class="text-lg font-bold text-gray-800 mb-1">Pengaturan</h3>
                <p class="text-sm text-gray-600">Kelola preferensi aplikasi Anda</p>
            </div>

            <!-- Profil Pengguna Section -->
            <div class="mb-10">
                <h4 class="text-base font-semibold text-gray-800 mb-1">Profil Pengguna</h4>
                <p class="text-sm text-gray-600 mb-6">Informasi akun dan profil Anda</p>

                <form id="profileForm" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-2 gap-6">
                        <!-- Nama Lengkap -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Lengkap
                            </label>
                            <input type="text" name="name" id="profileName" value="{{ $user->name }}"
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                                required>
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Email
                            </label>
                            <input type="email" name="email" id="profileEmail" value="{{ $user->email }}"
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                                required>
                        </div>

                        <!-- Role (Read-only) -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Role
                            </label>
                            <input type="text" value="{{ ucfirst($user->role) }}"
                                class="w-full px-4 py-2.5 bg-gray-100 border border-gray-200 rounded-lg text-sm text-gray-600"
                                disabled readonly>
                        </div>

                        <!-- Posisi/Jabatan (Optional) -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Posisi
                            </label>
                            <input type="text" value="Website"
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                                placeholder="Jabatan Anda">
                        </div>

                        <!-- Tanggal Bergabung (Read-only) -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Tanggal Bergabung
                            </label>
                            <input type="text" value="{{ $user->created_at->format('d/m/Y') }}"
                                class="w-full px-4 py-2.5 bg-gray-100 border border-gray-200 rounded-lg text-sm text-gray-600"
                                disabled readonly>
                        </div>

                        <!-- Status (Read-only) -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Status
                            </label>
                            <div class="flex items-center gap-2">
                                <span class="px-3 py-1.5 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                                    Aktif
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                            class="px-6 py-2.5 bg-black text-white rounded-lg hover:bg-gray-800 transition font-medium text-sm">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

            <!-- Keamanan Section -->
            <div class="pt-8 border-t border-gray-200">
                <h4 class="text-base font-semibold text-gray-800 mb-1">Keamanan</h4>
                <p class="text-sm text-gray-600 mb-6">Informasi akun dan profil Anda</p>

                <div>
                    <button onclick="openResetPasswordModal()"
                        class="px-6 py-2.5 border border-red-500 text-red-600 rounded-lg hover:bg-red-50 transition font-medium text-sm">
                        Reset Password
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Reset Password -->
<div id="resetPasswordModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4 p-6 transform transition-all">
        <h3 class="text-xl font-bold text-gray-800 mb-2">Reset Password</h3>
        <p class="text-sm text-gray-600 mb-6">Ubah password akun Anda</p>

        <form id="resetPasswordForm">
            @csrf

            <!-- Password Saat Ini -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Password Saat Ini <span class="text-red-500">*</span>
                </label>
                <input type="password" name="current_password" id="currentPassword"
                    class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                    required>
            </div>

            <!-- Password Baru -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Password Baru <span class="text-red-500">*</span>
                </label>
                <input type="password" name="new_password" id="newPassword"
                    class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                    required>
                <p class="text-xs text-gray-500 mt-1">Minimal 8 karakter</p>
            </div>

            <!-- Konfirmasi Password Baru -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Konfirmasi Password Baru <span class="text-red-500">*</span>
                </label>
                <input type="password" name="new_password_confirmation" id="confirmNewPassword"
                    class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                    required>
            </div>

            <!-- Buttons -->
            <div class="flex gap-3">
                <button type="button" onclick="closeResetPasswordModal()"
                    class="flex-1 px-4 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition font-medium text-sm">
                    Batal
                </button>
                <button type="submit"
                    class="flex-1 px-4 py-2.5 bg-black text-white rounded-lg hover:bg-gray-800 transition font-medium text-sm">
                    Ubah Password
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Handle profile form submission
    document.getElementById('profileForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const name = document.getElementById('profileName').value.trim();
        const email = document.getElementById('profileEmail').value.trim();

        if (!name || !email) {
            Swal.fire({
                title: 'Perhatian!',
                text: 'Nama dan email wajib diisi',
                icon: 'warning',
                confirmButtonColor: '#f59e0b',
                confirmButtonText: 'OK'
            });
            return;
        }

        const formData = new FormData(this);

        try {
            const response = await fetch('{{ route('admin.settings.updateProfile') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                },
                body: formData
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
                text: 'Terjadi kesalahan saat mengupdate profil',
                icon: 'error',
                confirmButtonColor: '#ef4444',
                confirmButtonText: 'OK'
            });
        }
    });

    // Open reset password modal
    function openResetPasswordModal() {
        document.getElementById('resetPasswordModal').classList.remove('hidden');
        document.getElementById('resetPasswordModal').classList.add('flex');
    }

    // Close reset password modal
    function closeResetPasswordModal() {
        document.getElementById('resetPasswordModal').classList.add('hidden');
        document.getElementById('resetPasswordModal').classList.remove('flex');
        document.getElementById('resetPasswordForm').reset();
    }

    // Handle reset password form submission
    document.getElementById('resetPasswordForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const currentPassword = document.getElementById('currentPassword').value;
        const newPassword = document.getElementById('newPassword').value;
        const confirmNewPassword = document.getElementById('confirmNewPassword').value;

        // Validasi
        if (!currentPassword || !newPassword || !confirmNewPassword) {
            Swal.fire({
                title: 'Perhatian!',
                text: 'Semua field wajib diisi',
                icon: 'warning',
                confirmButtonColor: '#f59e0b',
                confirmButtonText: 'OK'
            });
            return;
        }

        if (newPassword.length < 8) {
            Swal.fire({
                title: 'Perhatian!',
                text: 'Password baru minimal 8 karakter',
                icon: 'warning',
                confirmButtonColor: '#f59e0b',
                confirmButtonText: 'OK'
            });
            return;
        }

        if (newPassword !== confirmNewPassword) {
            Swal.fire({
                title: 'Perhatian!',
                text: 'Konfirmasi password tidak cocok',
                icon: 'warning',
                confirmButtonColor: '#f59e0b',
                confirmButtonText: 'OK'
            });
            return;
        }

        const formData = new FormData(this);

        try {
            const response = await fetch('{{ route('admin.settings.resetPassword') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                },
                body: formData
            });

            const data = await response.json();

            if (data.success) {
                closeResetPasswordModal();
                Swal.fire({
                    title: 'Berhasil!',
                    text: data.message,
                    icon: 'success',
                    confirmButtonColor: '#000000',
                    confirmButtonText: 'OK'
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
                text: 'Terjadi kesalahan saat mengubah password',
                icon: 'error',
                confirmButtonColor: '#ef4444',
                confirmButtonText: 'OK'
            });
        }
    });

    // Close modal when clicking outside
    document.getElementById('resetPasswordModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeResetPasswordModal();
        }
    });
</script>

@endsection