<?php

require './utils/db_connect.php';
require './utils/config.php';

if(authenticate_user($key)){
    if(isset($_POST['merchant_transaction_id']) && isset($_POST['email'])) {
        $trxn_id = filter_input(INPUT_POST, 'merchant_transaction_id');
        $email = filter_input(INPUT_POST, 'email');
    
        // $query = "SELECT * FROM transactions WHERE transaction_id='$trxn_id' AND email='$email'";
        // $result = mysqli_query($con, $query);
    
        // if($result && (mysqli_num_rows($result) > 0)) {
        //     $response = mysqli_fetch_array($result);
        //     echo $response['details'];
        // }
    }
} else {
    echo json_encode(array(
        'status' => 'unathorised'
    ));
}


?>