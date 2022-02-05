@extends('layouts.app')

@section('content')

    <div class="w-4/5 m-auto text-left">
        <div class="py-15 ">
            <h1 class="text-5xl">
                Create Post
            </h1>
        </div>
    </div>

    <div class="w-4/5 m-auto pt-20">
        <form
            action="{{route('blog.store')}}"
            method="POST"
            enctype="multipart/form-data">
            @csrf

            <label for="title">
                <input
                    type="text"
                    name="title"
                    placeholder="Title..."
                    class="bg-transparent block border-b-2 w-full h-20 text-4xl"
                    id=""
                    value="{{old('title')}}"
                >
                @error('title')
                    <br>
                        <small>*{{$message}}</small>
                    <br>
                @enderror
            </label>

            <label for="description">
                <textarea
                    name="description"
                    placeholder="Description..."
                    class="py-15 bg-transparent block border-b-2 w-full h-60 text-xl"
                    id=""
                >{{old('description')}}</textarea>
                @error('description')
                    <br>
                        <small>*{{$message}}</small>
                    <br>
                @enderror
            </label>

            <div>
                <div class="bg-grey-lighter pt-15">
                    <label
                    class="w-44 flex flex-col items-center px-2 py-3 bg-white rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                    <span class="mt-2 text-base leading-normal">
                        Select a file
                    </span>
                    <input
                        type="file"
                        name="image"
                        class="hidden">
                    </label>
                </div>
                @error('image')
                    <br>
                        <small>*{{$message}}</small>
                    <br>
                @enderror
            </div>

            <input
            type="submit"
            value="Submit post"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
        </form>
    </div>

    @endsection
