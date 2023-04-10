<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 12b</title>
</head>
<?php 
    function veBox1() {
        echo '<div style="width:200px; height:100px; border:1px solid red;"></div>';
    }
    function veBox($w, $h, $borderColor) {
        return '<div style="width:'.$w.'px; height:'.$h.'px; border:1px solid '.$borderColor.';"></div>';
    }
?>

<body>
    <?php veBox1(); ?>
    <br>
    <?php echo veBox(800, 100, 'green') ?>

</body>
</html>