<!--Start Breadcrumb-->
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="index.html">Home</a></li>
			<li><a href="#">1st Semester</a></li>
		</ol>
		<div id="social" class="pull-right">
			<a href="#"><i class="fa fa-facebook"></i></a>
		</div>
	</div>
</div>
<!--End Breadcrumb-->
<?php require '../../backend/connection.php' ?>


<?php 

$monday_date = (date('D') != 'Mon') ? date('Y-m-d', strtotime('last Monday')) : date('Y-m-d');
 			$tuesday_date = date('Y-m-d', strtotime($monday_date .' +1 day'));
 			$wednesday_date = date('Y-m-d', strtotime($monday_date .' +2 day'));
 			$thirsday_date = date('Y-m-d', strtotime($monday_date .' +3 day'));
 			$friday_date = date('Y-m-d', strtotime($monday_date .' +4 day')); 


 			$week_dates = array(1 => $monday_date, 2 => $tuesday_date, 3 => $wednesday_date,4 =>$thirsday_date,5 => $friday_date);

$weekday_name = array('1' => "Monday",'2' => "Tuesday",'3' => "Wednesday",'4' => "Thirsday",'5' => "Friday");

				$subject_code = array();
				$subject_teacher = array();


				$week_classes = array(
					array(0,0,0,0,0,0,0,0,0),
					array(0,0,0,0,0,0,0,0,0),
					array(0,0,0,0,0,0,0,0,0),
					array(0,0,0,0,0,0,0,0,0),
					array(0,0,0,0,0,0,0,0,0),
					array(0,0,0,0,0,0,0,0,0),

				);


				$query1 = "SELECT paper_id,paper_code,short_name FROM it_papers join users on it_papers.user_id = users.user_id";
				$fire1 = mysqli_query($con,$query1) or die('can not fetch papers table ' . mysqli_error($con));

				while($row = mysqli_fetch_array($fire1)){
					$subject_code[$row['paper_id']] = $row['paper_code'];
					$subject_teacher[$row['paper_id']] = $row['short_name'];
				}

				$query = "SELECT * FROM it_routine where semester=1 order by weekday";
				$fire = mysqli_query($con,$query) or die ('can not fetch routine' . mysqli_error($con));


				$day = 1;

					while($row = mysqli_fetch_array($fire)){
							$week_classes[$day][1] = $row['first'];
							$week_classes[$day][2] = $row['second'];						
							$week_classes[$day][3] = $row['third'];
							$week_classes[$day][4] = $row['fourth'];
							$week_classes[$day][5] = $row['fifth'];
							$week_classes[$day][6] = $row['sixth'];
							$week_classes[$day][7] = $row['seventh'];
							$week_classes[$day][8] = $row['eighth'];

						$day++;
					}

					

 ?>


<div>

	<div class="container">
    <div class="row">
      <div class="col-sm-11">
	
	<table class="table table-bordered">
			
			<thead>
				<tr>
					<th>Weekday</th>
					<th>10.00-10.50</th>
					<th>10.50-11.40</th>
					<th>11.40-12.30</th>
					<th>12.30-1.20</th>
					<th>1.20-2.10</th>
					<th>2.10-3.00</th>
					<th>3.00-3.50</th>
					<th>3.50-4.40</th>
					<th>4.40-5.30</th>
				</tr>
			</thead>
			<tbody>

					<?php 

					for ($loop=1; $loop<=5; $loop++) { ?>

					<tr>
						<th><?php echo $weekday_name[$loop]; ?></th>
						<td style="text-align: center; padding: 15px;">
							<?php  
								$date = $week_dates[$loop];
								$papr_id = $week_classes[$loop][1];
								echo $subject_code[$papr_id];
							?>
						 <br>
							<?php echo "( ".$subject_teacher[$papr_id]." )"; ?>
							<?php 
								$check_query = "SELECT * from `opt_out_it` where `date`='$date' and `period` = 1 and `paper_id`='$papr_id'";
									
									$fire_check = mysqli_query($con,$check_query) or die(mysqli_error($con));

									$counter = mysqli_num_rows($fire_check);
									if($counter != 0){ ?>
										 <br><strong style="color: red"><?php echo "cancelled"; ?></strong><?php
										}

							 ?>
							</td>

							<td style="text-align: center; padding: 15px;">
							<?php  
								$date = $week_dates[$loop];
								$papr_id = $week_classes[$loop][2];
								echo $subject_code[$papr_id];
							?>
						 <br>
							<?php echo "( ".$subject_teacher[$papr_id]." )"; ?>
							<?php 
								$check_query = "SELECT * from `opt_out_it` where `date`='$date' and `period` = 2 and `paper_id`='$papr_id'";
									
									$fire_check = mysqli_query($con,$check_query) or die(mysqli_error($con));

									$counter = mysqli_num_rows($fire_check);
									if($counter != 0){ ?>
										 <br><strong style="color: red"><?php echo "cancelled"; ?></strong><?php
										}

							 ?>
							</td>


							<td style="text-align: center; padding: 15px;">
							<?php  
								$date = $week_dates[$loop];
								$papr_id = $week_classes[$loop][3];
								echo $subject_code[$papr_id];
							?>
						 <br>
							<?php echo "( ".$subject_teacher[$papr_id]." )"; ?>
							<?php 
								$check_query = "SELECT * from `opt_out_it` where `date`='$date' and `period` = 3 and `paper_id`='$papr_id'";
									
									$fire_check = mysqli_query($con,$check_query) or die(mysqli_error($con));

									$counter = mysqli_num_rows($fire_check);
									if($counter != 0){ ?>
										 <br><strong style="color: red"><?php echo "cancelled"; ?></strong><?php
										}

							 ?>
							</td>


							<td style="text-align: center; padding: 15px;">
							<?php  
								$date = $week_dates[$loop];
								$papr_id = $week_classes[$loop][4];
								echo $subject_code[$papr_id];
							?>
						 <br>
							<?php echo "( ".$subject_teacher[$papr_id]." )"; ?>
							<?php 
								$check_query = "SELECT * from `opt_out_it` where `date`='$date' and `period` = 4 and `paper_id`='$papr_id'";
									
									$fire_check = mysqli_query($con,$check_query) or die(mysqli_error($con));

									$counter = mysqli_num_rows($fire_check);
									if($counter != 0){ ?>
										 <br><strong style="color: red"><?php echo "cancelled"; ?></strong><?php
										}

							 ?>
							</td>


							<?php if ($loop == 1) { ?>
						 	<td rowspan="5" style="text-align: center;padding-top: 135px;"><?php echo "Recess" ?></td>
						 <?php } ?>


							<td style="text-align: center; padding: 15px;">
							<?php  
								$date = $week_dates[$loop];
								$papr_id = $week_classes[$loop][5];
								echo $subject_code[$papr_id];
							?>
						 <br>
							<?php echo "( ".$subject_teacher[$papr_id]." )"; ?>
							<?php 
								$check_query = "SELECT * from `opt_out_it` where `date`='$date' and `period` = 5 and `paper_id`='$papr_id'";
									
									$fire_check = mysqli_query($con,$check_query) or die(mysqli_error($con));

									$counter = mysqli_num_rows($fire_check);
									if($counter != 0){ ?>
										 <br><strong style="color: red"><?php echo "cancelled"; ?></strong><?php
										}

							 ?>
							</td>


							<td style="text-align: center; padding: 15px;">
							<?php  
								$date = $week_dates[$loop];
								$papr_id = $week_classes[$loop][6];
								echo $subject_code[$papr_id];
							?>
						 <br>
							<?php echo "( ".$subject_teacher[$papr_id]." )"; ?>
							<?php 
								$check_query = "SELECT * from `opt_out_it` where `date`='$date' and `period` = 6 and `paper_id`='$papr_id'";
									
									$fire_check = mysqli_query($con,$check_query) or die(mysqli_error($con));

									$counter = mysqli_num_rows($fire_check);
									if($counter != 0){ ?>
										 <br><strong style="color: red"><?php echo "cancelled"; ?></strong><?php
										}

							 ?>
							</td>




							<td style="text-align: center; padding: 15px;">
							<?php  
								$date = $week_dates[$loop];
								$papr_id = $week_classes[$loop][7];
								echo $subject_code[$papr_id];
							?>
						 <br>
							<?php echo "( ".$subject_teacher[$papr_id]." )"; ?>
							<?php 
								$check_query = "SELECT * from `opt_out_it` where `date`='$date' and `period` = 7 and `paper_id`='$papr_id'";
									
									$fire_check = mysqli_query($con,$check_query) or die(mysqli_error($con));

									$counter = mysqli_num_rows($fire_check);
									if($counter != 0){ ?>
										 <br><strong style="color: red"><?php echo "cancelled"; ?></strong><?php
										}

							 ?>
							</td>


							
							
							<td style="text-align: center; padding: 15px;">
							<?php  
								$date = $week_dates[$loop];
								$papr_id = $week_classes[$loop][8];
								echo $subject_code[$papr_id];
							?>
						 <br>
							<?php echo "( ".$subject_teacher[$papr_id]." )"; ?>
							<?php 
								$check_query = "SELECT * from `opt_out_it` where `date`='$date' and `period` = 8 and `paper_id`='$papr_id'";
									
									$fire_check = mysqli_query($con,$check_query) or die(mysqli_error($con));

									$counter = mysqli_num_rows($fire_check);
									if($counter != 0){ ?>
										 <br><strong style="color: red"><?php echo "cancelled"; ?></strong><?php
										}

							 ?>
							</td>



							


					</tr>
				<?php } ?>

				

			</tbody>
		</table>

	</div>
</div>
</div>

<!--End of routine start of sunject name table-->

<div class="container">
    <div class="row">
      <div class="col-sm-6">


<table class="table table-striped">
	

	<thead>
		<tr>
			<th>Paper Code</th>
			<th>Paper Name</th>
		</tr>
	</thead>

	<tbody>
		
		<?php 

			$query2 = "SELECT paper_code,paper_name FROM it_papers where semester=1 order by paper_code";
			$fire2 = mysqli_query($con,$query2);
			while($row = mysqli_fetch_array($fire2)){ ?>
				<tr>
					<td> <?php echo $row['paper_code']; ?> </td>
					<td> <?php echo $row['paper_name']; ?> </td>
				</tr>
			<?php } ?>
	</tbody>
</table>



      </div>
  </div>
</div>
</div>