<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 12</title>
    <style>
        table {
            min-width: 450px;
            margin-top: 20px;
        }

        input {
            width: 100px;
        }

        td {
            padding: 10px;
        }
    </style>
</head>

<body>
    <?php
        include("../Library.php");
        $a= $b = $nghiem = $thongbao = "";
        
        if(isset($_POST["submit"])) {
            if(isEmpty($_POST["txt_a"]) || isEmpty($_POST["txt_b"])) {
                $thongbao = "Không được bỏ trống thông tin";
            }
            else if(!isNumber($_POST["txt_a"]) || !isNumber($_POST["txt_b"])){
                $thongbao = "Chỉ được nhập số";
            }
            else {
                $a = $_POST["txt_a"];
                $b = $_POST["txt_b"];
                $nghiem = giaiPhuongTrinhBacNhat($a, $b);
            }
        }
    ?>
    <form method="post" action="Bai12.php">
        <center><p style="color:red;"><?php echo $thongbao ?></p></center>
        <table border="0" cellspacing="0" align="center" bgcolor="#FFFFCC">
            <tr>
                <td colspan="2" bgcolor="#FF6600" align="center">
                    GIẢI PHƯƠNG TRÌNH BẬC NHẤT
                </td>
            </tr>
            <tr>
                <td>Phương trình</td>
                <td style="display:flex;">
                    <input name="txt_a" type="text" value="<?php echo $a ?>" size="30">
                    <span>x + &nbsp</span>
                    <input name="txt_b" type="text" value="<?php echo $b ?>" size="30">
                    <span>&nbsp = 0</span>
                </td>
            </tr>
            <tr>
                <td>Nghiệm</td>
                <td>
                    <input name="txt_nghiem" type="text" value="<?php echo $nghiem ?>" size="30">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input name="submit" type="submit" value="GIẢI PHƯƠNG TRÌNH" style="width:unset;"></td>
            </tr>
        </table>
    </form>
</body>

</html>