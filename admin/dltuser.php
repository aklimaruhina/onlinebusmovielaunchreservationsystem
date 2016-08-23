<?php

// This is a sample code in case you wish to check the username from a mysql db table
include('../include/config.php');
if($_GET['id'])
{
	$id=$_GET['id'];
	$query = "DELETE from users where user_id ='$id'";
	$result = mysqli_query($con,$query);
	 header("location: admin_dashboard.php");
}

?>