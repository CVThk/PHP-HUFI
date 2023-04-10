<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Câu 4</title>
    <style>
        .nav {
            display: flex;
            align-items: center;
            background-color: violet;
        }
        .nav_item > a {
            display: block;
            text-decoration: none;
            padding: 10px 20px;
            color:#fff;
            font-weight: bold;
            text-transform: uppercase;
            border-right: 1px solid #fff;
        }
        .body {
            display: flex;
            justify-content: space-between;
        }
        .left {
            flex: 1;
            background-color: antiquewhite;
            padding:20px 30px;
        }
        .right {
            margin:4px;
        }
        .fotter {
            background-color: grey;
            text-align: center;
            padding:20px;
        }
    </style>
</head>
<body style="background-color: #bc09e5;">
    <?php
        include('Model.php');

        $arrmenu = [new Menu("sản phẩm", "Cau01_Demo.php"),
                    new Menu("tin tức", ""),
                    new Menu("đăng ký", ""),
                    new Menu("thông tin đăng ký", "")];

        

        $tkdk = new TaiKhoan();
        if(isset($_POST["dktk"])) {
            $tkdk->name = $_POST["name"];
            $tkdk->username = $_POST["username"];
            $tkdk->password = $_POST["password"];
            $tkdk->email = $_POST["email"];
            $target_file = "";
            if($_FILES["avatar"]["tmp_name"] != null) {
                $target_dir    = "upload/";
                $target_file   = $target_dir . basename($_FILES["avatar"]["name"]);
                //Lấy phần mở rộng của file (jpg, png, ...)
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
                if (!in_array($imageFileType,$allowtypes ))
                {
                    echo "<script>alert('Chỉ được upload các định dạng JPG, PNG, JPEG, GIF')</script>";
                    die;
                }
    
                move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);      
            }
            
            $tkdk->link = $target_file;
        }
        
    ?>
    <div style="background-color: #fff; width:80%; margin:40px auto; padding: 20xp;">
        <div style="text-align: center;">
            <h2 style="color:#712682; font-size: 40px; margin:0;">agoda</h2>
            <img src="./Images_Cau234/Agoda.JPG" style="width:10%; object-fit: contain;" />
        </div>
        <div class="nav">
            <?php
                foreach($arrmenu as $item) {
                    ?>
                        <div class="nav_item">
                            <?php echo '<a href="'.$item->link.'">'.$item->title.'</a>' ?>
                        </div>
                    <?php
                }
            ?>
        </div>

        <div class="body">
            <div class="left">
                <h2>Thông tin của bạn</h2>
                <div style="width:30%;"><img src="./Images_Cau234/FaceBookButton.JPG" /></div>
                <div  style="display: flex;">
                    <div style="width:30%;">
                        <div>Avatar: </div>
                        <div style="width:100%;"><img style="width:100%; object-fit: contain;" src="<?php echo $tkdk->link ?>" /></div>
                    </div>
                    <div style="flex:1;">
                        <div>Họ và Tên: <span style="font-weight: bold; color:red;"><?php echo $tkdk->name ?></span></div>
                        <div>Email: <span style="font-weight: bold; color:red;"><?php echo $tkdk->email ?></span></div>
                        <div>Tên đăng nhập: <span style="font-weight: bold; color:red;"><?php echo $tkdk->username ?></span></div>
                        <div>Password: <span style="font-weight: bold; color:red;"><?php echo $tkdk->password ?></span></div>
                    </div>
                </div>
            </div>
            <div class="right">
                <img src="./Images_Cau234/QC.JPG" />
            </div>
        </div>
        <div class="fotter">
            <div style="font-weight: bold;">2020 Một sản phẩm của HUFI Group</div>
            <div>Email: yennh@cntp.edu.vn</div>
        </div>
    </div>
</body>
</html>