<?php 
include_once '../lib/app.php';
$id=$_GET['id'];
	$query = "DELETE from bus_reserve where id ='$id'";
	$result = mysqli_query($con,$query) or die(mysqli_error($con));
	if(!$result){
		var_dump($query);
	}
	else{
		header('location: admin_dashboard_bus.php');
	}
	 // header("location: admin_dashboard_bus.php");
 ?> 