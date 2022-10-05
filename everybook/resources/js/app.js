import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: '이미지를 올려주세요.',
    autoProcessQueue: false, // 자동으로 보내기. true : 파일 업로드 되자마자 서버로 요청, false : 서버에는 올라가지 않은 상태. 따로 this.processQueue() 호출시 전송
    clickable: true, // 클릭 가능 여부
    autoQueue: false, // 드래그 드랍 후 바로 서버로 전송
    createImageThumbnails: true, //파일 업로드 썸네일 생성
  
    thumbnailHeight: 120, // Upload icon size
    thumbnailWidth: 120, // Upload icon size
  
    maxFiles: 1, // 업로드 파일수
    maxFilesize: 100, // 최대업로드용량 : 100MB
    //paramName: 'image', // 서버에서 사용할 formdata 이름 설정 (default는 file)
    parallelUploads: 2, // 동시파일업로드 수(이걸 지정한 수 만큼 여러파일을 한번에 넘긴다.)
    uploadMultiple: false, // 다중업로드 기능
    timeout: 300000, //커넥션 타임아웃 설정 -> 데이터가 클 경우 꼭 넉넉히 설정해주자
  
    addRemoveLinks: true, // 업로드 후 파일 삭제버튼 표시 여부
    dictRemoveFile: '삭제', // 삭제버튼 표시 텍스트
    acceptedFiles: '.jpeg,.jpg,.png,.gif,.JPEG,.JPG,.PNG,.GIF', // 이미지 파일 포맷만 허용

});

// 업로드한 파일을 서버에 요청하는 동안 호출 실행
dropzone.on('sending', function(file, xhr, formData){
    console.log(file);
})

// 서버로 파일이 성공적으로 전송되면 실행
dropzone.on('success', function (file, responseText) {
    console.log('성공');
 });

 // 업로드 에러 처리
 dropzone.on('error', function (file, errorMessage) {
    alert(errorMessage);
 });