<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $image = $request->file('file');

        //저장할 이미지 이름 생성
        $imageName = Str::uuid() . "." . $image->extension();

        //이미지 조작
        $imageServidor = Image::make($image);
        $imageServidor->fit(1000, 1000);

        $imagePath = public_path('uploads') . '/' . $imageName;
        $imageServidor->save($imagePath);

        return response()->json(['image' => $imageName]);
    }
}
