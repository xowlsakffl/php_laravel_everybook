@extends('layouts.app')

@section('title')
    {{$post->title}}
@endsection

@section('content')
    <div class="container mx-auto flex">
        <div class="md:w-1/2">
            <img src="{{asset('uploads').'/'.$post->image->up_name.'.'.$post->image->extension}}" alt="">
            <div class="p-3 flex items-center gap-4">
                <form action="{{route('posts.likes.store', $post)}}" method="POST">
                    @csrf
                    <div class="my-4">
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>   
                        </button> 
                    </div>                  
                </form>
            <div class="p-3">
                <p>0 Likes</p>
            </div>
        </div>
        <div class="md:w-1/2">
            2
        </div>
    </div>
@endsection