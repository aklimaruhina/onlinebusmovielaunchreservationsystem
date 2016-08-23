<?php
	session_start(); 
	include '../include/config.php';
	if(!isset($_SESSION['sid'])){   
    header("Location: ../index.php");
	}
?>