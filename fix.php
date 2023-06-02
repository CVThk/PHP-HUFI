<?php

use DatabaseHelper as GlobalDatabaseHelper;

    class DatabaseHelper {
        //mysql:host=localhost;dbname=ql_nha_hang
        var $driver = "mysql:host=localhost;dbname=bbqtgxkn_cosmeticsstore";
        function __construct(){
        }
        function getConnect() {
            try {
                $pdo = new PDO($this->driver, "root", "");
                $pdo->query("set names utf8");
                return $pdo;
            }
            catch (PDOException $ex) {
                echo "Lỗi kết nối: ".$ex->getMessage();
                die();
            }
        }
        function executeReader($sql, $param = null) {
            $pdo = $this->getConnect();
            $sta = $pdo->prepare($sql);
            if($param != null) {
                $sta->execute($param);
            }
            else {
                $sta->execute();
            }
            if($sta->rowCount() > 0) {
                return $sta->fetchAll(PDO::FETCH_OBJ);
            }
            return [];
        }
        function executeNonQuery($sql, $param = null) {
            $pdo = $this->getConnect();
            $sta = $pdo->prepare($sql);
            if($param != null) {
                $kq = $sta->execute($param);
            }
            else {
                $kq = $sta->execute();
            }
            return $kq;
        }
        function convertVietnameseToLatin($str)
        {
            $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
            $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
            $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
            $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
            $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
            $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
            $str = preg_replace("/(đ)/", 'd', $str);
        
            $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
            $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
            $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
            $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
            $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
            $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
            $str = preg_replace("/(Đ)/", 'D', $str);
            return $str;
        }
    }

    $db = new DatabaseHelper();
    $sps = $db->executeReader('SELECT * FROM `tbl_sanpham`');
    foreach($sps as $sp) {
        $search = strtolower($db->convertVietnameseToLatin($sp->TenSanPham));
        $db->executeNonQuery('UPDATE `tbl_sanpham` SET `tbl_sanpham`.`Search` = ? WHERE `tbl_sanpham`.`Ma` = ?', array($search, $sp->Ma));
    }
?>