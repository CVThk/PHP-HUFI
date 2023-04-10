<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Câu 1 Demo</title>
    <style>
        .link {
            text-decoration: none;
            background-color: blueviolet;
            color:#fff;
            padding:2px 4px;
        }
    </style>
</head>
<body>
    <?php
        $arrLink = ["h1.jpg", "h2.jpg", "h3.jpg", "h4.jpg"];
    ?>
    <div style="border:1px solid #ccc; width:200px; margin:10px auto; text-align: center; padding:10px;">
        <h2 style="color:red; font-weight: bold;">Images Gallery</h2>
        <img src="./Images_Cau1/<?php echo $arrLink[0] ?>" style="width:100%; object-fit: contain;" />
        <div style="margin-top: 4px;">
            <a href="Cau01_All.php" class="link">Show ALL</a>
            <a href="Cau01_Demo.php" class="link">Show Demo</a>
        </div>
    </div>
</body>
</html>