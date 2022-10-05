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
                <p class="text-gray-700 text-2xl mb-4 font-bold">{{$user->username}}</p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0 <span class="font-normal">팔로워</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0 <span class="font-normal">팔로우</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0 <span class="font-normal">포스트</span>
                </p>
            </div>
        </div>
    </div>
@endsection