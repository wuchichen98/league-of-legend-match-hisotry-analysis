<!DOCTYPE html>
<?php
session_start();
require './vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
include_once('./php-riot-api.php');
include_once('./FileSystemCache.php');
include_once('functions/RIOTfunc.php');
include_once('functions/dynamodb.php');
include_once('tool.php');


index_top_module('viewMatch');
echo "The current user you are checking is ".$_SESSION["username"];
$getTb =getTable('MatchingDetails');
$x= calcRates($getTb);
changeCsv($getTb);


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


$bucket = 'csvfiledownload';
$keyname = 'MatchHistory.csv';
$pathToFile = 'C:/xampp/htdocs/a2test-CSS/MatchHistory.csv';
                        
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
} 
catch (S3Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

function changeToHtml($table){
    for($i= 0; $i<count($table); $i++){    
        $array = $table[$i];  
        $string1 = "champion";
        $string2 = "Prole";
        $string3 = "Win";
        $string4 = "kill";
        if($array[$string3] == 'Win')
        {
            echo "<div class='MatchHistory' style='background-color:cyan'>";
        }
        else
        {
            echo "<div class='MatchHistory' style='background-color:tomato'>";
        }
        echo "<div class='prole'> $array[$string2] </div>";
        echo "<div class='win'> $array[$string3] </div>";
        echo "<div class='kda'> $array[$string4] </div>";

        $pathToChampionFile = file_get_contents("champions.json");
        $championTable = json_decode($pathToChampionFile);
        for($a= 0; $a<count($championTable); $a++)
        {     
            $championTable[$a] = get_object_vars($championTable[$a]);
            if($championTable[$a]['key'] == $array[$string1])
            {
                $icon = "icon";
                echo '<div class="image"> <img src="'.$championTable[$a][$icon].'"> </div>';
            }
        }
        echo "</div>";
    } 
}

changeToHtml($getTb); 
echo "Win Rate of top 10 matches is: ", $x,"%"; 
echo "<br>";
echo '<a href="'.$url.'">Download the match file</a>';
?>

</main>
</body>
</html>