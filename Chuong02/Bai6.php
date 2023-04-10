<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Bai 6</title>
    <style>
        p {
            margin:0;
            font-weight: bold;
        }
        a {
            text-decoration: none;
        }
    </style>
</head>
<body style="padding:20px 20%;">
    <?php
        $id = 0;
        if(isset($_GET["id"])) {
            $_GET["id"] == null ? $id = 0 : $id = $_GET["id"];
        }
        include("../Utilities.php");
        include("TinTuc.php");
        $path = "Tin_tuc.txt";
        $stringFile = readFileTxt($path);
        $items = splitToArray($stringFile, "/*");
        // print_r($items);
        unset($items[0]);
        $tinTucs = [];
        foreach($items as $key=>$value) {
            $item = splitToArray($value, "|");
            $tinTuc = new TinTuc($item[0], $item[1], $item[2], $item[3]);
            $tinTucs[] = $tinTuc;    
        }
        // print_r($tinTucs);
        
        foreach($tinTucs as $tinTuc) {
            ?>
            <div>
                <img src="images/<?php echo $tinTuc->hinh; ?>" style="float:left; width:15%; margin-right: 10px; margin-bottom: 6px;" />
                <p style="text-transform: uppercase; color:brown;"><?php echo $tinTuc->tieuDe; ?></p>
                <?php
                    if($id == 0 || $id != $tinTuc->ma) {
                        ?>
                        <span><?php echo substr($tinTuc->noiDung, 0, 300); ?></span>
                        <a href="Bai6.php?id=<?php echo $tinTuc->ma ?>">[Xem chi tiết]</a>
                    <?php
                    }
                    else {
                        ?>
                        <span><?php echo $tinTuc->noiDung; ?></span>
                        <?php
                    }
                ?>
            </div>
            <hr style="clear:both; margin-top:5px; border-width: 2px;" />
        <?php
        }
    ?>
    
</body>
</html>