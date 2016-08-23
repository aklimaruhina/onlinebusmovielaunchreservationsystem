
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movie</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
  </head>
  <body>
    <nav class="navbar navbar-default navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Sohoj<span class="text-green">Ticket.</span></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="index.php"><i class="fa fa-bus"></i>Buses</a></li>
          <li><a href="launch.php" target="_"><i class="fa fa-ship"></i>launch</a></li>
          <li><a href="movies.php" target="_"><i class="fa fa-film"></i>Movies</a></li>
          
            <?php 
            if(isset($_SESSION['sid'])){
              echo "<li><a class='sign-user' href='".$signuser."'>".$_SESSION['first_name']." ".$_SESSION['last_name']. "</a></li><li><a class='signout-link' href='".$signout."'>Sign Out&nbsp;&nbsp;</a></li>";
            }
            else {
              echo "<li><a class='homepage-sign-in' href='".$signin."'>Sign In&nbsp;&nbsp;</a></li> | <li><a class='homepage-sign-in' href='".$signup."'>&nbsp;&nbsp;Sign Up&nbsp;&nbsp;</a></li>"; 
            }
            ?>
            <!-- <a href="login.php#wrapper">Login</a></li>
          <li><a href="registration.php#wrapper">Register</a></li> -->
        </ul>
      </div>
  </nav>
  <header>
    
  </header>