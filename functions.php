<?php
$conn;

function connect_db() {
    global $conn;
    
    if (!$conn){
        $conn = mysqli_connect('localhost', 'root', '', 'quanlysinhvien') or die ('Không thể kết nối cơ sở dữ liệu');
        mysqli_set_charset($conn, 'utf8');
    }
}

function disconnect_db() {
    global $conn;
   
    if ($conn){
        mysqli_close($conn);
    }
}

function get_all_members() {
	global $conn;
	
	connect_db();

	$sql = "SELECT * FROM members";

	$query = mysqli_query($conn , $sql);

	$result = array();

	if($query) {
		while($row = mysqli_fetch_assoc($query)) {
			$result[] = $row;
		}
	}

	return $result;
}

function add_member($account , $password , $fullname , $title , $email , $phone_number) {
    global $conn;
    
    connect_db();
    
    $account = addslashes($account);
    $password = addslashes($password);
    $fullname = addslashes($fullname);
    $title = addslashes($title);
    $email = addslashes($email);
    $phone_number = addslashes($phone_number);
    
    $string = strtolower($title);
    if($string == "giáo viên")
        $role = 1;
    else
        $role = 2;

    $sql = "INSERT INTO 
                members(account, password, fullname, title , email, phone_number, role) 
            VALUES ('$account' , '$password' , '$fullname' , '$title' , '$email' , '$phone_number', $role )
    ";
    $query = mysqli_query($conn, $sql);
    
    return $query;
}


function get_member_by_id($ID) {
    global $conn;
    
    connect_db();
    
    $sql = "SELECT * FROM members WHERE id = {$ID}";
    
    $query = mysqli_query($conn, $sql);
    
    $result = array();
    
    if (mysqli_num_rows($query)){
        $row = mysqli_fetch_assoc($query);
        $result = $row;
    }
    return $result;
}

function delete_member($id) {
    global $conn;

    connect_db();

    $sql = "DELETE FROM members WHERE id = {$id}";

    $query = mysqli_query($conn, $sql);

    return $query;
}

function edit_member($id , $account , $password, $fullname , $title, $email, $phone_number) {
    global $conn;

    connect_db();

    $account = addslashes($account);
    $password = addslashes($password);
    $fullname = addslashes($fullname);
    $title = addslashes($title);
    $email = addslashes($email);
    $phone_number = addslashes($phone_number);
    
    $sql = "UPDATE members 
            SET account = '$account' , 
                password = '$password' , 
                fullname = '$fullname' , 
                title = '$title' , 
                email = '$email', 
                phone_number = '$phone_number'
            WHERE id = $id ";
    
    $query = mysqli_query($conn , $sql);

    return $query;
}

function add_msg($date , $name_recv , $name_send , $content) {
    global $conn;
    
    connect_db();

    $sql = "INSERT INTO messages
            VALUES ( '$date' , '$name_recv' , '$name_send' , '$content' )
    ";
    $query = mysqli_query($conn, $sql);
    
    return $query;
}

function get_all_msg($name_recv , $name_send) {
    global $conn;
    
    connect_db();

    $sql = " SELECT * FROM messages
            WHERE name_recv = '$name_recv' AND name_send = '$name_send'
    ";
    $query = mysqli_query($conn, $sql);
    
    $result = array();
    
    if($query) {
        while($row = mysqli_fetch_assoc($query)) {
            $result[] = $row;
        }
    }
    return $result;   
   
}
?>

