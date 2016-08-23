<?php 
session_start();
if(count($_REQUEST)==1 && $_REQUEST['no_of_seats_id']){
	onChangeOfSeats($_REQUEST['no_of_seats_id']);
}
 ?>