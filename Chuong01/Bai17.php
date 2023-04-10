<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 17</title>
</head>
<body>
    <?php
        $document = new DOMDocument();
        $document->load("Hoa_theo_chu_de.xml");
        $root = $document->documentElement;
        $arrNode = $root->childNodes;
    ?>
    <?php
            foreach($arrNode as $node){
                if($node->nodeType == XML_ELEMENT_NODE) {
                    echo '<div><a href="">'.$node->getAttribute('TenCD').'</a></div>';
                }
            }
    ?>
</body>
</html>