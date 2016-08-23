<?php 
include_once '../include/config.php';
$id=$_GET['id'];
	$query = "DELETE from screens where screen_id ='$id'";
	$result = mysqli_query($con,$query);
	if(!$result){
		var_dump($query);
	}
	else{
		header('location: admin_dashboard_movie_resv.php');
	}
	 // header("location: admin_dashboard_bus.php");
 ?> 