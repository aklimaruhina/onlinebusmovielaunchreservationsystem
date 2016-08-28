<?php 
include('lib/app.php');
    $config = $_SESSION['config'];
    if(isset($_SESSION['user_loggedin']) && $_SESSION['user_loggedin'] == true){
        header('location: homepage.php');
    }

include_once 'header.php'; 

?>

<div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>

            <form class="form-signin" method="post" action="do-login.php">
                <?php 

                 if(isset($_SESSION['msg_success']) AND !empty($_SESSION['msg_success'])):

                ?>
                    <h4 style="color:green"><?php echo $_SESSION['msg_success']; unset($_SESSION['msg_success'])?></h4>
                <?php 

                 endif; 
                if(isset($_SESSION['msg_error']) AND !empty($_SESSION['msg_error'])):
                ?>
                    <h4 style="color:red; font-weight:bold;"><?php echo $_SESSION['msg_error']; unset($_SESSION['msg_error'])?></h4>
                <?php 
                endif;
                 ?>
                <div class="alert alert-danger display-hide">
                        <button class="close" data-close="alert"></button>
                        <span>
                        Enter any username and password. </span>
                    </div>

                <!-- <span id="reauth-email" class="reauth-email"></span> -->
                <!-- <div class='<?php echo $error_class; ?>'><?php echo $error; ?></div> -->

                <input type="username" name='username' id='username' class="form-control" placeholder="Email address">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
            <a href="registration.php" class="forgot-password">Or
                Register New
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->


<script src="style.js"></script>
