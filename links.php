<?php
require_once('lib/app.php');

      if(isset($_SESSION['user_loggedin']) && $_SESSION['user_loggedin'] == true){
        
      $user_id = $_SESSION['user']['id'];
      $query = "SELECT * FROM `profiles` WHERE user_id=".$user_id; 
      $result = mysqli_query($con, $query);
      $data = mysqli_fetch_assoc($result);

      if($_SESSION['user']['is_admin'] == 0){
        echo $data['username'];
      }
      else{
        echo "welcome ".$data['username'];
      }
    } ?>
    <h3 style="float:left"><a><?php echo strtoupper(show_user_info());?> </a></h3>