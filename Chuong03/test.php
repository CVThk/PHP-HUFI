<?php
    $pwd = "chauvanthinh2002";
    $pepper = "CVT";
    $pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
    $pwd_hashed = password_hash($pwd_peppered, PASSWORD_ARGON2ID);
    echo $pwd_hashed;
    echo '<br />';
    // $pwd_peppered = hash_hmac("sha256", "Thinh123", $pepper);
    // $pwd_hashed = password_hash($pwd_peppered, PASSWORD_ARGON2ID);
    // echo $pwd_hashed;
    // echo '<br />';
    // $pwd_peppered = hash_hmac("sha256", "thinh123", $pepper);
    // $pwd_hashed = password_hash($pwd_peppered, PASSWORD_ARGON2ID);
    // echo $pwd_hashed;

    if (password_verify($pwd_peppered, $pwd_hashed)) {
        echo "Password matches.";
    }
    else {
        echo "Password incorrect.";
    }

?>


<?php

    // Declare the endpoint URL
    $url = '/api/users';
    
    // Check if the request method is POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the JSON request body
        $json = file_get_contents('php://input');
        // Parse the JSON request body
        $requestData = json_decode($json, true);
    
        // Access the request data
        $username = $requestData['username'];
        $password = $requestData['password'];
      
        $pwd = $password;
        $pepper = "cvtmusic";
        $pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
      
        $query = "SELECT tbl_Account.Username, tbl_Account.Password FROM `tbl_Account` WHERE tbl_Account.Username = '".$username."'";
        $data = mysqli_query($con,$query);
            class Account{
                function Account($username,$password){
                    $this->Username = $username;
                    $this->Password = $password;
                }
            }
            $MangAccount = array();
            while($row = mysqli_fetch_assoc($data)){
                array_push($MangAccount, new Account(
                $row['Username']
                ,$row['Password']) );
            }
       
            $response = [
                'result' => 'false'
              ];
        if(count($MangAccount) > 0) {
            if(strcmp($username, $MangAccount[0]->Username)) {
                if(password_verify($pwd_peppered, $MangAccount[0]->Password)){
                    $response = [
                        'result' => 'true'
                      ];
                }
                else {
                    $response = [
                        'result' => 'false'
                      ];
                }
            }
        }

      
    
      // Perform any desired processing with the request data
      // For example, you can save the user to a database, perform validation, etc.
    
      // Send a response
      
      echo json_encode($response);
      http_response_code(201); // Set response status code to 201 (indicating successful creation)
    } else {
      // Send an error response for unsupported request methods
      $response = [
        'error' => 'Invalid request method'
      ];
      echo json_encode($response);
      http_response_code(400); // Set response status code to 400 (indicating bad request)
    }

?>