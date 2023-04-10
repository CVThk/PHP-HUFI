<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Bài 17 B</title>
</head>
<body>
    <?php
        $document = new DOMDocument();
        $document->load("Hoa_theo_chu_de.xml");
        $root = $document->documentElement;
        $arrNode = $root->childNodes;
    ?>
    <div class="container">
        <div class="row">
            <?php
                foreach($arrNode as $node){
                    if($node->nodeType == XML_ELEMENT_NODE) {
                        echo '<div class="col-md-4" style="margin:10px 0;">
                                <div style="border:1px solid #333;padding:30px 10px; background-color:#B3E5BE;">
                                    <div style="padding:10px 0; text-align:center; margin-top:10px; background-color:orange; font-weight:bold; color:white; text-transform:uppercase;">
                                        '.$node->getAttribute('TenCD').'
                                    </div>
                                    <div style="text-align:center; margin:10px 0;min-height:330px;">
                                        <img src="images/'.$node->getAttribute('Hinh').'" style="width:100%; object-fit:contain;" />
                                    </div>
                                    <div style="color:blue; font-weight:bold; margin:10px 0;">
                                        Mã SP: '.$node->getAttribute('ID').'
                                    </div>
                                    <div style="color:red; font-weight:bold;">
                                        Giá: '.$node->getAttribute('Gia').'
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