<?php 
require_once('../lib/app.php');
$first_name = '';
$last_name = '';
$email = '';
$password = '';
$address = '';
$mobileno = '';
$user_name = '';
$query = "SELECT count(*) as total_user FROM users";
$result = mysqli_query($con, $query) or die (mysqli_error($con));
$users = array();
$row = mysqli_fetch_assoc($result);
$total_user = intval($row['total_user']);
if($total_user === 0){
	$is_admin = 1;
}
else{ 
  $is_admin=0;
}
if(isset($_POST['first_name']))
	$first_name = $_POST['first_name'];
if(isset($_POST['last_name']))
	$last_name = $_POST['last_name'];
if(isset($_POST['email']))
	$email = $_POST['email'];
if(isset($_POST['password']))
	$password = md5($_POST['password']);
if(isset($_POST['address']))
	$address = $_POST['address'];
if(isset($_POST['mobileno']))
	$mobileno = $_POST['mobileno'];
if(isset($_POST['user_name']))
	$user_name = $_POST['user_name'];
$query1  =  "INSERT INTO users(id,username,email, password, is_admin, created) 
			values(NULL,'".$user_name."','".$email."','".$password."','".$is_admin."' , NOW())";
$success = mysqli_query($con,$query1) or die(mysqli_error($con));
$query_id = "SELECT * FROM users WHERE email ='".$email."' AND username = '".$user_name."' AND password = '".$password."'";
$result = mysqli_query($con, $query_id) or die(mysqli_error($con));
$user = array();
$user = mysqli_fetch_assoc($result);
$reg_user= $user['id'];
//var_dump($reg_user);
$query2 = "INSERT INTO profiles(user_id,first_name, last_name, mobile_number,email, address, status,created) 
 			values('".$reg_user."','".$first_name."','".$last_name."','".$mobileno."', '".$email."','".$address."','1',NOW())";
$success = mysqli_query($con,$query2) or die(mysqli_error($con));
if($success){
 	$_SESSION['msg_success'] = "Please re-enter your email and password.";
 }else{
 	$_SESSION['msg_error'] = "Failed to add data";
 }
 header('location: ../login.php');



 ?>