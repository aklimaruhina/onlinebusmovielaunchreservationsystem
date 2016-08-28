<?php

// This is a sample code in case you wish to check the username from a mysql db table
include('../lib/database.php');
if($_GET['id'])
{
	$id=$_GET['id'];
	$query = "DELETE from reserve_section where id ='$id'";
	$result = mysqli_query($con,$query);
	 header("location: admin_dashboard_bus_seat.php");
}

?>