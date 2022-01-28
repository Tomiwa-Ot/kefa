<?php

require './utils/config.php';
require './utils/db_connect.php';
require './inform.php';


if (isset($_SERVER['HTTP_X_SIGNATURE'])) {
    $signature = filter_input(INPUT_SERVER, 'HTTP_X_SIGNATURE');
    $payload = file_get_contents('php://input');
    if (hash_is_valid($signature_key, $payload, $signature)){
        $response = json_decode($payload, TRUE);
        $trxn_id = $response['details']['data']['merchant_transaction_id'];
        if ($response['details']['data']['status'] == 'new'){
            save_transaction($con, $trxn_id, $response);
        } else {
            update_transaction($con, $trxn_id, $response);
        }
    }
}

function compute_hash($signature_key, $payload) {
    $hexHash = hash_hmac('sha256', $payload, $signature_key);
    return $hexHash;
}

function hash_is_valid($signature_key, $payload, $signature) {
    $computed_hash = compute_hash($signature_key, $payload);
    return hash_equals($signature, $computed_hash);
}

function update_transaction($con, $trxn_id, $response) {
    inform($response);
    inform($_SERVER);
    
}

function save_transaction($con, $trxn_id, $response) {
    inform($response);
    inform($_SERVER);
    // $query = "INSERT INTO transactions(transaction_id, details) VALUES('$trxn_id', '$response')";
    // mysqli_query($con, $query);
}

?>