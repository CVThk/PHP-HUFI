<?php
     include('DatabaseHelper.php');
     include('Helper.php');
     $db = new DatabaseHelper();
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $json = file_get_contents('php://input');
        $requestData = json_decode($json, true);
        $search = convertVietnameseToLatin($requestData['search']);
        $playlists = $db->executeReader("SELECT * FROM `tbl_PlayList` WHERE `tbl_PlayList`.`Search` LIKE '%".$search."%'");
        echo json_encode($playlists);
     }
?>