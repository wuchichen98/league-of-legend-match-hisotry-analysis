<?php


function getComments(){
$response = '';
$call = "https://e3a8l7y323.execute-api.us-east-1.amazonaws.com/Test/lambdatest";
$a = array();
$result = [];
 $curl = curl_init($call);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
$a = curl_exec($curl);
$j = json_decode($a);
foreach ($j as $item) {
    array_push($result,[
        'id' => $item->id,
        'comment' => $item->comment,
        'name' => $item->name,
        'time'=> $item->time,

    ]);
}
curl_close($curl);
return $result;
}

?>