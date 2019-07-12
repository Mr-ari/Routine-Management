<?php require 'connection.php' ?>

<?php 

	extract($_POST);
	if(isset($_POST['subname']) && isset($_POST['fac']) && isset($_POST['subc']) && isset($_POST['semester'])){
		$name = $_POST['subname'];
		$fac = $_POST['fac'];
		$subc = $_POST['subc'];
		$sem = $_POST['semester'];
		$query = "INSERT INTO `it_papers`(`paper_id`, `paper_code`, `user_id`, `paper_name`, `semester`) VALUES (null,'$subc','$fac','$subname','$sem')";

		$fire = mysqli_query($con,$query) or die("Can not insert data ".mysqli_error($con));

	}

 ?>