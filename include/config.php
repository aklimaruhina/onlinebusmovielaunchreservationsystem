<?php 
$con = mysqli_connect("https://www.db4free.net/","ruhina05","0a4bfb","ttticketing") or die("Error " . mysqli_error($con));
$config=array();
$config['base_url']='https://bustrainmovie.herokuapp.com/';
$config=(object)$config;
 ?>