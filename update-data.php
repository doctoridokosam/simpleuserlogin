<style>
	input[type=text]{
		width:400px;
		height: 40px;
		font-size:16px;
		padding-left:15px;
	}
	input[type=submit]{
		width:100px;
		height: 40px;
		font-size:16px;
		color:#fff;
		background-color:red;
		border:none;
	}
	input[type=submit]:hover{
		width:100px;
		height: 40px;
		font-size:16px;
		color:#ff0000;
		background-color:#fff;
		border:2px solid red;
		cursor: pointer;
	}
	p{
		color:red;
		font-size:18px;
		margin-top: 24px;
	}


</style>
<br><br>
<form method="post" action="php/process-update.php">
	<input type="text" name="search" placeholder="Enter Your Phone Number to search">
	<input type="submit" value="Search">
</form>


<?php

if(isset($_GET['id'])){
	if(empty($_GET['id'])){
		echo "<p>Guy your are wrong</p>";
	}else {
		
		$id = $_GET['id'];
		require_once 'php/connection.php';
		$sql = "SELECT * FROM `my_data_base_table`  WHERE id = ".$id;
		$result = mysqli_query($con, $sql);
		
		$row = mysqli_fetch_assoc($result);
?>
		<br><br>
		<h4>Update your data </h4>
		<form method="post" action="php/process-update.php">
		<input type="hidden" name="id" value="<?php echo $row['id']; ?>"><br><br>
		Name : <br><input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>
		Sex : <br><input type="text" name="sex" value="<?php echo $row['sex']; ?>"><br><br>
		Phone : <br><input type="text" name="phone" value="<?php echo $row['phone_no']; ?>"><br><br>
		Dept: <br><input type="text" name="dept" value="<?php echo $row['department']; ?>"><br><br>
		Level: <br><input type="text" name="level" value="<?php echo $row['level']; ?>"><br><br>
		D.O.B. : <br><input type="text" name="dob" value="<?php echo $row['dob']; ?>"><br><br>
		<input type="submit" value="Update" style="width:400px;">
		</form>
<?php
	}	
}
?>

<?php
 if(isset($_GET['success'])){
	 if($_GET['success'] == 'yes'){
		 echo '<h2 style="color:green">Your information has been updated successfully</h2>';
	 }
	 if($_GET['success'] == 'no'){
		 echo '<h2 style="color:red">An Error occur while updating date</h2>';
	 }
 }



	?>