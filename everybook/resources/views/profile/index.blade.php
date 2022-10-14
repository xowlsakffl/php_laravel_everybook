@extends('layouts.app')

@section('title')
    프로필 수정: {{auth()->user()->username}}
@endsection

@section('content')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{route('profiles.store')}}" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-600 font-bold">닉네임</label>
                    <input type="text" id="username" name="username" placeholder="" class="border p-3 w-full rounded-lg 
                    @error('username') 
                    border-red-500
                    @enderror" placeholder="닉네임을 입력해주세요." value="{{auth()->user()->username}}">

                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="image" class="mb-2 block uppercase text-gray-600 font-bold">닉네임</label>
                    <input type="file" id="image" name="image" class="border p-3 w-full rounded-lg" accept=".jpg, .jpeg, .png">
                </div>

                <input type="submit" value="프로필 수정" class="block bg-sky-600 hover:bg-sky-700 trnasition-colors cursor-pointer font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection