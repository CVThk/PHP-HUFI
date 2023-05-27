<?php
     include('DatabaseHelper.php');
     $db = new DatabaseHelper();
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $json = file_get_contents('php://input');
        $requestData = json_decode($json, true);
        $idsong = $requestData['idSong'];
        $singers = $db->executeReader("SELECT `tbl_Singer`.* FROM `tbl_SongOfSinger`, `tbl_Singer` WHERE `tbl_SongOfSinger`.`IDSong` = ? and `tbl_Singer`.`ID` = `tbl_SongOfSinger`.`IDSinger`", array($idsong));
        echo json_encode($singers);
     }
?>