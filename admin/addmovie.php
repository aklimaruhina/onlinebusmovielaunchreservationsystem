<?php 
include_once '../include/config.php';
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
	$query = "INSERT INTO `movies` (`movie_id`, `movie_name`, `movie_director`, `movie_decription`, `movie_language`, `movie_poster`, `islive`) 
	VALUES (NULL, '$movie_name', '$movie_director', '$movie_decription', '$movie_language', '$filepath', '$islive')";
	
	$result = mysqli_query($con, $query);
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