@extends('layouts.app')

@section('title', 'Sign Up')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 p-4">
    <div class="bg-white rounded-2xl shadow-xl p-8 w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Selamat Datang</h1>
            <p class="text-gray-600 text-sm">Silahkan buat akun baru untuk masuk</p>
        </div>

        <!-- Tab Navigation -->
        <div class="flex gap-2 mb-6">
            <a href="{{ route('login') }}" class="flex-1 py-2 text-center text-gray-600 hover:bg-gray-50 rounded-lg font-medium">
                Login
            </a>
            <a href="{{ route('register') }}" class="flex-1 py-2 text-center bg-gray-100 rounded-lg font-medium text-gray-800">
                Sign Up
            </a>
        </div>

        @if($errors->any())
            <div class="mb-4 p-3 bg-red-50 border border-red-200 text-red-700 rounded-lg text-sm">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            
            <!-- Nama Lengkap -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-medium mb-2">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" 
                       placeholder="Isikan nama anda"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50"
                       required>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" 
                       placeholder="Isikan email anda"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50"
                       required>
            </div>

            <!-- No. Telp -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-medium mb-2">No. Telp</label>
                <input type="text" name="phone" value="{{ old('phone') }}" 
                       placeholder="Isikan no telp anda"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50"
                       required>
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                <input type="password" name="password" 
                       placeholder="Isikan password anda"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50"
                       required>
            </div>

            <!-- Konfirmasi Password -->
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-medium mb-2">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" 
                       placeholder="Isikan konfirmasi password"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50"
                       required>
            </div>

            <!-- Sign Up Button -->
            <button type="submit" 
                    class="w-full bg-black text-white py-3 rounded-lg font-medium hover:bg-gray-800 transition duration-200">
                Sign Up
            </button>

            <!-- Already have account -->
            <p class="text-center text-sm text-gray-600 mt-4">
                Sudah Punya Akun? 
                <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700 font-medium">Login</a>
            </p>
        </form>
    </div>
</div>
@endsection