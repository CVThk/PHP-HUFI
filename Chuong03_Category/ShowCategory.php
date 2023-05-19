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
    <title>Danh Sách Loại Món Ăn</title>
</head>

<?php
    include("../Helper/DatabaseHelper.php");
    $lma = (new DatabaseHelper("mysql:host=localhost;dbname=ql_nha_hang"))->executeReader('SELECT * FROM loai_mon_an');
?>

<body>
    <div class="container">
        <div id="menu" style="background-color:yellowgreen;">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img src="Images/HomeLogo.jpg" width="70" class="rounded" /></a>

                    <form style="flex: 1;" action="SearchCustomer.php" method="post">
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
                    </form>
                </div>
            </nav>
        </div>

        <div>
            <h1 style="text-transform: uppercase; text-align: center; margin: 20px 0;">Trang quản lý loại món ăn</h1>
            <a class="btn btn-primary mb-2" href="CreateCategory.php">ADD NEW</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã Loại</th>
                        <th>Tên Loại</th>
                        <th>Mô Tả</th>
                        <th style="text-align: center;">Hình</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($lma as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row->ma_loai ?></td>
                            <td><?php echo $row->ten_loai ?></td>
                            <td><?php echo $row->mo_ta ?></td>
                            <td style="text-align: center;"><img style="width:60px; object-fit:contain;" src="image/<?php echo $row->hinh ?>" /></td>
                            <td>
                                <a class="btn btn-success mr-2" href="UpdateCategory.php?ml=<?php echo $row->ma_loai ?>">UPDATE</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
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