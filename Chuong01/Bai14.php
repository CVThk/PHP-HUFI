<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 14</title>
</head>
<body>
    <?php
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $f = fopen('Data14.txt', 'a');
        $kt = fwrite($f, "Mới ghi vô nè vào lúc ".date("d/m/Y H:i:s")."\n");
        fclose($f);
        if($kt) {
            echo '<p>Ghi file thành công.</p>';
        }
        else {
            echo '<p>Ghi file thất bại !!!</p>';
        }
    ?>
</body>
</html>