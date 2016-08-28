<?php include_once 'header.php'; 
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
$ln_no = $_GET['lnid'];

  	$selected_seat = $_POST['selected_seat']; // output 3,4,5
	$array=explode(',',$selected_seat); 
	$total_reserve = count($array);
	$type = $_REQUEST['cabin_type'];
	
	$query = "SELECT price from launch_type where launch_type_id= ".$type;

	$result = mysqli_query($con, $query);
	while($obj= $result->fetch_object()){
		$price = $obj->price;
	}
	$payable = $price*$total_reserve;
	$query2 = "SELECT reserve_id from launch_info where launch_id= ".$ln_no;
	$result2 = mysqli_query($con, $query2);
	while ($obj = $result2->fetch_object()) {
		# code...
		$rv = $obj->reserve_id;
	}
	$query3 = "INSERT INTO `launch_reserve` (`r_id`, `user_id`, `seat_number`, `payable`, `transaction_code`, `dept_date`, `book_type`, `total_seat_no`, `reserve_id`) 
	VALUES (NULL, '$id', '$selected_seat', '$payable', '$confirmation', '$date', '$type', '$total_reserve', '$rv')";
	// $query2 = "INSERT INTO `reserve_section` (`id`, `user_id`, `firstname`, `lastname`, `contact`, `address`, `seat`, `setnum`, `transaction_code`, `status`, `payable`, `reserve_seat_id`, `date`) 
	// VALUES (NULL, '$user_id', '$firstname', '$lastname', '$contact', '$address', '$total_reserve', '$selected_seat', '$confirmation', '', '$payable', '$reserve_seat_id', '$date')";
	$result3 = mysqli_query($con, $query3) or die(mysqli_error($con));
	if(!$result3){
		echo "Error to submit";
		var_dump($query3);
	}
	else{
		// $id = $_GET['id'];
		echo "successfully submitted";
		exit();
		}

