<?php 
include_once '../include/config.php';
$id = $_GET['id'];
if($_POST):
	$bus_name = $_POST['bus_name'];
	$bus_info = $_POST['bus_info'];
	$city_from = $_POST['city_from'];
	$city_to = $_POST['city_to'];
	$seat = $_POST['seat'];
	$fare = $_POST['fare'];
	$dt = $_POST['dtime'];
	$at = $_POST['arrtime'];
	$dt=date('H:i:s p',strtotime($dt));
	$at=date('H:i:s p', strtotime($at));
	$date1 = explode('/', $_POST['dept_date']);
	$new_date1 = $date1[2].'-'.$date1[1].'-'.$date1[0];
	$date2 = explode('/', $_POST['arr_date']);
	$new_date2 = $date2[2].'-'.$date2[1].'-'.$date2[0];
	$query="UPDATE `bus_reserve` SET `bus_name` = '$bus_name', `bus_info` = '$bus_info', `city_from` = '$city_from',
	 `city_to` = '$city_to', `seat` = '$seat', `fare` = '$fare', `dtime` = '$dt', `arrtime` = '$at', `dept_date` = '$new_date1', `arr_date` = '$new_date2' WHERE `bus_reserve`.`id` = ".$id;
	$result = mysqli_query($con, $query);
	if(!$result){
	    var_dump($query);
	}
	else {
	    
	    header('Location: admin_dashboard_bus.php');
	    exit();
	} 
	endif;
 ?>