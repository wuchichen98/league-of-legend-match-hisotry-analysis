<?php
session_start();
include_once('./dynamodb.php');

$getTb =getTable('MatchingDetails');
$x= calcRates($getTb);
//preview($getTb);

// for($i= 0; $i<count($getTb); $i++){
//     if($getTb[$i]['Win']=='Win'){
//         $count ++;
//     }
// }
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