<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Câu 2</title>
</head>
<body>
    <?php
        include('Model.php');
        $document = new DOMDocument();
        $document->load("Dien_Thoai.xml");
        $root = $document->documentElement;
        $arrNodeDT = $root->childNodes;
        $result = [];
        foreach($arrNodeDT as $node) {
            if($node->nodeType == XML_ELEMENT_NODE) {
                $id = $node->getAttribute('ID');
                $hinh = $node->getAttribute("Hinh");
                $ten = $node->nodeValue;
                $dt = new DienThoai();
                $dt->id = $id;
                $dt->hinh = $hinh;
                $dt->ten = $ten;
                $result[] = $dt;
            }
        }
    ?>
    <div style="width: 50%; margin:20px auto; border:1px solid #333; padding:20px;">
        <h2 style="text-align: center; text-transform: uppercase; color:#00F;">Danh sách sản phẩm</h2>
        <div class="row">
            <?php
                foreach($result as $item) {
                    ?>
                        <div class="col-4" style="padding:6px 4px;">
                            <div style="border:1px solid #333; border-radius: 4px; padding:4px 6px;">
                                <div style="text-align: center;">
                                    <img src="<?php echo $item->hinh ?>" style="height: 150px; max-width: 100%; object-fit: contain;" />
                                </div>
                                <div>Mã SP: <span style="font-weight: bold; color:#00F;"><?php echo $item->id ?></span></div>
                                <div>Tên SP: <span style="font-weight: bold; color:red;"><?php echo $item->ten ?></span></div>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
</body>
</html>