<?php 
	session_start(); 
	include 'include/config.php';
	if(!isset($_SESSION['sid'])){   
    header("Location: index.php");
  }
	$path = $config->base_url.'/homepage.php';
	$signout = $config->base_url.'/functions/logout.php';
	$signuser = $config->base_url.'/profile.php';
	$bus = $config->base_url.'/bus/bus.php';
	$launch = $config->base_url.'/launch/launch.php';
	$movie = $config->base_url.'/movies/movie.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
  </head>
  <body>
  	<nav class="navbar navbar-default navbar-inverse">
  		<div class="container-fluid">
    		<div class="navbar-header">
      			<a class="navbar-brand" href="<?php echo $path ?>">Sohoj<span class="text-green">Ticket.</span></a>
    		</div>
    		<ul class="nav navbar-nav navbar-right">
    			<li class="active"><a href="<?php echo $bus ?>"><i class="fa fa-bus"></i>Buses</a></li>
    			<li><a href="<?php echo $launch; ?>" target="_"><i class="fa fa-ship"></i>launch</a></li>
    			<li><a href="<?php echo $movie ?>"><i class="fa fa-film"></i>Movies</a></li>
          <li><a href="<?php echo $signuser ?> "><?php echo $_SESSION['first_name']." ".$_SESSION['last_name'] ?></a></li>
          <li><a href="<?php echo $signout ?>">SignOut</a></li>
          
    		</ul>
  		</div>
	</nav>
  <?php echo "Welcome: ".$_SESSION['first_name'] ?>
  <!-- a user can't book more thn 10 seats in one bus. -->