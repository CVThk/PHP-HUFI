<?php
require 'DatabaseHelper.php';
require 'Helper.php';

$db = new DatabaseHelper();


//$CaSi = splitToArray(readFileTxt('AnhCaSi.txt'), '$$$');
// $CaSi = splitToArray(readFileTxt('AnhCaSi_AuMy.txt'), '$$$');
// $CaSi = splitToArray(readFileTxt('AnhCaSi_EDM.txt'), '$$$');
// $CaSi = splitToArray(readFileTxt('AnhCaSi_HanQuoc.txt'), '$$$');
// $CaSi = splitToArray(readFileTxt('AnhCaSi_RapViet.txt'), '$$$');
$CaSi = splitToArray(readFileTxt('AnhCaSi_NhacPhimVN.txt'), '$$$');
// $CaSi = splitToArray(readFileTxt('AnhCaSi_EDMViet.txt'), '$$$');
unset($CaSi[0]);
// check
$arrID = [];
$strInsert = 'INSERT INTO tbl_Singer(ID, Name, Image) VALUES';
$i = 0;
foreach($CaSi as $item) {
    if($i > 0) {
        $strInsert .= ',';
    }
    $i++;
    $arr = splitToArray($item, '|');
    $id = createID($arr[0]);
    if(in_array($id, $arrID)) {
        echo '<b>'.$id.'</b>';
    }
    else {
        $arrID[] = $id;
    }
    $strInsert .= "('".$id."','".$arr[0]."','".(trim($arr[1], "\r\n"))."')";
}
echo $strInsert;
