<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai 7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        p {
            margin:0;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <?php
        include("../Utilities.php");
        include("Hoa.php");
        $path = "hoa.txt";
        $resultString = readFileTxt($path);
        $arrString = splitToArray($resultString, "/*");
        $hoas = [];
        unset($arrString[0]);
        foreach($arrString as $key=>$value) {
            $itemHoa = splitToArray($value, "|");
            $hoa = new Hoa();
            $hoa->maHoa = $itemHoa[0];
            $hoa->maLoai = $itemHoa[1];
            $hoa->tenHoa = $itemHoa[2];
            $hoa->tenLoai = $itemHoa[3];
            $hoa->gia = $itemHoa[4];
            $hoa->hinh = $itemHoa[5];
            $hoa->noiDung = $itemHoa[6];
            $hoa->t = $itemHoa[7];
            $hoas[] = $hoa;
        }
    ?>
    <h2 style="text-transform: uppercase; color:blue; text-align: center; margin-top:20px;">hiển thị tất cả sản phẩm hoa</h2>
    <div class="row" style="justify-content: center;">
        <?php
            foreach($hoas as $hoa) {
                ?>
                <div class="col-md-3" style="border-radius: 4px; border:1px solid red;display:flex; align-items: center; margin:10px; padding:10px;">
                    <img src="B7_images/<?php echo $hoa->hinh; ?>" style="width:30%; margin-right:10px;" />
                    <div>
                        <p style="color:red;"><span style="font-weight: bold; color:black;">Mã hoa: </span><?php echo $hoa->maHoa; ?></p>
                        <p style="color:red;"><span style="font-weight: bold; color:black;">Mã loại: </span><?php echo $hoa->maLoai; ?></p>
                        <p style="color:red;"><span style="font-weight: bold; color:black;">Tên hoa: </span><?php echo $hoa->tenHoa; ?></p>
                        <p style="color:red;"><span style="font-weight: bold; color:black;">Tên loại: </span><?php echo $hoa->tenLoai; ?></p>
                        <p style="color:red;"><span style="font-weight: bold; color:black;">Nội dung: </span><?php echo $hoa->noiDung; ?></p>
                        <p style="color:red;"><span style="font-weight: bold; color:black;">Đơn giá: </span><?php echo $hoa->gia; ?></p>
                    </div>
                </div>
                <?php
            }
        ?>
    </div>


</body>
</html>