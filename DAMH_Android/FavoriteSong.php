<?php
     include('DatabaseHelper.php');
     $db = new DatabaseHelper();
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $json = file_get_contents('php://input');
        $requestData = json_decode($json, true);
        $iduser = $requestData['iduser'];
        $idsong = $requestData['idsong'];
        $count = $db->executeReader("SELECT COUNT(*) as 'count' FROM `tbl_CusFavoriteSong` WHERE `tbl_CusFavoriteSong`.`IDCustomer` = ? and `tbl_CusFavoriteSong`.`IDSong` = ?", array($iduser, $idsong))[0]->count;
        if($count <= 0) {
            $kq = $db->executeNonQuery("INSERT INTO `tbl_CusFavoriteSong`(IDCustomer, IDSong) VALUES(?, ?)", array($iduser, $idsong));
            $db->executeNonQuery('UPDATE `tbl_Song` SET `tbl_Song`.`QuantityFavorite` = `tbl_Song`.`QuantityFavorite` + 1 WHERE `tbl_Song`.`ID` = ?', array($idsong));
            if($kq) {
                echo 'true';
            }
            else {
                echo 'false';
            }
        }
        else {
            echo 'false';
        }
     }
?>