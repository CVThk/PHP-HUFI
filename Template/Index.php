<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<?php
    include('Model.php');

    $t1 = $m1 = $t2 = $m2 = "";
    $kq = "/";
    if(!empty($_POST["txt_tu1"])) {
        $t1 = $_POST["txt_tu1"];
    }
    if(!empty($_POST["txt_mau1"])) {
        $m1 = $_POST["txt_mau1"];
    }
    if(!empty($_POST["txt_tu2"])) {
        $t2 = $_POST["txt_tu2"];
    }
    if(!empty($_POST["txt_mau2"])) {
        $m2 = $_POST["txt_mau2"];
    }
    $ps1 = new PhanSo();
    $ps1->tuSo = $t1;
    $ps1->mauSo = $m1;

    $ps2 = new PhanSo();
    $ps2->tuSo = $t2;
    $ps2->mauSo = $m2;
    if(isset($_POST["btn_cong"])) {
        $p = $ps1->cong($ps2);
        $kq = $p->tuSo."/".$p->mauSo;
    }
    if(isset($_POST["btn_tru"])) {
        $p = $ps1->tru($ps2);
        $kq = $p->tuSo."/".$p->mauSo;
    }
    if(isset($_POST["btn_nhan"])) {
        $p = $ps1->nhan($ps2);
        $kq = $p->tuSo."/".$p->mauSo;
    }
    if(isset($_POST["btn_chia"])) {
        $p = $ps1->chia($ps2);
        $kq = $p->tuSo."/".$p->mauSo;
    }
?>

<body>
<form method="post" action="Index.php">
        <table>
            <tr><td colspan="4">PHÂN SỐ</td></tr>
            <tr>
                <td colspan="2">Nhập tử PS1</td>
                <td colspan="2"><input name="txt_tu1" value="<?php echo $t1 ?>" /></td>
            </tr>
            <tr>
                <td colspan="2">Nhập mẫu PS1</td>
                <td colspan="2"><input name="txt_mau1" value="<?php echo $m1 ?>"/></td>
            </tr>
            <tr>
                <td colspan="2">Nhập tử PS2</td>
                <td colspan="2"><input name="txt_tu2" value="<?php echo $t2 ?>"/></td>
            </tr>
            <tr>
                <td colspan="2">Nhập mẫu PS2</td>
                <td colspan="2"><input name="txt_mau2" value="<?php echo $m2 ?>"/></td>
            </tr>
            <tr>
                <td colspan="2">Kết quả</td>
                <td colspan="2"><input name="txt_kq" value="<?php echo $kq ?>"/></td>
            </tr>
            <tr>
                <td><button name="btn_cong" type="submit">Cộng</button></td>
                <td><button name="btn_tru" type="submit">Trừ</button></td>
                <td><button name="btn_nhan" type="submit">Nhân</button></td>
                <td><button name="btn_chia" type="submit">Chia</button></td>
            </tr>
        </table>
    </form>
</body>
</html>