<?php 
  session_start(); 
  include '../include/config.php';
  if(!isset($_SESSION['sid'])){   
    header("Location: ../index.php");
  }
  $path = $config->base_url.'/homepage.php';
  $signout = $config->base_url.'/functions/logout.php';
  $signuser = $config->base_url.'/profile.php';
  $movie = $config->base_url.'/movies/movie.php';
  $allmovie= $config->base_url.'/movies/all-movie.php';
  $query = "SELECT *FROM movies";
  $result = mysqli_query($con, $query);
  $row_cnt =  $result->num_rows;
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
          <li><a href="<?php echo $allmovie ?>"><i class="fa fa-film"></i>All Movie</a></li>

          <li class="active"><a href="<?php echo $movie ?>"><i class="fa fa-film"></i>Movies</a></li>
          <li><a href="<?php echo $signuser ?> "><?php echo $_SESSION['first_name']." ".$_SESSION['last_name'] ?></a></li>
          <li><a href="<?php echo $signout ?>">SignOut</a></li>
          
        </ul>
      </div>
  </nav>
  <header>
    <div class="now-showing">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h4>Now Showing</h4>
            <div class="row" style="padding-top: 15px;">
              <?php if ($row_cnt>0){
              while ($row_cnt = $result->fetch_assoc()){?>

              <div class="col-lg-3">
                <div class="well text-center">
                  <img src="../<?php echo $row_cnt['movie_poster'];?>" width="170" height="240">
                  <div class="well-footer">
                    <a href="#"><?php echo $row_cnt['movie_name'] ?></a>
                      <a href="movie-details.php?id=<?php echo $row_cnt['movie_id']?>" style="background:#1abc9c" class="form-control btn">View Movie Tickets</a>
                  </div>
                </div>
              </div>

                <?php

              }
              }
              else{
                echo "No data found";
            } ?>
            </div>
          </div>
        </div>
    </div>
  </header>