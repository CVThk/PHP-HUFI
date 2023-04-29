<?php
    class DatabaseHelper {
        //mysql:host=localhost;dbname=ql_nha_hang
        var $driver = "";
        function __construct($driver){
            $this->driver = $driver;
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
    }
?>