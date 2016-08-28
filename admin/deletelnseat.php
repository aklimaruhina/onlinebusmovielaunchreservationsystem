<?php 
include_once '../lib/database.php';
$id=$_GET['id'];
	$query = "DELETE from launch_reserve where r_id ='$id'";
	$result = mysqli_query($con,$query) or die(mysqli_error($con));
	if(!$result){
		var_dump($query);
	}
	else{
		header('location: admin_dashboard_launch_seat.php');
	}
 ?> 