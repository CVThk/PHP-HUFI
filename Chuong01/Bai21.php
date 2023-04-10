<?php
    session_start();
    $kt = false;
    if(isset($_POST["DN"])) {
        $kt = true;
        if(strlen($_POST["name"])){
            $_SESSION["name"] = $_POST["name"];
        }
        else {
            echo "<script type='text/javascript'>alert('Invalid name');</script>";
            $kt = false;
        }
        if(strlen($_POST["email"])){
            $_SESSION["email"] = $_POST["email"];
        }
        else {
            echo "<script type='text/javascript'>alert('Invalid email');</script>";
            $kt = false;
        }
        if(strlen($_POST["username"])){
            $_SESSION["username"] = $_POST["username"];
        }
        else {
            echo "<script type='text/javascript'>alert('Invalid username');</script>";
            $kt = false;
        }
        if(strlen($_POST["password"])){
            $_SESSION["password"] = $_POST["password"];
        }
        else {
            echo "<script type='text/javascript'>alert('Invalid password');</script>";
            $kt = false;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 21</title>
    <style>
        tr > td:first-child {
            margin:5px 0;
        }
        tbody {
            background-color: aquamarine;
        }
        p {
            margin:0;
            padding:0;
        }
    </style>
</head>
<body>
    <form style="margin:0 auto; width:30%; border:1px solid #333;" method="post" action="Bai21.php">
        <table style="width:100%;" border="0" cellpadding="0" cellspacing="0">
            <tbody>
            <tr style="background-color:blue; color:white;">
                <td colspan="2" style="text-transform: uppercase;">
                    <div style="margin:20px 0; text-align:center;">thông tin đăng nhập</div>
                </td>
            </tr>
            <tr>
                <td><div style="margin:5px;">Họ và tên</div></td>
                <td>
                    <input name="name" placeholder="Nhập họ tên ..." value="<?php echo (isset($_SESSION["name"])) ? $_SESSION["name"] : "" ?>" />
                </td>
            </tr>
            <tr>
                <td><div style="margin:5px;">Email</div></td>
                <td>
                    <input name="email" type="email" placeholder="Nhập email ..." value="<?php echo (isset($_SESSION["email"])) ? $_SESSION["email"] : "" ?>" />
                </td>
            </tr>
            <tr>
                <td><div style="margin:5px;">Tên đăng nhập</div></td>
                <td>
                    <input name="username" value="<?php echo (isset($_SESSION["username"])) ? $_SESSION["username"] : "" ?>" />
                </td>
            </tr>
            <tr>
                <td><div style="margin:5px;">Password</div></td>
                <td>
                    <input name="password" type="password" />
                </td>
            </tr>
            <tr  style="text-align: center;">
                <td colspan="2">
                    <button type="submit" name="DN" style="text-transform: uppercase;margin:10px 0;">Đăng nhập</button>
                </td>
            </tr>
            </tbody>
        </table>
    </form>

    <?php
        if($kt) {
            echo '
                <div style="text-align:center; margin:10px auto; background-color:aqua; width:30%;">
                    <div style="padding:10px;">
                        <p>Xin chào '.$_SESSION["name"].'</p>
                        <p>Email '.$_SESSION["email"].'</p>
                        <p>Tên đăng nhập '.$_SESSION["username"].'</p>
                        <p>Mật khẩu '.$_SESSION["password"].'</p>
                        <a href="XuLyBai21.php">Sang trang kế tiếp</a>
                    </div>
                </div>
            ';
        }
    ?>
</body>
</html>