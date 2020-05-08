<?php 

include_once ('functions/rds.php');
include_once ('./tool.php');
index_top_module('Registration');
if (array_key_exists('username', $_POST) && array_key_exists('password', $_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fname =$_POST['fname'];
    $lname =$_POST['lname'];


    if (insertRow($username,$password, $fname,$lname)===true){
	echo 'reg success';
	echo ' redirecting.....';
	echo '<script>window.location.href="./login.php"</script>';
    }else{
    echo'username exists please try again';
    }


}


?>



<!-- <form method="post">
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
	</form> -->

    <body class='login-body'>
<form method="post" >
<div class="box">
<h1>Register</h1>
User Name:
<input type="text" name="username" value="Enter your User Id" onfocus="this.value=''"  class="email" />
<div>
Password   :  
<input type="password" name="password" value="Enter your password" onfocus="this.value=''"  class="email" />
</div>
<div>
Firstname   :  
<input type="text" name="fname" value="Enter your Firstname" onfocus="this.value=''"  class="email" />
</div>
<div>
Lastname   :  
<input type="text" name="lname" value="Enter your Lastname" onfocus="this.value=''"  class="email" />
</div>
<button class="btn-r" type='submit' name='submit' value="Register"> Register<!-- End Btn -->
</div> <!-- End Box -->

</form>

</body> 

 <script>

//Fade in dashboard box
$(document).ready(function(){
    $('.box').hide().fadeIn(1000);
    });

//Stop click event
$('a').click(function(event){
    event.preventDefault(); 
	});

</script>