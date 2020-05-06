<?php
session_start();
require './vendor/autoload.php';
include_once('./php-riot-api.php');
include_once('./FileSystemCache.php');
include_once('functions/RIOTfunc.php');
include_once('functions/dynamodb.php');


$getTb =getTable('MatchingDetails');
$x= calcRates($getTb);
//preview($getTb);

// for($i= 0; $i<count($getTb); $i++){
//     if($getTb[$i]['Win']=='Win'){
//         $count ++;
//     }
// }
print_r($getTb);
echo "Win Rate of top 10 matches is: ", $x,"%";
//preview(getTable('MatchingDetails'));
// echo"------------------------------";
// preview(getTable('userinfo'));


function calcRates($tblength){
    $count =0;
    for($i= 0; $i<count($tblength); $i++){
        if($tblength[$i]['Win']=='Win'){
            $count ++;
        }
    }
    return $count/count($tblength)*100;
    
}


//preview($api->getMatch(302917025));