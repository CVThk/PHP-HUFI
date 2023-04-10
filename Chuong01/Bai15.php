<?php
    $f1 = fopen('Data2.txt', 'r');
    $f2 = fopen('Data3.txt', 'a+');
    while(!feof($f1)) {
        fwrite($f2, fgets($f1));
    }
    fclose($f1);
    fclose($f2);

    $f3 = fopen('Data3.txt', 'r');
    while(!feof($f3)) {
        echo '<p>'.fgets($f3).'</p>';
    }
    fclose($f3);
?>