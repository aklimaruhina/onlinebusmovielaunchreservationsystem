<?php 
require_once 'lib/database.php';
$id = $_GET['id'];
// $error_class = '';
//               $error ='';
              if(!empty($_POST)) {
                $update_profile = "UPDATE profiles SET first_name = '".$_POST['first_name']."',
                last_name = '".$_POST['last_name']."',
                address = '".$_POST['address']."',
                mobile_number = '".$_POST['mobile_number']."' WHERE user_id=".$id;

                if (!mysqli_query($con, $update_profile)) { die('Error: ' . mysqli_error($con));}
                else {
                  // $error_class = 'error-success'; 
                  header("location: profile.php?id=$id");
                  exit();
                  //echo "succesffull";
                }
              }

 ?>