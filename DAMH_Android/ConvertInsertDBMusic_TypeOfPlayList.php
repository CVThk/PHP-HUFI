<?php

require 'Helper.php';

$type = splitToArray(readFileTxt('TypeOfPlayList.txt'), '$$$');
unset($type[0]);
// check

$strInsert = 'INSERT INTO tbl_TypePlayList(ID, Name) VALUES';
$i = 0;
$arrID = [];
foreach($type as $item) {
    if($i > 0) {
        $strInsert .= ',';
    }
    $i++;
    $id = createID($item);
    if(in_array($id, $arrID)) {
        echo '<b>'.$id.'</b>';
    }
    else {
        $arrID[] = $id;
    }
    $strInsert .= "('".$id."','".$item."')";
}
// $result = ['value' => $strInsert];
// echo json_encode($result);
echo $strInsert;
?>