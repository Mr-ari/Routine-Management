<?php session_start();
if(empty($_SESSION['user_id'])):
header('Location:index.php');
endif;?>

<?php require 'connection.php' ?>

<?php 

	if(isset($_POST['save'])){
		
		$new_pass=$_POST['passwordnew'];
		$con_pass=$_POST['passwordconfirm'];

		if($new_pass == $con_pass){
			$uid=$_SESSION['user_id'];
			$query="select * from users where user_id='$uid'";
			$fire= mysqli_query($con,$query) or die("can not fetch data ".mysqli_error($con));

			$row=mysqli_fetch_array($fire);

			if($_POST['passwordold']==$row['password']){
				$query1 = "UPDATE users SET password='$con_pass' where user_id='$uid'";
				$fire= mysqli_query($con,$query1) or die("can not fetch data ".mysqli_error($con));

				session_destroy();
				echo "<script type='text/javascript'>alert('Password Changed Succesfully !! Now Login Again !'); document.location='http://localhost/Routine-Management/index.php'</script>";
			}
			else{
				echo "<script type='text/javascript'>alert('Old password not matched !!'); document.location='http://localhost/Routine-Management/admin_panel.php#ajax/my_profile.php'</script>";$fire= mysqli_query($con,$query) or die("can not fetch data".mysqli_error($con));
			}
		}
		else{
			echo "<script type='text/javascript'>alert('Confirm Password Not Matched !!'); document.location='http://localhost/Routine-Management/admin_panel.php#ajax/my_profile.php'</script>";
		}
	}
 ?>