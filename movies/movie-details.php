<?php 
  session_start(); 
  include '../include/config.php';
  if(!isset($_SESSION['sid'])){   
    header("Location: index.php");
  }
  $path = $config->base_url.'/homepage.php';
  $signout = $config->base_url.'/functions/logout.php';
  $signuser = $config->base_url.'/profile.php';
  $movie = $config->base_url.'/movies/movie.php';
  $allmovie= $config->base_url.'/movies/all-movie.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movie Page</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
  </head>
  <body>
    <nav class="navbar navbar-default navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo $path ?>">Sohoj<span class="text-green">Ticket.</span></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          
          <li class="active"><a href="<?php echo $movie ?>"><i class="fa fa-film"></i>Movies</a></li>
          <li><a href="<?php echo $allmovie; ?> ">All Movie</a></li>
          <li><a href="<?php echo $signuser ?> "><?php echo $_SESSION['first_name']." ".$_SESSION['last_name'] ?></a></li>
          <li><a href="<?php echo $signout ?>">SignOut</a></li>
          
        </ul>
      </div>
  </nav>
  <header>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="movie-details">
            <?php
              $sel_mov_id = "SELECT * FROM movies WHERE movie_id=".$_GET['id'];
              $sel_mov_id_qry = mysqli_query($con, $sel_mov_id);
              $sel_mov_id_qry_row = mysqli_fetch_object($sel_mov_id_qry);
            ?>
            <div class="col-md-6">
              <img src="../<?php echo $sel_mov_id_qry_row->movie_poster; ?> " alt="" class='img-responsive'>
            </div>
            <p>Movie name: <?php echo $sel_mov_id_qry_row->movie_name; ?></p>
            <p>Movie language: <?php echo $sel_mov_id_qry_row->movie_language; ?></p>
            <p>Movie Director: <?php echo $sel_mov_id_qry_row->movie_director ?></p>
            <p>Movie Description: <?php echo $sel_mov_id_qry_row->movie_decription ?></p>
            <p>Movie Status: <?php echo $sel_mov_id_qry_row->islive ?></p>
            
          </div>
        </div>
      </div>
    </div>
  </header>