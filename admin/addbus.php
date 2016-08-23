<?php 
include_once '../include/config.php';
if($_POST):
	$bus_name = $_POST['bus_name'];
	$bus_info = $_POST['bus_info'];
	$city_from = $_POST['city_from'];
	$city_to = $_POST['city_to'];
	$seat = $_POST['seat'];
	$fare = $_POST['fare'];
	$dt = $_POST['dtime'];
	$at = $_POST['arrtime'];
	$reserve_id = $_POST['reserve_id'];
	$dt=date('H:i:s',strtotime($dt));
	$at=date('H:i:s', strtotime($at));
	$date1 = explode('/', $_POST['dept_date']);
	$new_date1 = $date1[2].'-'.$date1[1].'-'.$date1[0];
	$date2 = explode('/', $_POST['arr_date']);
	$new_date2 = $date2[2].'-'.$date2[1].'-'.$date2[0];

	$query = "INSERT INTO `bus_reserve` (`id`, `bus_name`, `bus_info`, `city_from`, `city_to`, `seat`, `fare`, `dtime`, `arrtime`, `dept_date`, `arr_date`,`reserve_seat_id`) VALUES (NULL, '$bus_name', '$bus_info', '$city_from', '$city_to', '$seat', '$fare', '$dt', '$at', '$new_date1', '$new_date2','$reserve_id')";
	$result = mysqli_query($con, $query);
	
	if(!$result){
		var_dump($query);
		echo "You have error in your database........";
		echo "<br>";
	}
	else{
		header('location: admin_dashboard_bus.php');
		exit();
	}
	endif;
 ?>