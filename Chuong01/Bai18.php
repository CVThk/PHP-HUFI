<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 18</title>
</head>
<body>
    <?php
        $document = new DOMDocument();
        $document->load('Dich_vu_qua.xml');
        $root = $document->documentElement;
        $nodeArray = $root->childNodes;

        foreach($nodeArray as $node){
            if($node->nodeType == XML_ELEMENT_NODE) {
                echo '<div><a href="Bai18.php?ID='.$node->getAttribute('ID').'">'.$node->nodeValue.'</a></div>';
            }
        }
    ?>
</body>
</html>