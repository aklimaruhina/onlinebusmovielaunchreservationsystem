<?php 
include_once '../include/config.php';
if(isset($_POST)):
	$theatre_name = $_POST['theatre_name'];
	$city_id = $_POST['city'];
	$manager = $_POST['manager'];
	$query = "INSERT INTO `theatres` (`theatre_id`, `city_id`, `theatre_name`, `manager`) VALUES (NULL, '$city_id', '$theatre_name', '$manager')";
	$result = mysqli_query($con, $query);
	if(!$result){
		var_dump($result);
	}
	else{
		header('location: admin_dashboard_movie.php');
	}
endif;
 ?>