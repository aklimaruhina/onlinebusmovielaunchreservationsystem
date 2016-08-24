<?php 
  session_start(); 
  include '../include/config.php';
  if(!isset($_SESSION['sid'])){   
    header("Location: ../index.php");
  }
  $path = $config->base_url.'/homepage.php';
  $signuser = $config->base_url.'/profile.php';
  $movie = $config->base_url.'/movies/movie.php';
  $allmovie= $config->base_url.'/movies/all-movie.php';
  $signout = $config->base_url.'/functions/logout.php';

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
          <li><a href="<?php echo $allmovie ?>"><i class="fa fa-film"></i>All</a></li>
          <li class="active"><a href="<?php echo $movie ?>"><i class="fa fa-film"></i>Movies</a></li>
          <li><a href="<?php echo $signuser ?> "><?php echo $_SESSION['first_name']." ".$_SESSION['last_name'] ?></a></li>
          <li><a href="<?php echo $signout ?>">Signout</a></li>
          
        </ul>
      </div>
  </nav>
<div class="main-container">
	<div class="container">
      <div class="row">
        <div class="col-md-12" id="wrapper">
          <div class="form-horizontal contact-form">
          	<legend>Book a Movie</legend>
             <div class="row form-group">
               <div class="col-sm-6">
                  <label for="phone">Select city</label>
                  <select name="city" id='city' class="form-control">
                    <option value="0">Select a city</option>
                    <?php 
                      $query = "SELECT city_id, city FROM cities";
                      $cities = mysqli_query($con, $query);
                      while($cities_row = mysqli_fetch_array($cities)) {
                        echo "<option value='$cities_row[city_id]' >$cities_row[city]</option>";
                      }
                    ?>
                   </select>
               </div>
               <div class="col-sm-6">
                 	<label for="email">Select Theater</label>
               		<select name="theater" id='theatre' class="form-control">
               			<option value="0">........Theater .........</option>
               		</select>
               </div>
             </div>
             <hr>
             <div class="row form-group">
               <div class="col-sm-6">
                 <label for="phone">Select Movie</label>
                 <select name="movie" id='movie' class="form-control">
                     <option value="0">......movie.......</option>
                   </select>
               </div>
               <div class="col-sm-6">
                 	<label for="email">Select Date</label>
               		<select name="date" id='date' class="form-control">
               			<option value="0">Date</option>
               		</select>
               </div>
             </div><br>
            <!-- <div class="row id='details">
             	<div class="form-group">
					      <label for="showtime" class="col-sm-4 control-label">Select Show timing</label>
          			<div class="col-sm-6">
				    	    <select name="showtiming" id="show-timing" class="form-control">
               			<option value="0">show time</option>
               		</select>
				        </div>
				      </div>
      				<div class="form-group">
      					<label for="showtime" class="col-sm-4 control-label">Select Ticket type</label>
                	<div class="col-sm-6">
      				    	<select name="ticket-type" id="ticket-type" class="form-control">
                     	<option value="0">Ticket type</option>
                    </select>
      				    </div>

				      </div>
				      <div class="form-group text-center" id='fare-div'>
					      <label for="">Ticket Fare: </label>
				      </div>
      				<div class="form-group text-center" id='available-seats-div'>
      					<label for="">Total Available seats: </label>
      				</div>
      				<div class="form-group"></div>
      				<div class="form-group" id='seats'>
      					<label for="showtime" class="col-sm-4 control-label">Select No of Seats</label>
            			<div class="col-sm-6">
      				    	<select name="no-of-seats" id="no-of-seats" class="form-control">
               				<option value="0">No of seat</option>
               			</select>
      		        </div>
      				</div>
              <div class="form-group text-center" id='total-amount-seats-book'>
                <label for="">Total Amount: </label></div>

			     </div> -->
          <!--  <div class="row">
             <div class="ticket-summery">
               
             </div>
           </div> -->
          </div>
        </div>
      </div>
    </div>
</div>
<?php mysqli_close($con) ?>
<?php include 'footer.php'; ?>