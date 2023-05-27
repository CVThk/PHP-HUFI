<?php
    function readFileTxt($path)
    {
        $result = "";
        $f = fopen($path, "r");
        while (!feof($f)) {
            $read = fgets($f);
            $result = $result . '$$$' . $read;
        }
        fclose($f);
        return $result;
    }
    function splitToArray($string, $stringSplit)
    {
        return explode($stringSplit, $string);
    }
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
    function convertVietnameseToLatin($str)
    {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
    
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        return $str;
    }
    function createID($name, $mode = null)
    {
        $name = str_replace('.', '', $name);
        $name = str_replace('(', '', $name);
        $name = str_replace(')', '', $name);
        $arr = splitToArray(convertVietnameseToLatin($name), ' ');
        $result = '';
        if(count($arr) > 1) {
            foreach($arr as $item) {
                $result .= strtoupper(substr($item, 0, 1));
            }
        }
        else {
            $result = $arr[0];
        }
        $result = str_replace(' ', '', $result);
        $result = str_replace('-', '', $result);
        if($mode != null) {
            $result .= $mode;
        }
        $i = 1;
        while(strlen($result) < 6) {
            $result .= $i++;
        }
        return $result;
    }
    function password($string) {
        $pwd = $string;
        $pepper = "cvtmusic";
        $pwd_peppered = hash_hmac("sha256", $pwd, $pepper, true);
        return base64_encode($pwd_peppered);
    }
    function checkPassword($username, $password, $account) {
        if(strcmp($username, $account->Username) == 0) {
            if(password_verify($password, $account->Password)){
                return true;
            }
        }
        return false;
    }
    function jwt($content) {
        // Create token header as a JSON string
        $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);

        // Create token payload as a JSON string
        $payload = $content;

        // Encode Header to Base64Url String
        $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

        // Encode Payload to Base64Url String
        $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

        // Create Signature Hash
        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, 'cvtmusic', true);

        // Encode Signature to Base64Url String
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

        // Create JWT
        $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
        return $jwt;
    }
    function parseJWT($token) {
        $obj = (json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $token)[1])))));
        return $obj;
    }
    //nM37pcb5vdRR4xf2OfpHzI9bkHd2dN10s3/j8kVz9g8=
?>