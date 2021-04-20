@extends('Home.master')
@section('title', 'Add Book')
@section('main_content')
    @include('Home.Component.navbar')
    <div class="max-w-screen-xl mx-auto mt-4">
        <h1 class="text-3xl">Add Book</h1>
        
        <form action="{{route('addBook.post')}}" method="POST" enctype="multipart/form-data">
        <div class="grid grid-cols-3 gap-x-3 mt-4">
            <div>
                <div id="box-img" class="relative hidden  max-h-[468px]">
                    <button type="button" id="delete-img" class="absolute bottom-0 right-0 bg-red-400 opacity-80 hover:bg-red-500 rounded text-white p-1 text-sm">Delete Image</button>
                    <img class="object-cover max-h-[468px]" id='img_view' >
                </div>
                <div id='box-img-empty' class="border flex justify-center items-center h-full">
                    <div>
                        <label for="img" class="bg-blue-500 p-2 rounded hover:bg-blue-600 text-white cursor-pointer">
                            Add Image
                        </label>
                        <input id="img" name="img" class="hidden" type="file" accept=".jpg,.png">
                    </div>
                </div>
            </div>
            <div class="col-span-2">
                    @csrf
                    <div class="flex flex-col">
                        <label class="mb-1">Title</label>
                        <input placeholder="Insert title of book" name='title' class="border p-1 rounded" type="text">
                    </div>
                    <div class="flex flex-col mt-2">
                        <label class="mb-1">Year</label>
                        <input placeholder="Insert Year of book" name='year' class="border p-1 rounded" type="number">
                    </div>
                    <div class="flex flex-col mt-2">
                        <label class="mb-1">Publisher</label>
                        <input placeholder="Insert Publisher" name='publisher' class="border p-1 rounded" type="text">
                    </div>
                    <div class="flex flex-col mt-2">
                        <label class="mb-1">Creator</label>
                        <input placeholder="Insert Creator" name='creator' class="border p-1 rounded" type="text">
                    </div>
                    <div class="flex flex-col mt-2">
                        <label class="mb-1">Language</label>
                        <input placeholder="Insert Languange" name='language' class="border p-1 rounded" type="text">
                    </div>
                    <div class="flex flex-col mt-2">
                        <label class="mb-1">Description</label>
                        <textarea placeholder="Insert Description" name='description' rows="3" class="border p-1"></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 rounded text-white p-2 mt-2 w-full hover:bg-blue-600">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('script')
    <script src="{{'plugin/jquery-3.6.0.min.js'}}"></script>
    <script src="{{'js/app.js'}}"></script>
@endpush