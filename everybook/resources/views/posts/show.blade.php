@extends('layouts.app')

@section('title')
    {{$post->title}}
@endsection

@section('content')
    <div class="container mx-auto flex">
        <div class="md:w-1/2">
            <img src="{{asset('uploads').'/'.$post->image->up_name.'.'.$post->image->extension}}" alt="">

            <div class="p-3">
                <p>0 Likes</p>
            </div>
        </div>
        <div class="md:w-1/2">
            2
        </div>
    </div>
@endsection