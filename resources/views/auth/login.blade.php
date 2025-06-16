@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gray-50">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-center text-gray-800">Login</h2>
            @if ($errors->any())
                <div class="p-3 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                    {{ $errors->first() }}
                </div>
            @endif
            <form class="space-y-5" method="POST" action="{{ url('/login') }}">
                @csrf
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500" />
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                    <input id="password" type="password" name="password" required
                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500" />
                </div>
                <div class="flex items-center">
                    <input id="remember" type="checkbox" name="remember"
                        class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-500">
                    <label for="remember" class="ml-2 text-sm text-gray-600">Remember me</label>
                </div>
                <button type="submit"
                    class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium">Login</button>
            </form>
            <div class="text-center">
                <a class="text-sm text-blue-600 hover:underline" href="{{ route('register') }}">Belum punya akun? Register</a>
            </div>
        </div>
    </div>
@endsection
