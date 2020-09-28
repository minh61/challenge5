<!-- FROM STUDENT SIDE -->

<?php
    session_start();
    if (!isset($_SESSION['login']) && $_SESSION['login'] != true) {
        header("location:login.php");
        echo "Mời bạn đăng nhập trước";
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Trang chủ sinh viên</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="background_student.css" />
    <style>
        body {
            background-image: url('anh_nen_web.png');
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-success navbar-light ">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="student_page.php">Trang chủ sinh viên</a></li>
            <li class="nav-item"><a class="nav-link" href="list_of_members.php">Danh sách thành viên</a></li>
            <li class="nav-item"><a class="nav-link" href="exercise.php">Bài tập</a></li>
            <li class="nav-item active"><a class="nav-link" href="game.php"><strong>Trò chơi</strong></a></li>
            <li class="nav-item"><a class="nav-link" href="profile.php">Hồ sơ cá nhân</a></li>
            <li class="nav-item"><a class="nav-link" href="../logout.php">Đăng Xuất</a></li>
        </ul>     
    </nav>
        <center>
            <br><br><br>
        
        </center>
</body>
</html>
