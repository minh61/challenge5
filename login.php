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
                    <form action="process_login.php" class="form-signin" method="POST">
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
                        <button class="btn btn-lg btn-success text-uppercase" type="submit">Đăng nhập</button>

                    </form>
                    </div>
                </div>
                </div>
            </div>
            </div>
    </center>
</body>
</html>