<?php 
include_once '../lib/database.php';
if(isset($_POST)){
	$movie_name = $_POST['mvname'];
	$movie_director = $_POST['mvdirector'];
	$movie_decription = $_POST['mvdescription'];
	$movie_language = $_POST['mvlanguage'];
	$islive = $_POST['islive'];
	$filetmp = $_FILES["movie_poster"]["tmp_name"];
	$filename = $_FILES["movie_poster"]["name"];
	$filetype = $_FILES["movie_poster"] ["type"];
	$filepath = "../files/".$filename;
	move_uploaded_file($filetmp, $filepath); 
	$query = "INSERT INTO `movies` (`movie_id`, `movie_name`, `movie_director`, `movie_decription`, `movie_language`, `movie_poster`, `islive`,`image_name`,`image_type`,`image_path`) 
	VALUES (NULL, '$movie_name', '$movie_director', '$movie_decription', '$movie_language', '$filepath', '$islive','$filename','$filetype','')";
	
	$result = mysqli_query($con, $query) or die(mysqli_error($con));
	if ($result) {
		header("location: admin_dashboard_movie.php");
		exit();
	}
	else{
		var_dump($query);
		echo "Error";
	}
}
 ?>