<?php 
include_once 'header.php'; 
    $error = '';
    $error_class = '';
    if(!empty($_POST)){
        $qry = "SELECT * FROM users WHERE user_name = '$_POST[username]' AND password = md5('$_POST[password]')"; 
        $result = mysqli_query($con, $qry);

        if(mysqli_num_rows($result)) {
            $_SESSION['sid']=session_id();
            $login_time=strtotime('now');
            $member=mysqli_fetch_assoc($result);
            $_SESSION['name'] = $member['user_name'];
            $_SESSION['first_name'] = $member['first_name'];
            $_SESSION['last_name'] = $member['last_name'];
            $_SESSION['user_id'] = $member['user_id'];
            $role=$member['rid'];

            //if(isset($_SESSION['sid'])){
                if($member['sid'] == 1){
                    // $sid_insert = "UPDATE users SET sid = '$_SESSION[sid]', login_time = '$login_time' WHERE user_name = '$_POST[username]'";
                    // $result1 = mysqli_query($sid_insert);
                    header("Location: homepage.php");
                }
                else{
                    $sid_insert = "UPDATE users SET sid = '$_SESSION[sid]', login_time = '$login_time' WHERE user_name = '$_POST[username]'";
                    $result1 = mysqli_query($sid_insert);

                    header("Location: admin/admin_dashboard.php");
                }
                
        //  if($member['rid']==1){
        //  $admin_path=$config->base_url.'/admin_gui.php';
        //  header("Location: $admin_path");
        //  }
        //  else{
                
        //  //}
            
        // }
        }
        else {
            $error = "username or password is incorrect";
            $error_class = 'error';
        }
    }

?>

<div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>

            <form class="form-signin" method="post" action="login.php">
                <!-- <span id="reauth-email" class="reauth-email"></span> -->
                <div class='<?php echo $error_class; ?>'><?php echo $error; ?></div>

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
