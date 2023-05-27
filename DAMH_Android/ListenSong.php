<?php
     include('DatabaseHelper.php');
     $db = new DatabaseHelper();
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $json = file_get_contents('php://input');
        $requestData = json_decode($json, true);
        $iduser = $requestData['iduser'];
        $idsong = $requestData['idsong'];
        $count = $db->executeReader("SELECT COUNT(*) as 'count' FROM `tbl_HistoryPlaySong` WHERE `tbl_HistoryPlaySong`.`IDCustomer` = ? and `tbl_HistoryPlaySong`.`IDSong` = ?", array($iduser, $idsong))[0]->count;
        if($count <= 0) {
            date_default_timezone_set("Asia/Bangkok");
            $kq = $db->executeNonQuery("INSERT INTO `tbl_HistoryPlaySong`(IDCustomer, IDSong, DateListen) VALUES(?, ?, ?)", array($iduser, $idsong, time()));
            if($kq) {
                echo 'true';
            }
            else {
                echo 'false';
            }
        }
        else {
            $kq = $db->executeNonQuery("UPDATE `tbl_HistoryPlaySong` SET DateListen = ? WHERE `tbl_HistoryPlaySong`.`IDCustomer` = ? and `tbl_HistoryPlaySong`.`IDSong` = ?", array(time(), $iduser, $idsong));
            if($kq) {
                echo 'true';
            }
            else {
                echo 'false';
            }
        }
     }
?>