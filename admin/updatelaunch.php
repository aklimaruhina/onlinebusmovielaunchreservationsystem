<?php 
include_once '../include/config.php';
$id = $_GET['id'];
if($_POST):
	$launch_name = $_POST['launch_name'];
	$launch_info = $_POST['launch_info'];
	$city_from = $_POST['city_from'];
	$city_to = $_POST['city_to'];
	$seat = $_POST['seat'];
	$dt = $_POST['dtime'];
	$at = $_POST['arrtime'];
	$fare_range = $_POST['fare_range'];
	$dt=date('H:i:s',strtotime($dt));
	$at=date('H:i:s', strtotime($at));
	$date1 = explode('/', $_POST['dept_date']);
	$new_date1 = $date1[2].'-'.$date1[1].'-'.$date1[0];
	$date2 = explode('/', $_POST['arr_date']);
	$new_date2 = $date2[2].'-'.$date2[1].'-'.$date2[0];

	$query="UPDATE `launch_info` SET `launch_name` = '$launch_name', `launch_info` = '$launch_info', `city_from` = '$city_from', `city_to` = '$city_to', `seat` = '$seat', `dtime` = '$dt', `arrtime` = '$at', `dept_date` = '$new_date1', `arr_date` = '$new_date2', `fare_range` = '$fare_range' WHERE `launch_info`.`launch_id` =  ".$id;
	$result = mysqli_query($con, $query);
	if(!$result){
	    var_dump($query);
	}
	else {
	    
	    header('Location: admin_dashboard_launch.php');
	    exit();
	} 
	endif;
 ?>