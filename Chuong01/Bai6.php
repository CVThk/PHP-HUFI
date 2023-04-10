<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
        $thongbao = "";
        $chuoi = "";
        $chuoigoc = "";
        $chuoithaythe = "";
        $rl = "";
        if(!empty($_POST["txt_chuoi"])) {
            $chuoi = $_POST["txt_chuoi"];
        }
        
        if(!empty($_POST["txt_goc"])) {
            $chuoigoc = $_POST["txt_goc"];
        }
        
        if(!empty($_POST["txt_thaythe"])) {
            $chuoithaythe = $_POST["txt_thaythe"];
        }
        if(empty($chuoi) || empty($chuoigoc) || empty($chuoithaythe)) {
            $thongbao = "Không được bỏ trống thông tin";
        }
        
        if($thongbao == "") {
            $rl = str_replace($chuoigoc, $chuoithaythe, $chuoi);
            if(empty($rl)){
                $thongbao = "Không tìm thấy từ: $chuoigoc trong chuỗi";
            }
            else {
                $thongbao = $rl;
            }
        }
    ?>
<body>
        <form method="post" action="Bai6.php">
            <table width="350" border="0" cellspacing="0" align="center" bgcolor="#FFFFCC">
                <tr>
                    <td colspan="2" bgcolor="#FF6600" align="center">
                        THAY THẾ CHUỖI
                    </td>
                </tr>
                <tr>
                    <td>Nhập chuỗi</td>
                    <td>
                        <input name="txt_chuoi" type="text" value="<?php echo $chuoi ?>" size="30">
                    </td>
                </tr>
                <tr>
                    <td>Nhập chuỗi gốc</td>
                    <td>
                        <input name="txt_goc" type="text" value="<?php echo $chuoigoc ?>" size="30">
                    </td>
                </tr>
                <tr>
                    <td>Nhập chuỗi thay thế</td>
                    <td>
                        <input name="txt_thaythe" type="text" value="<?php echo $chuoithaythe ?>" size="30">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input name="submit" type="submit" value="TÌM KIẾM"></td>
                </tr>
                <tr>
                    <td>Kết quả</td>
                    <td><input name="txt_thongbao" type="text" size="50" style="background-color: #FCC;"
                        value="<?php echo $thongbao ?>"></td>
                </tr>
            </table>
        </form>

</body>
</html>