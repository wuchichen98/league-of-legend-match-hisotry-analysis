<?php

include_once('../php-riot-api.php');
include_once('../FileSystemCache.php');

//$api = new riotapi('oc1', new FileSystemCache('../cache/'));
//preview(calcWIn('D7ohUVOVq1qJa7Y3X_6hmcT9LYcQ8c9-WGqjbqWbwhatwqA'));

//getSummonerByName();


// $api=getApiByReg('oc1');
// $xx = getSummoner('slydeer');
// preview($xx);

function getApiByReg($string){

    $api = new riotapi($string, new FileSystemCache('../cache/'));

    return $api;

}

function getSummoner($name){
    global $api;
    $info;
    $info = $api->getSummonerByName($name);
    return $info;
}

function calcWIn($string){
    global $api;
    $x = $api -> getMatchList($string);
    $storeWinLoss = array
    (
        //matchid
      array(),
      //champid
      array(),
      //win
      array()
    );
  
  for ($i = 0; $i < 20; $i++) {
    //  preview($x['matches'][$i]);
      //preview($x['matches'][0]['gameId']);
      array_push($storeWinLoss[0], $x['matches'][$i]['gameId'] );
      array_push($storeWinLoss[1], $x['matches'][$i]['champion'] );
      array_push($storeWinLoss[2],checkWin($storeWinLoss[0][$i],$storeWinLoss[1][$i]));

    //   if(strcasecmp(checkWin($storeWinLoss[0][$i],$storeWinLoss[1][$i]), "Win") ){
    //       array_push($storeWinLoss[2],'Win');
    //   }else{
    //       array_push($storeWinLoss[3],'fail');
    //   }
  
      }
      return $storeWinLoss;
}
function checkWin($matchId,$champid){
    //$api = new riotapi('oc1', new FileSystemCache('cache/'));
     global $api;
    $p= $api->getMatch($matchId);
   
    for($l=0; $l<10; $l++){
    if($p['participants'][$l]['championId'] == $champid){
      if($p['participants'][$l]['teamId']==100){
        $status = $p['teams'][0]['win'];
        return $status;
        }
        else{
            $status = $p['teams'][1]['win'];
            return $status;
        }
        
    }
    }
    }
function preview($tabs){
    echo "<pre>";
    echo print_r($tabs);
    echo "</pre>";
}



?>