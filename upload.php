<?php
session_start();
$message = '';
$name = $_SESSION['fullname'];

if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] == UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $name."-".$_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'docx' ,'doc' , 'xlsx');

    if (in_array($fileExtension, $allowedfileExtensions)) {
        $uploadFileDir = '../uploadedStudent/';
        $dest_path = $uploadFileDir . $fileName;
        if(move_uploaded_file($fileTmpPath, $dest_path)) {
            $message ='Tải file thành công.';
        }
  }
  else{
      $message = 'Tải file thất bại! Kiểu file cho phép: ' . implode(',', $allowedfileExtensions);
  }
}
else{
    $message = "Chưa chọn file!";
}
echo($message);
$_SESSION['message'] = $message;
header("Location: exercise.php");


