<?php
session_start();

$message = '';

if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] == UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    $allowedfileExtensions = array('jpg', 'png', 'zip', 'txt', 'xls', 'xlsx', 'doc' , 'docx');

    if (in_array($fileExtension, $allowedfileExtensions)) {
        $uploadFileDir = '../uploaded/';
        $dest_path = $uploadFileDir . $fileName;

        if(move_uploaded_file($fileTmpPath, $dest_path)) {
            $message ='Tải file thành công';
        }
    }
    else{
        $message = 'Tải file thất bại! Kiểu file cho phép: ' . implode(',', $allowedfileExtensions);
    }
}
else {
    $message = "Chưa chọn file!";
}
$_SESSION['message'] = $message;
header("Location: exercise.php");
