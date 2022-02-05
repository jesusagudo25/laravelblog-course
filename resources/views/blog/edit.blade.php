@extends('layouts.app')

@section('script')
    <script src="{{ asset('js/form.js') }}" defer></script>
@endsection

@section('content')

    <div class="w-4/5 m-auto text-left">
        <div class="py-15 ">
            <h1 class="text-5xl">
                Edit Post
            </h1>
        </div>
    </div>

    <div class="w-4/5 m-auto pt-10">
        <form
            action="{{route('blog.update',$post->slug)}}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <figure class="w-1/2 m-auto h-72 relative mb-20">
                    <img src="{{asset('images/'.$post->image_path)}}"
                    alt=""
                    class="w-full h-full bg-center bg-no-repeat object-none rounded-md">
                    <div class="info rounded-md">
                            <div class="bg-grey-lighter pt-15">
                                <label
                                class="flex flex-col items-center p-1 text-white cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    <input
                                        type="file"
                                        name="image"
                                        class="hidden">
                                </label>
                            </div>
                    </div>
                    @error('image')
                        <br>
                        <small>*{{$message}}</small>
                        <br>
                    @enderror
                </figure>
            </div>

            <label for="title">
                <input
                    type="text"
                    name="title"
                    placeholder="Title..."
                    value="{{old('title',$post->title)}}"
                    class="bg-transparent block border-b-2 w-full h-20 text-4xl mb-4"
                    id="">
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
                    id="">{{old('description',$post->description)}}</textarea>
                    @error('description')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                    @enderror
            </label>

            <input
            type="submit"
            value="Submit post"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">

        </form>
    </div>

    @endsection
