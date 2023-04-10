<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Câu 3</title>
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
                <h2>Tạo tài khoản</h2>
                <div style="width:30%;"><img src="./Images_Cau234/FaceBookButton.JPG" /></div>
                <form method="post" action="Cau04.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Họ và tên *</label>
                        <input id="name" name="name" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input id="email" type="email" name="email" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="username">Tên đăng nhập *</label>
                        <input id="username" name="username" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password *</label>
                        <input id="password" type="password" name="password" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="avatar">Avatar *</label>
                        <input id="avatar" type="file" name="avatar" class="form-control" />
                    </div>
                    <button type="submit" name="dktk" class="form-control" style="text-transform: uppercase; margin-top:10px; background-color: blue;">tạo tài khoản</button>
                </form>
                
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