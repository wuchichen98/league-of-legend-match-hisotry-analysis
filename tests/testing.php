<?php
include('php-riot-api.php');
include('FileSystemCache.php');



// $r = $api->getChampion();
// $r = $api->getChampion(true);
// $r = $api->getChampionMastery(23516141);
// $r = $api->getChampionMastery(23516141,1);
// $r = $api->getCurrentGame(23516141);
// $api->setPlatform("na1");
// $r = $api->getStatic("champions", 1, "locale=fr_FR&tags=image&tags=spells");
// $api->setPlatform("euw1");
// $r = $api->getMatch(2898677684);
// $r = $api->getMatch(2898677684,false);
//$r = $api->getTimeline(2898677684);
// $r = $api->getMatchList(27695644);
// $params = array(
	// "queue"=>array(4,8),
	// "beginTime"=>1439294958000
// );
// $r = $api->getMatchList(27695644, $params);
// $r = $api->getRecentMatchList(27695644);
// $r = $api->getLeague(24120767);
// $r = $api->getLeaguePosition(24120767);
// $r = $api->getChallenger();
// $r = $api->getMaster();
//getMatchList('D7ohUVOVq1qJa7Y3X_6hmcT9LYcQ8c9-WGqjbqWbwhatwqA');
//298815922

//9pCciRWwIDyUuiSZRFNdJgwc_yj6HhQ69JB0cTrLyvGYGA
//slydeer
//$r = array($api -> getMatchList('D7ohUVOVq1qJa7Y3X_6hmcT9LYcQ8c9-WGqjbqWbwhatwqA'));


$api = new riotapi('oc1', new FileSystemCache('cache/'));

$id=23516141;
//$x = $api -> getMatchList('D7ohUVOVq1qJa7Y3X_6hmcT9LYcQ8c9-WGqjbqWbwhatwqA');

//298815922

$status ='';



//preview($x);

// $storeWinLoss = array
//   (
//       //matchid
//     array(),
//     //champid
//     array(),
//     //win
//     array(),
//     //lose
//     array()
//   );

// for ($i = 0; $i < 20; $i++) {
//   //  preview($x['matches'][$i]);
//     //preview($x['matches'][0]['gameId']);
//     array_push($storeWinLoss[0], $x['matches'][$i]['gameId'] );
//     array_push($storeWinLoss[1], $x['matches'][$i]['champion'] );

//     if(strcasecmp(checkWin($storeWinLoss[0][$i],$storeWinLoss[1][$i]), "Win") ){
//         array_push($storeWinLoss[2],'Win');
//     }else{
//         array_push($storeWinLoss[3],'fail');
//     }

//     }

//     echo count($storeWinLoss[2]);
//     echo "\n";
//     echo count($storeWinLoss[3]);
//     $countt = count($storeWinLoss[2]) + count($storeWinLoss[3]);
//     echo 'win rate '. count($storeWinLoss[2])/ $countt * 100 . "%";
//preview($p['teams']);
//get win or lose


 //echo checkWin(298815922,161);
// echo checkWin(298815922,64);

// }
   
// try {
//    // $r = $api->getFreeChampions();
//   // $r = $api-> getMatchList('D7ohUVOVq1qJa7Y3X_6hmcT9LYcQ8c9-WGqjbqWbwhatwqA');
//   // $r = $api->getMatch('298815922');
//   //echo $x['matches']['0'];
//    // print_r($x);
// } catch(Exception $e) {
//     echo "Error: " . $e->getMessage();
// };
// echo "<br>\r\n testing cache:";
//try {
//    $r = $testCache->getSummoner($summoner_id);
//    print_r($r);
//} catch(Exception $e) {
//    echo "Error: " . $e->getMessage();
//};

// $get_data = testss();
// $response = json_decode($get_data, true);
// preview($response);

// function testss(){
$response = '';
$call = "https://e3a8l7y323.execute-api.us-east-1.amazonaws.com/Test/lambdatest";

 $curl = curl_init($call);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

preview(curl_exec($curl));
curl_close($curl);
//}

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
    //   ,
    //   //lose
    //   array()
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