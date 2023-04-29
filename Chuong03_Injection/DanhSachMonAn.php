<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap 4-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.0/dist/bootstrap-validate.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <title>Danh Sách Món Ăn</title>
    <style>
        body {
            background-color: #ffe7cc;
        }
        h1 {
            text-align: center;
            color: #f00;
        }
        #main {
            width:800px;
            margin:0 auto;
            margin-top: 10px;
            padding: 10px;
            border: 2px solid #906;
            background-color: #fff;
        }
    </style>
</head>
<?php
    include("Connection.php");
    $sql = 'SELECT * FROM mon_an';
    $sta = $pdo->prepare($sql);
    $sta->execute();
    if($sta->rowCount() > 0) {
        $mon_an = $sta->fetchAll(PDO::FETCH_OBJ);
    }
?>
<body>
    <div id="main">
        <h1>DANH SÁCH MÓN ĂN</h1>
        <div class="row">
        <?php
            $i = 1;
            foreach($mon_an as $mon) {
                ?>
                <div class="col-4 mb-4">
                    <div style="padding: 4px; font-weight: bold; text-align: center; border: 1px solid #000; min-height: 450px; <?php if($i % 2 != 0) { echo "background-color: #b4b4b4;"; } ?>">
                        <div>
                            <img style="height:150px; max-width: 100%;" src="image_MonAn/<?php echo $mon->hinh; ?>" />
                        </div>
                        <h3><?php echo $mon->ten_mon ?></h3>
                        <p><?php echo $mon->noi_dung_tom_tat ?></p>
                        <p><span style="color:#f00;"><?php echo number_format($mon->don_gia, 0, ',', '.') ?> VNĐ</span></p>
                    </div>
                </div>
                <?php
                $i++;
            }
        ?>
        </div>
    </div>
</body>
</html>