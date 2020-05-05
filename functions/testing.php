<?php
include_once('./RIOTfunc.php');
session_start();
if (array_key_exists('username', $_POST) && array_key_exists('region', $_POST)) {
$username = $_POST['username'];
$region = $_POST['region'];
$_SESSION['region'] = $region;
$_SESSION["username"] = $username;
$api = getApiByReg($region);
$_SESSION['api']=getApiByReg($region);
preview(getSummoner($username));
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