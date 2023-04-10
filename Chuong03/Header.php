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
            <form action="Bai9.php" method="post" style="display: flex; align-items: center; justify-content: space-between; width:100%;">
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
                    <input class="form-control mr-2 w-25" type="text" placeholder="Search" aria-label="Search" name="txt_Search">
                    <button type="submit" class="btn btn-outline-dark">Search</button>
                    <a href="Cart.php" style="color:#fff;">
                        <i class="bi bi-cart4" style="font-size: 30px; color:black; display: flex; margin-left: 8px;"></i>
                        <span style="position: absolute;top: 20%; right: 2%;">
                            <?php
                                echo (isset($_SESSION["cart_items"]) && count($_SESSION["cart_items"])) > 0 ? count($_SESSION["cart_items"]) : "";
                            ?>
                        </span>
                    </a>
                </div>
            </form>
        </div>
    </nav>
</div>