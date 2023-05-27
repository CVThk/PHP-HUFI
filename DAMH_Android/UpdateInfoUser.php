<?php
     include('DatabaseHelper.php');
     $db = new DatabaseHelper();
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $json = file_get_contents('php://input');
        $requestData = json_decode($json, true);
        $iduser = $requestData['iduser'];
        $name = $requestData['name'] != "" ? $requestData['name'] : null;
        $gender = $requestData['gender'] != "" ? $requestData['gender'] : null;
        $phonenum = $requestData['phonenum'] != "" ? $requestData['phonenum'] : null;
        echo $iduser.'-'.$name.'-'.$gender.'-'.$phonenum;
        $kq = $db->executeNonQuery('UPDATE `tbl_Customer` SET `tbl_Customer`.`Name` = ?, `tbl_Customer`.`Gender` = ?, `tbl_Customer`.`PhoneNum` = ? WHERE `tbl_Customer`.`ID` = ?', array($name, $gender, $phonenum, $iduser));
        if($kq) {
            echo 'true';
        }
        else {
            echo 'false';
        }
     }
?>