 <?php 
  session_start(); 
  include '../include/config.php';
  if(!isset($_SESSION['sid'])){   
    header("Location: ../index.php");
  }
  $path = $config->base_url.'../homepage.php';
  $signuser = $config->base_url.'/profile.php';
  $launch = $config->base_url.'/launch/launch.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Launch</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="stylesheet" href="../bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
  </head>
  <body>
    <nav class="navbar navbar-default navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo $path ?>">Sohoj<span class="text-green">Ticket.</span></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="<?php echo $launch ?>"><i class="fa fa-film"></i>Launch</a></li>
          <li><a href="<?php echo $signuser ?> "><?php echo $_SESSION['first_name']." ".$_SESSION['last_name'] ?></a></li>
          <li><a href="<?php echo $signout ?>">SignOut</a></li>
        </ul>
      </div>
  </nav>