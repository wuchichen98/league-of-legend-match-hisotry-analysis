<?php


function getApiByReg($string){

    $api = new riotapi($string, new FileSystemCache('../cache/'));

    return $api;

}
//might not need
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
      array(),
      //role
      array(),
      //lane
      array(),
      //spell1
      array(),
      //spell2
      array(),
      //kill
      array(),
      //death
      array(),
      //assist
      array()

    );
  
  for ($i = 0; $i < 10; $i++) {

      
      array_push($storeWinLoss[0], $x['matches'][$i]['gameId'] );
      array_push($storeWinLoss[1], $x['matches'][$i]['champion'] );


      $check = checkWin($storeWinLoss[0][$i],$storeWinLoss[1][$i],$api);
      array_push($storeWinLoss[2], $check[0][0]);
      array_push($storeWinLoss[3],$x['matches'][$i]['role']);
      array_push($storeWinLoss[4],$x['matches'][$i]['lane']);
      array_push($storeWinLoss[5], $check[1][0]);
      array_push($storeWinLoss[6], $check[2][0]);
      array_push($storeWinLoss[7], $check[3][0]);
      array_push($storeWinLoss[8], $check[4][0]);
      array_push($storeWinLoss[9], $check[5][0]);

  
      }
      return $storeWinLoss;
}
function checkWin($matchId,$champid,$api){
    $p= $api->getMatch($matchId);
    $stor = array
    (
        //win
      array(),
      //spell 1
      array(),
      //spell 2
      array(),
      //kill
      array(),
      //death
      array(),
      //assist
      array()

    );

    for($l=0; $l<10; $l++){
    if($p['participants'][$l]['championId'] == $champid){
      array_push($stor[1],$p['participants'][$l]['spell1Id']);
      array_push($stor[2],$p['participants'][$l]['spell2Id']);
      array_push($stor[3],$p['participants'][$l]['stats']['kills']);
      array_push($stor[4],$p['participants'][$l]['stats']['deaths']);
      array_push($stor[5],$p['participants'][$l]['stats']['assists']);
      if($p['participants'][$l]['teamId']==100){
        $status = $p['teams'][0]['win'];
        array_push($stor[0],$status);
        }
        else{
            $status = $p['teams'][1]['win'];
            array_push($stor[0],$status);
        }
    }
    }
    return $stor;
    }
function preview($tabs){
    echo "<pre>";
    echo print_r($tabs);
    echo "</pre>";
}



?>