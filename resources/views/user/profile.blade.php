@extends('layouts.app')

@section('title', 'Profil ' . $profileUser->name)

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
                <a href="{{ route('user.calendar') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Kalender
                </a>
                <a href="{{ route('user.announcements') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                    </svg>
                    Pengumuman
                </a>
                <a href="{{ route('user.leaves') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Cuti
                </a>
                <a href="{{ route('user.team') }}"
                    class="flex items-center gap-3 px-4 py-3 bg-gray-100 text-gray-800 rounded-lg font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Tim
                </a>
                <a href="{{ route('user.settings') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
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
                <a href="{{ route('user.team.profile', auth()->id()) }}"
                    class="flex items-center gap-3 bg-white px-4 py-2 rounded-lg shadow hover:shadow-md transition">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=3b82f6&color=fff"
                        alt="Avatar" class="w-10 h-10 rounded-full">
                    <div>
                        <p class="font-semibold text-gray-800">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-600">{{ auth()->user()->email }}</p>
                    </div>
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Back -->
        <div class="mb-6">
            <a href="{{ route('user.team') }}"
                class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-800 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Tim
            </a>
        </div>

        <div class="grid grid-cols-3 gap-6 mb-8">
            <!-- Profile Card -->
            <div class="col-span-1 bg-white rounded-xl shadow-sm p-6 flex flex-col items-center text-center">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($profileUser->name) }}&background=3b82f6&color=fff&size=128"
                    alt="Avatar" class="w-24 h-24 rounded-full mb-4">
                <h3 class="text-xl font-bold text-gray-800 mb-1">{{ $profileUser->name }}</h3>
                @if($profileUser->id == auth()->id())
                <span class="text-xs bg-blue-100 text-blue-700 px-2 py-0.5 rounded-full mb-2">Profil Saya</span>
                @endif
                <span class="inline-block px-3 py-1 text-sm rounded-full font-medium mb-4
                    {{ $profileUser->role == 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                    {{ ucfirst($profileUser->role) }}
                </span>

                <div class="w-full border-t pt-4 space-y-3 text-left">
                    <div class="flex items-center gap-3 text-gray-600">
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span class="text-sm truncate">{{ $profileUser->email }}</span>
                    </div>
                    @if($profileUser->phone)
                    <div class="flex items-center gap-3 text-gray-600">
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span class="text-sm">{{ $profileUser->phone }}</span>
                    </div>
                    @endif
                    <div class="flex items-center gap-3 text-gray-600">
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="text-sm">Bergabung {{ $profileUser->created_at->locale('id')->isoFormat('D MMMM YYYY') }}</span>
                    </div>
                </div>

                @if($profileUser->id == auth()->id())
                <button onclick="document.getElementById('editModal').classList.remove('hidden')"
                    class="mt-8 w-full py-2.5 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition text-sm font-medium">
                    Edit Profil
                </button>
                @endif
            </div>

            <!-- Stats -->
            <div class="col-span-2 space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white rounded-xl shadow-sm p-5">
                        <p class="text-sm text-gray-500 mb-1">Total Task</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $taskStats['total'] }}</p>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-5">
                        <p class="text-sm text-gray-500 mb-1">Selesai</p>
                        <p class="text-3xl font-bold text-green-600">{{ $taskStats['selesai'] }}</p>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-5">
                        <p class="text-sm text-gray-500 mb-1">Dalam Proses</p>
                        <p class="text-3xl font-bold text-yellow-500">{{ $taskStats['dalam_proses'] }}</p>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-5">
                        <p class="text-sm text-gray-500 mb-1">Terlambat</p>
                        <p class="text-3xl font-bold text-red-500">{{ $taskStats['terlambat'] }}</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-5">
                    <div class="flex justify-between items-center mb-2">
                        <p class="text-sm font-medium text-gray-700">Progress Penyelesaian Task</p>
                        <p class="text-sm font-bold text-gray-800">{{ $taskStats['total'] > 0 ? round(($taskStats['selesai'] / $taskStats['total']) * 100) : 0 }}%</p>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-3">
                        <div class="bg-green-500 h-3 rounded-full transition-all"
                            style="width: {{ $taskStats['total'] > 0 ? round(($taskStats['selesai'] / $taskStats['total']) * 100) : 0 }}%">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Task List -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Daftar Task</h3>
            @if($tasks->isEmpty())
            <div class="text-center py-12">
                <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <p class="text-gray-400">Belum ada task.</p>
            </div>
            @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-gray-100">
                            <th class="text-left py-3 px-4 text-gray-500 font-medium">Judul</th>
                            <th class="text-left py-3 px-4 text-gray-500 font-medium">Prioritas</th>
                            <th class="text-left py-3 px-4 text-gray-500 font-medium">Status</th>
                            <th class="text-left py-3 px-4 text-gray-500 font-medium">Deadline</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($tasks as $task)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-3 px-4">
                                <p class="font-medium text-gray-800">{{ $task->title }}</p>
                                @if($task->description)
                                <p class="text-xs text-gray-400 mt-0.5 truncate max-w-xs">{{ $task->description }}</p>
                                @endif
                            </td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 rounded-full text-xs font-medium
                                    {{ $task->priority == 'high' ? 'bg-red-100 text-red-700' :
                                       ($task->priority == 'medium' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700') }}">
                                    {{ ucfirst($task->priority) }}
                                </span>
                            </td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 rounded-full text-xs font-medium
                                    {{ $task->status == 'selesai' ? 'bg-green-100 text-green-700' :
                                       ($task->status == 'dalam_proses' ? 'bg-blue-100 text-blue-700' :
                                       ($task->status == 'terlambat' ? 'bg-red-100 text-red-700' : 'bg-gray-100 text-gray-700')) }}">
                                    {{ str_replace('_', ' ', ucfirst($task->status)) }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-gray-600">
                                {{ $task->due_date ? $task->due_date->locale('id')->isoFormat('D MMM YYYY') : '-' }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
</div>

@if($profileUser->id == auth()->id())
<!-- Edit Modal -->
<div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md mx-4 p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-bold text-gray-800">Edit Profil</h3>
            <button onclick="document.getElementById('editModal').classList.add('hidden')"
                class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div id="alertBox" class="hidden mb-4 px-4 py-3 rounded-lg text-sm"></div>

        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                <input type="text" id="editName" value="{{ $profileUser->name }}"
                    class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                <input type="email" id="editEmail" value="{{ $profileUser->email }}"
                    class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">No. HP</label>
                <input type="text" id="editPhone" value="{{ $profileUser->phone ?? '' }}"
                    placeholder="Contoh: 08123456789"
                    class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
            </div>
        </div>

        <div class="flex gap-3 mt-8">
            <button onclick="document.getElementById('editModal').classList.add('hidden')"
                class="flex-1 py-2.5 border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-50 transition text-sm">
                Batal
            </button>
            <button onclick="saveProfile()"
                class="flex-1 py-2.5 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition text-sm font-medium">
                Simpan
            </button>
        </div>
    </div>
</div>

<script>
async function saveProfile() {
    const name  = document.getElementById('editName').value.trim();
    const email = document.getElementById('editEmail').value.trim();
    const phone = document.getElementById('editPhone').value.trim();
    const alert = document.getElementById('alertBox');

    if (!name || !email) {
        alert.className = 'mb-4 px-4 py-3 rounded-lg text-sm bg-red-50 text-red-700';
        alert.textContent = 'Nama dan email wajib diisi.';
        return;
    }

    const formData = new FormData();
    formData.append('name', name);
    formData.append('email', email);
    formData.append('phone', phone);
    formData.append('_method', 'PUT');

    try {
        const response = await fetch('{{ route('user.profile.update') }}', {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' },
            body: formData
        });
        const data = await response.json();

        if (data.success) {
            alert.className = 'mb-4 px-4 py-3 rounded-lg text-sm bg-green-50 text-green-700';
            alert.textContent = data.message;
            setTimeout(() => location.reload(), 1000);
        } else {
            alert.className = 'mb-4 px-4 py-3 rounded-lg text-sm bg-red-50 text-red-700';
            alert.textContent = data.message;
        }
    } catch (e) {
        alert.className = 'mb-4 px-4 py-3 rounded-lg text-sm bg-red-50 text-red-700';
        alert.textContent = 'Terjadi kesalahan. Coba lagi.';
    }
}
</script>
@endif

@endsection
