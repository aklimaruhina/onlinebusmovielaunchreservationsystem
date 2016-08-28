<?php

function user_loggedin(){
	if(isset($_SESSION['user_loggedin']) AND $_SESSION['user_loggedin'] == true){
		return true;
	}else{
		return false;
	}
}

function get_user_type(){
	if(isset($_SESSION['user'])){
		return $_SESSION['user']['is_admin'];
	}else{
		return false;
	}
}



function show_user_info(){
	if(user_loggedin()){
		$user = $_SESSION['user'];
		return $user['username'] ;
	}else{
		return 'Anonymous User';
	}
}


function random_code( $length = 8 ) {
    $chars = "XYX123456789";
    $product_code = substr( str_shuffle( $chars ), 0, $length );
    return $product_code;
}