<?php
     require "DatabaseHelper.php";
     require "Helper.php";
     $db = new DatabaseHelper();
     $songs = $db->executeReader('SELECT * FROM tbl_Song');
     foreach($songs as $song) {
        $url = '';
        echo substr($song->Link, 0, 9).'<br/>';
        if(substr($song->Link, 0, 7) === 'http://') {
            $url = str_replace('http://', 'https://', $song->Link);
            $db->executeNonQuery('UPDATE tbl_Song SET Link = ? WHERE ID = ?', array($url, $song->ID));
        }
     }
?>