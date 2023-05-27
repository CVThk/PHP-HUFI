<?php
     include('DatabaseHelper.php');
     include('Helper.php');
     $db = new DatabaseHelper();
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $json = file_get_contents('php://input');
        $requestData = json_decode($json, true);
        $iduser = $requestData['iduser'];
        $user = $db->executeReader("SELECT * FROM `tbl_Customer` WHERE `tbl_Customer`.`ID` = ?", array($iduser));
        echo json_encode($user);
     }
?>