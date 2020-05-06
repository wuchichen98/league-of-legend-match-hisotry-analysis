<?php 

include_once ('functions/rds.php');

if (array_key_exists('username', $_POST) && array_key_exists('password', $_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fname =$_POST['fname'];
    $lname =$_POST['lname'];


    if (insertRow($username,$password, $fname,$lname)===true){
	echo 'reg success';
	echo '<script>window.location.href="./login.php"</script>';
    }else{
    echo'username exists please try again';
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
					<label>User Firstname:</label>
					<input type="text" name="fname" id="fname">
				</li>
                <li>
					<label>User Lastname:</label>
					<input type="text" name="lname" id="lname">
				</li>
				<li>
					<label></label>
					<input type="submit" name="submit" value="submit">
				</li>
			</ul>
		</fieldset>
	</form>

    