<?php

session_start();
require_once 'db-con.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(!empty($_POST['email'])){

		$email=$_POST['email'];
		$password=$_POST['password'];
		
		$pass_hash = md5($password);
		
		$sql = "SELECT id FROM `user_login_table` WHERE email='$email' and password ='$pass_hash'" ;
		$result= mysqli_query($connect, $sql);
		
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
			$_SESSION['id'] = $row['id'];
			header("location: my-page.php");
		}else {
			echo "invalid email or password";
		}
	}
}

?>

<style>
input[type=text]{
	width:400px;
	height:40px;
	font-size:16px;
	border:2px solid #2882c0;
	border-radius:6px;
}
input[type=submit]{
	background-color:#2882c0;
	width:400px;
	height:40px;
	font-size:16px;
	border-radius:6px;
	cursor:pointer;
	border:2px solid #2882c0;
	color:white;
}
input[type=submit]:hover{
	background-color:#fefefe;
	width:400px;
	height:40px;
	font-size:16px;
	border:2px solid #2882c0;
	cursor:pointer;
	border-radius:6px;
	color:#2882c0;
}

</style>
<br><br>

<form method="post" action="#">
Email:<br> <input type="text" name="email"><br><br>
Password:<br> <input type="text" name="password"><br><br>
<input type="submit" value="Login"><br><br>
</form>

Don't have an account? <a href="casor-database.php">Register</a>





