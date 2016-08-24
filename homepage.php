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
  $movie = $config->base_url.'/movies/all-movie.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to Shohoz</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="slider" class="carousel" data-ride="carousel" data-interval="3000">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <img src="img/1.jpg" alt="slide_1" class="img-responsive wow slideInDown animated" style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <img src="img/2.jpg" alt="slide_2" class="img-responsive wow slideInLeft animated" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <img src="img/3.jpg" alt="slide_3" class="img-responsive wow slideInRight animated" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#slider" class="left carousel-control" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                            <a href="#slider" class="right carousel-control" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="menu">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">Sohoj<span class="text-green">Ticket.</span></a>
                    </div>
                </div>
          </nav>
        </div>
                
        <div class="welcome">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="text-center animated wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="650ms"><?php echo "Welcome ".$_SESSION['first_name']  ?></h3>
                        <h2 class="text-center animated wow fadeInRightBig" data-wow-duration="1s" data-wow-delay="650ms">Select your desired option</h2>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="select_area">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="select_section">
                            <a href="<?php echo $bus?> " class="btn animated wow fadeInUpBig"  data-wow-duration="1000ms" data-wow-delay="650ms"><b>Bus</b></a>
                            <a href="<?php echo $launch ?> " class="btn animated wow fadeInUpBig" data-wow-duration="1000ms" data-wow-delay="650ms"><b>Launch</b></a>
                            <a href="<?php echo $movie ?> " class="btn animated wow fadeInUpBig" data-wow-duration="1000ms" data-wow-delay="650ms"><b>Movie</b></a>
                    </div>
                    </div>
                </div>
            </div>
        </div>

	<div class="front_footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-green"> &copy; 2016 shohoz ticket.</p>
                    </div>
                </div>
            </div>
        </div>

        
        
        
