<?php require 'connection.php' ?>

<?php 
	

	if(isset($_POST['pno']) && isset($_POST['sub']) && isset($_POST['day']) && isset($_POST['sem'])){
		$subject = $_POST['sub'];
		$day = $_POST['day'];
		$period = $_POST['pno'];
		$sem = $_POST['sem'];
		$query = "";

		if($period == 1){
			$query = $query . "UPDATE it_routine SET first ='$subject' where weekday='$day' and semester='$sem'";
		}
		elseif ($period == 2) {
			$query = $query . "UPDATE it_routine SET second='$subject' where weekday='$day' and semester='$sem'";
		}
		elseif ($period == 3) {
			$query = $query . "UPDATE it_routine SET third='$subject' where weekday='$day' and semester='$sem'";
		}
		elseif ($period == 4) {
			$query = $query . "UPDATE it_routine SET fourth='$subject' where weekday='$day' and semester='$sem'";
		}
		elseif ($period == 5) {
			$query = $query . "UPDATE it_routine SET fifth='$subject' where weekday='$day' and semester='$sem'";
		}
		elseif ($period == 6) {
			$query = $query . "UPDATE it_routine SET sixth='$subject' where weekday='$day' and semester='$sem'";
		}
		elseif ($period == 7) {
			$query = $query . "UPDATE it_routine SET seventh='$subject' where weekday='$day' and semester='$sem'";
		}
		elseif ($period == 8) {
			$query = $query . "UPDATE it_routine SET eighth='$subject' where weekday='$day' and semester='$sem'";
		}

		$fire = mysqli_query($con,$query) or die("Can not update routine ".mysqli_error($con));

	}

	echo "<script type='text/javascript'>document.location='../admin_panel.php#ajax/it/edit_routine.php'</script>";

 ?>