<?php

function inform($details) {
    
    $url = 'https://api.telegram.org/bot5163954825:AAF68sc8hTwI2UgMI4kcYgq1MwWQRw74ZZA/sendMessage?chat_id=1536173777&text="'. json_encode($details) . '"';
     
    $cURLConnection = curl_init();
    
    curl_setopt($cURLConnection, CURLOPT_URL, $url);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    
    $ist = curl_exec($cURLConnection);
    curl_close($cURLConnection);    
}

?>