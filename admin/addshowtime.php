<?php 
include_once '../lib/database.php';
if(isset($_POST)):

$screens = $_POST['screens'];
$date1 = explode('/', $_POST['start_date']);
	$new_date1 = $date1[2].'-'.$date1[1].'-'.$date1[0];
	$date2 = explode('/', $_POST['end_date']);
	$new_date2 = $date2[2].'-'.$date2[1].'-'.$date2[0];

$query = "INSERT INTO `theatre_show_timings` (`theatre_show_time_id`, `screen_id`, `start_date`, `end_date`) 
VALUES (NULL, '$screens', '$new_date1', '$new_date2')";
$result = mysqli_query($con, $query);
if(!$result){
	var_dump($query);
}
else{
	header('location: admin_dashboard_movie.php');
}
endif;
 ?>