<?php 
include_once '../include/config.php';
$id=$_GET['id'];
	$query = "DELETE from launch_reserve where r_id ='$id'";
	$result = mysqli_query($con,$query);
	if(!$result){
		var_dump($query);
	}
	else{
		header('location: admin_dashboard_launch_seat.php');
	}
 ?> 