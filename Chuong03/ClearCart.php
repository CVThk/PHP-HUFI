<?php
    session_start();
    $_SESSION["cart_items"] = [];
    header("Location: ./Cart.php");
?>