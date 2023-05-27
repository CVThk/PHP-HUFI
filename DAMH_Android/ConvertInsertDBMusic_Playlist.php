<?php

require 'Helper.php';

// $pl = splitToArray(readFileTxt('PlayList_NhacTre.txt'), '$$$');
// $pl = splitToArray(readFileTxt('PlayList_AuMy.txt'), '$$$');
// $pl = splitToArray(readFileTxt('PlayList_EDMViet.txt'), '$$$');
// $pl = splitToArray(readFileTxt('PlayList_EDM.txt'), '$$$');
// $pl = splitToArray(readFileTxt('PlayList_HanQuoc.txt'), '$$$');
// $pl = splitToArray(readFileTxt('PlayList_RapViet.txt'), '$$$');
// $pl = splitToArray(readFileTxt('PlayList_NhacPhimVN.txt'), '$$$');
// $pl = splitToArray(readFileTxt('PlayList_NhacTrinh.txt'), '$$$');
// $pl = splitToArray(readFileTxt('PlayList_NhacThieuNhi.txt'), '$$$');
// $pl = splitToArray(readFileTxt('PlayList_NhacCachMang.txt'), '$$$');
// $pl = splitToArray(readFileTxt('PlayList_CaiLuong.txt'), '$$$');
// $pl = splitToArray(readFileTxt('PlayList_QueHuong.txt'), '$$$');
$pl = splitToArray(readFileTxt('PlayList_NhacKhongLoiVN.txt'), '$$$');
unset($pl[0]);
// check

$strInsert = 'INSERT INTO tbl_PlayList(ID, Name, Image, Search) VALUES';
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
    $strInsert .= "('".$id."','".$arr[0]."','".$arr[1]."','".strtolower(convertVietnameseToLatin($arr[0]))."')";
}

echo $strInsert;
?>