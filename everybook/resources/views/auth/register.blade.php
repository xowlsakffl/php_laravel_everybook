@extends('layouts.app')

@section('title')
    회원가입
@endsection

@section('content')
    <div class="container max-w-md mx-auto">
        <div class="bg-white p-5 rounded-lg shadow-xl">
            <form action="{{route('register.store')}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-600 font-bold">이름</label>
                    <input type="text" id="name" name="name" placeholder="" class="border p-3 w-full rounded-lg 
                    @error('name') 
                    border-red-500
                    @enderror" placeholder="이름을 입력해주세요." value="{{old('name')}}">

                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-600 font-bold">닉네임</label>
                    <input type="text" id="username" name="username" placeholder="" class="border p-3 w-full rounded-lg
                    @error('username') 
                    border-red-500
                    @enderror"  placeholder="닉네임을 입력해주세요." value="{{old('username')}}">

                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

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
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-600 font-bold">비밀번호 확인</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="" class="border p-3 w-full rounded-lg" placeholder="비밀번호를 입력해주세요.">
                </div>

                <input type="submit" value="회원가입" class="block bg-sky-600 hover:bg-sky-700 trnasition-colors cursor-pointer font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection