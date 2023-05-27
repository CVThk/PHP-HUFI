<?php
require 'DatabaseHelper.php';
require 'Helper.php';

$db = new DatabaseHelper();

// $bh = splitToArray(readFileTxt('MusicList_AuMy.txt'), '$$$');
// $bh = splitToArray(readFileTxt('MusicList_NoiBat.txt'), '$$$');
// $bh = splitToArray(readFileTxt('MusicList_EDMViet.txt'), '$$$');
// $bh = splitToArray(readFileTxt('MusicList_EDM.txt'), '$$$');
// $bh = splitToArray(readFileTxt('MusicList_HanQuoc.txt'), '$$$');
// $bh = splitToArray(readFileTxt('MusicList_RapViet.txt'), '$$$');
// $bh = splitToArray(readFileTxt('MusicList_NhacPhimVN.txt'), '$$$');
// $bh = splitToArray(readFileTxt('MusicList_NhacTreBoSung.txt'), '$$$');
// $bh = splitToArray(readFileTxt('MusicList_NhacTrinh.txt'), '$$$');
// $bh = splitToArray(readFileTxt('MusicList_NhacThieuNhi.txt'), '$$$');
// $bh = splitToArray(readFileTxt('MusicList_NhacCachMang.txt'), '$$$');
// $bh = splitToArray(readFileTxt('MusicList_CaiLuong.txt'), '$$$');
// $bh = splitToArray(readFileTxt('MusicList_QueHuong.txt'), '$$$');
$bh = splitToArray(readFileTxt('MusicList_NhacKhongLoiVN.txt'), '$$$');
$queryCasi = 'SELECT `tbl_Singer`.`ID` FROM `tbl_Singer` WHERE `tbl_Singer`.`Name` = ?';
unset($bh[0]);
// check
$arrID = [];
$strInsert = 'INSERT INTO tbl_Song(ID, Name, Image, Link, Search) VALUES';
$strInsert_BHCS = 'INSERT INTO tbl_SongOfSinger(IDSong, IDSinger) VALUES';
$strInsert_BHPL = 'INSERT INTO `tbl_SongOfPlayList`(IDSong, IDPlayList) VALUES';
// $idPL = createID('Top 100 bài hát nhạc trẻ hay nhất');
// $idPL = createID('Top 100 bài hát nhạc trịnh hay nhất');
// $idPL = createID('Top 100 Nhạc Thiếu Nhi');
// $idPL = createID('Top 100 Nhạc Cách Mạng');
// $idPL = createID('Top 100 Nhạc Cải Lương');
// $idPL = createID('Top 100 Nhạc Quê Hương');
$idPL = createID('Top 100 Nhạc Không Lời Việt Nam');
// $idPL = createID('Top 100 pop âu mỹ');
// $idPL = createID('Top 100 EDM Việt');
// $idPL = createID('Top 100 Hàn Quốc');
// $idPL = createID('Top 100 EDM');
// $idPL = createID('Top 100 Rap Việt');
// $idPL = createID('Top 100 nhạc phim Việt Nam');

$i = 0;
foreach($bh as $item) {
    if($i > 0) {
        $strInsert .= ',';
        $strInsert_BHCS .= ',';
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
    $strInsert .= "('".$id."','".$arr[0]."','".(trim($arr[3], "\r\n"))."','".$arr[2]."','".strtolower(convertVietnameseToLatin($arr[0]))."')";
    $strInsert_BHPL .= "('".$id."','".$idPL."')";

    if(count($db->executeReader('SELECT * FROM tbl_Song WHERE ID = ?', array($id))) > 0) {
        echo '<b>T: '.$id.'</b>';
    }
    else {
        echo '<b style="color:red;">T: '.$id.'</b>';
    }

    $casis = splitToArray($arr[1], '^');
    $j = 0;
    foreach($casis as $name) {
        if($j > 0) {
            $strInsert_BHCS .= ',';
        }
        $casiSelect = $db->executeReader($queryCasi, array($name));
        // echo $name.'<br/>';
        if(count($casiSelect) <= 0) {
            echo '<b>'.$name.'</b>';
        }
        
        $ma = $casiSelect[0]->ID;
        $strInsert_BHCS .= "('".$id."','".$ma."')";
        $j++;
    }
}

echo $strInsert;
echo '<br /><br />';
echo $strInsert_BHCS;
echo '<br /><br />';
echo $strInsert_BHPL;
?>