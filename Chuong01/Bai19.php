<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 19</title>
</head>
<body>
    <?php
        $arr = array("#1"=>"Trang chủ", "#2"=>"Giới thiệu", "#3"=>"Sản phẩm tiêu biểu", 
        "#4"=>"Tin tức", "#5"=>"Liên hệ", "#6"=>"Album");
        $document = new DOMDocument('1.0', 'utf-8');
        $root = $document->createElement('Menus');
        $document->appendChild($root);
        foreach($arr as $key=>$value) {
            $node = $document->createElement('Menu');
            $node->nodeValue = $value;
            $node->setAttribute('link', $key);
            $root->appendChild($node);
        }
        $path = 'files/XML_TaoMoiFile.xml';
        $document->save($path);
    ?>
</body>
</html>