@extends('Home.master')
@section('title', 'Dashboard')

@section('main_content')
@include('Home.Component.navbar')

<div class="mt-5 max-w-screen-xl mx-auto">
    <div class="flex justify-between">
        <h1 class="text-3xl ">List Buku</h1>
        @if(Auth::user()->role_id == 1)
        <a href="{{route('addBook')}}" class="bg-blue-500 p-2 rounded text-white hover:bg-blue-600">Tambah Buku</a>
        @endif
    </div>
    @if(session('success'))
    <div class="bg-green-500 my-3 p-3 text-white rounded">
        <span>{{session('success')}}</span>
    </div>
    @endif
    @if(count($tables) < 1)
        <div class="text-center mt-10 ">
            <h3 class="text-2xl">Data Tidak ada</h3>
        </div>
    @endif
    <div class="grid grid-cols-5 mt-3 gap-5">
        @foreach($tables as $table)
        <a href="{{route('detail', $table->id)}}" class="shadow-xl rounded-md border hover:bg-gray-100 transition-all duration-200 cursor-pointer transform hover:scale-105">
            <img src="{{asset('cover_book/'.$table->img)}}" width="100%" height="300">
            <div class="p-2">
                <h4>{{$table->title}}</h4>
                <h6>{{$table->year}}</h6>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection