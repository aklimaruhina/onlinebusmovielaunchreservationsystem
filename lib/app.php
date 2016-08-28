<?php

session_start();
require_once('debug.php');
require_once('database.php');
require_once('functions.php');

$config = array();
$config['base_url']='https://localhost/buslaunchmovie';
// $config=(object)$config;
 $_SESSION['config'] = $config;
?>

<!-- <p ><b>Current User:</b> <?php show_user_info();?></p>
 -->