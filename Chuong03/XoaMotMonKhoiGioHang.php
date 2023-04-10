<?php
    session_start();
    $arr = (isset($_SESSION["cart_items"])) ? $_SESSION["cart_items"] : [];
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $index = -1;
        for($i = 0; $i < count($arr); $i++) {
            if($arr[$i]["ma_mon"] == $id) {
                $index = $i;
                break;
            }
        }

        if($index != -1) {
            array_splice($arr, $index, 1);
        }
        $_SESSION["cart_items"] = $arr;
        header("Location: ./Cart.php");
    }
?>