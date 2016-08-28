<?php 
  $dashboard = 1;

require_once('lib/app.php'); 
// include_once('links.php');
if(!user_loggedin() ){
  header('location: login.php');
}

$id = $_GET['id'];
$query = "SELECT * FROM `users` where `id`=".$id; 
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$data = mysqli_fetch_assoc($result);


  // $path = $config->base_url.'/homepage.php';
  // $signout = $config->base_url.'/functions/logout.php';
  // $signuser = $config->base_url.'';
  // $bus = $config->base_url.'';
  // $launch = $config->base_url.'';
  // $movie = $config->base_url.'';
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
                        <h3 class="text-center animated wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="650ms"><?php echo "Welcome ".$data['username']  ?></h3>
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
                            <a href="bus/bus.php?id=<?php echo $data['id'] ?>" class="btn animated wow fadeInUpBig"  data-wow-duration="1000ms" data-wow-delay="650ms"><b>Bus</b></a>
                            <a href="launch/launch.php?id=<?php echo $data['id'] ?> " class="btn animated wow fadeInUpBig" data-wow-duration="1000ms" data-wow-delay="650ms"><b>Launch</b></a>
                            <a href="movies/all-movie.php?id=<?php echo $data['id'] ?> " class="btn animated wow fadeInUpBig" data-wow-duration="1000ms" data-wow-delay="650ms"><b>Movie</b></a>
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

        
        
        
