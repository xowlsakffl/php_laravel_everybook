<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EveryBook - @yield('title')</title>
    @stack('styles')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-NotoSans">
    <header class="p-5 border-b bg-white shadow">
        <div class="container-xl mx-auto flex justify-between items-center">
            <h1 class="font-Poppins text-3xl font-black">
                <a href="{{route('home')}}">EveryBook</a>
            </h1>

            @auth
            <nav class="flex gap-5 items-center">           
                <a href="" class="font-bold text-black text-sm"><span class="font-normal">{{auth()->user()->username}}</span> 님</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="font-bold text-black text-sm">로그아웃</button>
                </form>
                
                <a href="{{route('posts.index', ['user' => auth()->user()->username])}}" class="font-bold text-black text-sm">마이페이지</a>

                <a href="{{route('posts.create')}}" class="flex items-center gap-2 bg-black p-2 text-white rounded text-sm font-bold cursor-pointer">
                    새 포스트
                </a>
            </nav>
            @endauth

            @guest
            <nav class="flex gap-5 items-center">
                <a href="{{route('login.index')}}" class="font-bold text-black text-sm">로그인</a>
                <a href="{{route('register.index')}}" class="font-bold text-black text-sm">회원가입</a>
            </nav>
            @endguest
            
        </div>
    </header>

    <main class="container mx-auto mt-10">
        <h2 class="font-bold text-center text-3xl mb-10">
            @yield('title')
        </h2>
        @yield('content')
        @stack('scripts')
    </main>
    
    <footer class="mt-10 text-center p-5 text-gray-500 font-Poppins font-bold uppercase">
        EveryBook - reserved {{now()->year}}
    </footer>
</body>
</html>