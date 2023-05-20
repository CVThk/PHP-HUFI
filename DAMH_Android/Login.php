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
        $count = $db->executeReader("SELECT COUNT(*) as 'count' FROM `tbl_Account` WHERE `tbl_Account`.`Username` = '".$username."' and `tbl_Account`.`Password` = '".$password."'")[0]->count;
        header('Content-Type: application/json');
        echo $count;
        if($count <= 0) {
            http_response_code(404);
            echo json_encode(["error" => 404, "token" => ""]);
        }
        else {
            $arr = $db->executeReader('SELECT * FROM `tbl_Customer` WHERE `tbl_Customer`.`Username` = ?', array($username));
            if(count($arr) > 0) {
                http_response_code(200);
                $content = json_encode($arr[0]);
                echo jwt($content);
            }
            else {
                http_response_code(404);
                echo json_encode(["error" => 404, "token" => ""]);
            }
        }
     }
?>