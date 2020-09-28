<?php

require '../functions.php';

// Thực hiện xóa
$id = isset($_POST['id']) ? (int)$_POST['id'] : '';
delete_member($id);

// Trở về trang danh sách
header("location: list_of_members.php");