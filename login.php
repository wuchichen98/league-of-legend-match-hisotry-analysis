<?php 

include_once ('./functions/rds.php');

session_start();

$info;

if (array_key_exists('username', $_POST) && array_key_exists('password', $_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $info = matchPass($username,$password);

    if ($info!=null){
    echo 'login success';

    }else{
    echo "login fail";
	}
	$_SESSION['fname']=$info[0]['firstname'];
	if($_SESSION['fname']!= null){
		echo "redirecting...............";
		echo '<script>window.location.href="./commentBook.php"</script>';
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

    