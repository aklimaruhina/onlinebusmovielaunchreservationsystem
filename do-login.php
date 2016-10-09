<?php 
require_once('lib/app.php');
$username = $_POST['username'];
$password = md5($_POST['password']);
$query = "SELECT * FROM users WHERE username ='".$username."' AND password = '".$password."'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
	$user = array();
	$user = mysqli_fetch_assoc($result);
if($user['id'] && $user['is_admin']==0){
	$_SESSION['user_loggedin'] = true;
	$_SESSION['user'] = $user;
	//$_SESSION['id'] = $userid;
	//var_dump($_SESSION['id']);
	header("location: homepage.php?id=".$user['id']);
}
else if($user['id'] && $user['is_admin']==1){
	$_SESSION['user_loggedin'] = true;
	$_SESSION['user'] = $user;

	header("location: admin/admin_dashboard.php=".$user['id']);
}
else{
	$_SESSION['msg_error'] = 'Authentication failed! Please try again.';
	header('location: login.php');

}
 ?>