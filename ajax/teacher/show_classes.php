<?php session_start();
if(empty($_SESSION['user_id'])):
header('Location:index.php');
endif;?>

<!--Start Breadcrumb-->
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="index.html">Home</a></li>
			<li><a href="#">Week Classes</a></li>
		</ol>
		<div id="social" class="pull-right">
			<a href="#"><i class="fa fa-facebook"></i></a>
		</div>
	</div>
</div>
<!--End Breadcrumb-->

  

<?php require '../../backend/connection.php' ?>

<?php 
	$user_id = $_SESSION['user_id'];
 ?>


 <?php


 			$monday_date = (date('D') != 'Mon') ? date('Y-m-d', strtotime('last Monday')) : date('Y-m-d');
 			$tuesday_date = date('Y-m-d', strtotime($monday_date .' +1 day'));
 			$wednesday_date = date('Y-m-d', strtotime($monday_date .' +2 day'));
 			$thirsday_date = date('Y-m-d', strtotime($monday_date .' +3 day'));
 			$friday_date = date('Y-m-d', strtotime($monday_date .' +4 day')); 


 			$week_dates = array(1 => $monday_date, 2 => $tuesday_date, 3 => $wednesday_date,4 =>$thirsday_date,5 => $friday_date);






				$weekday_name = array('1' => "Monday",'2' => "Tuesday",'3' => "Wednesday",'4' => "Thirsday",'5' => "Friday");

				$subject_code = array();
				$papers = array();
				$semester_active = array();


				$week_classes = array(
					array(0,0,0,0,0,0,0,0,0),
					array(0,0,0,0,0,0,0,0,0),
					array(0,0,0,0,0,0,0,0,0),
					array(0,0,0,0,0,0,0,0,0),
					array(0,0,0,0,0,0,0,0,0),
					array(0,0,0,0,0,0,0,0,0),

				);





				$query1 = "SELECT * FROM it_papers where user_id = '$user_id'";

				$fire1 = mysqli_query($con,$query1) or die('can not fetch papers table ' . mysqli_error($con));

				$i = 0;
				while($row = mysqli_fetch_array($fire1)){
					$subject_code[$row['paper_id']] = $row['paper_code'];
					$papers[$i] = $row['paper_id'];
					$i = $i + 1; 
				}




				$query_active = "SELECT value from active_semester where semester_name = 'even'";
				$fire2 = mysqli_query($con,$query_active) or die("active seester not fetched" . mysqli_error($con)); 
				$row = mysqli_fetch_array($fire2);

				if($row['value'] == 0){
					array_push($semester_active, 1);
				//	array_push($semester_active, 3);
				//	array_push($semester_active, 5);
				//	array_push($semester_active, 7);
				}

				else{
					array_push($semester_active, 2);
					array_push($semester_active, 4);
					array_push($semester_active, 6);
					array_push($semester_active, 8);
				}



				foreach ($semester_active as $curr_sem) {
					
					$query_rou = "select * from it_routine where semester='$curr_sem' order by weekday";

					$fire_rou = mysqli_query($con,$query_rou);
					$day = 1;

					while($row = mysqli_fetch_array($fire_rou)){
						if(in_array($row['first'], $papers)){
							$week_classes[$day][1] = $row['first'];
						}
						if(in_array($row['second'], $papers)){
							$week_classes[$day][2] = $row['second'];
						}
						if(in_array($row['third'], $papers)){
							$week_classes[$day][3] = $row['third'];
						}
						if(in_array($row['fourth'], $papers)){
							$week_classes[$day][4] = $row['fourth'];
						}
						if(in_array($row['fifth'], $papers)){
							$week_classes[$day][5] = $row['fifth'];
						}
						if(in_array($row['sixth'], $papers)){
							$week_classes[$day][6] = $row['sixth'];
						}
						if(in_array($row['seventh'], $papers)){
							$week_classes[$day][7] = $row['seventh'];
						}
						if(in_array($row['eighth'], $papers)){
							$week_classes[$day][8] = $row['eighth'];
						}

						$day++;
					}

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
							
							<th><?php echo $weekday_name[$loop] ?></th>
						<td style="text-align: center; padding: 15px;"> 
							<?php 
								$date = $week_dates[$loop];
								$papr_id = $week_classes[$loop][1];
								if($papr_id != 0){
									echo $subject_code[$week_classes[$loop][1]];
									$check_query = "SELECT * from `opt_out_it` where `date`='$date' and `period` = 1 and `paper_id`='$papr_id'";
									$fire_check = mysqli_query($con,$check_query) or die(mysqli_error($con));

									$counter = mysqli_num_rows($fire_check);
									if($counter != 0){ ?>
										 <br><strong style="color: red"><?php echo "cancelled"; ?></strong><?php 
										
									}
								}

									
								else echo "         ";
							?>
						</td>
						
						<td style="text-align: center; padding: 15px;"> 
							<?php 
								$date = $week_dates[$loop];
								$papr_id = $week_classes[$loop][2];
								if($papr_id != 0){
									echo $subject_code[$week_classes[$loop][2]];
									$check_query = "SELECT * from `opt_out_it` where `date`='$date' and `period` = 2 and `paper_id`='$papr_id'";
									$fire_check = mysqli_query($con,$check_query) or die(mysqli_error($con));

									$counter = mysqli_num_rows($fire_check);
									if($counter != 0){ ?>
										 <br><strong style="color: red"><?php echo "cancelled"; ?></strong><?php 
										
									}
								}

									
								else echo "         ";
							?>
						</td>

						<td style="text-align: center; padding: 15px;"> 
							<?php 
								$date = $week_dates[$loop];
								$papr_id = $week_classes[$loop][3];
								if($papr_id != 0){
									echo $subject_code[$week_classes[$loop][3]];
									$check_query = "SELECT * from `opt_out_it` where `date`='$date' and `period` = 3 and `paper_id`='$papr_id'";
									$fire_check = mysqli_query($con,$check_query) or die(mysqli_error($con));

									$counter = mysqli_num_rows($fire_check);
									if($counter != 0){ ?>
										 <br><strong style="color: red"><?php echo "cancelled"; ?></strong><?php 
										
									}
								}

									
								else echo "         ";
							?>
						</td>

						<td style="text-align: center; padding: 15px;"> 
							<?php 
								$date = $week_dates[$loop];
								$papr_id = $week_classes[$loop][4];
								if($papr_id != 0){
									echo $subject_code[$week_classes[$loop][4]];
									$check_query = "SELECT * from `opt_out_it` where `date`='$date' and `period` = 4 and `paper_id`='$papr_id'";
									$fire_check = mysqli_query($con,$check_query) or die(mysqli_error($con));

									$counter = mysqli_num_rows($fire_check);
									if($counter != 0){ ?>
										 <br><strong style="color: red"><?php echo "cancelled"; ?></strong><?php 
										
									}
								}

									
								else echo "         ";
							?>
						</td>


						 <?php if ($loop == 1) { ?>
						 	<td rowspan="5" style="text-align: center;padding-top: 135px;"><?php echo "Recess" ?></td>
						 <?php } ?>


						<td style="text-align: center; padding: 15px;"> 
							<?php 
								$date = $week_dates[$loop];
								$papr_id = $week_classes[$loop][5];
								if($papr_id != 0){
									echo $subject_code[$week_classes[$loop][5]];
									$check_query = "SELECT * from `opt_out_it` where `date`='$date' and `period` = 5 and `paper_id`='$papr_id'";
									$fire_check = mysqli_query($con,$check_query) or die(mysqli_error($con));

									$counter = mysqli_num_rows($fire_check);
									if($counter != 0){ ?>
										 <br><strong style="color: red"><?php echo "cancelled"; ?></strong><?php 
										
									}
								}

									
								else echo "         ";
							?>
						</td>

						<td style="text-align: center; padding: 15px;"> 
							<?php 
								$date = $week_dates[$loop];
								$papr_id = $week_classes[$loop][6];
								if($papr_id != 0){
									echo $subject_code[$week_classes[$loop][6]];
									$check_query = "SELECT * from `opt_out_it` where `date`='$date' and `period` = 6 and `paper_id`='$papr_id'";
									$fire_check = mysqli_query($con,$check_query) or die(mysqli_error($con));

									$counter = mysqli_num_rows($fire_check);
									if($counter != 0){ ?>
										 <br><strong style="color: red"><?php echo "cancelled"; ?></strong><?php 
										
									}
								}

									
								else echo "         ";
							?>
						</td>

						<td style="text-align: center; padding: 15px;"> 
							<?php 
								$date = $week_dates[$loop];
								$papr_id = $week_classes[$loop][7];
								if($papr_id != 0){
									echo $subject_code[$week_classes[$loop][7]];
									$check_query = "SELECT * from `opt_out_it` where `date`='$date' and `period` = 7 and `paper_id`='$papr_id'";
									$fire_check = mysqli_query($con,$check_query) or die(mysqli_error($con));

									$counter = mysqli_num_rows($fire_check);
									if($counter != 0){ ?>
										 <br><strong style="color: red"><?php echo "cancelled"; ?></strong><?php 
										
									}
								}

									
								else echo "         ";
							?>
						</td>

						<td style="text-align: center; padding: 15px;"> 
							<?php 
								$date = $week_dates[$loop];
								$papr_id = $week_classes[$loop][8];
								if($papr_id != 0){
									echo $subject_code[$week_classes[$loop][8]];
									$check_query = "SELECT * from `opt_out_it` where `date`='$date' and `period` = 8 and `paper_id`='$papr_id'";
									$fire_check = mysqli_query($con,$check_query) or die(mysqli_error($con));

									$counter = mysqli_num_rows($fire_check);
									if($counter != 0){ ?>
										 <br><strong style="color: red"><?php echo "cancelled"; ?></strong><?php 
										
									}
								}

									
								else echo "         ";
							?>
						</td>

						<?php } ?>
						</tr>
						
				

			</tbody>
		</table>

      </div>
  </div>
</div>


<br>


<div class="container">
    <div class="row">
      <div class="col-sm-4">
      	<div class="panel-heading">
            <h3>Turn Off Class</h3>
            <hr>
          </div>
      	<form action="backend/it_opt_add.php" method="get">
      		
      			<div class="form-group">
                    <label for="date">Select Day</label>
                    <div class="input-group col-md-12">
                      <select class="browser-default custom-select custom-select-lg mb-3" id="day" name="day">
                          <option selected>-- None --</option>
                          <option value="<?php echo $monday_date ?>">Monday</option>
                          <option value="<?php echo $tuesday_date ?>">Tuesday</option>
                          <option value="<?php echo $wednesday_date ?>">Wednesday</option>
                          <option value="<?php echo $thirsday_date ?>">Thirsday</option>
                          <option value="<?php echo $friday_date ?>">Friday</option>
                        </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->



                  <div class="form-group">
                    <label for="date">Select Period No.</label>
                    <div class="input-group col-md-12"> 
                      <select class="browser-default custom-select custom-select-lg mb-3" id="pno" name="pno">
                          <option selected>-- None --</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                        </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->


                   <div class="form-group">
                    <div class="input-group">
                      <button type="submit" class="btn btn-primary"  style="background-color: #26c281;padding-right: 15px;padding-left: 15px;" id="save" name="save">
                        State Change
                      </button>
                    </div>
                  </div><!-- /.form group -->

      	</form>
      	 



      </div>

      <br>
      <br>
      <br>

      <div class="col-sm-4">


<table class="table table-striped">
	

	<thead>
		<tr>
			<th>Paper Code</th>
			<th>Paper Name</th>
		</tr>
	</thead>

	<tbody>
		
		<?php 

			$query2 = "SELECT paper_code,paper_name FROM it_papers where user_id='$user_id' order by paper_code";
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