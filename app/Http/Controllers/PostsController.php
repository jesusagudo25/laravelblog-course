<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use File;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at','DESC')->paginate(5);
        return view('blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = uniqid().'-'.SlugService::createSlug(Post::class, 'slug',$request->title).'.'.$request->image->extension();

        $request->image->move(public_path('images'),$newImageName);

        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug',$request->title),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);

        return redirect(route('blog.index'))->with('message','Your post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('blog.show')
            ->with('post',Post::where('slug',$slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('blog.edit')
            ->with('post',Post::where('slug',$slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpg,png,jpeg|max:5048'
        ]);

        $post = Post::where('slug',$slug)->first();

        if ($request->has('image')) {
            File::delete('images/'.$post->image_path);

            $newImageName = uniqid().'-'.SlugService::createSlug(Post::class, 'slug',$request->title).'.'.$request->image->extension();

            $request->image->move(public_path('images'),$newImageName);

            Post::where('slug',$slug)
                ->update([
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'slug' => SlugService::createSlug(Post::class, 'slug',$request->title),
                    'image_path' => $newImageName
                ]);
        }
        else{
            $foo = File::extension('images/'.$post->image_path);

            $newImageName = uniqid().'-'.SlugService::createSlug(Post::class, 'slug',$request->title).'.'.$foo;

            File::move(public_path('images/'.$post->image_path),public_path('images/'.$newImageName));

            Post::where('slug',$slug)
                ->update([
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'slug' => SlugService::createSlug(Post::class, 'slug',$request->title),
                    'image_path' => $newImageName
                ]);
        }

        return redirect(route('blog.index'))->with('message','Your post has been update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug',$slug)->first();
        File::delete('images/'.$post->image_path);

        $post->delete();

        return redirect(route('blog.index'))->with('message','Your post has been deleted!');
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function updateImage(Request $request, $slug)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $post = Post::where('slug',$slug)->first();
        File::delete('images/'.$post->image_path);

        $request->image->move(public_path('images'),$post->image_path);

        return back()->with('message','Your image has been update!');
    }
}
