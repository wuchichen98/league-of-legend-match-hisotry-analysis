<?php

require_once('RIOTfunc.php');




date_default_timezone_set('UTC');
use Aws\DynamoDb\SessionHandler;
use Aws\DynamoDb\Exception\DynamoDbException;
use Aws\DynamoDb\Marshaler;



$sdk = new Aws\Sdk([
    'profile' => 'default',
    'region'   => 'us-east-1',
    'version'  => 'latest'
]);

$dynamodb = $sdk->createDynamoDb();

$marshaler = new Marshaler();

//write in all the element passing userid
function calcWinTb($accountId){
    global $dynamodb;
    global $marshaler;

$getInfo= calcWIn($accountId);
 for ($i = 0; $i < 10; $i++) {

    $key = $marshaler->marshalJson('
    {
        "gameno": ' . $i . '
    }
');
$str = 'xxxx';
$eav = $marshaler->marshalJson('
    {
        ":r": '.$getInfo[0][$i].' ,
        ":p": '.$getInfo[1][$i].',
        ":a": "'.$getInfo[2][$i].'",
        ":b": "'.$getInfo[3][$i].'",
        ":c": "'.$getInfo[4][$i].'",
        ":d": '.$getInfo[5][$i].',
        ":e": '.$getInfo[6][$i].',
        ":f": "'.$getInfo[7][$i].'/'.$getInfo[8][$i].'/'.$getInfo[9][$i].'"

    }
');
$json = json_encode([
    'gameno'=> $i,
    'gameId' => $getInfo[0][$i],
    'champion' => $getInfo[1][$i],
    'Win' => $getInfo[2][$i]
]);

$params = [
    'TableName' => 'MatchingDetails',
    'Key' => $key,
    'UpdateExpression' =>'set gameId = :r, champion=:p, Win=:a, Prole=:b, Plane=:c, spella=:d, spellb=:e,kill=:f',
    'ExpressionAttributeValues'=> $eav,
    'ReturnValues' => 'UPDATED_NEW'
];

try {
    $result = $dynamodb->updateItem($params);
    echo "Added item----";

} catch (DynamoDbException $e) {
    echo "Unable to add item:\n";
    echo $e->getMessage() . "\n";
}

  }
}


//add userinfo tb
function updateUserinfo($userId){
    global $dynamodb;
    global $marshaler;
    $num =1;
    $key = $marshaler->marshalJson('
    {
        "tbid": '.$num.'
    }
');

$eav = $marshaler->marshalJson('
    {
        ":r": "'.$userId['id'].'" ,
        ":p": "'.$userId['accountId'].'",
        ":a": "'.$userId['puuid'].'",
        ":b": "'.$userId['name'].'",
        ":c": '.$userId['profileIconId'].',
        ":d": '.$userId['revisionDate'].',
        ":e": '.$userId['summonerLevel'].'
    }
');

$params = [
    'TableName' => 'userinfo',
    'Key' => $key,
    'UpdateExpression' =>'set id = :r, accountId=:p, puuid=:a,sname=:b, profileIconId=:c, revisionDate=:d, summonerLevel=:e',
    'ExpressionAttributeValues'=> $eav,
    'ReturnValues' => 'UPDATED_NEW'
];

try {
    $result = $dynamodb->updateItem($params);
    echo "Added item----";

} catch (DynamoDbException $e) {
    echo "Unable to add item:\n";
    echo $e->getMessage() . "\n";
}

  
}






function getCommenttb($id,$comment,$name,$time){ 
    global $dynamodb;
    global $marshaler;


    $item = $marshaler->marshalJson('
    {
        "id": ' . $id . ',
        "comment": "' . $comment . '",
        "name": "' . $name . '",
        "time": "'.$time.'"
    
    }
');

$params = [
    'TableName' => 'books',
    'Item' => $item
];


try {
    $result = $dynamodb->putItem($params);

} catch (DynamoDbException $e) {
    echo "Unable to add item:\n";
    echo $e->getMessage() . "\n";
}

}



//retrive all the element from the table

function getTable($tbName){
    global $dynamodb;
    global $marshaler;
    
$params = [
    'TableName' => $tbName
];
try {
    while (true) {
        $result = $dynamodb->scan($params);
        $info = array();
        foreach ($result['Items'] as $i) {
            $info[] = $marshaler->unmarshalItem($i);
            
        }
        return $info;
        if (isset($result['LastEvaluatedKey'])) {
            $params['ExclusiveStartKey'] = $result['LastEvaluatedKey'];
        } else {
            break;
        }
    }

} catch (DynamoDbException $e) {
    echo "Unable to scan:\n";
    echo $e->getMessage() . "\n";
}
}

?>
