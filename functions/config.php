<?php

 class config{
use Aws\DynamoDb\SessionHandler;
use Aws\DynamoDb\Exception\DynamoDbException;
use Aws\DynamoDb\Marshaler;
//use Aws\DynamoDb\DynamoMetadata;
// [default]
// aws_access_key_id=ASIAXVN2P6IRNB2JLU6M
// aws_secret_access_key=hnPWzwD8TCLP4DUnhETVR8VokrszxTbRFrv+hp2A
// aws_session_token=FwoGZXIvYXdzEI///////////wEaDK31ZNm1NZWvPnkAHCLLAVeTkyXSKSW+HnyrI52ULnk0CLr0Jl6/gUlcxZH21aDIK+U89vrlESM4gJLPKmxkCo/oOpg/bKjoSnUFG/cXyeUiiHXQ2dOasadRLi3nB4AlcvkrAgtOhpv95R03KEY8cgiAGZ+5G/6IHJV9zPGvJyiFjypTqU8yELBUQHJrL9/b21GJeJPhkeLM3NID1rRAd8Px01M2eP4wHzvYtjAN9JXSgHPILF5zgqLXNTzSU47ALAg/LdMUmHW7ecu/1MRK6NH/SjUNKAP0+YQEKIa3zvUFMi1KHe1d4Bvp9nJCGIOcVL4yAmwb9mpScBS+6rZO5z3nG7Cmbe5uEo0PcBB0jaU=
$sdk = new Aws\Sdk([
    'profile' => 'default',
    'region'   => 'us-east-1',
    'version'  => 'latest'
]);
// $dynamodb = $sdk->createDynamoDb();
// $marshaler = new Marshaler();
// $api = new riotapi('oc1', new FileSystemCache('../cache/'));


}