<?php

require_once 'jwt/JWT.php';
require_once 'jwt/JWK.php';
require_once 'jwt/ExpiredException.php';
require_once 'jwt/BeforeValidException.php';
require_once 'jwt/SignatureInvalidException.php';

use \Firebase\JWT\JWT;

$widget_id = '39f100a9-f9af-403f-975a-5b600db3890e';
$signature_key = 'fd3Du3d09QAiuHgyui988W';
$secret = 's6edh3DHCkedjAAoeid2w92';
$key = "xjdhHSHEi321DSqqajwWJ@ws";

$host = '';
$user = '';
$password = '';
$db = '';


function authenticate_device() {
    if(filter_input(INPUT_SERVER, 'HTTP_USER_AGENT') == 'KEFA POS') {
        return true;
    }
    return false;
}

function authenticate_user($key) {
    if(isset($_SERVER['HTTP_AUTHORIZATION']) && (filter_input(INPUT_SERVER, 'HTTP_USER_AGENT') == 'KEFA POS')) {
        try {
            $decoded = JWT::decode(filter_input(INPUT_SERVER, 'HTTP_AUTHORIZATION'), $key, array('HS256'));
            return true;
        } catch(Exception $e) {
            return false;
        }
    }
    return false;
}
?>