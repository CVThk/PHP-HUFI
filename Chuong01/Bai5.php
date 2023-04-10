<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
        $chuoi = "";
        if(!empty($_POST["txt_chuoi"])) {
            $chuoi = $_POST["txt_chuoi"];
        }
        $tu = "";
        if(!empty($_POST["txt_tu"])) {
            $tu = $_POST["txt_tu"];
        }
        $vt = strpos($chuoi, $tu);
        $kq = "";
        if($vt == false){
            $kq = "Không tìm thấy từ: $tu trong chuỗi";
        }
        else {
            $kq = "Tìm thấy từ: $tu trong chuỗi tại vị trí $vt";
        }
    ?>
<body>
        <form method="post" action="Bai5.php">
            <table width="350" border="0" cellspacing="0" align="center" bgcolor="#FFFFCC">
                <tr>
                    <td colspan="2" bgcolor="#FF6600" align="center">
                        TÌM TỪ TRONG CHUỖI
                    </td>
                </tr>
                <tr>
                    <td>Nhập chuỗi</td>
                    <td>
                        <input name="txt_chuoi" type="text" value="<?php echo $chuoi ?>" size="30">
                    </td>
                </tr>
                <tr>
                    <td>Nhập từ</td>
                    <td>
                        <input name="txt_tu" type="text" value="<?php echo $tu ?>" size="30">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input name="submit" type="submit" value="TÌM KIẾM"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input name="txt_kq" type="text" size="50" style="background-color: #FCC;"
                        value="<?php echo $kq ?>"></td>
                </tr>
            </table>
        </form>

</body>
</html>