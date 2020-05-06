<?php



// require_once('testing.php');

require 'vendor/autoload.php';
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
define("PASS", "12345678");
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


//insert data to the table
// $sql = "INSERT INTO user.user (username, firstname, lastname, password)
//  VALUES ('abc123555', 'johnc', 'chenc', 'abc12345655')";

//  $link->query($sql);
//$query = mysqli_query($link, $sql);


// $result_can = mysqli_query($link, $query);
//  $row = mysql_fetch_assoc($link);

//  while ($row = mysql_fetch_assoc($result_can)) {

//    echo $row['username'];
   
// }


//get matching username and password
$sql = "SELECT userid,username,firstname,lastname,password FROM user.user WHERE username = 'abc1234' AND password = 'abc123456789'";
$result = $link->query($sql);
while($row = $result->fetch_assoc()) {
print_r($row);
}


// if ($link->query($sql) === TRUE) {
//     echo "success";
// } else {
//     echo "error: " . $link->error;
// }


$link->close();











?>