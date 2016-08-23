<?php 
$con = mysqli_connect("localhost","root","","book_myshow") or die("Error " . mysqli_error($con));
$config=array();
$config['base_url']='http://localhost/project-1';
$config=(object)$config;
 ?>