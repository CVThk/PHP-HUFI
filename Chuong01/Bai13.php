<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 13</title>
</head>
<body>
    <?php
        $f = fopen('Bai13.txt', 'r');
        while(!feof($f)){
            $nd = fgets($f);
            echo '<p>'.$nd.'</p>';
        }
        fclose($f);
    ?>
</body>
</html>