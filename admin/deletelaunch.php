<?php 
include_once '../lib/app.php';
$id=$_GET['id'];
	$query = "DELETE from launch_info where launch_id ='$id'";
	$result = mysqli_query($con,$query) or die(mysqli_error($con));
	if(!$result){
		var_dump($query);
	}
	else{
		header('location: admin_dashboard_launch.php');
		exit();
	}
 ?> 