<?php 

include_once ('./rds.php');

session_start();








?>
<html>
<head>
	<meta charset="utf-8">
	<title>resigter</title>



<form method="post">
		<fieldset>
			<legend>UserLogin</legend>
			<ul>
				<li>
					<label>User  ID:</label>
					<input type="text" name="username" id="username">
				</li>
				<li>
					<label>Password:</label>
					<input type="password" name="password" id="password">
				</li>
				<li>
					<label></label>
					<input type="submit" name="submit" value="submit">
				</li>
			</ul>
		</fieldset>
	</form>

    