<?php

// require_once('testing.php');

require '../vendor/autoload.php';
use Aws\Rds\RdsClient;

$client = RdsClient::factory(array(
    'profile' => 'default',
    'region'  => 'us-east-1',
    'version'  => 'latest'
));
//end point database-1.cciz8vg9jp0f.us-east-1.rds.amazonaws.com
//admin jc2548461
define("HOST", "cloudtest.cciz8vg9jp0f.us-east-1.rds.amazonaws.com");
define("DBUSER", "root");
define("PASS", "123456789");
define("DB", "cloudtest");
define("PORT", "3306");

$link=mysqli_connect(HOST,DBUSER,PASS,DB,PORT); 
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
} 
//create table in user schema
// $sql = "CREATE TABLE user.user (
//     userid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
//     username VARCHAR(30) NOT NULL,
//     firstname VARCHAR(30) NOT NULL,
//     lastname VARCHAR(30) NOT NULL,
//     password VARCHAR(30) NOT NULL,
//     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//     )";
$a='abc12333333';
$b='wsa';
$c='sssss';
$d='ac2222';

//insert data to the table
// $sql = "INSERT INTO user.user (username, firstname, lastname, password)
//  VALUES ('adc222222', 'johnc', 'chenc', 'abc12345655')";

// if (insertRow('ass122xasd','jc','ls','asxxx222')===true){
//     echo 'yes';
// }else{
//     echo'false';
// }
function insertRow($a,$b,$c,$d){
global $link;
$sql = "SELECT username,password FROM user.user WHERE username = '$a'";
$query = $link->query($sql);
if(mysqli_num_rows($query)){
    
    return false;
}else{

 $sql = "INSERT INTO user.user (username, firstname, lastname, password)
VALUES ('$a', '$b', '$c', '$d')";
if ($link->query($sql) === TRUE) {

$link->close();
    return true;
   
} else {
    echo "error: " . $link->error;
}
    
    }
    

}

// $link->query($sql);
// $query = mysqli_query($link, $sql);


// $result_can = mysqli_query($link, $query);
//  $row = mysql_fetch_assoc($link);

//  while ($row = mysql_fetch_assoc($result_can)) {

//    echo $row['username'];
   
// }


//get matching username and password
// $x= matchPass('abc123','abc123456');
// print_r ($x[0]);

function matchPass($username,$password){
global $link;
$arr = array();
$sql = "SELECT userid,username,firstname,lastname,password FROM user.user WHERE username = '$username' AND password = '$password'";
$result = $link->query($sql);
while($row = $result->fetch_assoc()) {
//print_r($row);
array_push($arr,$row);
}


$link->close();
return $arr;

}















?>