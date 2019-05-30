<?php session_start();
if(empty($_SESSION['user_id'])):
header('Location:index.php');
endif;?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Admin Panel</title>
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
			<div id="top-panel" class="col-md-7">
				<div class="pull-right" style="padding-top: 5px">
					<h4 style="color: White">Welcome <strong style="color: #2ecc71">Admin</strong></h4>
				</div>
			</div>
				<div id="top-panel" class="col-md-1">
				<div class="pull-right" style="padding-top: 5px">
					<button style="background-color: #d64541" type="button" class="btn btn-primary" name="logout" onclick="clickLogout()">Log Out</button>
				</div>
			</div>
			
		</div>
	</div>
</header>
<!--End Header-->

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Login to Your Account</h1><br>
				  <form>
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
						<i class="fa fa-home"></i>
						<span class="hidden-xs">Home</span>
					</a>
				</li>
				<li>
					<a href="ajax/my_profile.php" class="ajax-link">
						<i class="fa fa-user"></i>
						<span class="hidden-xs">My Account</span>
					</a>
				</li>
				<li>
					<a href="ajax/admin/user_profile.php" class="ajax-link">
						<i class="fa fa-users"></i>
						<span class="hidden-xs">Users Details</span>
					</a>
				</li>
				<li>
					<a href="ajax/admin/select_semester.php" class="ajax-link">
						<i class="fa fa-check"></i>
						<span class="hidden-xs">Select Semester</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-book"></i>
						<span class="hidden-xs">Subjects</span>
					</a>
					<ul class="dropdown-menu">
						<li><a class="ajax-link" href="ajax/it/show_routine1.html">IT</a></li>
						<li><a class="ajax-link" href="ajax/it/show_routine2.html">CSE</a></li>
						<li><a class="ajax-link" href="ajax/show_routine3.html">ECE</a></li>
						<li><a class="ajax-link" href="ajax/show_routine4.html">CE</a></li>
						<li><a class="ajax-link" href="ajax/show_routine5.html">EE</a></li>
						<li><a class="ajax-link" href="ajax/show_routine6.html">AIEEE</a></li>
					</ul>
				</li>

								<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-calendar"></i>
						<span class="hidden-xs">Edit Routines</span>
					</a>
					<ul class="dropdown-menu">
						<li><a class="ajax-link" href="ajax/it/show_routine1.html">IT</a></li>
						<li><a class="ajax-link" href="ajax/it/show_routine2.html">CSE</a></li>
						<li><a class="ajax-link" href="ajax/show_routine3.html">ECE</a></li>
						<li><a class="ajax-link" href="ajax/show_routine4.html">CE</a></li>
						<li><a class="ajax-link" href="ajax/show_routine5.html">EE</a></li>
						<li><a class="ajax-link" href="ajax/show_routine6.html">AIEEE</a></li>
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
<script type="text/javascript">



  	function clickLogout(){

		$.ajax({

			url:"backend/logout.php",
			type:"POST",

			success:function(data,status){
				document.location='http://localhost/Routine-Management/index.php';
			}
		})
 
  	}
  </script>
</body>
</html>
