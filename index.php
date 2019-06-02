<?php include 'backend/connection.php' ?>
<?php 

	$query = "SELECT * from active_semester where semester_name='odd'";
	$fire = mysqli_query($con,$query);
	$row = mysqli_fetch_array($fire);

	$odd = $row['value'];

	$query = "SELECT * from active_semester where semester_name='even'";
	$fire = mysqli_query($con,$query);
	$row = mysqli_fetch_array($fire);

	$even = $row['value'];

 ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Home</title>
		<meta name="description" content="description">
		<meta name="author" content="Arijt">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- Latest compiled and minified CSS -->
		 <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
 		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<link href="css/style_v2.css" rel="stylesheet">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
				<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
<body>
<!--Start Header-->
  <header class="navbar">
	<div class="container-fluid expanded-panel">
		<div class="row">
			<div id="logo" class="col-md-4">
				<a href="index.html">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
				Routine Management</a>
			</div>
			<div id="top-panel" class="col-md-8">
				<div class="pull-right " style="padding-top: 5px"><button style="background-color: #26a65b" type="button" class="btn btn-primary" data-toggle="modal" data-target="#login-modal">Log in</button></div>
			</div>
		</div>
	</div>
</header>
<!--End Header-->

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Login to Your Account</h1><br>
				  <form action="backend/login.php" method="POST">
					<input type="text" name="user" placeholder="Username">
					<input type="password" name="pass" placeholder="Password">
					<input type="submit" name="login" class="login loginmodal-submit" value="Login">
				  </form>
				</div>
			</div>
		  </div>

<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<div id="sidebar-left" class="col-xs-2 col-sm-2">
			<ul class="nav main-menu">
				<li>
					<a href="ajax/dashboard.html" class="ajax-link">
						<i class="fa fa-institution"></i>
						<span class="hidden-xs">Home</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-calendar"></i>
						<span class="hidden-xs">IT</span>
					</a>
					<ul class="dropdown-menu">
						<?php 

						 	if($odd == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/it/show_routine1.php">1st Semester</a></li>
						 		<?php
						 	} 
						?>
						<?php 

						 	if($even == '1'){
						 		?>
						 		<li><a class="ajax-link" href="">2nd Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($odd == '1'){
						 		?>
						 		<li><a class="ajax-link" href="">3st Semester</a></li>

						 		<?php	
						 	} 
						?>

						<?php 

						 	if($even == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine4.html">4th Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($odd == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine5.html">5th Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($even == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine6.html">6th Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($odd == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine7.html">7th Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($even == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine8.html">8th Semester</a></li>
						 		<?php
						 	} 
						?>
						
					</ul>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-calendar"></i>
						<span class="hidden-xs">CSE</span>
					</a>
					<ul class="dropdown-menu">
						<?php 

						 	if($odd == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/it/show_routine1.html">1st Semester</a></li>
						 		<?php
						 	} 
						?>
						<?php 

						 	if($even == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/it/show_routine2.html">2nd Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($odd == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine3.html">3st Semester</a></li>

						 		<?php	
						 	} 
						?>

						<?php 

						 	if($even == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine4.html">4th Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($odd == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine5.html">5th Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($even == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine6.html">6th Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($odd == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine7.html">7th Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($even == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine8.html">8th Semester</a></li>
						 		<?php
						 	} 
						?>
						
					</ul>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-calendar"></i>
						<span class="hidden-xs">ECE</span>
					</a>
					<ul class="dropdown-menu">
						<?php 

						 	if($odd == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/it/show_routine1.html">1st Semester</a></li>
						 		<?php
						 	} 
						?>
						<?php 

						 	if($even == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/it/show_routine2.html">2nd Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($odd == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine3.html">3st Semester</a></li>

						 		<?php	
						 	} 
						?>

						<?php 

						 	if($even == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine4.html">4th Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($odd == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine5.html">5th Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($even == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine6.html">6th Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($odd == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine7.html">7th Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($even == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine8.html">8th Semester</a></li>
						 		<?php
						 	} 
						?>
						
					</ul>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-calendar"></i>
						<span class="hidden-xs">EE</span>
					</a>
					<ul class="dropdown-menu">
						<?php 

						 	if($odd == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/it/show_routine1.html">1st Semester</a></li>
						 		<?php
						 	} 
						?>
						<?php 

						 	if($even == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/it/show_routine2.html">2nd Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($odd == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine3.html">3st Semester</a></li>

						 		<?php	
						 	} 
						?>

						<?php 

						 	if($even == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine4.html">4th Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($odd == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine5.html">5th Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($even == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine6.html">6th Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($odd == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine7.html">7th Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($even == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine8.html">8th Semester</a></li>
						 		<?php
						 	} 
						?>
						
					</ul>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-calendar"></i>
						<span class="hidden-xs">CE</span>
					</a>
					<ul class="dropdown-menu">
						<?php 

						 	if($odd == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/it/show_routine1.html">1st Semester</a></li>
						 		<?php
						 	} 
						?>
						<?php 

						 	if($even == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/it/show_routine2.html">2nd Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($odd == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine3.html">3st Semester</a></li>

						 		<?php	
						 	} 
						?>

						<?php 

						 	if($even == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine4.html">4th Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($odd == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine5.html">5th Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($even == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine6.html">6th Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($odd == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine7.html">7th Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($even == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine8.html">8th Semester</a></li>
						 		<?php
						 	} 
						?>
						
					</ul>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-calendar"></i>
						<span class="hidden-xs">AIEEE</span>
					</a>
					<ul class="dropdown-menu">
						<?php 

						 	if($odd == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/it/show_routine1.html">1st Semester</a></li>
						 		<?php
						 	} 
						?>
						<?php 

						 	if($even == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/it/show_routine2.html">2nd Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($odd == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine3.html">3st Semester</a></li>

						 		<?php	
						 	} 
						?>

						<?php 

						 	if($even == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine4.html">4th Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($odd == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine5.html">5th Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($even == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine6.html">6th Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($odd == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine7.html">7th Semester</a></li>
						 		<?php
						 	} 
						?>
						
						<?php 

						 	if($even == '1'){
						 		?>
						 		<li><a class="ajax-link" href="ajax/show_routine8.html">8th Semester</a></li>
						 		<?php
						 	} 
						?>
						
					</ul>
				</li>

			</ul>
		</div>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
			<div id="ajax-content"></div>
		</div>
		<!--End Content-->
	</div>
</div>
<script src="js/routine.js"></script>
</body>
</html>
