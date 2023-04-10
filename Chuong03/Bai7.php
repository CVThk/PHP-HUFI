
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bài 7</title>

    <!--Bootstrap 4-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.0/dist/bootstrap-validate.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
		.dd_mon{
			width:32%;
			border:1px solid grey;
			float:left;
			margin:5px;}
    </style>

</head>

<body>
    <?php
        $maLoai = $_GET["ml"];
        $tenLoai = $_GET["tl"];
        $pdo = new PDO("mysql:host=localhost;dbname=ql_nha_hang", "root", "");
        $pdo->query("set names utf8");
        $sql = "select ma_loai, ten_loai, mo_ta from loai_mon_an";
        $loai_mon = $pdo->query($sql);

        $pdo = new PDO("mysql:host=localhost;dbname=ql_nha_hang", "root", "");
        $mon_an = $pdo->query("select * from mon_an where ma_loai = '".$maLoai."'");
        $pdo = null;
    ?>

    <div id="Wrapper" class="container">
        <br />
        <div id="header" class="row bg-light">
            <div class="col-4">
            <br>
               <img src="Images/Logo.jpg" width="100%" height="70%" />
            </div>
            <div class="col-4">
                <b>Hà Nội:</b><br />
                Điện thoại: 024.73007.008 - 093.4647.172<br />
                Địa chỉ: Số 63/445 Lạc Long Quân, Tây Hồ, Hà Nội<br />
                Email: hn@ganhxua.com
            </div>
            <div class="col-4">
                <b>TP.Hồ Chí Minh:</b><br />
                Điện thoại: 028.73007.008 - 094.7723.444<br />
                Địa chỉ: 189 XVN Tĩnh, P.17, Q. Bình Thạnh<br />
                Email: hcm@ghanhxua.com
            </div>
        </div>
       
        <div id="menu" style="background-color:yellowgreen;">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img src="Images/HomeLogo.jpg" width="70" class="rounded" /></a>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                            <li class="nav-item nav-link active">
                                <a class="nav-link" href="#">Trang Chủ </a>
                            </li>
                            <li class="nav-item nav-link active">
                                <a class="nav-link" href="#">Đăng ký </a>
                            </li>
                            <li class="nav-item nav-link active">
                                <a class="nav-link" href="#">Đăng Nhập </a>
                            </li>
                            <li class="nav-item nav-link active">
                                <a class="nav-link " href="#">Liên hệ </a>
                            </li>
                        </ul>
                        <input class="form-control mr-2 w-25" type="text" placeholder="Search" aria-label="Search" name="txt_Search" >
                        <button class="btn btn-outline-dark" >Search</button>
                        
                    </div>
                </div>
            </nav>
        </div>
       
        <br />
        <div id="Content" class="row">
        	<div class="col-3">
                <ul class="list-group list-group-flush text-left bg-light">
                    <li class="list-group-item" style="background-color:yellowgreen"><a href="#" style="text-transform:uppercase; text-decoration:none; color:white; font-weight:bold;">Loại món</a></li>
                    
                    <li class="list-group-item bg-light"><a href="#" style="text-transform:uppercase; text-decoration:none;"></a></li>
                    
                    <?php
                        if($loai_mon->rowCount() > 0) {
                            foreach($loai_mon as $loai) {
                                ?>
                                <li class="list-group-item bg-light"><a href="Bai7.php?ml=<?php echo $loai[0]."&tl=".$loai[1]; ?>" style="text-transform:uppercase; text-decoration:none;"><?php echo $loai[1]; ?></a></li>
                                <?php
                            }
                        }
                    ?>
                    <li class="list-group-item bg-light"><a href="Bai5.php" style="text-transform:uppercase; text-decoration:none;">show all</a></li>
                    <!-- <li class="list-group-item bg-light"><a href="#" style="text-transform:uppercase; text-decoration:none;">Hoa Sinh nhật</a></li>
                    <li class="list-group-item bg-light"><a href="#" style="text-transform:uppercase; text-decoration:none;">Hoa khai trương</a></li>
                    <li class="list-group-item bg-light"><a href="#" style="text-transform:uppercase; text-decoration:none;">Lan hồ điệp</a></li>
                    <li class="list-group-item bg-light"><a href="#" style="text-transform:uppercase; text-decoration:none;">Hoa cưới</a></li>
                    <li class="list-group-item bg-light"><a href="#" style="text-transform:uppercase; text-decoration:none;">Hoa Lan</a></li>
                    <li class="list-group-item bg-light"><a href="#" style="text-transform:uppercase; text-decoration:none;">Hoa chia buồn</a></li>
                    <li class="list-group-item bg-light"><a href="#" style="text-transform:uppercase; text-decoration:none;">Quà tặng</a></li>
                    <li class="list-group-item bg-light"><a href="#" style="text-transform:uppercase; text-decoration:none;">Trái cây</a></li> -->
                    
                </ul>
                <ul class="list-group list-group-flush text-left bg-light">
                    <li class="list-group-item" style="background-color:yellowgreen;"><a href="#" style="text-transform:uppercase; text-decoration:none; color:white; font-weight:bold;">Chọn theo giá</a></li>
                    <li class="list-group-item bg-light"><a href="Bai8.php?f=0&t=15000">15,000đ trở xuống</a></li>
                    <li class="list-group-item bg-light"><a href="Bai8.php?f=20000&t=30000">20,000đ - 30,000đ</a></li>
                    <li class="list-group-item bg-light"><a href="Bai8.php?f=31000&t=50000">31,000đ - 50,000đ</a></li>
                    <li class="list-group-item bg-light"><a href="Bai8.php?f=51000&t=100000">51,000đ - 100,000đ</a></li>
                    <li class="list-group-item bg-light"><a href="Bai8.php?f=100000&t=99999999999">Trên 100,000đ</a></li>
                    
                </ul>
            </div>
            <div class="col-9">
                <div style="text-transform: uppercase;"><h2><?php echo $tenLoai; ?></h2></div>
                <div class="row">
                    <?php
                        if($mon_an->rowCount() > 0) {
                            foreach($mon_an as $mon) {
                                ?>
                                <div class="col-4" style="margin-bottom: 10px;">
                                    <div style="border:1px solid #999999; margin-left: 5px; margin-right: 5px; text-align: center;">
                                        <div><img src="image_MonAn/<?php echo $mon[8]; ?>" style="width:100%; object-fit: cover; max-height: 150px;" /></div>
                                        <div>Món: <?php echo $mon[2]; ?></div>
                                        <div style="margin: 20px 0;">Giá: <?php echo number_format(floatval($mon[5]), 0, ',', '.'); ?> VNĐ</div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
           
            
          </div>
            
        </div>
        <div id="Footer" class="row" style="background-color:yellowgreen;">
            <div class="col text-light mt-3 mb-3" style="text-align:center;">
                Liên hệ: Khoa Công nghệ Thông tin - Trường Đại học Công nghiệp Thực phẩm Tp.HCM Link: fanpage và link: youtube <br />
                Địa chỉ: 140 Lê Trọng Tấn, Phường Tây Thạnh, Quận Tân Phú, Tp.HCM. ĐT: (028).38161673 (ext 136) Mail: kcntt@hufi.edu.vn
            </div>
        </div>
    </div>
  
</body>
</html>
