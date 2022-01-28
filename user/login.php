<?php
require '../utils/db_connect.php';
require '../utils/config.php';

require_once '../utils/jwt/JWT.php';
require_once '../utils/jwt/JWK.php';
require_once '../utils/jwt/ExpiredException.php';
require_once '../utils/jwt/BeforeValidException.php';
require_once '../utils/jwt/SignatureInvalidException.php';

use \Firebase\JWT\JWT;


if(authenticate_device()){
    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0){
            $response = mysqli_fetch_array($result);
            if(password_verify($password, $response['password'])){
                $payload = array(
                    "email" => $email
                );
                $jwt = JWT::encode($payload, $key);
                $json = array(
                    "status" => "success",
                    "fullname" => $response['fullname'],
                    "phone" => $response['phone'],
                    "token" => $jwt
                );
                echo json_encode($json);
            }else{
                echo json_encode(array(
                    "status" => "failed"    
                ));
            }
        }
    }
} else{
    echo json_encode(array(
        "status" => "unauthorized"    
    ));
}
    
    




?>
