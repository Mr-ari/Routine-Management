<?php require 'connection.php' ?>

<?php 
	extract($_POST);
	if(isset($_POST['name']) && isset($_POST['short_name']) && isset($_POST['uname']) && isset($_POST['pword'])){
		$name = $_POST['name'];
		$short_name = $_POST['short_name'];
		$uname = $_POST['uname'];
		$pword = $_POST['pword'];
		$query = "INSERT INTO users (`user_id`, `user_name`, `full_name`, `short_name`, `password`, `role`, `is_active`) VALUES (null, '$uname', '$name', '$short_name','$pword','teacher','1')";

		$fire = mysqli_query($con,$query) or die("Can not insert data ".mysqli_error($con));

		echo "OK";

	}

 ?>