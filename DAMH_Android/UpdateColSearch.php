<?php
     require "DatabaseHelper.php";
     require "Helper.php";
     $db = new DatabaseHelper();
     $songs = $db->executeReader('SELECT * FROM tbl_PlayList');
     foreach($songs as $song) {
        $url = strtolower(convertVietnameseToLatin($song->Name));
        $db->executeNonQuery('UPDATE tbl_PlayList SET Search = ? WHERE ID = ?', array($url, $song->ID));
     }
?>