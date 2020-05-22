<?php
$baseUrl = ""; 
$apiKey = ""; 

function curlFunc($url)
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => 0,
    ));

    $result = curl_exec($curl);
    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    $decode = json_decode($result, true);

    return  array($decode , $httpcode); // json_decode ve Http Status Code fonksiyon dışına aktarmak için array oluşturduk

}
