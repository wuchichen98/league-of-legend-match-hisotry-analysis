<?php

session_start();
include_once('./RIOTfunc.php');
include_once('./dynamodb.php');


if (array_key_exists('username', $_POST) && array_key_exists('region', $_POST)) {
$username = $_POST['username'];
$region = $_POST['region'];
$_SESSION['region'] = $region;
$_SESSION["username"] = $username;
$api = getApiByReg($region);
 //updateUserinfo($api->getSummonerByName($username));
 //preview($api->getSummonerByName($username));
 calcWinTb($api->getSummonerByName($username)['accountId']);
 updateUserinfo($api->getSummonerByName($username));
 echo '<script>window.location.href="./testing2.php"</script>';
}


?>

<form method="post" >
<fieldset>
			<legend>EnterName and Region</legend>
			<ul>
				<li>
					<label>Summoner name:</label>
					<input type="text" name="username" id="username">
				</li>
                <li>
					<label>Summoner region:</label>
					<input type="text" name="region" id="region">
				</li>
				<li>
					<label></label>
					<input type="submit" name="submit" value="submit">
				</li>
			</ul>
		</fieldset>



</form>