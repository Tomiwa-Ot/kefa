`<?php

require '../utils/db_connect.php';
require '../utils/config.php';

require_once '../utils/jwt/JWT.php';
require_once '../utils/jwt/JWK.php';
require_once '../utils/jwt/ExpiredException.php';
require_once '../utils/jwt/BeforeValidException.php';
require_once '../utils/jwt/SignatureInvalidException.php';

use \Firebase\JWT\JWT;


if(authenticate_device()){
    if(filter_input(INPUT_SERVER, 'REQUEST_METHOD') == 'POST') {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $fullname = filter_input(INPUT_POST, 'fullname');
        $password = filter_input(INPUT_POST, 'password');
        $password = password_hash($password, PASSWORD_DEFAULT);
        $phone = filter_input(INPUT_POST, 'phone');
        $pin = filter_input(INPUT_POST, 'pin');
        $pin = password_hash($pin, PASSWORD_DEFAULT);
        
        // $query = "SELECT * FROM users WHERE email='$email'";
        // $result = mysqli_query($con, $query);
        // if($result && mysqli_num_rows($result) > 0) {
        //     echo json_encode(array(
        //         "status" => "acccount exists"
        //     )); 
        // } else{
            
        //     $query = "INSERT INTO users(fullname, email, password,  phone, pin)  values('$fullname', '$email', '$password', '$phone', '$pin')";
            
        //     $result = mysqli_query($con, $query);
        //     if($result){
        //         $payload = array(
        //             "email" => $email
        //         );
        //         $jwt = JWT::encode($payload, $key);
        //         echo json_encode(array(
        //             "status" => "success",
        //             "token" => $jwt
        //         ));
        //     }
        // }
        
    } else{
        echo json_encode(array(
            "status" => "bad request"    
        ));
    }
}else{
    echo json_encode(array(
        "status" => "unauthorized"    
    ));
}





?>
`