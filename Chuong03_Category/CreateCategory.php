<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap 4-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.0/dist/bootstrap-validate.js"></script>
    <title>Thêm Mới Khách Hàng</title>
</head>

<?php
    include("../Helper/DatabaseHelper.php");
    include("../Helper/Utility.php");
    if(isset($_POST["btnCreate"])) {
        $mal = null;
        $tenlm = $_POST["tenlm"];
        $mota = $_POST["mota"];
        $hinh = $_FILES["hinh"]["error"] == 0 ? $_FILES["hinh"]["name"] : "";

        $db = new DatabaseHelper("mysql:host=localhost;dbname=ql_nha_hang");
        $count = $db->executeReader("SELECT COUNT(*) as 'count' FROM loai_mon_an WHERE ten_loai = '$tenlm'")[0]->count;
        if($count == 0) {
            $param = array($mal, $tenlm, $mota, $hinh);
            $kq = $db->executeNonQuery('INSERT INTO loai_mon_an VALUES(?, ?, ?, ?)', $param);
            if($kq) {
                $noti = "Thêm thành công";
                if($hinh != "") {      
                    uploadImage("image/", $hinh, $_FILES["hinh"]["tmp_name"]);
                }
            }
            else {
                $noti = "Thêm thất bại";
            }
        }
        else {
            $noti = "Loại món ăn này đã có tên trong database";
        }
    }
?>

<body>
<div class="container">
        <div id="menu" style="background-color:blue;">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img src="Images/HomeLogo.jpg" width="70" class="rounded" /></a>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                            <li class="nav-item nav-link active">
                                <a class="nav-link" href="#">Khách Hàng </a>
                            </li>
                            <li class="nav-item nav-link active">
                                <a class="nav-link " href="#">Loại món ăn </a>
                            </li>
                            <li class="nav-item nav-link active">
                                <a class="nav-link " href="#">Món ăn </a>
                            </li>
                            <li class="nav-item nav-link active">
                                <a class="nav-link" href="#">Đăng ký </a>
                            </li>
                            <li class="nav-item nav-link active">
                                <a class="nav-link" href="#">Đăng Nhập </a>
                            </li>

                        </ul>
                        <input class="form-control mr-2 w-25" type="text" placeholder="Search" aria-label="Search" name="txt_Search">
                        <button class="btn btn-outline-dark" style="margin-right:20px;">Search</button>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row">
            <div class="col-8">
                <h2 style="text-align: center; text-transform: uppercase;">trang thêm mới loại món ăn</h2>
                <form method="post" enctype="multipart/form-data" action="CreateCategory.php">
                    <div class="form-group">
                        <label for="tenlm">Tên loại món</label>
                        <input id="tenlm" class="form-control" name="tenlm" placeholder="Nhập tên loại" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="mota">Mô tả</label>
                        <input id="mota" class="form-control" name="mota" placeholder="Nhập mô tả" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="hinh">Hình</label>
                        <input id="hinh" class="form-control" name="hinh" type="file" required="required" />
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btnCreate" class="btn btn-primary" onclick="kiemtra()">Create</button>
                        <button class="btn btn-primary"><a href="ShowCategory.php" style="color:white;">Show Category</a></button>
                    </div>
                    <div>
                        <span style="color: red;"><?php echo isset($noti) ? $noti : "" ?></span>
                    </div>
                </form>
            </div>
            <div class="col-4">
                <div style="margin-top:10px;"><img src="./Images/vn.jfif" style="width:100%; object-fit:contain" /></div>
                <div style="margin-top:10px;"><img src="./Images/review.jfif" style="width:100%; object-fit:contain" /></div>
            </div>
        </div>


        <div id="Footer" class="row" style="background-color:blue;">
            <div class="col text-light mt-3 mb-3" style="text-align:center;">
                Liên hệ: Khoa Công nghệ Thông tin - Trường Đại học Công nghiệp Thực phẩm Tp.HCM Link: fanpage và link: youtube <br />
                Địa chỉ: 140 Lê Trọng Tấn, Phường Tây Thạnh, Quận Tân Phú, Tp.HCM. ĐT: (028).38161673 (ext 136) Mail: kcntt@hufi.edu.vn
            </div>
        </div>
    </div>

    <script>
        function kiemtra() {
            var tenlm = $('#tenlm');
            if(tenlm.val() == "") {
                alert("Không được bỏ trống tên loại món");
                $(tenlm).focus();
                return false;
            }
            var mota = $('#mota');
            if(mota.val() == "") {
                alert("Không được bỏ trống mô tả của loại món ăn");
                $(mota).focus();
                return false;
            }
            return true;
        }
    </script>
</body>
</html>