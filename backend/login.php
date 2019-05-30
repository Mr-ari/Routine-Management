<?php include 'connection.php' ?>

<?php 

	session_start();

	if(isset($_POST['login'])){
	$user = mysqli_escape_string($con,$_POST['user']);
	$pass = mysqli_escape_string($con,$_POST['pass']);


	$query = "SELECT * FROM users where user_name='$user' and password='$pass'";
	$fire = mysqli_query($con,$query) or die("Can not fetch data ".mysqli_error($con));

	$row = mysqli_fetch_array($fire);

	$counter=mysqli_num_rows($fire);

	if($counter==0 or $row['is_active']=='0'){
		echo "<script type='text/javascript'>alert('Invalid Username or Password!');
		  document.location='../index.php'</script>";
	}

	else {
	  	$_SESSION['user_id']=$row['user_id'];	
	  	$_SESSION['user_name']=$row['user_name'];	
	  	$_SESSION['short_name']=$row['short_name'];	

		if ($row['role']=='admin')
		  		{
				  
				 	echo "<script type='text/javascript'>document.location='../admin_panel.php'</script>";
				 }
			  else
			  {

					echo "<script type='text/javascript'>document.location='../user_panel.php'</script>";
				}
	}
}
 ?>