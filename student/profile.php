<!-- FROM STUDENT SIDE -->

<?php
    require '../functions.php';
    session_start();
    if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
        echo "Mời bạn đăng nhập trước";
        header ("Location: login.php");
    }
    $id = (int)$_SESSION['id'];
    $data = get_member_by_id($id);

disconnect_db();
    
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
            <li class="nav-item"><a class="nav-link" href="student_page.php">Trang chủ giáo viên</a></li>
            <li class="nav-item"><a class="nav-link" href="list_of_members.php">Danh sách thành viên</a></li>
            <li class="nav-item"><a class="nav-link" href="exercise.php">Bài tập</a></li>
            <li class="nav-item"><a class="nav-link" href="game.php">Trò chơi</a></li>
            <li class="nav-item"><a class="nav-link" href="profile.php"><strong>Hồ sơ cá nhân</strong></a></li>
            <li class="nav-item"><a class="nav-link" href="../logout.php">Đăng Xuất</a></li>
        </ul>     
    </nav>
    <center>
        <br>
        <h2>Hồ sơ cá nhân </h2>
        <a href="list_of_members.php">Trở về</a> <br/> <br/>
        <form method="post" action="edit_member.php?id=<?php echo $data['id']; ?>">
            <table width="50%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Tên đăng nhập</td>
                    <td>
                        <input type="text" name="account" value="<?php echo !empty($data['account']) ? $data['account'] : ''; ?>" disabled/>
                        <?php if (!empty($errors['account'])) echo $errors['account']; ?>
                    </td>
                </tr>
                <td>Mật khẩu</td>
                    <td>
                        <input type="password" name="password" value="<?php echo !empty($data['password']) ? $data['password'] : ''; ?>" disabled/>
                        <?php if (!empty($errors['account'])) echo $errors['account']; ?>
                    </td>
                <tr>
                    <td>Họ và tên</td>
                    <td>
                        <input type="text" name="fullname" value="<?php echo !empty($data['fullname']) ? $data['fullname'] : ''; ?>" disabled/>
                        <?php if (!empty($errors['fullname'])) echo $errors['fullname']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Chức vụ</td>
                    <td>
                        <input type="text" name="title" value="<?php echo !empty($data['title']) ? $data['title'] : ''; ?>" disabled/>
                        <?php if (!empty($errors['title'])) echo $errors['title']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" name="email" value="<?php echo !empty($data['email']) ? $data['email'] : ''; ?>" disabled/>
                        <?php if (!empty($errors['email'])) echo $errors['email']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td>
                        <input type="text" name="phone_number" value="<?php echo !empty($data['phone_number']) ? $data['phone_number'] : ''; ?>" disabled/>
                        <?php if (!empty($errors['phone_number'])) echo $errors['phone_number']; ?>
                    </td>
                </tr>
            </table>
            <br>
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>"/>
            <input type="submit" name="suathanhvien" value="Sửa"/>
        </form>
    </center>
    
</body>
</html>
