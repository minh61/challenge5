<!-- FROM TEACHER SIDE -->

<?php
    require '../functions.php';
    session_start();
    if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
        echo "Mời bạn đăng nhập trước";
        header ("Location: login.php");
    }
    $members = get_all_members();
    disconnect_db();
    $x = 1;
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
            <li class="nav-item active"><a class="nav-link" href="list_of_members.php"><strong>Danh sách thành viên</strong></a></li>
            <li class="nav-item"><a class="nav-link" href="exercise.php">Bài tập</a></li>
            <li class="nav-item"><a class="nav-link" href="game.php">Trò chơi</a></li>
            <li class="nav-item"><a class="nav-link" href="profile.php">Hồ sơ cá nhân</a></li>
           <li class="nav-item"><a class="nav-link" href="../logout.php">Đăng Xuất</a></li>
        </ul>     
    </nav>
    <center>
        <br>
        <h1>Danh sách thành viên</h1>
        <h5><a href="add_member.php">Thêm thành viên</a></h5><br>
        <table class="table table-hover table-warning table-bordered" style="text-align: center; width: 80%;">
            <tr >
                <td>STT</td>
                <td>Họ và tên</td>
                <td>Chức vụ</td>
                <td>Email</td>
                <td>Tùy chọn</td>
            </tr>
            <?php foreach ($members as $item){ ?>
            <tr>
                <td><?php echo $x++;  ?></td>
                <td><?php echo $item['fullname']; ?></td>
                <td><?php echo $item['title']; ?></td>
                <td><?php echo $item['email']; ?></td>
                <td>
                <form method="post" action="delete_member.php">
                    <input onclick="window.location = 'detail.php?id=<?php echo $item['id']; ?>'" type="button" 
                     value="Chi tiết"/>
                    <input type="hidden" name="id" value="<?php echo $item['id']; ?>"/>
                    <input onclick="window.location = 'edit_member.php?id=<?php echo $item['id']; ?>'" type="button" value="Sửa"/>
                    <input type="hidden" name="id" value="<?php echo $item['id']; ?>"/>
                    <input onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Xóa" /> 
                </form>
               
                </td>
            </tr>
            <?php } ?>
        </table>
    </center>
    
</body>
</html>
