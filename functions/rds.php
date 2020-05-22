<?php


require_once('./vendor/autoload.php');

use Aws\Rds\RdsClient;


//end point database-1.cciz8vg9jp0f.us-east-1.rds.amazonaws.com
//admin jc2548461
define("HOST", "cloudtest.cciz8vg9jp0f.us-east-1.rds.amazonaws.com");
define("DBUSER", "root");
define("PASS", "Chen199809130");
define("DB", "user");
define("PORT", "3306");

$link=mysqli_connect(HOST,DBUSER,PASS,DB,PORT); 
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
} 
//create table in user schema
$a='abc12333333';
$b='wsa';
$c='sssss';
$d='ac2222';

//insert data to the table
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



//get matching username and password
function matchPass($username,$password){
global $link;
$arr = array();
$sql = "SELECT userid,username,firstname,lastname,password FROM user.user WHERE username = '$username' AND password = '$password'";
$result = $link->query($sql);
while($row = $result->fetch_assoc()) {
array_push($arr,$row);
}


$link->close();
return $arr;

}















?>