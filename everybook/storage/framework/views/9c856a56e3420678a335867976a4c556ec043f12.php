<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EveryBook - <?php echo $__env->yieldContent('title'); ?></title>
    <?php echo $__env->yieldPushContent('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-gray-100 font-NotoSans">
    <header class="p-5 border-b bg-white shadow">
        <div class="container-xl mx-auto flex justify-between items-center">
            <h1 class="font-Poppins text-3xl font-black">
                <a href="<?php echo e(route('home')); ?>">EveryBook</a>
            </h1>

            <?php if(auth()->guard()->check()): ?>
            <nav class="flex gap-5 items-center">           
                <a href="" class="font-bold text-black text-sm"><span class="font-normal"><?php echo e(auth()->user()->username); ?></span> 님</a>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="font-bold text-black text-sm">로그아웃</button>
                </form>
                
                <a href="<?php echo e(route('posts.index', ['user' => auth()->user()->username])); ?>" class="font-bold text-black text-sm">마이페이지</a>

                <a href="<?php echo e(route('posts.create')); ?>" class="flex items-center gap-2 bg-black p-2 text-white rounded text-sm font-bold cursor-pointer">
                    새 포스트
                </a>
            </nav>
            <?php endif; ?>

            <?php if(auth()->guard()->guest()): ?>
            <nav class="flex gap-5 items-center">
                <a href="<?php echo e(route('login.index')); ?>" class="font-bold text-black text-sm">로그인</a>
                <a href="<?php echo e(route('register.index')); ?>" class="font-bold text-black text-sm">회원가입</a>
            </nav>
            <?php endif; ?>
            
        </div>
    </header>

    <main class="container mx-auto mt-10">
        <h2 class="font-bold text-center text-3xl mb-10">
            <?php echo $__env->yieldContent('title'); ?>
        </h2>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->yieldPushContent('scripts'); ?>
    </main>
    
    <footer class="mt-10 text-center p-5 text-gray-500 font-Poppins font-bold uppercase">
        EveryBook - reserved <?php echo e(now()->year); ?>

    </footer>
</body>
</html><?php /**PATH C:\ams_web\work\project\project_everybook\everybook\resources\views\layouts\app.blade.php ENDPATH**/ ?>