<?php require 'connection.php' ?>

<?php 

	if(isset($_POST['select_sem'])){

		$check = $_POST['semester'];
		if($check == 'first'){
			$query = "UPDATE active_semester SET value = 0 WHERE semester_name = 'even'";
			$query2 = "UPDATE active_semester SET value = 1 WHERE semester_name = 'odd'";

			$fire = mysqli_query($con,$query) or die("Can not update select sem".mysqli_error($con));
			$fire = mysqli_query($con,$query2) or die("Can not update select sem".mysqli_error($con));
		}

		else {

			$query = "UPDATE active_semester SET value = 1 WHERE semester_name = 'even'";
			$query2 = "UPDATE active_semester SET value = 0 WHERE semester_name = 'odd'";

			$fire = mysqli_query($con,$query) or die("Can not update select sem".mysqli_error($con));
			$fire = mysqli_query($con,$query2) or die("Can not update select sem".mysqli_error($con));
		}

		echo "<script type='text/javascript'>document.location='../admin_panel.php#ajax/admin/select_semester.php'</script>";
	}

 ?>