<?php
    session_start();
    $arr = (isset($_SESSION["cart_items"])) ? $_SESSION["cart_items"] : [];
    if(isset($_GET["maMon"]) && isset($_GET["amount"])){
        $id = $_GET["maMon"];
        $amount = $_GET["amount"];
        $index = -1;
        for($i = 0; $i < count($arr); $i++) {
            if($arr[$i]["ma_mon"] == $id) {
                $index = $i;
                break;
            }
        }

        if($index != -1) {
            $arr[$index]["so_luong"] += $amount;
        }
        else {
            $pdo = new PDO("mysql:host=localhost;dbname=ql_nha_hang", "root", "");
            $pdo->query("set names utf8");
            $sql = "select * from mon_an";
            $mon_an = $pdo->query($sql);
            foreach($mon_an as $mon) {
                if($mon[0] == $id) {
                    $arr[] = array(
                        "ma_mon" => $mon[0],
                        "ten_mon" => $mon[2],
                        "hinh_anh" => $mon[8],
                        "gia" => $mon[5],
                        "so_luong" => $amount
                    );
                }
            }
        }
        $_SESSION["cart_items"] = $arr;
        header("Location: ./Cart.php");
    }
?>