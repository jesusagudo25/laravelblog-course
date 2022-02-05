@extends('layouts.app')

@section('content')

    <div class="w-4/5 m-auto text-left">
        <div class="py-15 ">
            <h1 class="text-5xl">
                {{$post->title}}
            </h1>
        </div>
        <figure class="w-full h-72">
            <img src="{{asset('images/'.$post->image_path)}}"
            alt=""
            class="w-full h-full bg-center bg-no-repeat object-cover rounded-md">
        </figure>
        @if (session()->has('message'))
        <div class="mt-10">
            <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl p-4">
                {{session()->get('message')}}
            </p>
        </div>
        @endif
    </div>

    <div class="w-4/5 m-auto pt-10">
        <span class="text-gray-500">
            By <span class="font-bold italic text-gray-800">{{$post->user->name}}</span>, Created on {{date('jS M Y',strtotime($post->updated_at))}}
        </span>

        <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
            {{$post->description}}
        </p>
    </div>

@endsection
