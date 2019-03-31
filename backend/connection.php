<?php 

	
	define("HOSTNANME","localhost");
	define("USERNAME", "root");
	define("PASSWORD", "");
	define("DBNAME", "routine");

	$con = mysqli_connect(HOSTNANME,USERNAME,PASSWORD,DBNAME) or die("can not connect to database");


 ?>