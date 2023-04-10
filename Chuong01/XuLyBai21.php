<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo '
            <div style="text-align:center; margin:10px auto; background-color:aqua; width:30%;">
                <div style="padding:10px;">
                    <p>Xin chào '.$_SESSION["name"].'</p>
                    <p>Email '.$_SESSION["email"].'</p>
                    <p>Tên đăng nhập '.$_SESSION["username"].'</p>
                    <p>Mật khẩu '.$_SESSION["password"].'</p>
                    <a href="Bai21.php">Trở về trang đăng nhập</a>
                </div>
            </div>
        ';
        session_destroy();
    ?>
</body>
</html>