@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-1/3 bg-white p-6 rounded-lg">

        @if (session('status'))
            <div class="bg-red-500 p-4 mb-6 text-white text-center">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="text" name="email" id="email" placeholder="Your email address" autocomplete="off"
                    class="bg-gray-100 border-2 w-full p-4 @error('email') border-red-500 @enderror"
                    value=" {{ old('email') }} ">
            </div>

            @error('email')
                <div class="text-red-500 m-2 text-sm">
                    {{ $message }}
                </div>
            @enderror

            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" placeholder="Your password"
                    class="bg-gray-100 border-2 w-full p-4 @error('password') border-red-500 @enderror">
            </div>

            @error('password')
                <div class="text-red-500 m-2 text-sm">
                    {{ $message }}
                </div>
            @enderror

            <div class="mb-4">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember">Remember me</label>
                </div>
            </div>

            <div>
                <button type="submit" class="bg-blue-700 text-white px-4 py-3 font-medium w-full">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>

@endsection