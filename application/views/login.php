<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container my-md-5">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="verify_login" method="post">
                    <table>
                        <tr>
                            <td>Số điện thoại</td>
                            <td><input type="text" name="phone" class="form-control" require></td>
                        </tr>
                        <tr>
                            <td>Mật khẩu</td>
                            <td><input type="password" name="pass" class="form-control" require></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Đăng nhập" class="btn btn-success btn-block"></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>