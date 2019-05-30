<?php session_start();
if(empty($_SESSION['user_id'])):
header('Location:index.php');
endif;?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Welcome Username</title>
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
					<h4 style="color: White">Welcome <strong style="color: #2ecc71"><?php echo strtoupper($_SESSION['short_name'])?></strong></h4>
				</div>
			</div>
			<div id="top-panel" class="col-md-1">
				<div class="pull-right" style="padding-top: 5px">
					<button style="background-color: #d64541" type="button" class="btn btn-primary" onclick="clickLogout()">Log Out</button>
				</div>
			</div>
		</div>
	</div>
</header>
<!--End Header-->

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
					<a href="ajax/dashboard.html" class="ajax-link">
						<i class="fa fa-calendar-o"></i>
						<span class="hidden-xs">Today's classes</span>
					</a>
				</li>
				<li>
					<a href="ajax/dashboard.html" class="ajax-link">
						<i class="fa fa-calendar"></i>
						<span class="hidden-xs">This weeks classes</span>
					</a>
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
