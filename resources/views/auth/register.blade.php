@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-1/3 bg-white p-6 rounded-lg">
        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input type="text" name="name" id="name" placeholder="Your name" autocomplete="off"
                    class="bg-gray-100 border-2 w-full p-4 @error('name') border-red-500 @enderror"
                    value=" {{ old('name') }}">
            </div>

            @error('name')
                <div class="text-red-500 m-2 text-sm">
                    {{ $message }}
                </div>
            @enderror

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
                <label for="username" class="sr-only">Username</label>
                <input type="text" name="username" id="username" placeholder="Add a username" autocomplete="off"
                    class="bg-gray-100 border-2 w-full p-4 @error('username') border-red-500 @enderror"
                >
            </div>

            @error('username')
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
                <label for="password_confirmation" class="sr-only">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    placeholder="Confirm password" class="bg-gray-100 border-2 w-full p-4 @error('password_confirmation') border-red-500 @enderror">
            </div>
            {{-- it is not necessary for confirmation --}}
            @error('password_confirmation')
                <div class="text-red-500 m-2 text-sm">
                    {{ $message }}
                </div>
            @enderror

            <div>
                <button type="submit" class="bg-blue-700 text-white px-4 py-3 font-medium w-full">
                    Register
                </button>
            </div>
        </form>
    </div>
</div>

@endsection