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
	<title>Bài tập</title>
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
            <li class="nav-item active"><a class="nav-link" href="exercise.php"><strong>Bài tập</strong></a></li>
            <li class="nav-item"><a class="nav-link" href="game.php">Trò chơi</a></li>
            <li class="nav-item"><a class="nav-link" href="profile.php">Hồ sơ cá nhân</a></li>
            <li class="nav-item"><a class="nav-link" href="../logout.php">Đăng Xuất</a></li>
        </ul>     
    </nav>
    <center><br>

        <?php
            if (isset($_SESSION['message']) && $_SESSION['message']){
                printf('<b style="color:red">%s</b>', $_SESSION['message']);
                unset($_SESSION['message']);
            }
            echo "
                <form action='upload.php' method='post' enctype='multipart/form-data'>
                <input type='file' name='uploadedFile' />
                <button type='submit' name='uploadBtn'>Tải lên</button>
                </form>
            ";
        
        ?>

        <table class="table  table-warning table-bordered" style="text-align: center; width: 30%;"><br>
                <tr>
                    <th><h4>Danh sách bài tập</h4></th>
                </tr>
                <?php
                    $myDirectory = opendir("../uploaded/");

                    while($entryName = readdir($myDirectory)) {
                        $dirArray[] = $entryName;
                    }
                    closedir($myDirectory);
                    $indexCount = count($dirArray);
                    sort($dirArray);
                    for($index = 0 ; $index < $indexCount; $index++) {
                        substr("$dirArray[$index]", 0, 1);
                            if (substr("$dirArray[$index]", 0, 1) != "."){
                            print("<tr><td><a href='down.php?link=".$dirArray[$index]."'>$dirArray[$index]</a></td></tr>");
                        }
                    }
                ?>
            </table><br>
            <table class="table table-hover table-warning table-success table-bordered" style="text-align: center; width: 30%;">
                    <tr>
                        <th>Sinh viên</th>
                        <th>Bài tập</th>
                    </tr>
                    <?php
                        $myDirectory2 = opendir("../uploadedStudent/");

                        while($entryName2 = readdir($myDirectory2)) {
                            $dirArray2[] = $entryName2;
                        }
                        closedir($myDirectory2);
                        $indexCount2    = count($dirArray2);
                        sort($dirArray2);
                        
                        for($index=0; $index < $indexCount2; $index++) {
                                explode("-", $dirArray2[$index])[0];
                                if (substr("$dirArray2[$index]", 0, 1) != "."){
                                print("<tr><td>".explode("-", $dirArray2[$index])[0]."</td><td><a href='down.php?link=".$dirArray2[$index]."'>".explode("-", $dirArray2[$index])[1]."</a></td></tr>");
                            }
                        }
                    ?>
                    
            </table>

    </center>
</body>
</html>