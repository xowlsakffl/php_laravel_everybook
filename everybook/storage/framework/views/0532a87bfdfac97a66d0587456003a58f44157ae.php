

<?php $__env->startSection('title'); ?>
    새 포스트 만들기
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> 
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="p-10 bg-white p-6 rounded-lg shadow-xl mt-10 md:mt-0 max-w-lg mx-auto">
    <form action="<?php echo e(route('images.store')); ?>" id="dropzone" class="dropzone flex align-center justify-center p-10 bg-white border-dashed rounded-lg mt-10 md:mt-0" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
    </form>

    <form action="<?php echo e(route('posts.store')); ?>" method="POST"  class="max-w-lg mx-auto pt-5">
        <?php echo csrf_field(); ?>
        <div class="">
            <div class="mb-5">
                <label for="title" class="mb-2 block uppercase text-gray-600 font-bold">제목</label>
                <input type="text" id="title" name="title" class="border p-3 w-full rounded-lg 
                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                border-red-500
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="제목을 입력해주세요." value="<?php echo e(old('title')); ?>">

                <?php $__errorArgs = ['title'];
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
                <label for="description" class="mb-2 block uppercase text-gray-600 font-bold">본문</label>
                <textarea id="description" name="description" class="border p-3 w-full rounded-lg 
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                border-red-500
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="본문을 입력해주세요."><?php echo e(old('description')); ?></textarea>

                <?php $__errorArgs = ['description'];
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
                <input type="hidden" name="image" value="<?php echo e(old('image')); ?>">

                <?php $__errorArgs = ['image'];
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

            <input type="submit" value="새 포스트 만들기" class="block bg-sky-600 hover:bg-sky-700 trnasition-colors cursor-pointer font-bold w-full p-3 text-white rounded-lg">
        </div>
    </form>
</div>
    
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script type="module">
    Dropzone.autoDiscover = false;
    
    const dropzone = new Dropzone('#dropzone', {
        url: '<?php echo e(route("images.store")); ?>',
        dictDefaultMessage: '이미지를 올려주세요.',
        autoProcessQueue: true, // 자동으로 보내기. true : 파일 업로드 되자마자 서버로 요청, false : 서버에는 올라가지 않은 상태. 따로 this.processQueue() 호출시 전송
        clickable: true, // 클릭 가능 여부
        autoQueue: true, // 드래그 드랍 후 바로 서버로 전송
        createImageThumbnails: true, //파일 업로드 썸네일 생성
      
        thumbnailHeight: 120, // Upload icon size
        thumbnailWidth: 120, // Upload icon size
      
        maxFiles: 1, // 업로드 파일수
        maxFilesize: 100, // 최대업로드용량 : 100MB
        //paramName: 'image', // 서버에서 사용할 formdata 이름 설정 (default는 file)
        parallelUploads: 1, // 동시파일업로드 수(이걸 지정한 수 만큼 여러파일을 한번에 넘긴다.)
        uploadMultiple: false, // 다중업로드 기능
        timeout: 300000, //커넥션 타임아웃 설정 -> 데이터가 클 경우 꼭 넉넉히 설정해주자
      
        addRemoveLinks: true, // 업로드 후 파일 삭제버튼 표시 여부
        dictRemoveFile: '삭제', // 삭제버튼 표시 텍스트
        acceptedFiles: '.jpeg,.jpg,.png,.gif,.JPEG,.JPG,.PNG,.GIF', // 이미지 파일 포맷만 허용
    
        init: function () {
            // 최초 dropzone 설정시 init을 통해 호출
            console.log('최초 실행');
            let myDropzone = this; // closure 변수 (화살표 함수 쓰지않게 주의)
       
            if(document.querySelector('[name="image"]').value.trim()){
                const imagePublish = {};
                imagePublish.size = 1234;
                imagePublish.name = document.querySelector('[name="image"]').value;

                this.options.addedfile.call(this, imagePublish);
                this.options.thumbnail.call(this, imagePublish, '/uploads/'+imagePublish.name);

                imagePublish.previewElement.classList.add('dz-success', 'dz-complete');
            }

            // 업로드한 파일을 서버에 요청하는 동안 호출 실행
            this.on('sending', function (file, xhr, formData) {
               console.log('보내는중');
            });
       
            // 서버로 파일이 성공적으로 전송되면 실행
            this.on('success', function (file, response) {
                //input hidden에 파일명 값 
                document.querySelector('[name="image"]').value = response.image
            });
       
            // 업로드 에러 처리
            this.on('error', function (file, errorMessage) {
               console.log(errorMessage);
            });

            // 삭제 처리
            this.on('removedfile', function () {
                document.querySelector('[name="image"]').value = "";
            });
         },
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ams_web\work\project\project_everybook\everybook\resources\views/posts/create.blade.php ENDPATH**/ ?>