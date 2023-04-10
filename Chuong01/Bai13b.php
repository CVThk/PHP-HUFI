<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 13b</title>
</head>
<body>
    <?php
        $f = fopen('Data0.txt', 'r');
        while(!feof($f)) {
            $link = fgets($f);
            $name = fgets($f);
            $mail = fgets($f);
            $phone = fgets($f);
            if($link != "") {
                echo '<div style="display:flex; margin:20px;">';
                    echo '<div style="margin-right:10px;"><img style="width:100px; object-fit:contain;" src="images/'.$link.'"></div>';
                    echo '<div style="display:grid;">';
                        echo '<div>'.$name.'</div>';
                        echo '<div>'.$mail.'</div>';
                        echo '<div>'.$phone.'</div>';
                    echo '</div>';
                echo '</div>';
            }
        }
        fclose($f);
    ?>
</body>
</html>