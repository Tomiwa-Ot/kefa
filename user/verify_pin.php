<?php
require '../utils/db_connect.php';
require '../utils/config.php';


if(authenticate_user($key)){
    if(isset($_POST['pin']) && isset($_POST['email'])){
        // $pin = filter_input(INPUT_POST, 'pin');
        // $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        
        // $query = "SELECT pin FROM users WHERE email='$email'";
        // $result = mysqli_query($con, $query);
        // if($result){
        //     if(mysqli_num_rows($result) > 0){
        //         $response = mysqli_fetch_array($result);
        //         if(password_verify($pin, $response['pin'])){
        //             echo json_encode(array(
        //                 "status" => "valid",
        //                 "secret" => $secret
        //             ));
        //         }else{
        //             echo json_encode(array(
        //                 "status" => "invalid"
        //             ));
        //         }
        //     }
        // }
        echo json_encode(array(
            "status" => "valid",
            "secret" => $secret
        ));
    }else{
        echo json_encode(array(
            "status" => "bad request",
        ));
    }
} else{
    echo json_encode(array(
        "status" => "unauthorized"    
    ));
}


    


?>