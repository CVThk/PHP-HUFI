<?php
    include('DatabaseHelper.php');
    include('Helper.php');
    $db = new DatabaseHelper();
     $idsong = '';
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $json = file_get_contents('php://input');
        $requestData = json_decode($json, true);
        $token = $requestData['token'];
        $arr = parseJWT($token);
        $user = $db->executeReader('SELECT * FROM `tbl_Customer` WHERE `tbl_Customer`.`Username` = ?', array($arr->Username))[0];
        echo json_encode($user);
     }
?>