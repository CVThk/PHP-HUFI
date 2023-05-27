<?php
     include('DatabaseHelper.php');
     $db = new DatabaseHelper();
     $singers = $db->executeReader('SELECT * FROM `tbl_Singer`');
     echo json_encode($singers);
?>