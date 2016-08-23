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
    <style>
    body{
      background-image: none;
    }
    </style>
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
  <header>
    <div class="container">
      <div class="row">
        <div class="col-md-12 profile-container">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#profile" data-toggle="tab">About Yourself</a></li>
            <li><a href="#edit-profile" data-toggle="tab">Edit Your profile</a></li>
            <li><a href="#bus-history" data-toggle="tab">Bus history</a></li>
            <li><a href="#launch-history" data-toggle="tab">Launch History</a></li>
            <li><a href="#movie-history" data-toggle="tab">Movie History</a></li>
          </ul> 

          <div class="tab-content">
            <div class="tab-pane active" id="profile">
              <?php include 'include/config.php'; 
              $query = "SELECT * FROM users where user_id=".$_SESSION['user_id'];
              $result=mysqli_query($con, $query);
              $row=mysqli_fetch_array($result);
              ?>

              <table class="table table-striped">
                <tbody>
                  <tr>
                    <td>User Name</td>
                    <td><?php echo $row['user_name'] ?></td>
                  </tr>
                  <tr>
                    <td>Full Name</td>
                    <td><?php echo $row ['first_name']." ".$row['last_name'] ?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><?php echo $row['email'] ?></td>
                  </tr>
                  <tr>
                    <td>Address</td>
                    <td><?php echo $row['address'] ?></td>
                  </tr>
                  <tr>
                    <td>Mobile Number</td>
                    <td><?php echo "+880".$row['mobile_number'] ?></td>
                  </tr>
   
                </tbody>
              </table>

            </div>
            <div class="tab-pane" id="edit-profile">
              <?php 
              $error_class = '';
              $error ='';
              if(!empty($_POST)) {
                $update_profile = "UPDATE users SET first_name = '".$_POST['first_name']."',
                last_name = '".$_POST['last_name']."',
                address = '".$_POST['address']."',
                mobile_number = '".$_POST['mobile_number']."' WHERE user_id=".$_SESSION['user_id'];

                if (!mysqli_query($con, $update_profile)) { die('Error: ' . mysqli_error());}
                else {
                  $error_class = 'error-success'; 
                  // $error ='Your Profile has been updated.';
                  header('location: profile.php#profile');
                  $_SESSION['first_name'] = $_POST['first_name'];
                  $_SESSION['last_name'] = $_POST['last_name'];
                }
              }
              
              $sql1 = "SELECT * FROM users where user_id=".$_SESSION['user_id'];
              $sql_qry1=mysqli_query($con, $sql1);
              $row=mysqli_fetch_array($sql_qry1);
              
              $username=$row['user_name'];
              $email=$row['email'];
              $firstname=$row['first_name'];
              $lastname=$row['last_name'];
              $address=$row['address'];
              $mob=$row['mobile_number'];
              
              $_SESSION['first_name'] = $row['first_name'];
              $_SESSION['last_name'] = $row['last_name'];
              
              ?>

              <form action="profile.php#edit-profile" class="form-horizontal" method='post'>
                <div class="form-group">
                  <div class='<?php echo $error_class; ?>'><?php echo $error; ?></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">User Name <span class="<?php echo $error_class; ?>"></span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="user_name" id="user_name" value="<?php echo $row['user_name'] ?>" disabled='disabled'>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-4 control-label">Email</label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $row['email'] ?>" disabled="disabled">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-4 control-label">First Name</label>
                  <div class="col-sm-8"><input type="text" name='first_name' id="first_name" class="form-control" value='<?php echo $row['first_name']; ?>'>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-4 control-label">Last Name</label>
                  <div class="col-sm-8"><input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo $row['last_name'] ?>"></div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-4 control-label">Address</label>
                  <div class="col-sm-8">
                    <textarea name="address" id="address" rows="3" class="form-control"><?php echo $row['address'] ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-4 control-label">Mobile Number</label>
                  <div class="col-sm-8"><input type="text" class="form-control" name="mobile_number" id="mobile_number" value='<?php echo $row['mobile_number'] ?>'></div>
                </div>
                <div class="form-group">
                  <div class="col-sm-8 col-sm-offset-3">
                    <input type='submit' id='update_profile' name='save' value='Save' />

                  </div>
                </div>
              </form>  
            </div>
            <div class="tab-pane" id="bus-history">
              <?php $bus_query = "SELECT * FROM `reserve_section` where user_id = ".$_SESSION['user_id']; 
              $bus_query_1 = mysqli_query($con, $bus_query);
              $sno = 0;
              $even_odd = '';
              if(mysqli_affected_rows($con)) { 

              ?>
              <table class="table">
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Seat Number</th>
                    <th>Transaction Code</th>
                    <th>Payable</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  while($bus_query_row = mysqli_fetch_object($bus_query_1)){
                  $sno++;
                  if($sno%2==0){$even_odd='even';}else{$even_odd='odd';} 
                   ?>
                   <tr class='<?php echo $even_odd ?>'>
                    <td><?php echo $sno; ?></td>
                     <td><?php echo $bus_query_row->firstname." ".$bus_query_row->lastname ?></td>
                     <td><?php echo $bus_query_row->contact; ?></td>
                     <td><?php echo $bus_query_row->address ?></td>
                     <td><?php echo $bus_query_row->setnum ?></td>
                     <td><?php echo $bus_query_row->transaction_code ?></td>
                     <td><?php echo $bus_query_row->payable; ?></td>
                     <td><?php echo $bus_query_row->date; ?></td>
                     <td><a href="printbus.php?id=<?php echo $bus_query_row->id ?>" class="btn btn-info">Print Ticket</a></td>
                     <td></td>
                   </tr>
                </tbody>
                <?php } ?>
              </table>
              <?php }
              else{
                echo "YOu have not booked any. Please go to this link to book new bus. <a href='".$bus."'>Book Bus</a>";
              } ?>
              </div>
            <div class="tab-pane" id="launch-history">
              <?php $launch_query = "SELECT * FROM `launch_reserve` where user_id = ".$_SESSION['user_id']; 
              $launch_query_1 = mysqli_query($con, $launch_query);
              $sno = 0;
              $even_odd = '';
              if(mysqli_affected_rows($con)) { 

              ?>
              <table class="table">
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>Launch </th>

                    <th>Transaction Code</th>
                    <th>Payable</th>
                    <th>Date</th>
                    <th>Book type</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  while($launch_query_row = mysqli_fetch_object($launch_query_1)){
                  $sno++;
                  if($sno%2==0){$even_odd='even';}else{$even_odd='odd';} 
                   ?>
                   <tr class='<?php echo $even_odd ?>'>
                    <td><?php echo $sno; ?></td>
                     <td><?php echo $launch_query_row->seat_number ?></td>
                     <td><?php echo $launch_query_row->transaction_code ?></td>
                     <td><?php echo $launch_query_row->payable; ?></td>
                     <td><?php echo $launch_query_row->dept_date; ?></td>
                     <td><?php echo $launch_query_row->book_type; ?></td>
                     <td><a href="printlaunch.php?id=<?php echo $launch_query_row->r_id ?>" class="btn btn-info">Print Ticket</a></td>
                     <td></td>
                   </tr>
                </tbody>
                <?php } ?>
              </table>
              <?php }
              else{
                echo "YOu have not booked any. Please go to this link to book new Launch. <a href='".$launch."'>Book Launch</a>";
              } ?>
              </div>
            <div class="tab-pane" id="movie-history">
              <?php 
              $b_hs = "SELECT mv.movie_id, mv.movie_name, th.theatre_name, b_t_f_t.date_of_booking, s_t.show_time, t_r.ticket_price, t_r.ticket_type, b_t_f_t.number_of_seats, b_t_f_t.seat_numbers, b_t_f_t.booking_id
              FROM booking_ticket_for_theatre b_t_f_t
              JOIN theatre_show_timings t_s_t ON t_s_t.theatre_show_time_id = b_t_f_t.theatre_show_time_id
              JOIN screens scr ON scr.screen_id = t_s_t.screen_id
              JOIN movies mv ON mv.movie_id = scr.movie_id
              JOIN theatres th ON th.theatre_id = b_t_f_t.theatre_id
              JOIN show_timing s_t ON s_t.show_time_id = b_t_f_t.show_time_id
              JOIN ticket_rate t_r ON t_r.ticket_rate_id = b_t_f_t.ticket_rate_id
              WHERE user_id =".$_SESSION['user_id']."
              ORDER BY b_t_f_t.date_of_booking DESC";
              
              
              $b_hs_qry1 = mysqli_query($con, $b_hs);
              $sno=0;
              $even_odd='';
              $b_hs_qry = mysqli_query($con, $b_hs); 
              if(mysqli_affected_rows($con)) { 
               ?>

              <table class="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Movie Name</th>
                    <th>Theatre</th>
                    <th>Show Date</th>
                    <th>Show Time</th>
                    <th>Ticket Type</th>
                    <th>No of seats</th>
                    <th>Seat No</th>
                    <th>Total Amount</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  while($b_hs_qry_row = mysqli_fetch_object($b_hs_qry)){
              $sno++;
              if($sno%2==0){$even_odd='even';}else{$even_odd='odd';} ?>
              <!-- //$total_amount_bh = $b_hs_qry_row->number_of_seats*$b_hs_qry_row->ticket_price; -->
                <tr class='<?php echo $even_odd ?>'>
                  <td><?php echo $sno ?></td>
                  <td><a class='movie-redirect' target='_blank' href='/project-1/movies/movie-details.php?id=<?php echo $b_hs_qry_row->movie_id?>'><?php echo $b_hs_qry_row->movie_name ?></a>
                  </td>
                  <td><?php echo $b_hs_qry_row->theatre_name ?></td>
                  <td><?php echo  $b_hs_qry_row->date_of_booking?></td>
                  <td><?php echo $b_hs_qry_row->show_time ?></td>
                  <td><?php echo $b_hs_qry_row->ticket_type ?></td>
                  <td><?php echo $b_hs_qry_row->number_of_seats ?></td>
                  <td><?php echo $b_hs_qry_row->seat_numbers ?></td>
                  <td>
                    <?php echo $b_hs_qry_row->number_of_seats*$b_hs_qry_row->ticket_price?> Tk/-</td>
                  <td><a href="printmovie.php?id=<?php echo $b_hs_qry_row->booking_id?>" class='btn btn-primary'>Print</a></td>
                  </tr>;

                  <?php
              }
              } 
              else {
              echo "<p class='no-booking-history'>You haven't booked a ticket.</p> <p class='no-booking-history'>To Book the ticket click here <a href='$movie'>Book</a></p>";
            }
                   ?>
                </tbody>
              </table>
            </div>
          </div>                                              
        </div>
      </div>
    </div>
  </header>



  <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/validation.js"></script>
    <script>
    $('#myTabs a').click(function (e) {
      e.preventDefault()
      $(this).tab('show')
    });
    </script>
  </body>
</html>