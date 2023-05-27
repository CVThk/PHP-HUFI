<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title>Test</title>
        <!--Bootstrap 4-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<?php
    include('DatabaseHelper.php');
    $db = new DatabaseHelper();
    $sbDT = $db->executeReader("SELECT * FROM `loai` WHERE `loai`.`Note` = 'DT'");
    $sbLap = $db->executeReader("SELECT * FROM `loai` WHERE `loai`.`Note` = 'Lap'");
    $sbPK = $db->executeReader("SELECT * FROM `loai` WHERE `loai`.`Note` = 'PK'");
    $sbLoaiTin = $db->executeReader("SELECT * FROM `loaitin`");

    $search = '';
    if(isset($_POST['txt_Search'])) {
        $search = $_POST['txt_Search'];
    }
    $sps = $db->executeReader("SELECT * FROM `sanpham` WHERE TenSP like '%".$search."%'",);
?>

<body>
    <div class="text-center">
        <!--NAVIGATION-->
       <!-- <div class="container-fluid"> -->
       
        <form method="post" action="Search.php"  class= "row" style="background-color:red; height:100px;">
               <div class="col-4 mt-2">
                    <a href="#"><img src="./Images_KTL2/LogoFpt.png" width="70%" class="rounded"/></a>
               </div> 
                <div class="col-4 mt-4">
                    <input class="form-control mx-auto" type="search" placeholder="Search" aria-label="Search" name="txt_Search">
               </div> 
                <div class="col-1 mt-3">
                    <button class="btn btn-link" type="submit"><img src="./Images_KTL2/search.JPG" class="rounded" /></button>
               </div> 
               <div class="col-3">

               </div> 
        </form>
        
         <div class="row" style="background-color:black; height:60px;">
             <div class="col-12 mt-3 mx-auto">
                            <ul>
                                <li style="float:left; position:relative; display:block; width:150px; color:white; ">
                                    <a href="#" style="color:white;">TRANG CHỦ</a>
                                </li>
                                <li style="float:left; position:relative;  display:block; width:150px; color:white; " >
                                    <a href="#" style="color:white;">ĐĂNG KÝ</a>
                                </li>
                                <li style="float:left; position:relative;  display:block; width:150px; color:white; " >
                                   <a href="#" style="color:white;">ĐĂNG NHẬP</a>
                                </li>
                                <li style="float:left; position:relative; display:block;width:150px;color:white;">
                                    <a href="#" style="color:white;">LIÊN HỆ</a>
                                </li>
                                <li style="float:left; position:relative; display:block;width:150px;color:white;">
                                    <a href="#" style="color:white;">TIN TỨC</a>
                                </li>
                                <li style="float:left; position:relative; display:block;width:150px;color:white;">
                                    <a href="Cart.php" style="color:white;">GIỎ HÀNG</a>
                                </li>
                            </ul>
              </div>             
          </div>
        <!-- </div> -->
        <!--CONTAIN-->
        <div class="row">
            <div class="col col-md-2  card">
                <ul class="list-group list-group-flush text-left">
                    <li class="list-group-item" style="background-color:red;"><a href="#" style="text-transform:uppercase; text-decoration:none; color:white; font-weight:bold;">Điện Thoại</a></li>
                    <?php
                        foreach($sbDT as $sb) {
                            ?>
                    <li class="list-group-item"><a href="ProductByCategory.php?ml=<?php echo $sb->MaLoai ?>" style="text-transform:uppercase; text-decoration:none;"><?php echo $sb->TenLoai ?></a></li>
                            <?php
                        }
                    ?>
                  
                </ul>
               

                <ul class="list-group list-group-flush text-left">
                    <li class="list-group-item" style="background-color:red;"><a href="#" style="text-transform:uppercase; text-decoration:none; color:white; font-weight:bold;">Laptop</a></li>
                    <?php
                        foreach($sbLap as $sb) {
                            ?>
                    <li class="list-group-item"><a href="ProductByCategory.php?ml=<?php echo $sb->MaLoai ?>" style="text-transform:uppercase; text-decoration:none;"><?php echo $sb->TenLoai ?></a></li>
                            <?php
                        }
                    ?>                                 
                </ul> 
               

                <ul class="list-group list-group-flush text-left">
                    <li class="list-group-item" style="background-color:red;"><a href="#" style="text-transform:uppercase; text-decoration:none; color:white; font-weight:bold;">Phụ kiện</a></li>
                    <?php
                        foreach($sbPK as $sb) {
                            ?>
                    <li class="list-group-item"><a href="ProductByCategory.php?ml=<?php echo $sb->MaLoai ?>" style="text-transform:uppercase; text-decoration:none;"><?php echo $sb->TenLoai ?></a></li>
                            <?php
                        }
                    ?>                                
                </ul> 
                
                  
            </div>
            <div class="col col-md-8"  style="background-color:lavender;">
                <div class="row">
                    <div class ="col">

                        <div id="carouselExampleControls" class="carousel w-100 mx-auto mt-3" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="./Images_KTL2/Banner/Banner1.jpg" class="d-block w-100 " alt="Ảnh 1" />
                            </div>
                            <div class="carousel-item">
                                <img src="./Images_KTL2/Banner/Banner2.jpg" class="d-block w-100" alt="Ảnh 2" />
                            </div>
                            <div class="carousel-item">
                                <img src="./Images_KTL2/Banner/Banner3.jpg" class="d-block w-100 " alt="Ảnh 3" />
                            </div>
                             <div class="carousel-item">
                                <img src="./Images_KTL2/Banner/Banner4.jpg" class="d-block w-100 " alt="Ảnh 4" />
                            </div>
                            
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    </div>
                </div>
                <div>
                    <div style="text-transform: uppercase; font-size: 20px;">kết quả tìm kiếm</div>  
                    <table class="table">
                        <thead>
                            <th>Tên SP</th>
                            <th>Giá Bán</th>
                            <th>Ngày Cập Nhật</th>
                            <th>Ảnh</th>
                            <th>SL Tồn</th>
                            <th>Mã Loại</th>
                            <th>Moi</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach($sps as $sp) {
                                ?>
                                <tr>
                                    <td><?php echo $sp->TenSP ?></td>
                                    <td><?php echo number_format($sp->GiaBan, 0, ',', '.') ?></td>
                                    <td><?php echo $sp->NgayCapNhat ?></td>
                                    <td><img style="width: 60%; max-height: 100px;" src="./Images_KTL2/<?php echo $sp->Anh ?>" /></td>
                                    <td><?php echo $sp->SLTon ?></td>
                                    <td><?php echo $sp->MaLoai ?></td>
                                    <td><?php echo $sp->Moi ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <div style="font-size: 17px; color:red;">Tổng số lượng tìm được: <?php echo count($sps) ?></div>  
                </div>
            </div>
            <div class="col col-md-2 card">
                <ul class="list-group list-group-flush text-left">
                    <li class="list-group-item" style="background-color:red;"><a href="#" style="text-transform:uppercase; text-decoration:none; color:white; font-weight:bold;">Tin Tức</a></li>
                    <?php
                        foreach($sbLoaiTin as $sb) {
                            ?>
                    <li class="list-group-item"><a href="ProductByCategory.php?ml=<?php echo $sb->MaLoai ?>" style="text-transform:uppercase; text-decoration:none;"><?php echo $sb->TLTin ?></a></li>
                            <?php
                        }
                    ?> 
                </ul>
                
               
            </div>
       </div>
        <!--Footer-->
        <div class="row" style="background-color:red; text-align:center;">
             <div class="col text-light mt-3 mb-3" style="text-align:center;">© 2007 - 2020 Công Ty Cổ Phần Bán Lẻ Kỹ Thuật Số FPT /<br />Địa chỉ: 261 - 263 Khánh Hội, P5, Q4, TP. Hồ Chí Minh / GPĐKKD số 0311609355 do Sở KHĐT TP.HCM cấp ngày 08/03/2012.<br /> GP số 47/GP-TTĐT do sở TTTT TP HCM cấp ngày 02/07/2018. Điện thoại: (028)73023456. Email: fptshop@fpt.com.vn. Chịu trách nhiệm nội dung: Nguyễn Trịnh Nhật Linh. </div>
        </div>
    </div>
    
</body>
</html>


