<?php 
include_once '../include/config.php';
$id = $_GET['id'];
if(isset($_POST)):
	$movie_name = $_POST['mvname'];
	$movie_director = $_POST['mvdirector'];
	$movie_decription = $_POST['mvdescription'];
	$movie_language = $_POST['mvlanguage'];
	$islive = $_POST['islive'];
	$query = "UPDATE `movies` SET `movie_name` = '$movie_name', `movie_director` = '$movie_director', 
	`movie_decription` = '$movie_decription', `islive` = '$islive ' WHERE `movies`.`movie_id` =  ".$id;
	$result = mysqli_query($con, $query);
	if(!$result){
	    var_dump($query);
	}
	else {
	    
	    header('Location: admin_dashboard_movie_resv.php');
	    exit();
	} 
endif;
 ?>