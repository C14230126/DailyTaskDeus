@extends('layouts.app')

@section('title', 'Kalender - Task Management')

@section('content')
<div class="min-h-screen bg-gray-50">
    <aside class="fixed left-0 top-0 h-full w-64 bg-white shadow-lg">
        <div class="p-6">
            <div class="flex items-center gap-2 mb-8">
                <div class="w-10 h-10 bg-yellow-400 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <h1 class="text-xl font-bold text-gray-800">Task Management</h1>
            </div>
            <nav class="space-y-2">
                <a href="{{ route('user.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                    Dashboard
                </a>
                <a href="{{ route('user.tasks') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                    Semua Task
                </a>
                <a href="{{ route('user.calendar') }}" class="flex items-center gap-3 px-4 py-3 bg-gray-100 text-gray-800 rounded-lg font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    Kalender
                </a>
                <a href="{{ route('user.announcements') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" /></svg>
                    Pengumuman
                </a>
                <a href="{{ route('user.leaves') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                    Cuti
                </a>
                <a href="{{ route('user.team') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    Tim
                </a>
                <a href="{{ route('user.settings') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    Pengaturan
                </a>
            </nav>
        </div>
    </aside>

    <div class="ml-64 p-8">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-2xl font-bold text-gray-800 mb-1">Selamat datang, {{ auth()->user()->name }}!</h2>
                <p class="text-gray-600 text-sm">{{ now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</p>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ route('user.team.profile', auth()->id()) }}" class="flex items-center gap-3 bg-white px-4 py-2 rounded-lg shadow hover:shadow-md transition">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=3b82f6&color=fff" alt="Avatar" class="w-10 h-10 rounded-full">
                    <div>
                        <p class="font-semibold text-gray-800">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-600">{{ auth()->user()->email }}</p>
                    </div>
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">Logout</button>
                </form>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex justify-between items-center mb-6">
                <button onclick="prevMonth()" class="p-2 hover:bg-gray-100 rounded-lg transition">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                </button>
                <h3 id="calendarTitle" class="text-lg font-bold text-gray-800"></h3>
                <button onclick="nextMonth()" class="p-2 hover:bg-gray-100 rounded-lg transition">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                </button>
            </div>

            <div class="grid grid-cols-7 mb-2">
                @foreach(['Sen','Sel','Rab','Kam','Jum','Sab','Min'] as $day)
                <div class="text-center text-xs font-medium text-gray-500 py-2">{{ $day }}</div>
                @endforeach
            </div>

            <div id="calendarGrid" class="grid grid-cols-7 gap-1"></div>

            <div class="flex items-center gap-6 mt-4 pt-4 border-t border-gray-100">
                <div class="flex items-center gap-2 text-sm text-gray-600">
                    <div class="w-3 h-3 rounded-full bg-blue-500"></div> Ada task
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Detail Modal -->
<div id="detailModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md mx-4 max-h-[80vh] flex flex-col">
        <div class="flex justify-between items-center p-6 border-b border-gray-100">
            <h3 id="modalDate" class="text-lg font-bold text-gray-800"></h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>
        <div id="modalContent" class="overflow-y-auto p-6 space-y-3"></div>
    </div>
</div>

<script>
const taskData = @json($taskData);
const months = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
const today = new Date();
let currentYear = today.getFullYear();
let currentMonth = today.getMonth();

function renderCalendar() {
    document.getElementById('calendarTitle').textContent = `${months[currentMonth]} ${currentYear}`;
    const grid = document.getElementById('calendarGrid');
    grid.innerHTML = '';

    const firstDay = new Date(currentYear, currentMonth, 1).getDay();
    const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
    const startOffset = (firstDay === 0) ? 6 : firstDay - 1;

    for (let i = 0; i < startOffset; i++) grid.insertAdjacentHTML('beforeend', '<div></div>');

    for (let d = 1; d <= daysInMonth; d++) {
        const dateStr = `${currentYear}-${String(currentMonth+1).padStart(2,'0')}-${String(d).padStart(2,'0')}`;
        const isToday = (d === today.getDate() && currentMonth === today.getMonth() && currentYear === today.getFullYear());
        const tasks = taskData[dateStr] || [];
        const dotHtml = tasks.length > 0 ? `<div class="w-1.5 h-1.5 rounded-full bg-blue-500 mx-auto mt-1"></div>` : '';

        grid.insertAdjacentHTML('beforeend', `
            <div onclick="openDay('${dateStr}')"
                class="flex flex-col items-center py-2 rounded-lg cursor-pointer hover:bg-gray-200 transition
                ${isToday ? 'bg-yellow-50 ring-2 ring-yellow-400' : 'bg-gray-50'}">
                <span class="text-sm ${isToday ? 'font-bold text-yellow-600' : 'text-gray-700'}">${d}</span>
                ${dotHtml}
            </div>
        `);
    }
}

function prevMonth() { currentMonth--; if (currentMonth < 0) { currentMonth = 11; currentYear--; } renderCalendar(); }
function nextMonth() { currentMonth++; if (currentMonth > 11) { currentMonth = 0; currentYear++; } renderCalendar(); }

function openDay(dateStr) {
    const tasks = taskData[dateStr] || [];
    const [y, m, d] = dateStr.split('-');
    document.getElementById('modalDate').textContent = `${parseInt(d)} ${months[parseInt(m)-1]} ${y}`;

    const content = document.getElementById('modalContent');
    if (tasks.length === 0) {
        content.innerHTML = '<p class="text-gray-400 text-center py-8">Tidak ada task pada tanggal ini.</p>';
    } else {
        content.innerHTML = tasks.map(t => {
            const statusClass = t.status === 'Selesai' ? 'bg-green-100 text-green-700' :
                                t.status === 'Terlambat' ? 'bg-red-100 text-red-700' :
                                t.status === 'Dalam Proses' ? 'bg-blue-100 text-blue-700' : 'bg-gray-100 text-gray-600';
            const prioClass = t.priority === 'Tinggi' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700';
            return `
                <div class="border border-gray-100 rounded-xl p-4">
                    <div class="flex justify-between items-start gap-2">
                        <p class="font-medium text-gray-800">${t.title}</p>
                        <span class="text-xs px-2 py-0.5 rounded-full shrink-0 ${statusClass}">${t.status}</span>
                    </div>
                    ${t.description ? `<p class="text-xs text-gray-400 mt-1">${t.description}</p>` : ''}
                    <span class="inline-block mt-2 text-xs px-2 py-0.5 rounded-full ${prioClass}">${t.priority}</span>
                </div>
            `;
        }).join('');
    }
    document.getElementById('detailModal').classList.remove('hidden');
}

function closeModal() { document.getElementById('detailModal').classList.add('hidden'); }

renderCalendar();
</script>
@endsection
