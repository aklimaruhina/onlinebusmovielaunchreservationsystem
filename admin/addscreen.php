<?php 
include_once '../include/config.php';
if(isset($_POST)):
	$screen_name = $_POST['screen_name'];
	$theatre = $_POST['theatre'];
	$movie = $_POST['movie'];
	$capacity = $_POST['capacity'];
	$query = "INSERT INTO `screens` (`screen_id`, `screen_name`, `theatre_id`, `movie_id`,`screen_capactiy`) VALUES (NULL, '$screen_name', '$theatre', '$movie','$capacity')";
	$result = mysqli_query($con, $query);
	if(!$result){
		var_dump($result);
	}
	else{
		header('location: admin_dashboard_movie.php');
	}
endif;
 ?>