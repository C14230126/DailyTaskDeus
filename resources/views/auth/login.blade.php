@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 p-4">
    <div class="bg-white rounded-2xl shadow-xl p-8 w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Selamat Datang</h1>
            <p class="text-gray-600 text-sm">Masuk ke akun Anda atau buat akun baru</p>
        </div>

        <!-- Tab Navigation -->
        <div class="flex gap-2 mb-6">
            <a href="{{ route('login') }}" class="flex-1 py-2 text-center bg-gray-100 rounded-lg font-medium text-gray-800">
                Login
            </a>
            <a href="{{ route('register') }}" class="flex-1 py-2 text-center text-gray-600 hover:bg-gray-50 rounded-lg font-medium">
                Sign Up
            </a>
        </div>

        @if($errors->any())
            <div class="mb-4 p-3 bg-red-50 border border-red-200 text-red-700 rounded-lg text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            
            <!-- Email -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                <div class="relative">
                    <input type="email" name="email" value="{{ old('email') }}" 
                           placeholder="Isikan email anda"
                           class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50"
                           required>
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                <div class="relative">
                    <input type="password" name="password" 
                           placeholder="Isikan password anda"
                           class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50"
                           required>
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
            </div>

            <!-- Remember & Forgot Password -->
            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <span class="ml-2 text-sm text-gray-700">Ingat saya</span>
                </label>
                <a href="#" class="text-sm text-red-600 hover:text-red-700">Lupa Password?</a>
            </div>

            <!-- Login Button -->
            <button type="submit" 
                    class="w-full bg-black text-white py-3 rounded-lg font-medium hover:bg-gray-800 transition duration-200">
                Login
            </button>
        </form>
    </div>
</div>
@endsection