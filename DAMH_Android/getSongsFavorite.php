<?php
     include('DatabaseHelper.php');
     $db = new DatabaseHelper();
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $json = file_get_contents('php://input');
        $requestData = json_decode($json, true);
        $iduser = $requestData['iduser'];
        $songs = $db->executeReader("SELECT `tbl_Song`.* FROM `tbl_Customer`, `tbl_CusFavoriteSong`, `tbl_Song` WHERE `tbl_Customer`.`ID` = ? and `tbl_Customer`.`ID` = `tbl_CusFavoriteSong`.`IDCustomer` and `tbl_CusFavoriteSong`.`IDSong` = `tbl_Song`.`ID`", array($iduser));
        echo json_encode($songs);
     }
?>