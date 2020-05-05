<?php
session_start();
include_once('./dynamodb.php');

$getTb =getTable('MatchingDetails');
//preview($getTb);
$count =0;
for($i= 0; $i<count($getTb); $i++){
    if($getTb[$i]['Win']=='Win'){
        $count ++;
    }
}
echo "Win Rate of top 10 matches is: ",$count/count($getTb)*100,"%";
//preview(getTable('MatchingDetails'));
// echo"------------------------------";
// preview(getTable('userinfo'));


function calcRates(){


}


//preview($api->getMatch(302917025));