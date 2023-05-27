<?php
    include('DatabaseHelper.php');
    session_start();
    $arr = (isset($_SESSION["cart_items"])) ? $_SESSION["cart_items"] : [];
    if(isset($_GET["masp"]) && isset($_GET["amount"])){
        $id = $_GET["masp"];
        $amount = $_GET["amount"];
        $index = -1;
        for($i = 0; $i < count($arr); $i++) {
            if($arr[$i]["masp"] == $id) {
                $index = $i;
                break;
            }
        }

        if($index != -1) {
            $arr[$index]["so_luong"] += $amount;
        }
        else {
            $db = new DatabaseHelper();
            $sps = $db->executeReader('SELECT * FROM sanpham');
            foreach($sps as $sp) {
                if($sp->MaSP == $id) {
                    $arr[] = array(
                        "masp" => $sp->MaSP,
                        "tensp" => $sp->TenSP,
                        "hinh_anh" => $sp->Anh,
                        "gia" => $sp->GiaBan,
                        "so_luong" => $amount
                    );
                }
            }
        }
        $_SESSION["cart_items"] = $arr;
        header("Location: ./Cart.php");
    }
?>