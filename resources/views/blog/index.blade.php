@extends('layouts.app')

@section('content')

    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-5xl">
                Blog Posts
            </h1>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="w-4/5 m-auto mt-10 pl-2">
            <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl p-4">
                {{session()->get('message')}}
            </p>
        </div>
    @endif

    @if (Auth::check())
        <div class="pt-15 w-4/5 m-auto">
            <a
                href="{{route('blog.create')}}"
                class="bg-blue-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                Create Post
            </a>
        </div>
    @endif

    @foreach ($posts as $post)
        <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
            <div>
                <img src="{{$post->image_path}}"
                alt=""
                class="w-full">
            </div>
            <div>
                <h2 class="text-gray-700 font-bold text-5xl pb-4">
                    {{$post->title}}
                </h2>

                <span class="text-gray-500">
                    By <span class="font-bold italic text-gray-800">{{$post->user->name}}</span>, Created on {{date('jS M Y',strtotime($post->updated_at))}}
                </span>

                <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">{{$post->description}}</p>

                <a href="{{$post->slug}}" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Keep Reading
                </a>
            </div>
        </div>
    @endforeach

    @endsection
