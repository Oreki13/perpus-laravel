@extends('Home.master')
@section('title', 'Add Book')
@section('main_content')
    @include('Home.Component.navbar')
    <div class="max-w-screen-xl mx-auto mt-4">
        <h1 class="text-3xl">Edit Book</h1>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{route('editBook.post', $table->id)}}" method="POST" enctype="multipart/form-data">
       @csrf
            <div class="grid grid-cols-3 gap-x-3 mt-4">
            <div>
                <div id="box-img" class="relative   max-h-[468px]">
                    <button type="button" id="delete-img" class="absolute bottom-0 right-0 bg-red-400 opacity-80 hover:bg-red-500 rounded text-white p-1 text-sm">Delete Image</button>
                    <img class="object-cover max-h-[468px]" src="{{asset('cover_book/'.$table->img)}}" id='img_view' >
                </div>
                <div id='box-img-empty' class="border hidden justify-center items-center h-full">
                    <div>
                        <label for="img" class="bg-blue-500 p-2 rounded hover:bg-blue-600 text-white cursor-pointer">
                            Add Image
                        </label>
                        <input id="img" name="img"  class="hidden" type="file" accept=".jpg,.png">
                    </div>
                </div>
            </div>
            <div class="col-span-2">
                    <div class="flex flex-col">
                        <label class="mb-1">Title</label>
                        <input placeholder="Insert title of book" name="title" value="{{$table->title}}" class="border p-1 rounded" type="text">
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-1">Year</label>
                        <input placeholder="Insert Year of book" name="year" value="{{$table->year}}" class="border p-1 rounded" type="number">
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-1">Publisher</label>
                        <input placeholder="Insert Publisher" name="publisher" value="{{$table->publisher}}" class="border p-1 rounded" type="text">
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-1">Creator</label>
                        <input placeholder="Insert Creator" name="creator" value="{{$table->creator}}" class="border p-1 rounded" type="text">
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-1">Language</label>
                        <input placeholder="Insert Languange" name="language" value="{{$table->language}}" class="border p-1 rounded" type="text">
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-1">Description</label>
                        <textarea placeholder="Insert Description" name="description"  rows="3" class="border p-1">{{$table->description}}</textarea>
                    </div>
                    <button class="bg-blue-500 rounded text-white p-2 mt-2 w-full hover:bg-blue-600">Edit Book</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('script')
    <script src="{{asset('plugin/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
@endpush