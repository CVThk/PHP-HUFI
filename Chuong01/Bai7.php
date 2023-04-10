<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td {
            white-space: nowrap !important;
            padding: 0px 10px;
        }
    </style>
</head>
<?php
        $chuoi1 = "";
        $chuoi2 ="";
        if(!empty($_POST["txt_chuoi1"])) {
            $chuoi1 = $_POST["txt_chuoi1"];
        }
        if(!empty($_POST["txt_chuoi2"])) {
            $chuoi2 = $_POST["txt_chuoi2"];
        }
        $value = strnatcasecmp($chuoi1, $chuoi2);
        $kq = "";
        if($value > 0){
            $kq = "Chuỗi 1 lớn hơn chuỗi 2";
        }
        else if($value < 0) {
            $kq = "Chuỗi 1 nhỏ hơn chuỗi 2";
        }
        else {
            $kq = "Chuỗi 1 bằng chuỗi 2";
        }
    ?>
<body>
        <form method="post" action="Bai7.php">
            <table width="350" border="0" cellspacing="0" align="center" bgcolor="#FFFFCC">
                <tr>
                    <td colspan="2" bgcolor="#FF6600" align="center">
                        SO SÁNH CHUỖI
                    </td>
                </tr>
                <tr>
                    <td>Chuỗi 1</td>
                    <td>
                        <input name="txt_chuoi1" type="text" value="<?php echo $chuoi1 ?>" size="30">
                    </td>
                </tr>
                <tr>
                    <td>Chuỗi 2</td>
                    <td>
                        <input name="txt_chuoi2" type="text" value="<?php echo $chuoi2 ?>" size="30">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input name="submit" type="submit" value="SO SÁNH"></td>
                </tr>
                <tr>
                    <td>Kết quả</td>
                    <td><input name="txt_kq" type="text" size="50" style="background-color: #FCC;"
                        value="<?php echo $kq ?>"></td>
                </tr>
            </table>
        </form>

</body>
</html>