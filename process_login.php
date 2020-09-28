<?php

$conn = mysqli_connect('localhost' , 'root', '' ,'quanlysinhvien')or die("Không thể kết nối cơ sở dữ liệu");

$unm = $_POST['account'];
$pass = $_POST['pwd'];

$sql = "SELECT * from members where account='$unm' AND password='$pass'";

$result = mysqli_query($conn , $sql);			

$row = mysqli_fetch_assoc($result);

if(!empty($row)){ 
		session_start();
		$_SESSION['fullname'] = $row['fullname'];
		$_SESSION['password'] = $pass;
		$_SESSION['id'] = $row['id'];
		$_SESSION['login'] = true;
		
		if($row['role'] == 1) {
			header("location:teacher/teacher_page.php");
			exit();
		}
		else if($row['role'] == 2){
			header("location:student/student_page.php");	
			exit();
		}
	}
	

else {
	
	$_SESSION['message'] = "Sai tên đăng nhập hoặc mật khẩu";
	
         header("location:login.php");  
	exit();
}
?>