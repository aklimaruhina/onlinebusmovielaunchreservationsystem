<?php include_once 'header.php'; 
include_once '../lib/database.php';

function createRandomPassword() {
	$chars = "abcdefghijkmnopqrstuvwxyz023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {
		$num = rand() % 33;
		$tmp = substr($chars, $num, 1);
		$pass = $pass . $tmp;
		$i++;
	}
	return $pass;
}
$confirmation = createRandomPassword();

$date =urldecode( $_GET['date']);
$busno = $_GET['busno'];

  	$selected_seat = $_POST['selected_seat']; // output 3,4,5
	$array=explode(',',$selected_seat); 
	$total_reserve = count($array);
	$firstname= $_POST['firstname'];
	$lastname= $_POST['lastname'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	
	$query = "SELECT * from bus_reserve where id= ".$busno;

	$result = mysqli_query($con, $query);
	while($obj= $result->fetch_object()){
		$price = $obj->fare;
		$reserve_seat_id = $obj->reserve_seat_id;
	}
	 $payable = $price*$total_reserve;
	 
	$query2 = "INSERT INTO `reserve_section` (`id`, `user_id`, `firstname`, `lastname`, `contact`, `address`, `seat`, `setnum`, `transaction_code`, `status`, `payable`, `reserve_seat_id`, `date`) 
	VALUES (NULL, '$id', '$firstname', '$lastname', '$contact', '$address', '$total_reserve', '$selected_seat', '$confirmation', '', '$payable', '$reserve_seat_id', '$date')";
	$result2 = mysqli_query($con, $query2) or die(mysqli_error($con));
	if(!$result2){
		var_dump($query2);
	}
	else{
		echo "succcessfully submitted";
	}

