<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap 4-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.0/dist/bootstrap-validate.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <title>Danh Sách Khách Hàng</title>

    <style>
        td {
            vertical-align: middle !important;
        }
        th {
            text-align: center;
        }
    </style>
</head>
<?php
    include("Connection.php");
    $sql = 'SELECT * FROM khach_hang';
    $sta = $pdo->prepare($sql);
    $sta->execute();
    if($sta->rowCount() > 0) {
        $khach_hang = $sta->fetchAll(PDO::FETCH_OBJ);
    }
?>
<body>
    <div style="width:80%; margin:0 auto;">
        <h1 style="text-align: center; margin-top:40px; margin-bottom:20px;">THÔNG TIN KHÁCH HÀNG</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã KH</th>
                    <th>Tên KH</th>
                    <th>Email</th>
                    <th>Địa Chỉ</th>
                    <th>Điện Thoại</th>
                    <th>Hình</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($khach_hang as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row->ma_khach_hang ?></td>
                            <td><?php echo $row->ten_khach_hang ?></td>
                            <td><?php echo $row->email ?></td>
                            <td><?php echo $row->dia_chi ?></td>
                            <td><?php echo $row->dien_thoai ?></td>
                            <td style="text-align: center;"><img style="width:30px; object-fit:contain;" src="image/<?php echo $row->hinh ?>" /></td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
        <p>Số lượng khách hàng: <?php echo isset($khach_hang) ? count($khach_hang) : 0 ?></p>
    </div>
</body>
</html>