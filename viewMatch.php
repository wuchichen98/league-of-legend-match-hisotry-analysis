<?php
session_start();
require './vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
include_once('./php-riot-api.php');
include_once('./FileSystemCache.php');
include_once('functions/RIOTfunc.php');
include_once('functions/dynamodb.php');


$getTb =getTable('MatchingDetails');
// preview($getTb);
$x= calcRates($getTb);
changeCsv($getTb);

// for($i= 0; $i<count($getTb); $i++){
//     if($getTb[$i]['Win']=='Win'){
//         $count ++;
//     }
// }
print_r($getTb);
echo "Win Rate of top 10 matches is: ", $x,"%";
// preview(getTable('MatchingDetails'));
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

function changeCsv($table){
    $file = 'MatchHistory.csv';
    $handle = fopen($file, 'w');
    for($i= 0; $i<count($table); $i++){      
        fputcsv($handle,$table[$i]);
    }
    fclose($handle);
}
//preview($api->getMatch(302917025));


$bucket = 'csvfiledownload';
$keyname = 'MatchHistory.csv';
$pathToFile = 'C:/xampp/htdocs/a2test-ec2/MatchHistory.csv';
                        
$s3 = new S3Client([
    'version' => 'latest',
    'region'  => 'us-east-1'
]);

try {

$result = $s3->putObject(array(
    'Bucket'     => $bucket,
    'Key'        => $keyname,
    'SourceFile' => $pathToFile,
    'ACL'        => 'public-read'
));
$url = $s3->getObjectUrl($bucket, $keyname);

    // Print the URL to the object.
    echo $result['ObjectURL'] . PHP_EOL;
    echo $url;
} 
catch (S3Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}