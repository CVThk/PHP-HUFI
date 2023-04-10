<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 4</title>
</head>
<body>
    <?php
        $pdo = new PDO("mysql:host=localhost;dbname=ql_nha_hang", "root", "");
        $pdo->query("set names utf8");
        $sql = "select ma_loai, ten_loai, mo_ta from loai_mon_an";
        $loai_mon = $pdo->query($sql);
        echo 'Số mẫu tin trong loại món ăn là: '.$loai_mon->rowCount();
    ?>
    <?php
        if($loai_mon->rowCount() > 0) {
    ?>
        <table width="800" border="2" cellspacing="0" cellpadding="5" align="center">
            <caption><h1>THÔNG TIN LOẠI MÓN ĂN</h1></caption>
            <tr bgcolor="#99ff99" align="center" style="font-weight: bold;">
                <td>Mã loại</td>
                <td>Tên loại</td>
                <td>Mô tả</td>
            </tr>
            <?php
            foreach($loai_mon as $loai) {
            ?>
                <tr>
                    <td><?php echo $loai[0]; ?></td>
                    <td><?php echo $loai[1]; ?></td>
                    <td><?php echo $loai[2]; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php
        }
        $pdo = null;
    ?>
</body>
</html>