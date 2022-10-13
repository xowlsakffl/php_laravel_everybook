<?php

namespace App\Http\Controllers;

use App\Models\Coment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ComentController extends Controller
{
    public function store(Request $request, User $user = null, Post $post)
    {
        $this->validate($request,[
            'coment' => 'required|max:255',
        ]);

        Coment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'coment' => $request->coment,
        ]);

        return back()->with('message', '댓글이 작성되었습니다.');
    }
}
