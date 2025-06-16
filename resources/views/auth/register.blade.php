@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gray-50">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-center text-gray-800">Register</h2>

            @if ($errors->any())
                <div class="p-3 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                    {{ $errors->first() }}
                </div>
            @endif

            <form class="space-y-5" method="POST" action="{{ url('/register') }}">
                @csrf

                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Nama</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500" />
                </div>

                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500" />
                </div>

                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                    <input id="password" type="password" name="password" required
                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500" />
                </div>

                <div>
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-700">Konfirmasi
                        Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500" />
                </div>

                <button type="submit"
                    class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium">
                    Register
                </button>
            </form>

            <div class="text-center">
                <a class="text-sm text-blue-600 hover:underline" href="{{ route('login') }}">
                    Sudah punya akun? Login
                </a>
            </div>
        </div>
    </div>
@endsection
