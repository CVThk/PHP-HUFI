<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 10</title>
</head>
<body>
    <?php $meal = array('breakfast' => 'Bread and milk', 'lunch' => 'Rice', 'dinner' => 'Instance Noodle') ?>
    <table>
        <?php
            foreach($meal as $key => $value) {
                print
                "<tr>
                    <td>$key</td>
                    <td>$value</td>
                </tr>";
            }
        ?>
    </table>
</body>
</html>