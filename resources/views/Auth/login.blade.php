@extends('Auth.master')
@section('title', 'Login')

@section('main_content')
    <div class='h-screen flex justify-center items-center'>
        <div class='w-1/3 border shadow-md px-5 py-3 rounded'>
            <h1 class='text-center text-2xl'>Login</h1>
            <form class='mt-3' action="{{route('login.post')}}" method="POST">
                @csrf
                <div class='flex flex-col'>
                    <label>Email</label>
                    <input type='email' name='email' class='border mt-2 p-1.5 rounded @error('email') border-red-500 @enderror'>
                    @error('email') <small class="mt-0.5 text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class='flex flex-col mt-3'>
                    <label>Password</label>
                    <input type='password' name='password' class='border mt-2 p-1.5 rounded @error('password') border-red-500 @enderror'>
                    @error('password') <small class="mt-0.5 text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <button
                    class='mt-3 bg-blue-500 w-full rounded p-2 text-white text-center hover:bg-blue-700 transition-all duration-200'>Login</button>
            </form>
            <span class='mt-3 text-center block'>Don't have account? <a href="{{ route('register') }}"
                    class='text-blue-400'>Register</a></span>
        </div>
    </div>
@endsection
