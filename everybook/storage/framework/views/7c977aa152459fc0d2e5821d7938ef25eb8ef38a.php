

<?php $__env->startSection('title'); ?>
    <?php echo e($post->title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="<?php echo e(asset('uploads').'/'.$post->image->up_name.'.'.$post->image->extension); ?>" alt="">

            <div class="p-3 flex items-center gap-4">
                <form action="">
                    <div class="my-4">
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>   
                        </button> 
                    </div>                  
                </form>
                <p>0 Likes</p>
            </div>

            <div class="">
                <p class="font-bold">
                    <?php echo e($post->user->username); ?>

                </p>
                <p class="text-sm text-gray-500">
                    <?php echo e($post->created_at->diffForHumans()); ?>

                </p>
                <p class="mt-5">
                    <?php echo e($post->description); ?>

                </p>
            </div>
            <?php if(auth()->guard()->check()): ?>
                <?php if($post->user_id === auth()->user()->id): ?>
                <form action="<?php echo e(route('posts.destroy', $post)); ?>" method="POST">
                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                    <input type="submit" value="포스트 삭제" class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer">
                </form>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                <?php if(auth()->guard()->check()): ?>
                <p class="text-xl font-bold text-center mb-4">
                    새 댓글
                </p>
                <?php if(session('message')): ?>
                    <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center font-bold">
                        <?php echo e(session('message')); ?>

                    </div>
                <?php endif; ?>
                <form action="<?php echo e(route('coments.store', ['post' => $post])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-5">
                        <label for="coment" class="mb-2 block uppercase text-gray-600 font-bold">댓글</label>
                        <textarea id="coment" name="coment" class="border p-3 w-full rounded-lg 
                        <?php $__errorArgs = ['coment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                        border-red-500
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="댓글을 입력해주세요."><?php echo e(old('coment')); ?></textarea>
        
                        <?php $__errorArgs = ['coment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <input type="submit" value="댓글 쓰기" class="block bg-sky-600 hover:bg-sky-700 trnasition-colors cursor-pointer font-bold w-full p-3 text-white rounded-lg">
                </form>               
                <?php endif; ?>
                <div class="bg-white shadow mb-5 max-h-96 mt-10">
                    <?php if($post->coments->count()): ?>
                        <?php $__currentLoopData = $post->coments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="p-5 border-gray-300 border-b">
                                <a href="<?php echo e(route('posts.index', ['user' => $coment->user])); ?>" class="font-bold"><?php echo e($coment->user->username); ?></a>
                                <p><?php echo e($coment->coment); ?></p>
                                <p class="text-sm text-gray-500"><?php echo e($coment->created_at->diffForHumans()); ?></p>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <p class="p-10 text-center">댓글이 없습니다.</p>
                    <?php endif; ?>
                </div>
            </div>  
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ams_web\work\project\project_everybook\everybook\resources\views/posts/show.blade.php ENDPATH**/ ?>