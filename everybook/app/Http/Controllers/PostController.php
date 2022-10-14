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
        $this->middleware('auth')->except(['show', 'index']);
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

        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function show(User $user, Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'user' => $user,
        ]);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $image_path = public_path('uploads/'.$post->image->up_name.'.'.$post->image->extension);
        
        if(File::exists($image_path)){
            Image::where('up_name', $post->image->up_name)->delete();

            unlink($image_path);
        }

        $post->delete();

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
