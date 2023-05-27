<?php
include('DatabaseHelper.php');
$db = new DatabaseHelper();
$user = $db->executeReader('SELECT * FROM `tbl_Customer` WHERE `tbl_Customer`.`ID` = ?', array($_POST['iduser']))[0];

$target_dir = "../Pictures/Users/";
$n = time().'_'.$user->Name.'.png';
$target_file_name = $target_dir .$n;
$response = array();

// Check if image file is a actual image or fake image
if (isset($_FILES["file"])) 
{
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file_name)) 
  {
     $success = true;
     $message = "Successfully Uploaded";
     $db->executeNonQuery('UPDATE `tbl_Customer` SET `tbl_Customer`.`Image` = ? WHERE `tbl_Customer`.`ID` = ?', array($n, $user->ID));
  }
  else 
  {
      $success = false;
      $message = "Error while uploading";
  }
}
else 
{
      $success = false;
      $message = "Required Field Missing";
}
$response["success"] = $success;
$response["message"] = $message;
echo json_encode($response);

?>