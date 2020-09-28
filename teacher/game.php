<!-- FROM TEACHER SIDE -->
<?php
    session_start();
    if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
        echo "Mời bạn đăng nhập trước";
        header ("Location: login.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Danh sách thành viên</title>
	<link rel="stylesheet" type="text/css" href="background_teacher.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.css" />
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
            <li class="nav-item"><a class="nav-link" href="teacher_page.php">Trang chủ giáo viên</a></li>
            <li class="nav-item"><a class="nav-link" href="list_of_members.php">Danh sách thành viên</a></li>
            <li class="nav-item"><a class="nav-link" href="exercise.php">Bài tập</a></li>
            <li class="nav-item active"><a class="nav-link" href="game.php"><strong>Trò chơi</strong></a></li>
            <li class="nav-item"><a class="nav-link" href="profile.php">Hồ sơ cá nhân</a></li>
            <li class="nav-item"><a class="nav-link" href="../logout.php">Đăng Xuất</a></li>
        </ul>     
    </nav>
    <center><br>
        <h4>Tạo Challenge</h4><br>
        <form action='challenge.php' method='post' enctype='multipart/form-data'>
            <input class ='hint' type='text' name='hint' />
            <input type='file' name='uploadedFile' />
            <button type='submit' name='uploadBtn'>upload</button>
        </form>
        <br>
        <table style="text-align: center;">
            <tr>
                <th><h5>Challenge</h5></th>
            </tr>
            <?php
                $myDirectory = opendir("../challenge/");

                while($entryName = readdir($myDirectory)) {
                    $dirArray[] = $entryName;
                }
                closedir($myDirectory);
                $indexCount    = count($dirArray);
                sort($dirArray);
                for($index = 0; $index < $indexCount; $index++) {
                        if (substr("$dirArray[$index]", 0, 1) != "."){
                        print("<tr><td><a href='down.php?link=".$dirArray[$index]."'>".$dirArray[$index]."</a></td></tr>");
                    }
                }
            ?>
        </table>    
    </center>
</body>
</html>
