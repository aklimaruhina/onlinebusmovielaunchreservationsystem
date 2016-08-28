<?php
include '../lib/database.php';

/**
 * Validating User Name
 */
if(!empty($_REQUEST['username'])){
	$username = $_REQUEST['username'];
	$query_username = "SELECT id FROM users WHERE username = '$username'";
	$chk_username = mysqli_query($con, $query_username) or die(mysqli_error($con));
//	$results = mysqli_query($link, $query) ;
	//$rc = mysql_affected_rows();
	if(mysqli_num_rows($chk_username)) {
		print "<div class='field-error col-sm-4' id='field-error-username'>User Name is not available, Plese choose another User Name.</div>";
		//print "User Name is not available, Plese choose another User Name.";
	}
	else{
		if(!preg_match("/^[A-Za-z0-9_]{4,20}$/", $username, $match))
		print "<div class='field-error col-sm-4' id='field-error-username'>User name should contain min 4, max 20 characters and may contain a-z, A-Z, 0-9, _</div>";
		//print "User name should contain min 4, max 20 characters and may contain a-z, A-Z, 0-9, _";
	}
}
else{
	print "<div class='field-error col-sm-4' id='field-error-username'>User Name is a required field.</div>";
	//print "User Name is a required field.";
}
?>