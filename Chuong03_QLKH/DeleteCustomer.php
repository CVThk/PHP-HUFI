<?php
    include("../Helper/DatabaseHelper.php");
    if(isset($_GET["maKH"])) {
        $kq = (new DatabaseHelper("mysql:host=localhost;dbname=ql_nha_hang"))->executeNonQuery("DELETE FROM khach_hang WHERE ma_khach_hang = ?", array($_GET["maKH"]));
        if($kq) {
            header("location:ShowCustomer.php");
        }
        else {
            echo "Xoá thất bại";
        }
    }
    else {
        echo "Xoá thất bại";
    }
?>