<?php
    session_start();
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
    <title>Bài 18 B</title>
</head>
<body>
    <?php
        class Hoa {
            public $IDCD;
            public $ID;
            public $Hinh;
            public $Gia;
            public $Text;
            function Hoa() {}
        }
        $document = new DOMDocument();
        $document->load("Hoa_theo_chu_de2.xml");
        $root = $document->documentElement;
        $arrNodeCD = $root->childNodes;
        $arrCD;
        $arrHoaAll;

        foreach($arrNodeCD as $node) {
            if($node->nodeType == XML_ELEMENT_NODE) {
                $idCD = $node->getAttribute('ID');
                $arrCD[$idCD] = $node->getAttribute("TenCD");
                // print_r($arrCD);
                // echo '<br/>';
                $arrCDChil = $node->childNodes;
                foreach($arrCDChil as $chil) {
                    if($chil->nodeType == XML_ELEMENT_NODE) {
                        $hoa = new Hoa();
                        $hoa->IDCD = $idCD;
                        $hoa->ID = $chil->getAttribute('ID');
                        $hoa->Hinh = $chil->getAttribute('Hinh');
                        $hoa->Gia = $chil->getAttribute('Gia');
                        $hoa->Text = $chil->nodeValue;
                        $arrHoaAll[] = $hoa;
                    }
                }
            }
        }
        $_SESSION["ArrayHoaAll"] = $arrHoaAll;
        $_SESSION["ArrayCD"] = $arrCD;
        // print_r($arrHoaAll);
    ?>
    <div style="font-weight: bold; color:brown; padding:20px; text-transform: uppercase; font-size: 16px;">Hoa theo chủ đề</div>
    <ul style="list-style: none;">
        <?php
            foreach($arrCD as $key=>$value) {
                echo '<li>
                        <a href="XuLyBai18b.php?idcd='.$key.'">'.$value.'</a>
                    </li>';
                echo '<p style="margin:0;">--------------------------------</p>';
            }
        ?>
    </ul>
</body>
</html>

    