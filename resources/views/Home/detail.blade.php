@extends('Home.master')
@section('title', 'Detail')

@section('main_content')
    @include('Home.Component.navbar')
    <div class="max-w-screen-xl my-5 mx-auto">
        @if(session('success'))
            <div class="bg-green-500 my-3 p-3 text-white rounded">
                <span>{{session('success')}}</span>
            </div>
        @endif
        <div class="flex justify-between">
            <h1 class="text-3xl">Detail Buku</h1>
            @if(Auth::user()->role_id == 1)
            <div>
                <a href="{{route('editBook', $table->id)}}" class="bg-blue-500 p-2 rounded text-white hover:bg-blue-600">Edit Book</a>
                <a href="{{route('book.delete', $table->id)}}" class="bg-red-500 p-2 rounded text-white hover:bg-red-600">Delete Book</a>
            </div>
            @endif
        </div>
        <div class="grid grid-cols-3 gap-x-3 mt-4">
            <div>
                <img src='{{asset('cover_book/'.$table->img)}}' width="100%" height="600" class="object-cover">
            </div>
            <div class="col-span-2">
                <div class="bg-gray-100 p-3">
                    <h1 class="text-2xl">{{$table->title}}</h1>
                    <small>{{$table->year}}</small>
                </div>
                <div class="bg-gray-200 p-3">
                    <div>
                        <span class="block text-sm opacity-60">Penerbit</span>
                        <span>{{$table->publisher}}</span>
                    </div>
                    <div class="mt-2.5">
                        <span class="block text-sm opacity-60">Pencipta</span>
                        <span>{{$table->creator}}</span>
                    </div>
                    <div class="mt-2.5">
                        <span class="block text-sm opacity-60">Bahasa</span>
                        <span>{{$table->language}}</span>
                    </div>
                    
                    <div class="mt-2.5">
                        <span class="block text-sm opacity-60">Deskripsi</span>
                        <span>{{$table->description}}
                        </span>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
