<?php 

include_once ('./functions/rds.php');
include_once('./tool.php');
session_start();
index_top_module("Login");
$info;

if (array_key_exists('username', $_POST) && array_key_exists('password', $_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $info = matchPass($username,$password);

    if ($info!=null){
    echo 'login success';
	$_SESSION['fname']=$info[0]['firstname'];
    }else{
    echo "login fail";
	}
	if($_SESSION['fname']!= null){
		echo " redirecting...............";
		echo '<script>window.location.href="./commentBook.php"</script>';
	}
	
}





?>




<body class='login-body'>
<form method="post" >
<div class="box">
<h1>Login</h1>
User Name:
<input type="username" name="username" value="Enter your User Id" onfocus="this.value=''"  class="email" />
<div>
Password   :  
<input type="password" name="password" value="Enter your password" onfocus="this.value=''"  class="email" />
</div>
<button class="btn" type='submit' name='submit' value="Login"> Login<!-- End Btn -->
<button type="button" onclick="document.location.href='./register.php';" id="btn2">Sign Up <!-- End Btn2 -->
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
