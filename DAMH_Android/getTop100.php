<?php
     require "DatabaseHelper.php";
     $db = new DatabaseHelper();
     $types = ($db->executeReader('SELECT `tbl_TypePlayList`.* FROM `tbl_TypePlayList`, `tbl_TypeOfPlayList` WHERE `tbl_TypePlayList`.`ID` = `tbl_TypeOfPlayList`.`IDTypePlayList` GROUP BY `tbl_TypePlayList`.`ID`'));
     foreach($types as $type) {
          $playlists = $db->executeReader('SELECT `tbl_PlayList`.*
                                                FROM `tbl_TypeOfPlayList`, `tbl_PlayList` 
                                                WHERE `tbl_TypeOfPlayList`.`IDPlayList` = `tbl_PlayList`.`ID` and `tbl_TypeOfPlayList`.`IDTypePlayList` = ?', array($type->ID));
          foreach($playlists as $playlist) {
               $songs = $db->executeReader('SELECT `tbl_Song`.`ID`, `tbl_Song`.`Name`, `tbl_Song`.`Image`, `tbl_Song`.`Link`, `tbl_Song`.`QuantityFavorite`
                                             FROM `tbl_Song`, `tbl_SongOfPlayList`, `tbl_PlayList`
                                             WHERE `tbl_Song`.`ID` = `tbl_SongOfPlayList`.`IDSong` and `tbl_SongOfPlayList`.`IDPlayList` = `tbl_PlayList`.`ID` and `tbl_PlayList`.`ID` = ?', array($playlist->ID));
               $playlist->songs = $songs;
          }
          $type->playlists = $playlists;
     }
     echo json_encode($types);

     //`tbl_Song`.`ID`, `tbl_Song`.`Name`, `tbl_Song`.`Image`, `tbl_Song`.`Link`, `tbl_Song`.`QuantityFavorite`
?>