<?php
    class Utilities {
        public static function ucln($a, $b) {
            $x = abs($a);
            $y = abs($b);
            if($x == 0 || $y == 0) return 1;
            while($x != $y) {
                if($x > $y) {
                    $x -= $y;
                }
                if($x < $y) {
                    $y -= $x;
                }
            }
            return $x;
        }
    }

    function readFileTxt($path) {
        $result = "";
        $f = fopen($path, "r");
        while(!feof($f)) {
            $read = fgets($f);
            $result = $result.$read;
        }
        fclose($f);
        return $result;
    }
    function splitToArray($string, $stringSplit) {
        return explode($stringSplit, $string);
    }
?>