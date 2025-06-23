<?php
$fileName = $_POST['fileName'];
$fileTmpName = $_FILES['image']['tmp_name'];
$fileSize = $_FILES['image']['size'];
$fileError = $_FILES['image']['error'];

if ($fileError === 0) {
  $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
  $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif'); // 허용할 확장자

  if (in_array($fileExt, $allowedExtensions)) {
    if ($fileSize < 2097152) { // 파일 사이즈 제한 (2MB)
      $destination = './uploads/' . $fileName; // 저장할 경로 및 파일 이름
      move_uploaded_file($fileTmpName, $destination); // 파일 업로드
      echo "파일이 업로드되었습니다.";
    } else {
      echo "파일이 너무 큽니다. (최대 2MB)";
    }
  } else {
    echo "허용되지 않는 파일 확장자입니다.";
  }
} else {
  echo "파일 업로드 중 오류가 발생했습니다.";
}
?>