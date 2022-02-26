@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">

            @if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('status') }}
                </div>
            @endif


            <form action="{{ route('login') }}" method="post">
                @csrf


                <div class="mb-4">
                    @error('email')
                        <div class="text-red-500 mt-2 text-m">
                            {{ $message }}
                        </div>
                    @enderror
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg
                    @error('name') border-red-500 @enderror"
                        placeholder="Your Email" value="{{ old('email') }}">
                </div>

                <div class="mb-4">
                    @error('password')
                        <div class="text-red-500 mt-2 text-m">
                            {{ $message }}
                        </div>
                    @enderror
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg
                    @error('name') border-red-500 @enderror"
                        placeholder="Choose A Password" value="">
                </div>

                <div class="mb-4">
                    <div class="flex items-center">
                        <label for="remember">Remember me</label>
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
