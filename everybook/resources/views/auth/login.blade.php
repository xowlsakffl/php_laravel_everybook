@extends('layouts.app')

@section('title')
    로그인
@endsection

@section('content')
    <div class="container max-w-md mx-auto">
        <div class="bg-white p-5 rounded-lg shadow-xl">
            <form action="{{route('login.store')}}" method="POST">
                @csrf
                @if(session('message'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{session('message')}}</p>
                @endif

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-600 font-bold">이메일</label>
                    <input type="email" id="email" name="email" placeholder="" class="border p-3 w-full rounded-lg
                    @error('email') 
                    border-red-500
                    @enderror"  placeholder="이메일을 입력해주세요." value="{{old('email')}}">

                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-600 font-bold">비밀번호</label>
                    <input type="password" id="password" name="password" placeholder="" class="border p-3 w-full rounded-lg
                    @error('password') 
                    border-red-500
                    @enderror"  placeholder="비밀번호를 입력해주세요.">

                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember"> <label for="" class="mb-2 text-gray-700 text-sm font-bold">로그인 정보 기억하기</label>
                </div>
                <input type="submit" value="로그인" class="block bg-sky-600 hover:bg-sky-700 trnasition-colors cursor-pointer font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection