<?php
    if(isset($_POST["upload"])) {
        if($_FILES["image"]["tmp_name"] != null) {
            $target_dir    = "upload/";
            $target_file   = $target_dir . basename($_FILES["image"]["name"]);

            //Lấy phần mở rộng của file (jpg, png, ...)
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
            if (!in_array($imageFileType,$allowtypes ))
            {
                echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
                die;
            }

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file))
            {
                echo "File ". basename( $_FILES["image"]["name"]).
                " Đã upload thành công.";

                echo "File lưu tại " . $target_file;

            }
            else
            {
                echo "Có lỗi xảy ra khi upload file.";
            }

            
            
            echo "Tên file là: ".$_FILES["image"]["name"]."  phần mở rộng là: ".$imageFileType;
        }
        else echo "Please choose file !!!";
    }
?>