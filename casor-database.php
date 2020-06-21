<?php
session_start();
require_once 'db-con.php';


		if(isset($_POST['sur_name'])){
			if(!empty($_POST['sur_name']) or (!empty($_POST['first_name'])) or (!empty($_POST['sex'])) or (!empty($_POST['phone_number'])) or (!empty($_POST['occupation'])) or (!empty($_POST['office_address'])) or (!empty($_POST['email'])) or (!empty($_POST['password'])) or (!empty($_POST['state_of_origin'])) or (!empty($_POST['home_address']))){
				$surname=$_POST['sur_name'];
				$firstname=$_POST['first_name'];
				$sex=$_POST['sex'];
				$phone=$_POST['phone_number'];
				$occupation=$_POST['occupation'];
				$office=$_POST['office_address'];
				$email=$_POST['email'];
				$password=$_POST['password'];
				$state=$_POST['state_of_origin'];
				$home=$_POST['home_address'];
				
				$pass_hash = md5($password);
				$sql="INSERT INTO `user_login_table`(`sur_name`,`first_name`,`sex`,`phone_number`,`occupation`,`office_address`,`email`,`password`, `state_of_origin`,`home_address`) VALUES ('$surname','$firstname','$sex','$phone','$occupation','$office','$email','$pass_hash', '$state','$home')";
				$query=mysqli_query($connect, $sql);
				if($query){
					
					$sql = "SELECT id FROM `user_login_table` WHERE email='$email' and password ='$pass_hash'" ;
					$result= mysqli_query($connect, $sql);
					$row = mysqli_fetch_assoc($result);
					$_SESSION['id'] = $row['id'];
					
					header("location: my-page.php");
					echo "Your data has been successfully submitted, you can log out";	
					
				}else{
					echo "An error occurred while submitting your data, please try again";
				}
				
			   }else{
				echo "all fields are required";
			}
		}else{
			echo "it is not set";
		}
	
?>


<style>
input[type=text]{
	width:400px;
	height:40px;
	font-size:16px;
	border:2px solid blue;
	cursor:pointer;
	border-radius:6px;
}
input[type=submit]{
	background-color:blue;
	width:400px;
	height:40px;
	font-size:16px;
	border-radius:6px;
	cursor:pointer;
	border:2px solid blue;
}
input[type=submit]:hover{
	background-color:#fefefe;
	width:400px;
	height:40px;
	font-size:16px;
	border:2px solid blue;
	cursor:pointer;
	border-radius:6px;
}

</style>
<br><br>

<form method="post" action="#">
Sur-Name: <br><input type="text" name="sur_name"><br><br>
First-Name: <br><input type="text" name="first_name"><br><br>
 <input type="radio" name="sex" value="female">Female
 <input type="radio" name="sex" value="male">Male<br><br>
Phone No: <br><input type="text" name="phone_number"><br><br>
Occupation:<br><input type="text" name="occupation"><br><br>
Office Address:<br><input type="text" name="office_address"><br><br>
Email:<br> <input type="text" name="email"><br><br>
Password:<br> <input type="text" name="password"><br><br>
State of Origin: <br><input type="text" name="state_of_origin"><br><br>
Home Address:<br> <input type="text" name="home_address"><br><br>
<input type="submit" value="Send"><br><br>
</form>



Already have an account? <a href="login.php">Login</a>