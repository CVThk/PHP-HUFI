<?php
    class Hoa {
        public $IDCD;
        public $ID;
        public $Hinh;
        public $Gia;
        public $Text;
        function Hoa() {}
    }
    session_start();
    $idcd = $_GET["idcd"];
    $arrHoaAll = $_SESSION["ArrayHoaAll"];
    $arrCD = $_SESSION["ArrayCD"];
    // print_r($arrHoaAll);
    // echo '<br/>';
    // print_r($arrHoaAll[0]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Danh Sách Hoa Theo Chủ Đề</title>
</head>
<body>
    <div style="font-weight: bold; color:brown; padding:20px; text-transform: uppercase; font-size: 26px; text-align: center;"><?php echo $arrCD[$idcd] ?></div>
    <div class="container">
        <div class="row">
            <?php
                foreach($arrHoaAll as $hoa){
                    if($hoa->IDCD == $idcd) {
                        echo '<div class="col-md-4" style="margin:10px 0;">
                                <div style="border:1px solid #333;padding:30px 10px; background-color:#B3E5BE;">
                                    <div style="padding:10px 0; text-align:center; margin-top:10px; background-color:orange; font-weight:bold; color:white; text-transform:uppercase;">
                                        '.$hoa->Text.'
                                    </div>
                                    <div style="text-align:center; margin:10px 0;min-height:330px;">
                                        <img src="images/'.$hoa->Hinh.'" style="width:100%; object-fit:contain;" />
                                    </div>
                                    <div style="color:blue; font-weight:bold; margin:10px 0;">
                                        Mã SP: '.$hoa->ID.'
                                    </div>
                                    <div style="color:red; font-weight:bold;">
                                        Giá: '.$hoa->Gia.'
                                    </div>
                                </div>
                            </div>';
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>