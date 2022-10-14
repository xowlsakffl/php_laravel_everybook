<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);

        $validate = $request->validate([
            'username' => ['required', 'unique:users,username', auth()->user()->id, 'min:3', 'max:30', 'alpha_num'],
        ]);

        if($request->image){
            $image = $request->file('image');

            //저장할 이미지 이름 생성
            $imageName = Str::uuid() . "." . $image->extension();

            //이미지 조작
            $imageServidor = Image::make($image);
            $imageServidor->fit(1000, 1000);

            $imagePath = public_path('profiles') . '/' . $imageName;
            $imageServidor->save($imagePath);

            return response()->json(['image' => $imageName]);
        }

        $user = User::find(auth()->user()->id);
        $user->update([
            'username' => $request->username,
        ]);

        return redirect()->route('posts.index', $user->username);
    }
}
