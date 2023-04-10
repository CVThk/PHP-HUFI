<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thời Khoá Biểu</title>
    <style>

        
    </style>

    <?php
        class ThoiKhoaBieu {
            var $thu, $ngay, $tiet, $gio, $mon, $phong, $nhomlop;
        }
        $date = date("d/m/Y");
        if(isset($_GET["date_TKB"])) {
            $date = $_GET["date_TKB"];
        }
        include('Utilities.php');
        $strArr = splitToArray(readFileTxt('TKB.txt'), '/*');
        unset($strArr[0]);
        $arrTKB = [];
        foreach($strArr as $row) {
            $arr = splitToArray($row, '|');
            $tkb = new ThoiKhoaBieu();
            $tkb->thu = $arr[0];
            $tkb->ngay = $arr[1];
            $tkb->tiet = $arr[2];
            $tkb->gio = $arr[3];
            $tkb->mon = $arr[4];
            $tkb->phong = $arr[5];
            $tkb->nhomlop = $arr[6];
            $arrTKB[] = $tkb;
        }
        $arrSang = $arrChieu = $arrToi = [];
        foreach($arrTKB as $tkb) {
            echo "<br>Tách";
            echo json_encode(strtotime('+6 day', strtotime(date('d/m/Y', strtotime($date))))).'<br>';
            echo date('d/m/Y', strtotime($date));
            echo "<br>Tách";
            echo 'kq: '.json_encode(strtotime('+6 day', strtotime(date('d/m/Y', strtotime($date)))) < strtotime('d/m/Y', strtotime(date('d/m/Y', strtotime($date))))).'<br>';
            if(strtotime('d/m/Y', strtotime($tkb->ngay)) >= strtotime('d/m/Y', strtotime(date('d/m/Y', strtotime($date)))) &&
            strtotime('d/m/Y', strtotime($tkb->ngay)) <= strtotime('d/m/Y', strtotime('+6 day', strtotime(date('d/m/Y', strtotime($date)))))) {
                if(strcasecmp($tkb->tiet, "1-5") == 0 || strcasecmp($tkb->tiet, "1-6") == 0) {
                    $arrSang[] = $tkb;
                }
                else if(strcasecmp($tkb->tiet, "7-11") == 0 || strcasecmp($tkb->tiet, "7-12") == 0) {
                    $arrChieu[] = $tkb;
                }
                else if(strcasecmp($tkb->tiet, "13-14") == 0 || strcasecmp($tkb->tiet, "13-15") == 0) {
                    $arrToi[] = $tkb;
                }
            }
        }
    ?>

</head>
<body>
    <h2 style="text-align: center; color:#00F; font-size: 20px; text-transform: uppercase;">thi khoá biểu theo tuần</h2>
    <h3 style="text-align: center;">Giáo viên: NHY</h3>
    <form method="get" action="Bai9_TKB.php">
        <p style="text-align: center;">
            Chọn tuần: <input type="date" value="<?php GLOBAL $date; echo $date; ?>" name="date_TKB" style="margin-right: 50px;" /> <input type="submit" name="btn_submit" value="XEM" />
        </p>
    </form>

    <table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse;">
        <tr bgcolor="#cccccc" height="60">
            <th width="100">Ca học</th>
            <th>Thứ 2 <br style="margin-bottom: 7px;" /><?php echo date('d/m/Y', strtotime($date)); ?></th>
            <th>Thứ 3 <br style="margin-bottom: 7px;" /><?php echo date('d/m/Y', strtotime('+1 day', strtotime($date))); ?></th>
            <th>Thứ 4 <br style="margin-bottom: 7px;" /><?php echo date('d/m/Y', strtotime('+2 day', strtotime($date))); ?></th>
            <th>Thứ 5 <br style="margin-bottom: 7px;" /><?php echo date('d/m/Y', strtotime('+3 day', strtotime($date))); ?></th>
            <th>Thứ 6 <br style="margin-bottom: 7px;" /><?php echo date('d/m/Y', strtotime('+4 day', strtotime($date))); ?></th>
            <th>Thứ 7 <br style="margin-bottom: 7px;" /><?php echo date('d/m/Y', strtotime('+5 day', strtotime($date))); ?></th>
            <th>Chủ Nhật <br style="margin-bottom: 7px;" /><?php echo date('d/m/Y', strtotime('+6 day', strtotime($date))); ?></th>
        </tr>
        <tr>
            <th bgcolor="#ffffcc">Sáng</th>
            <?php
                $thu = 2;
                for($i = 0; $i < count($arrSang); $i++) {
                    if($arrSang[$i]->thu == $thu) {
            ?>
                        <td>
                            <div class="dds">
                                <?php echo "<b>".$arrSang[$i]->mon."</b><br/>".$arrSang[$i]->nhomlop."<br/>".$arrSang[$i]->tiet."<br/>"
                                .$arrSang[$i]->gio."<br/>".$arrSang[$i]->phong."<br/>"; $thu++; ?>
                            </div>
                        </td>
                        <?php
                    }
                    else {
                        ?>
                        <td>
                            - <?php $thu++; $i-=1; ?>
                        </td>
                        <?php
                    }
                }
                        ?>
        </tr>
    </table>

</body>
</html>