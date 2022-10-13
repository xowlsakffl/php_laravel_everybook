

<?php $__env->startSection('title'); ?>
    로그인
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container max-w-md mx-auto">
        <div class="bg-white p-5 rounded-lg shadow-xl">
            <form action="<?php echo e(route('login.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php if(session('message')): ?>
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"><?php echo e(session('message')); ?></p>
                <?php endif; ?>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-600 font-bold">이메일</label>
                    <input type="email" id="email" name="email" placeholder="" class="border p-3 w-full rounded-lg
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                    border-red-500
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  placeholder="이메일을 입력해주세요." value="<?php echo e(old('email')); ?>">

                    <?php $__errorArgs = ['email'];
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

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-600 font-bold">비밀번호</label>
                    <input type="password" id="password" name="password" placeholder="" class="border p-3 w-full rounded-lg
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                    border-red-500
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  placeholder="비밀번호를 입력해주세요.">

                    <?php $__errorArgs = ['password'];
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

                <div class="mb-5">
                    <input type="checkbox" name="remember"> <label for="" class="mb-2 text-gray-700 text-sm font-bold">로그인 정보 기억하기</label>
                </div>
                <input type="submit" value="로그인" class="block bg-sky-600 hover:bg-sky-700 trnasition-colors cursor-pointer font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ams_web\work\project\project_everybook\everybook\resources\views\auth\login.blade.php ENDPATH**/ ?>