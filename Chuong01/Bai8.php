<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 8</title>
    <style>
        a {
            color: black;
            text-decoration: none;
        }

        .item {
            display: flex;
            align-items: center;
        }

        .item>div:first-child {
            min-width: 100px;
        }

        .item>div:nth-child(2) {
            margin: 0 10px;
        }
    </style>
</head>

<body>
    <div>
        <a href="Bai8.php?name=cps&money=12000" class="item">
            <div>Cà phê sữa</div>
            <div>..........</div>
            <div><?php echo number_format(12000, 0, ',', '.') . "đ" ?></div>
        </a>
        <a href="Bai8.php?name=cpd&money=10000" class="item">
            <div>Cà phê đá</div>
            <div>..........</div>
            <div><?php echo number_format(10000, 0, ',', '.') . "đ" ?></div>
        </a>
        <a href="Bai8.php?name=sd&money=8000" class="item">
            <div>Sting dâu</div>
            <div>..........</div>
            <div><?php echo number_format(8000, 0, ',', '.') . "đ" ?></div>
        </a>
        <a href="Bai8.php?name=td&money=2000" class="item">
            <div>Trà đá</div>
            <div>..........</div>
            <div><?php echo number_format(2000, 0, ',', '.') . "đ" ?></div>
        </a>
    </div>
    <div class="result">
        <?php
        $name = (isset($_GET["name"])) ? $_GET["name"] : "";
        $money = (isset($_GET["money"])) ? $_GET["money"] : 0;
        switch ($name) {
            case "":
                break;
            case "cps":
                echo "<p>Bạn đang chọn: Cà phê sữa</p>";
                break;
            case "cpd":
                echo "<p>Bạn đang chọn: Cà phê đá</p>";
                break;
            case "sd":
                echo "<p>Bạn đang chọn: Sting dâu</p>";
                break;
            case "td":
                echo "<p>Bạn đang chọn: Trà đá</p>";
                break;
        }
        if (!empty($name)) {
            echo "<p>Bạn phải thanh toán: " . number_format($money, 0, ',', '.') . "đ</p>";
        }
        ?>
    </div>

</body>

</html>