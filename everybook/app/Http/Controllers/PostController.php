<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->paginate(5);

        return view('dashboard', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
        ]);

        $user = auth()->user();
        $post = $user->posts()->create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if($request->has('image')){
            $path = public_path('uploads').'/'.$request->image;

            $file = File::get($path);
            
            Image::create([
                'post_id' => $post->id,
                'up_name' => File::name($path),
                'size' => File::size($path),
                'extension' => File::extension($path),
            ]);
        }

        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function show(User $user, Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'user' => $user,
        ]);
    }
}
