<?php

require 'Helper.php';

// $pl = splitToArray(readFileTxt('PlayList_NhacTre.txt'), '$$$');
// $pl = splitToArray(readFileTxt('PlayList_AuMy.txt'), '$$$');
// $pl = splitToArray(readFileTxt('PlayList_EDMViet.txt'), '$$$');
// $pl = splitToArray(readFileTxt('PlayList_EDM.txt'), '$$$');
// $pl = splitToArray(readFileTxt('PlayList_HanQuoc.txt'), '$$$');
// $pl = splitToArray(readFileTxt('PlayList_RapViet.txt'), '$$$');
$pl = splitToArray(readFileTxt('PlayList_NhacPhimVN.txt'), '$$$');
unset($pl[0]);
// check

$strInsert = 'INSERT INTO tbl_PlayList(ID, Name, Image) VALUES';
$i = 0;
$arrID = [];
foreach($pl as $item) {
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
    $strInsert .= "('".$id."','".$arr[0]."','".$arr[1]."')";
}

echo $strInsert;
?>