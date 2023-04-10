<?php
    function isNumber($value) {
        return is_numeric($value);
    }
    function isEmpty($value) {
        return $value == ""; 
    }
    function giaiPhuongTrinhBacNhat($a, $b) {
        $x = "";
        if($a == 0) {
            if($b == 0){
                $x = "Vô số nghiệm";
            }
            else $x = "Vô nghiệm";
        }
        else {
            $x = (-1.0 * $b) / $a;
        }
        return $x;
    }
?>