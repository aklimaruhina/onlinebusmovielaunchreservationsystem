<?php 
$con = mysqli_connect("www.db4free.net","ruhina05","0a4bfb","ttticketing");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

/* close connection */
$config=array();
$config['base_url']='https://bustrainmovie.herokuapp.com';
$config=(object)$config;
mysqli_close($con);

 ?>