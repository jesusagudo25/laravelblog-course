@extends('layouts.app')

@section('content')
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                    Do you want to become a developer?
                </h1>
                <a href="{{route('blog.index')}}" class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase">
                    Read More
                </a>
            </div>
        </div>
    </div>


    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="https://cdn.pixabay.com/photo/2015/07/17/22/43/student-849825_960_720.jpg"
            alt=""
            class="w-full">
        </div>

        <div class="m-auto sm:m-auto text-left w-4/5 block">
            <h2 class="text-4xl font-extrabold text-gray-600">
                Struggling to be a better web developer?
            </h2>

            <p class="py-8 text-gray-500 text-lg">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, voluptatibus.
            </p>

            <p class="font-extrabold text-gray-600 text-base pb-9">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo consectetur, maiores necessitatibus numquam in aliquam alias neque eveniet assumenda veritatis vero modi ad culpa quam vel dolor obcaecati. A, provident!
            </p>

            <a href="{{route('blog.index')}}"
                class="uppercase bg-blue-500 text-gray-100 text-base font-extrabold py-3 px-8 rounded-3xl">
                Find Out More
            </a>
        </div>
    </div>

    <div class="text-center p-15 bg-gray-900 text-white">
        <h2 class="text-xl pb-5">
            I'm an expert in...
        </h2>

        <span class="font-extrabold block text-4xl py-1">
            Ux Design
        </span>

        <span class="font-extrabold block text-4xl py-1">
            Project Management
        </span>

        <span class="font-extrabold block text-4xl py-1">
            Digital Strategy
        </span>

        <span class="font-extrabold block text-4xl py-1">
            Backend Development
        </span>
    </div>

    <div class="text-center py-15">
        <span class="uppercase text-base text-gray-400">
            Blog
        </span>

        <h2 class="text-4xl font-bold py-10">
            Recent Posts
        </h2>

        <p class="m-auto w-4/5 text-gray-500">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error quasi delectus iusto inventore debitis. Quos magni voluptas autem corporis ipsum?
        </p>
    </div>

    <div class="sm:grid grid-cols-2 w-4/5 m-auto">
        <div class="flex bg-yellow-600 text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block">
                <span class="uppercase text-xs">
                    PHP
                </span>

                <h3 class="text-xl font-bold py-10">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste molestiae veritatis maiores libero porro dolorum unde laborum quaerat ipsa deserunt, sint asperiores ipsum illo consequatur!
                </h3>

                <a href=""
                    class="uppercase bg-transparent border-2 border-gray-100 text-gray-100 text-sm font-extrabold py-3 px-5 rounded-3xl">
                    Find Out More
                </a>
            </div>

        </div>
            <div>
                <img src="https://cdn.pixabay.com/photo/2015/07/17/22/43/student-849825_960_720.jpg"
                alt=""
                class="w-full">
            </div>
    </div>
@endsection
