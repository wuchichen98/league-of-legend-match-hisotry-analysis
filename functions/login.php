<?php 

include_once ('./rds.php');

session_start();

$info;

if (array_key_exists('username', $_POST) && array_key_exists('password', $_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $info = matchPass($username,$password);

    if ($info!=null){
    echo 'login success';
    print_r($info);
    }else{
    echo "login fail";
    }

}





?>



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

    