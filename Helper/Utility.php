<?php
    function uploadImage($target_dir, $nameImage, $file)
    {
        $target_file   = $target_dir . basename($nameImage);
        //Lấy phần mở rộng của file (jpg, png, ...)
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
        if (!in_array($imageFileType, $allowtypes)) {
            echo "<script>alert('Chỉ được upload các định dạng JPG, PNG, JPEG, GIF')</script>";
            die;
        }
        move_uploaded_file($file, $target_file);
    }
?>