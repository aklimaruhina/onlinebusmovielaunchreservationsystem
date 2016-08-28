<?php 
   $dashboard = 1;

  require_once('../lib/app.php'); 

  if(!user_loggedin() ){
    header('location: ../login.php');
  }

  $id = $_GET['id'];
  $query = "SELECT * from users  where id = ".$id;
  // $result = mysqli_query($con, $query) or die(mysqli_error($con));
  // $data = mysqli_fetch_assoc($result);

  // $path = $config->base_url.'/homepage.php';
  // $signuser = $config->base_url.'/profile.php';
  // $launch = $config->base_url.'/launch/launch.php';
  // $signout = $config->base_url.'/functions/logout.php';

?>