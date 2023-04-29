<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../Pager/pager.css" rel="stylesheet" />
    <title>Danh Sách Món Ăn</title>
    <style>
        body {
            background-color: #cff;
        }

        h1 {
            text-align: center;
            color: #f00;
        }

        #main {
            width: 700px;
            margin: 0 auto;
            border: 2px solid #906;
            background-color: #fff;
        }

        .khung {
            width: 680px;
            height: 250px;
            border-bottom: #000 solid 1px;
            padding: 10px;
        }

        .khung img {
            width: 250px;
            float: left;
            margin-right: 15px;
        }
    </style>
</head>
<?php
include("../Pager/Pager.php");
include("Connection.php");
$sqlCount = 'SELECT COUNT(*) AS "count" FROM mon_an';
$sta = $pdo->prepare($sqlCount);
$sta->execute();
if ($sta->rowCount() > 0) {
    $count = ($sta->fetchAll(PDO::FETCH_OBJ)[0])->count;
} else {
    $count = 0;
}

$pager = new Pager();
$lim = 3;
$posStart = $pager->getStart($lim);
$maximumPage = $pager->getMaximumPage($count, $lim);

$curPage = $_GET["page"];
$btnPage = $pager->getButtonPage($curPage, $maximumPage);

$sql = "SELECT * FROM mon_an limit $posStart, $lim";
$sta = $pdo->prepare($sql);
$sta->execute();
if ($sta->rowCount() > 0) {
    $mon_an = $sta->fetchAll(PDO::FETCH_OBJ);
}
?>
<body>
    <div id="main">
        <h1>DANH SÁCH MÓN ĂN</h1>
        <?php
        foreach ($mon_an as $mon) {
        ?>
            <div class="khung">
                <img src="image_MonAn/<?php echo $mon->hinh; ?>" />
                <h3><?php echo $mon->ten_mon ?></h3>
                <p><?php echo $mon->noi_dung_tom_tat ?></p>
                <p>Đơn giá: <span style="color:#f00;"><?php echo number_format($mon->don_gia, 0, ',', '.') ?> VNĐ</span></p>
            </div>
        <?php
        }
        ?>

        <?php
        echo $btnPage;
        ?>
    </div>
</body>

</html>