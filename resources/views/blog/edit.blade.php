@extends('layouts.app')

@section('content')

    <div class="w-4/5 m-auto text-left">
        <div class="py-15 ">
            <h1 class="text-5xl">
                Edit Post
            </h1>
        </div>
    </div>

    @if ($errors->any())
        <div class="w-4/5 m-auto">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="w-1/5 mb-4 text-gray-50 bg-red-400 rounded-2xl py-4">
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="w-4/5 m-auto pt-20">
        <form
            action="{{route('blog.update',$post->slug)}}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input
                type="text"
                name="title"
                placeholder="Title..."
                value="{{$post->title}}"
                class="bg-transparent block border-b-2 w-full h-20 text-4xl"
                id=""
            >

            <textarea
                name="description"
                placeholder="Description..."
                class="py-15 bg-transparent block border-b-2 w-full h-60 text-xl"
                id=""
            >{{$post->description}}</textarea>

            <input
            type="submit"
            value="Submit post"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
        </form>
    </div>

    @endsection
