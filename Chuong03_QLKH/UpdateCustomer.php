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
    $db = new DatabaseHelper("mysql:host=localhost;dbname=ql_nha_hang");
    if(isset($_GET["maKH"])) {
        $arr = $db->executeReader("SELECT * FROM khach_hang WHERE ma_khach_hang = ?", array($_GET["maKH"]));
        if(count($arr) > 0) {
            $kh = $arr[0];
        }
    }
    if(isset($_POST["btnUpdate"])) {
        $maKH = $_GET["maKH"];
        $tenKH = $_POST["tenKH"];
        $email = $_POST["email"];
        $diachi = $_POST["diaChi"];
        $dienthoai = $_POST["dienThoai"];
        $hinh = $_FILES["hinh"]["error"] == 0 ? $_FILES["hinh"]["name"] : (isset($kh) ? $kh->hinh : "");
        $ghichu = $_POST["ghiChu"];

        
        $count = $db->executeReader("SELECT COUNT(*) as 'count' FROM khach_hang WHERE ten_khach_hang = '$tenKH' and ma_khach_hang != $maKH")[0]->count;
        if($count == 0) {
            $param = array($tenKH, $email, $diachi, $dienthoai, $hinh, $ghichu, $maKH);
            $kq = $db->executeNonQuery('UPDATE khach_hang SET ten_khach_hang = ?,
                                                                email = ?,
                                                                dia_chi = ?,
                                                                dien_thoai = ?,
                                                                hinh = ?,
                                                                ghi_chu = ?
                                                        WHERE ma_khach_hang = ?', $param);
            if($kq) {
                $noti = "Cập nhật thành công";
                if($hinh != "" && $_FILES["hinh"]["tmp_name"] != null) {      
                    uploadImage("image/", $hinh, $_FILES["hinh"]["tmp_name"]);
                }
            }
            else {
                $noti = "Cập nhật thất bại";
            }
        }
        else {
            $noti = "Tên này đã có trong database";
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
            <div class="col-4">
                <div style="margin-top:10px;"><img src="./image/QLKH.jpg" style="width:100%; object-fit:contain" /></div>
                <div style="margin-top:10px;"><img src="./image/CSKH.jpg" style="width:100%; object-fit:contain" /></div>
            </div>
            <div class="col-8">
                <h2 style="text-align: center; text-transform: uppercase;">trang thêm mới khách hàng</h2>
                <form method="post" enctype="multipart/form-data" action="UpdateCustomer.php?maKH=<?php echo $_GET["maKH"] ?>">
                    <div class="form-group">
                        <label for="tenKH">Tên khách hàng</label>
                        <input id="tenKH" class="form-control" name="tenKH" value="<?php echo isset($kh) ? $kh->ten_khach_hang : "" ?>" placeholder="Nhập tên khách hàng" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" class="form-control" name="email" value="<?php echo isset($kh) ? $kh->email : "" ?>" placeholder="Nhập email khách hàng" type="email" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="diaChi">Địa chỉ</label>
                        <input id="diaChi" class="form-control" name="diaChi" value="<?php echo isset($kh) ? $kh->dia_chi : "" ?>" placeholder="Nhập địa chỉ khách hàng" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="dienThoai">Điện thoại</label>
                        <input id="dienThoai" class="form-control" name="dienThoai" value="<?php echo isset($kh) ? $kh->dien_thoai : "" ?>" placeholder="Nhập điện thoại khách hàng" type="number" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="hinh">Hình</label>
                        <input id="hinh" class="form-control" name="hinh" type="file" />
                    </div>
                    <div class="form-group">
                        <label for="ghiChu">Ghi chú</label>
                        <input id="ghiChu" class="form-control" name="ghiChu" value="<?php echo isset($kh) ? $kh->ghi_chu : "" ?>" placeholder="Ghi chú" />
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btnUpdate" class="btn btn-primary" onclick="kiemtra()">Update</button>
                        <button class="btn btn-primary"><a href="ShowCustomer.php" style="color:white;">Show Customer</a></button>
                    </div>
                    <div>
                        <span style="color: red;"><?php echo isset($noti) ? $noti : "" ?></span>
                    </div>
                </form>
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
            var tenKH = $('#tenKH');
            if(tenKH.val() == "") {
                alert("Không được bỏ trống tên khách hàng");
                $(tenKH).focus();
                return false;
            }
            var email = $('#email');
            if(email.val() == "") {
                alert("Không được bỏ trống email khách hàng");
                $(tenKH).focus();
                return false;
            }
            var diachi = $('#diaChi');
            if(diachi.val() == "") {
                alert("Không được bỏ trống địa chỉ khách hàng");
                tenKH.focus();
                return false;
            }
            return true;
        }
    </script>
</body>
</html>