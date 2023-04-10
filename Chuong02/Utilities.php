<?php
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