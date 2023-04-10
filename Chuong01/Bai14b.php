<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    if(isset($_POST['btn_WriteFile'])) {
        $f = fopen('Data14b.txt', 'a');
        fwrite($f, $_POST["name"]."\t".$_POST["phoneN"]."\t".$_POST["feedB"]."\n");
        fclose($f);
    }
?>

<body>
    <div class="container" style="width:50%">
        <h2 align="center" style="color:blue; font-weight:bold;">THU THẬP THÔNG TIN NGƯỜI DÙNG</h2>
        <form method="post" action="Bai14b.php" name="main-form">
            <p><input type="text" name="name" value="" placeholder="Your name or Email" class="form-control"> </p>
            <p><input type="number" name="phoneN" value="" placeholder="Phone number" class="form-control"></p>
            <p>
                <textarea rows="10" cols="100" name="feedB" placeholder="Enter your comment" class="form-control">

            </textarea>
            </p>
            <p align="center"><input type="submit" name="btn_WriteFile" value="   Write to File   " class="btn btn-primary btn-lg"></p>
        </form>
    </div>



    <!--Bootstrap 4-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.0/dist/bootstrap-validate.js"></script>
</body>

</html>