<?php session_start();
if(empty($_SESSION['user_id'])):
header('Location:index.php');
endif;?>



<?php require 'connection.php' ?>
<?php 

	$user_id = $_SESSION['user_id'];

	$date = $_GET['day'];
	$p_no = $_GET['pno'];



	$dayOfWeek = date("w", strtotime($date));

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


				$papr_id = $week_classes[$dayOfWeek][$p_no];

				if($papr_id != 0){

					$check_query = "SELECT * from `opt_out_it` where `date`='$date' and `period` = '$p_no' and `paper_id`='$papr_id'";
					$fire_check = mysqli_query($con,$check_query) or die(mysqli_error($con));

					$counter = mysqli_num_rows($fire_check);
					if($counter == 0){
						$insert_query = "INSERT INTO `opt_out_it`(`id`, `date`, `period`, `paper_id`) VALUES (null,'$date','$p_no','$papr_id')";
							$firee = mysqli_query($con,$insert_query) or die (mysqli_error($con));
					}
					else{
						$row = mysqli_fetch_array($fire_check);
						$id_del = $row['id'];
						$del_query = "DELETE FROM `opt_out_it` where `id`='$id_del'";
						$fire_del = mysqli_query($con,$del_query) or die ("del " . mysqli_error($con));
					}
					
				}
				

				echo "<script type='text/javascript'>document.location='../user_panel.php#ajax/teacher/show_classes.php'</script>";

 ?>