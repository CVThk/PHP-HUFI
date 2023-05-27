<?php
     include('DatabaseHelper.php');
     include('Helper.php');
     $db = new DatabaseHelper();
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $json = file_get_contents('php://input');
        $requestData = json_decode($json, true);
        $idplaylist = $requestData['idplaylist'];
        $songs = $songs = $db->executeReader('SELECT `tbl_Song`.`ID`, `tbl_Song`.`Name`, `tbl_Song`.`Image`, `tbl_Song`.`Link`, `tbl_Song`.`QuantityFavorite`
                                                FROM `tbl_Song`, `tbl_SongOfPlayList`, `tbl_PlayList`
                                                WHERE `tbl_Song`.`ID` = `tbl_SongOfPlayList`.`IDSong` and `tbl_SongOfPlayList`.`IDPlayList` = `tbl_PlayList`.`ID` and `tbl_PlayList`.`ID` = ?', array($idplaylist));
        echo json_encode($songs);
     }
?>