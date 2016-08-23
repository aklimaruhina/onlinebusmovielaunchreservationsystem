<?php 
include_once '../include/config.php';
$id=$_GET['id'];
	$query = "DELETE from bus_reserve where id ='$id'";
	$result = mysqli_query($con,$query);
	if(!$result){
		var_dump($query);
	}
	else{
		header('location: admin_dashboard_bus.php');
	}
	 // header("location: admin_dashboard_bus.php");
 ?> 