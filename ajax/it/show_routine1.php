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

<div>
	
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
				$weekday_name = array('1' => "Monday",'2' => "Tuesday",'3' => "Wednesday",'4' => "Thirsday",'5' => "Friday");

				$subject_code = array();
				$subject_teacher = array();
				$query1 = "SELECT paper_id,paper_code,short_name FROM it_papers join users on it_papers.user_id = users.user_id";
				$fire1 = mysqli_query($con,$query1) or die('can not fetch papers table ' . mysqli_error($con));

				while($row = mysqli_fetch_array($fire1)){
					$subject_code[$row['paper_id']] = $row['paper_code'];
					$subject_teacher[$row['paper_id']] = $row['short_name'];
				}

				$query = "SELECT * FROM it_routine where semester=1 order by weekday";
				$fire = mysqli_query($con,$query) or die ('can not fetch routine' . mysqli_error($con));

				$i=1;
				while($row = mysqli_fetch_array($fire)){ ?> 

					<tr>
						<th><?php echo $weekday_name[$row['weekday']] ?></th>
						<td style="text-align: center; padding: 15px;"> 
							<?php echo $subject_code[$row['first']]; ?>
						 <br>
							<?php echo "( ".$subject_teacher[$row['first']]." )"; ?>

						</td>
						
						<td style="text-align: center; padding: 15px;"> 
							<?php echo $subject_code[$row['second']]; ?>
						 <br>
							<?php echo "( ".$subject_teacher[$row['second']]." )"; ?>

						</td>

						<td style="text-align: center; padding: 15px;"> 
							<?php echo $subject_code[$row['third']]; ?>
						 <br>
							<?php echo "( ".$subject_teacher[$row['third']]." )"; ?>

						</td>

						<td style="text-align: center; padding: 15px;"> 
							<?php echo $subject_code[$row['fourth']]; ?>
						 <br>
							<?php echo "( ".$subject_teacher[$row['fourth']]." )"; ?>

						</td>


						 <?php if ($i == 1) { ?>
						 	<td rowspan="5" style="text-align: center;padding-top: 125px;"><?php echo "Recess" ?></td>
						 <?php } ?>


						<td style="text-align: center; padding: 15px;"> 
							<?php echo $subject_code[$row['fifth']]; ?>
						 <br>
							<?php echo "( ".$subject_teacher[$row['fifth']]." )"; ?>

						</td>

						<td style="text-align: center; padding: 15px;"> 
							<?php echo $subject_code[$row['sixth']]; ?>
						 <br>
							<?php echo "( ".$subject_teacher[$row['sixth']]." )"; ?>

						</td>

						<td style="text-align: center; padding: 15px;"> 
							<?php echo $subject_code[$row['seventh']]; ?>
						 <br>
							<?php echo "( ".$subject_teacher[$row['seventh']]." )"; ?>

						</td>

						<td style="text-align: center; padding: 15px;"> 
							<?php echo $subject_code[$row['eighth']]; ?>
						 <br>
							<?php echo "( ".$subject_teacher[$row['eighth']]." )"; ?>

						</td>


					</tr>
				<?php 
					$i++;
				} ?>

				

			</tbody>
		</table>
</div>
