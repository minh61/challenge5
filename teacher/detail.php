<!-- FROM TEACHER SIDE -->

<?php
    require '../functions.php';

    date_default_timezone_set("Asia/Bangkok");
    $current_time = date("Y-m-d h:i:sa");
            
    session_start();
    if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
        echo "Mời bạn đăng nhập trước";
        header ("Location: login.php");
    }

    $id_recv = isset($_GET['id']) ? (int)$_GET['id'] : '';
    $id_send = $_SESSION['id'];
    $name_send = $_SESSION['fullname'];

    $data = get_member_by_id($id_recv);
    $name_recv = $data['fullname'];

    if (!empty($_POST['send_msg'])) {
        
        $content = isset($_POST['send_msg']) ? $_POST['send_msg'] : '';

        if (empty($content)) {
            echo "Chưa nhập nội dung tin nhắn";
        }
        else {
            add_msg($current_time,  $name_recv , $name_send , $content);
            $link = "detail.php?id=$id_recv";
            header("location:".$link);
        }
    }

    $list_of_msg = get_all_msg($name_recv , $name_send);
    disconnect_db();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Thông tin chi tiết</title>
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
            <li class="nav-item"><a class="nav-link" href="list_of_members.php"><strong>Danh sách thành viên</strong></a></li>
            <li class="nav-item"><a class="nav-link" href="exercise.php">Bài tập</a></li>
            <li class="nav-item"><a class="nav-link" href="game.php">Trò chơi</a></li>
            <li class="nav-item"><a class="nav-link" href="profile.php">Hồ sơ cá nhân</a></li>
            <li class="nav-item"><a class="nav-link" href="../logout.php">Đăng Xuất</a></li>
        </ul>     
    </nav>
    <center>
        <br>
        <h3>Thông tin chi tiết</h3>
        <a href="list_of_members.php">Trở về</a> <br>
        <table class="table table-light table-bordered" style="text-align: center; width: 60%;">
            <tr>
                <td>Tên đăng nhập</td>
                <td>Họ và tên</td>
                <td>Chức vụ</td>
                <td>Email</td>
                <td>Số điện thoại<td>
            </tr>
            <tr>
                <td><?php echo $data['account']; ?></td>
                <td><?php echo $data['fullname']; ?></td>
                <td><?php echo $data['title']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['phone_number']; ?></td>
            </tr>
        </table>
        <h5>Tin nhắn</h5>
        <form method="post" action="detail.php?id=<?php echo $id_recv; ?>">
            <textarea name="send_msg" rows="3" cols="60"></textarea><br>
            <input type="submit" name="submit" value="Gửi">
        </form>
        <br>
        <table class="table table-hover table-light table-bordered" style="text-align: center; width: 80%;">
            <tr>
                <td>Ngày gửi</td> 
                <td>Người nhận</td>
                <td>Người gửi</td>
                <td>Nội dung</td>
               
            </tr>
            <?php foreach ($list_of_msg as $item){ ?>
            <tr>
                <td><?php echo $item['date']?></td> 
                <td><?php echo $item['name_recv']?></td>
                <td><?php echo $item['name_send']?></td>
                <td><?php echo $item['content']?></td> 
            </tr>
            <?php } ?>
        </table>
    </center>
    
</body>
</html>
