<?php
class DatabaseHelper
{
    var $driver = "mysql:host=localhost;dbname=music";
    function __construct()
    {
    }
    function getConnect()
    {
        try {
            $pdo = new PDO($this->driver, "id19853313_cvt", "ctCT@2405");
            $pdo->query("set names utf8");
            return $pdo;
        } catch (PDOException $ex) {
            echo "Lỗi kết nối: " . $ex->getMessage();
            die();
        }
    }
    function executeReader($sql, $param = null)
    {
        $pdo = $this->getConnect();
        $sta = $pdo->prepare($sql);
        if ($param != null) {
            $sta->execute($param);
        } else {
            $sta->execute();
        }
        if ($sta->rowCount() > 0) {
            return $sta->fetchAll(PDO::FETCH_OBJ);
        }
        $pdo = null;
        return [];
    }
    function executeNonQuery($sql, $param = null)
    {
        $pdo = $this->getConnect();
        $pdo->beginTransaction();
        $sta = $pdo->prepare($sql);
        if ($param != null) {
            $kq = $sta->execute($param);
        } else {
            $kq = $sta->execute();
        }
        $pdo->commit();
        $pdo = null;
        return $kq;
    }
}
?>