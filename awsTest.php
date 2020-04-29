<?php
require_once('testing.php');

/**
 * Copyright 2010-2019 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * This file is licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License. A copy of
 * the License is located at
 *
 * http://aws.amazon.com/apache2.0/
 *
 * This file is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR
 * CONDITIONS OF ANY KIND, either express or implied. See the License for the
 * specific language governing permissions and limitations under the License.
*/

require 'vendor/autoload.php';
//require 'aws.phar';

date_default_timezone_set('UTC');
use Aws\DynamoDb\SessionHandler;
use Aws\DynamoDb\Exception\DynamoDbException;
use Aws\DynamoDb\Marshaler;
//use Aws\DynamoDb\DynamoMetadata;


$sdk = new Aws\Sdk([
    'profile' => 'default',
    'region'   => 'us-east-1',
    'version'  => 'latest'
]);

$dynamodb = $sdk->createDynamoDb();

$marshaler = new Marshaler();


$getInfo= calcWIn('D7ohUVOVq1qJa7Y3X_6hmcT9LYcQ8c9-WGqjbqWbwhatwqA');


//write in all the element
//  for ($i = 0; $i < 20; $i++) {

// //$tableName = 'MatchingDetails';

// $year = 2015;
// $title = 'The Big New Movie';

// $item = $marshaler->marshalJson('
//     {
//         "gameId": ' . $getInfo[0][$i] . ',
//         "champion": ' . $getInfo[1][$i] . ',
//         "Win": "' . $getInfo[2][$i] . '"
       
    
//     }
// ');

// $params = [
//     'TableName' => 'MatchingDetails',
//     'Item' => $item
// ];


// try {
//     $result = $dynamodb->putItem($params);
//     echo "Added item----";

// } catch (DynamoDbException $e) {
//     echo "Unable to add item:\n";
//     echo $e->getMessage() . "\n";
// }

//  }


$paramss = [
    'TableName' => 'MatchingDetails',
    'KeySchema' => [
        [
            'AttributeName' => 'gameId',
            'KeyType' => 'HASH'  //Partition key
        ],
        [
            'AttributeName' => 'champion',
            'KeyType' => 'RANGE'  //Sort key
        ],
    ],
    'AttributeDefinitions' => [
        [
            'AttributeName' => 'gameId',
            'AttributeType' => 'N'
        ],
        [
            'AttributeName' => 'champion',
            'AttributeType' => 'S'
        ],
  

    ],
    'ProvisionedThroughput' => [
        'ReadCapacityUnits' => 20,
        'WriteCapacityUnits' => 20
    ]
];

// try {
//     $result = $dynamodb->putItem($params);
//     echo "Added item: $year - $title\n";

// } catch (DynamoDbException $e) {
//     echo "Unable to add item:\n";
//     echo $e->getMessage() . "\n";
// }


//create tables
// try {
//     $result = $dynamodb->createTable($paramss);
//     echo 'Created table.  Status: ' . 
//         $result['TableDescription']['TableStatus'] ."\n";

// } catch (DynamoDbException $e) {
//     echo "Unable to create table:\n";
//     echo $e->getMessage() . "\n";
// }
// $key = $marshaler->marshalJson('
//     {
//         "gameId": ' . $year . ', 
//         "champion": ' . $title . ',
//         "Win": "' . $title . '"
//     }
// ');



$params = [
    'TableName' => 'MatchingDetails'
    
];


// //read
// try {
//    // $result = $dynamodb->getItem($params);
//    $result = $dynamodb->query($params);
//     print_r($result);

// } catch (DynamoDbException $e) {
//     echo "Unable to get item:\n";
//     echo $e->getMessage() . "\n";
// }

//retrive all the element from the table
try {
    while (true) {
        $result = $dynamodb->scan($params);

        foreach ($result['Items'] as $i) {
            $movie = $marshaler->unmarshalItem($i);
            echo $movie['gameId'].':'.$movie['champion'];
            echo "<br>";
         
        }

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


?>

<!-- 
{
    
        "require": {
            "aws/aws-sdk-php": "^3.11"
        }
    
} -->