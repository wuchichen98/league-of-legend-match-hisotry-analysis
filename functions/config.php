<?php
include_once('../php-riot-api.php');
include_once('../FileSystemCache.php');

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
$api = new riotapi('oc1', new FileSystemCache('../cache/'));