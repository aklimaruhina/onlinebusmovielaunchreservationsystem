<?php 
include_once '../include/config.php';
if($_POST):
	$launch_name = $_POST['launch_name'];
	$launch_info = $_POST['launch_info'];
	$city_from = $_POST['city_from'];
	$city_to = $_POST['city_to'];
	$seat = $_POST['seat'];
	$reserve_id = $_POST['reserve_id'];
	$dt = $_POST['dtime'];
	$at = $_POST['arrtime'];
	$dt=date('H:i:s',strtotime($dt));
	$at=date('H:i:s', strtotime($at));
	$date1 = explode('/', $_POST['dept_date']);
	$new_date1 = $date1[2].'-'.$date1[1].'-'.$date1[0];
	$date2 = explode('/', $_POST['arr_date']);
	$new_date2 = $date2[2].'-'.$date2[1].'-'.$date2[0];

	$query = "INSERT INTO `launch_info` (`launch_id`, `launch_name`, `launch_info`, `city_from`, `city_to`, `seat`, `dtime`, `arrtime`, `dept_date`, `arr_date`,`reserve_id`) VALUES (NULL, '$launch_name', '$launch_info', '$city_from', '$city_to', '$seat', '$dt', '$at', '$new_date1', '$new_date2','$reserve_id')";
	$result = mysqli_query($con, $query);
	
	if(!$result){
		echo "You have error in your database........";
		echo "<br>";
		var_dump($query);
	}
	else{
		header('location: admin_dashboard_bus.php');
		exit();
	}
	endif;
 ?>
