<?php
     require "DatabaseHelper.php";
     require "Helper.php";
     $db = new DatabaseHelper();
     $idsong = '';
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $json = file_get_contents('php://input');
        $requestData = json_decode($json, true);
        $username = $requestData['username'];
        $password = $requestData['password'];
        $password = str_replace(' ', '', $password);
        $count = $db->executeReader("SELECT COUNT(*) as 'count' FROM `tbl_Account` WHERE `tbl_Account`.`Username` = '".$username."'")[0]->count;
        
        if($count > 0) {
            echo "false";
        }
        else {
            $db->executeNonQuery('INSERT INTO `tbl_Account`(Username, Password, IDGroupPermission) VALUES(?, ?, 2)', array($username, password($password)));
            $db->executeNonQuery('INSERT INTO `tbl_Customer`(Username) VALUES(?)', array($username));
            echo 'true';
        }
     }
?>