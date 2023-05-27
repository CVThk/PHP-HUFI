<?php
     include('DatabaseHelper.php');
     include('Helper.php');
     $db = new DatabaseHelper();
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $json = file_get_contents('php://input');
        $requestData = json_decode($json, true);
        $search = convertVietnameseToLatin($requestData['search']);
        $songs = $db->executeReader("SELECT `tbl_Song`.`ID`, `tbl_Song`.`Name`, `tbl_Song`.`Image`, `tbl_Song`.`Link`, `tbl_Song`.`QuantityFavorite` FROM `tbl_Song` WHERE `tbl_Song`.`Search` LIKE '%".$search."%'");
        echo json_encode($songs);
     }
?>