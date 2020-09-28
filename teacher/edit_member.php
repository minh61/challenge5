<?php

require '../functions.php';
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
        echo "Mời bạn đăng nhập trước";
        header ("Location: login.php");
    }

// Lấy thông tin hiển thị lên để người dùng sửa
$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
$data = get_member_by_id($id);


if (!empty($_POST['suathanhvien'])) {

    $data['Account'] = isset($_POST['account']) ? $_POST['account'] : '';

    $data['Password'] = isset($_POST['password']) ? $_POST['password'] : '';
    
    $data['Fullname'] = isset($_POST['fullname']) ? $_POST['fullname'] : '';

    $data['Title'] = isset($_POST['title']) ? $_POST['title'] : '';
    
    $data['Email'] = isset($_POST['email']) ? $_POST['email'] : '';

    $data['Phone_number'] = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';

    $errors = array();
    if (empty($data['Account'])){
        $errors['Account'] = 'Chưa nhập tên đăng nhập';
    }
    if (empty($data['Password'])){
        $errors['Password'] = 'Chưa nhập mật khẩu';
    }
    if (empty($data['Fullname'])){
        $errors['Fullname'] = 'Chưa nhập họ và tên';
    }
    if (empty($data['Title'])){
        $errors['Title'] = 'Chưa nhập chức vụ';
    }
    if (empty($data['Email'])){
        $errors['Email'] = 'Chưa nhập email';
    }
    if (empty($data['Phone_number'])){
        $errors['Phone_number'] = 'Chưa nhập số điện thoại';
    }

    if (!$errors){
        edit_member($data['id'],  $data['Account'], $data['Password'],$data['Fullname'], $data['Title'], $data['Email'],
            $data['Phone_number']);
        header("location: list_of_members.php");
    }
}

disconnect_db();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sửa thông tin sinh viên</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
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
        <h2>Sửa thông tin </h2>
        <a href="list_of_members.php">Trở về</a> <br/> <br/>
        <form method="post" action="edit_member.php?id=<?php echo $data['id']; ?>">
            <table width="50%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Tên đăng nhập</td>
                    <td>
                        <input type="text" name="account" value="<?php echo !empty($data['account']) ? $data['account'] : ''; ?>"/>
                        <?php if (!empty($errors['account'])) echo $errors['account']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td>
                        <input type="password" name="password" value="<?php echo !empty($data['password']) ? $data['password'] : ''; ?>"/>
                        <?php if (!empty($errors['password'])) echo $errors['password']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Họ và tên</td>
                    <td>
                        <input type="text" name="fullname" value="<?php echo !empty($data['fullname']) ? $data['fullname'] : ''; ?>"/>
                        <?php if (!empty($errors['fullname'])) echo $errors['fullname']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Chức vụ</td>
                    <td>
                        <input type="text" name="title" value="<?php echo !empty($data['title']) ? $data['title'] : ''; ?>"/>
                        <?php if (!empty($errors['title'])) echo $errors['title']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" name="email" value="<?php echo !empty($data['email']) ? $data['email'] : ''; ?>"/>
                        <?php if (!empty($errors['email'])) echo $errors['email']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td>
                        <input type="text" name="phone_number" value="<?php echo !empty($data['phone_number']) ? $data['phone_number'] : ''; ?>"/>
                        <?php if (!empty($errors['phone_number'])) echo $errors['phone_number']; ?>
                    </td>
                </tr>
            </table>
            <br>
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>"/>
            <input type="submit" name="suathanhvien" value="Lưu"/>
        </form>
    </center>
    </body>
</html>
