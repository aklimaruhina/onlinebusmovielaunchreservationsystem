	<?php	
	include 'include/config.php';
	$error = '';
	$error_class = '';
	if(!empty($_POST)){
		$qry = "SELECT * FROM users WHERE user_name = '$_POST[username]' AND password = md5('$_POST[password]')"; 
		$result = mysqli_query($con, $qry);

		if(mysqli_num_rows($result)) {
			$_SESSION['sid']=session_id();
			$login_time=strtotime('now');
			$member=mysqli_fetch_assoc($result);
			$_SESSION['name'] = $member['user_name'];
			$_SESSION['first_name'] = $member['first_name'];
			$_SESSION['last_name'] = $member['last_name'];
			$_SESSION['user_id'] = $member['user_id'];
			$role=$member['rid'];

			//if(isset($_SESSION['sid'])){
				if($member['sid'] == 0){
					$sid_insert = "UPDATE users SET sid = '$_SESSION[sid]', login_time = '$login_time' WHERE user_name = '$_POST[username]'";
					$result1 = mysqli_query($sid_insert);
				}
				
		// 	if($member['rid']==1){
		// 	$admin_path=$config->base_url.'/admin_gui.php';
		// 	header("Location: $admin_path");
		// 	}
		// 	else{
				
		// 	//}
			header("Location: homepage.php");
		// }
		}
		else {
			$error = "username or password is incorrect";
			$error_class = 'error';
		}
	}
	?>