<?php

session_start();
require './vendor/autoload.php';
include_once('./php-riot-api.php');
include_once('./FileSystemCache.php');
include_once('functions/RIOTfunc.php');
include_once('functions/dynamodb.php');
include_once('tool.php');
index_top_module('Welcome');
if (array_key_exists('username', $_POST) && array_key_exists('region', $_POST)) {
$username = $_POST['username'];
$region = $_POST['region'];
$_SESSION['region'] = $region;
$_SESSION["username"] = $username;
echo($username.$region);
$api = getApiByReg($region);
//  //updateUserinfo($api->getSummonerByName($username));
//  //preview($api->getSummonerByName($username));
 calcWinTb($api->getSummonerByName($username)['accountId']);
 updateUserinfo($api->getSummonerByName($username));
 echo '<script>window.location.href="./viewMatch.php"</script>';
}

?>



<body>
<div class="body-page">
<img class="logo" src="./img/logo.png">
<span class="search">
	<form method="post">
<input type="text" onfocus="this.value=''"value="Please enter summoner name" name='username' id='username'class="search_bar">
<select class='search_dro'id="region" name='region'>
  <option value="oc1" id="oc1" name='oc1'>OC1</option>
  <option value="eu1" id="eu1" name='eu1'>eu1</option>
  <option value="jp1"id='jp1' name='jp1'>jp1</option>
  <option value="kr" id='kr' name='kr'>kr</option>
</select>
<input type="submit" value="submit" class="search_but">
</span>
</form>
</div>


</body> 



