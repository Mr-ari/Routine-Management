<!--Start Breadcrumb-->
<div class="row">
  <div id="breadcrumb" class="col-xs-12">
    <a href="#" class="show-sidebar">
      <i class="fa fa-bars"></i>
    </a>
    <ol class="breadcrumb pull-left">
      <li><a href="">Home</a></li>
      <li><a href="">Select Semester</a></li>
    </ol>
    <div id="social" class="pull-right">
      <a href="#"><i class="fa fa-facebook"></i></a>
    </div>
  </div>
</div>
<!--End Breadcrumb-->


<?php require '../../backend/connection.php' ?>
<?php 
	
	$query = "SELECT * FROM active_semester WHERE semester_name='odd'";
	$fire = mysqli_query($con,$query) or die("Can not fetch select sem".mysqli_error($con));
	$row = mysqli_fetch_array($fire);
	$check = $row['value'];
 ?>


<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="panel-group">
          <div class="panel-heading">
            <h3><strong>Select Current Semester</strong></h3>
            <hr>
          </div>
          <div class="panel-body">
          	<form action="backend/change_sem.php" method="POST">
				<div class="form-group">
					<input type="radio" name="semester" value="first" <?php 
					
					if($check == '1'){
						echo 'checked';
					} 

					?>

					> Odd Semester
				</div>
				<div class="form-group">
					<input type="radio" name="semester" value="second"
					<?php 
					
					if($check == '0'){
						echo 'checked';
					} 

					?>
					> Even Semester
				</div>
				<hr>
				<div class="form-group">
					
					<input type="submit" name="select_sem" class="btn btn-primary">
				</div>
				
			</form>
		</div>
		</div>
	</div>
</div>
</div>