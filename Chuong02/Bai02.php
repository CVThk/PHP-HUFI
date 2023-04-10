<?php
    class TinhToan {
        public $a, $b;
        function __construct()
        {
            
        }
        // function __construct($a, $b)
        // {
        //     $this->a = $a;
        //     $this->b = $b;
        // }
        function cong() { return $this->a + $this->b; }
        function tru() { return $this->a - $this->b; }
        function nhan() { return $this->a * $this->b; }
        function chia() { return $this->a / $this->b; }
    }

    $a = $b = "";
    if(!empty($_POST["txtA"])) {
        $a = $_POST["txtA"];
    }
    if(!empty($_POST["txtB"])) {
        $b = $_POST["txtB"];
    }
    $tt = new TinhToan();
    $tt->a = $a;
    $tt->b = $b;
    if(isset($_POST["btn_cong"])) {
        $kq = $tt->cong();
    }
    if(isset($_POST["btn_tru"])) {
        $kq = $tt->tru();
    }
    if(isset($_POST["btn_nhan"])) {
        $kq = $tt->nhan();
    }
    if(isset($_POST["btn_chia"])) {
        $kq = $tt->chia();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai 2</title>
</head>
<body>
    <form method="post" action="Bai02.php">
        <table>
            <tr><td colspan="4">TÍNH TOÁN</td></tr>
            <tr>
                <td>a</td>
                <td colspan="3"><input name="txtA" value="<?php echo $a ?>"/></td>
            </tr>
            <tr>
                <td>b</td>
                <td colspan="3"><input name="txtB" value="<?php echo $b ?>"/></td>
            </tr>
            <tr>
                <td>Kết quả</td>
                <td colspan="3"><input value="<?php GLOBAL $kq; echo $kq; ?>"/></td>
            </tr>
            <tr>
                <td><button type="submit" name="btn_cong">Cộng</button></td>
                <td><button type="submit" name="btn_tru">Trừ</button></td>
                <td><button type="submit" name="btn_nhan">Nhân</button></td>
                <td><button type="submit" name="btn_chia">Chia</button></td>
            </tr>
        </table>
    </form>
</body>
</html>