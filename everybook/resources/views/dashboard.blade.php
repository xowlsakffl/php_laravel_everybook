@extends('layouts.app')

@section('title')
    프로필: {{$user->username}}
@endsection

@section('content')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
            <div class="md:w-8/12 lg:w-6/12 px-5 max-w-xs m-auto">
                <img src="{{asset('img/usericon.svg')}}" alt="">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-10 md:flex md:flex-col md:justify-center py-10 max-w-xs m-auto text-center md:text-left">
                <div class="flex items-center gap-2">
                    <p class="text-gray-700 text-2xl font-bold">{{$user->username}}</p>

                    @auth
                        @if($user->id === auth()->user()->id)
                            <a href="{{route('profiles.index')}}" class="text-gray-500 hover:text-gray-600 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                    <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                                  </svg>
                            </a>
                        @endif
                    @endauth
                </div>
                <p class="text-gray-800 text-sm mb-3 font-bold mt-4">
                    0 <span class="font-normal">팔로워</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0 <span class="font-normal">팔로우</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{$user->posts->count()}} <span class="font-normal">포스트</span>
                </p>
            </div>
        </div>
    </div>

    <section class="mx-auto mt-20">
        @if ($user->posts->count())
            <h2 class="text-3xl text-center font-bold my-10">게시물</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div>
                    <a href="{{route('posts.show', ['post' => $post->id, 'user' => $user])}}">
                        @if ($post->image)
                            <img src="{{asset('uploads').'/'.$post->image->up_name.'.'.$post->image->extension}}" alt="">
                        @endif
                    </a>
                </div>
            @endforeach
            </div>
            <div class="my-10">{{$posts->links('pagination::tailwind')}}</div>
        @else
            <p class="text-gray-600 text-sm text-center font-bold">게시물이 없습니다.</p>
        @endif
    </section>
@endsection