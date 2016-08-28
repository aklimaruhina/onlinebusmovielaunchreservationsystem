<?php
//dump
function d($var){
	echo '<pre>';
	var_dump($var);
	echo '</pre>';
}

//dump and exit
function dd($var){
	d($var);
	exit();
}