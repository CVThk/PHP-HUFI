<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai 1</title>
    <?php
        include('HinhChuNhat.php');
        if(isset($_POST["btn_tinh"])) {
            $hcn = new HinhChuNhat($_POST["txt_chieudai"], $_POST["txt_chieurong"]);
            $cv = $hcn->tinhChuVi();
            $dt = $hcn->tinhDienTich();
        }
    ?>
</head>
<body>
    <form method="post" action="Bai01.php">
        <table>
            <tr><td>HÌNH CHỮ NHẬT</td></tr>
            <tr>
                <td>Chiều dài</td>
                <td>
                    <input name="txt_chieudai" />
                </td>
            </tr>
            <tr>
                <td>Chiều rộng</td>
                <td>
                    <input name="txt_chieurong"/>
                </td>
            </tr>
            <tr>
                <td>Chu vi</td>
                <td>
                    <input value="<?php GLOBAL $cv; echo $cv; ?>"/>
                </td>
            </tr>
            <tr>
                <td>Diện tích</td>
                <td>
                    <input value="<?php GLOBAL $dt; echo $dt; ?>"/>
                </td>
            </tr>
            <tr><td><button type="submit" name="btn_tinh">TÍNH</button></td></tr>
        </table>
    </form>
</body>
</html>