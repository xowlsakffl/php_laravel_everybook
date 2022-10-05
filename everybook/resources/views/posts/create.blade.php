@extends('layouts.app')

@section('title')
    새 포스트 만들기
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> 
@endpush

@section('content')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{route('images.store')}}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>

        <div class="md:w-1/2 p-10 bg-white p-6 rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{route('register.store')}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="title" class="mb-2 block uppercase text-gray-600 font-bold">제목</label>
                    <input type="text" id="title" name="title" class="border p-3 w-full rounded-lg 
                    @error('title') 
                    border-red-500
                    @enderror" placeholder="제목을 입력해주세요." value="{{old('title')}}">

                    @error('title')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="description" class="mb-2 block uppercase text-gray-600 font-bold">본문</label>
                    <textarea id="description" name="description" class="border p-3 w-full rounded-lg 
                    @error('description') 
                    border-red-500
                    @enderror" placeholder="본문을 입력해주세요.">{{old('description')}}</textarea>

                    @error('description')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <input type="submit" value="새 포스트 만들기" class="block bg-sky-600 hover:bg-sky-700 trnasition-colors cursor-pointer font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection