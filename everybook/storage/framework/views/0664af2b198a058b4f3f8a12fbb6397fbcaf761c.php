

<?php $__env->startSection('title'); ?>
    프로필: <?php echo e($user->username); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
            <div class="md:w-8/12 lg:w-6/12 px-5 max-w-xs m-auto">
                <img src="<?php echo e(asset('img/usericon.svg')); ?>" alt="">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-10 md:flex md:flex-col md:justify-center py-10 max-w-xs m-auto text-center md:text-left">
                <p class="text-gray-700 text-2xl mb-4 font-bold"><?php echo e($user->username); ?></p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0 <span class="font-normal">팔로워</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0 <span class="font-normal">팔로우</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    <?php echo e($posts->count()); ?> <span class="font-normal">포스트</span>
                </p>
            </div>
        </div>
    </div>

    <section class="mx-auto mt-20">
        <?php if($posts->count()): ?>
            <h2 class="text-3xl text-center font-bold my-10">게시물</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div>
                    <a href="">
                        <?php if($post->image): ?>
                            <img src="<?php echo e(asset('uploads').'/'.$post->image->up_name.'.'.$post->image->extension); ?>" alt="">
                        <?php endif; ?>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div><?php echo e($posts->links('pagination::tailwind')); ?></div>
        <?php else: ?>
            <p class="text-gray-600 text-sm text-center font-bold">게시물이 없습니다.</p>
        <?php endif; ?>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ams_web\work\project\project_everybook\everybook\resources\views\dashboard.blade.php ENDPATH**/ ?>