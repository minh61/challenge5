<?php
require 'functions.php';
$conn = mysqli_connect('localhost', 'root', '', 'quanlysinhvien') or die ('Không thể kết nối cơ sở dữ liệu');

if(isset($_POST['login'])) {
    $_SESSION['message'] = "";
    $unm = $_POST['account'];
    $pattern = "/[SG][V](\d)/";

    $unm = str_replace(' ', '', $unm);
    $unm = str_replace('=', '', $unm);
    $unm = str_replace('-', '', $unm);
    $unm = str_replace(';', '', $unm);
    $unm = str_replace('\'', '', $unm);
    
    $pass = $_POST['pwd'];
    $pass = str_replace(' ', '', $pass);
    $pass = str_replace('=', '', $pass);
    $pass = str_replace('-', '', $pass);
    $pass = str_replace(';', '', $pass);
    $pass = str_replace('\'', '', $pass);
    
    if(preg_match($pattern, $unm) == 1) {
        $sql = "SELECT * FROM members WHERE account='$unm' AND password='$pass'";

        $result = mysqli_query($conn , $sql);           

        $row = mysqli_fetch_assoc($result);
    }


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
        $_SESSION['message'] =  "Sai tên đăng nhập hoặc mật khẩu";
         
    }
}
disconnect_db();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
  	<link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="background.css">    
</head>

<body>
	<center>
        <br><br>
        <h1>Trang quản lý đào tạo</h1>
            <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                    <form action="" class="form-signin" method="post">
                        <div class="form-label-group">
                            <center><label for="account"><h5>Tên đăng nhập</h5></label></center>
                            <input type="text" name="account" class="form-control" placeholder="Tên đăng nhập" required>
                        </div>
                        <br>
                        <div class="form-label-group">
                            <center><label for="pwd"><h5>Mật khẩu</h5></label></center>
                            <input type="password" name="pwd" class="form-control" placeholder="Mật khẩu" required>
                        </div>
                         <hr class="my-4">
                        <button class="btn btn-lg btn-success text-uppercase" name="login" type="submit">Đăng nhập</button><br><br>
                        <?php
                            if(isset($_SESSION['message'])) {
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                            }
                        ?>
                    </form>
                    </div>
                </div>
                </div>
            </div>
            </div>
    </center>
</body>
</html>
