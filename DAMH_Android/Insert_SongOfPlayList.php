<?php
require 'DatabaseHelper.php';
require 'Helper.php';

$db = new DatabaseHelper();


// $bh = splitToArray(readFileTxt('MusicList_AuMy.txt'), '$$$');
// $bh = splitToArray(readFileTxt('MusicList_NoiBat.txt'), '$$$');
$bh = splitToArray(readFileTxt('MusicList_HanQuoc.txt'), '$$$');
unset($bh[0]);
// check
$arrID = [];
$strInsert = 'INSERT INTO tbl_Song(ID, Name, Image, Link) VALUES';
$strInsert_BHPL = 'INSERT INTO `tbl_SongOfPlayList`(IDSong, IDPlayList) VALUES';
//$idPL = createID('Top 100 bài hát nhạc trẻ hay nhất');
//$idPL = createID('Top 100 pop âu mỹ');
$idPL = createID('Top 100 Hàn Quốc');
$i = 0;
foreach($bh as $item) {
    if($i > 0) {
        $strInsert .= ',';
        $strInsert_BHPL .= ',';
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
    $strInsert .= "('".$id."','".$arr[0]."','".(trim($arr[3], "\r\n"))."','".$arr[2]."')";
    $strInsert_BHPL .= "('".$id."','".$idPL."')";

    if(count($db->executeReader('SELECT * FROM tbl_Song WHERE ID = ?', array($id))) > 0) {
        echo '<b>T: '.$id.'</b>';
    }
    else {
        echo '<b style="color:red;">T: '.$id.'</b>';
    }
}
// $result = ['value' => $strInsert];
// echo json_encode($result);
echo $strInsert;
echo '<br /><br />';
echo $strInsert_BHPL;

//ALTER TABLE `tbl_SongOfPlayList` DROP FOREIGN KEY `FK_SOPL_PlayList`;