<?php 
include_once '../include/config.php';
$busno = 3;
$query2 = "SELECT fare, seat,reserve_id from bus_reserve where id = $busno";
$result2 = mysqli_query($con, $query2);
$row3 = mysqli_fetch_array($result2);

$payable = $row3['fare'];
$seat = $row3['seat'];
$rem_seats = $seat - $arr;
echo $payable."<br>";
$total_payable = $payable*$arr; 
echo "Total value: =".$total_payable."<br>";
echo "Remaining seats: ".$rem_seats;
$query = "SELECT total_reserve,setnum from reserve_list where busno = $busno";

$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$r = $row['total_reserve'];
$rr = unserialize($r);
$vl = array(count($rr));
$arr = implode(" ", $vl);
$seatnum = $row['setnum'];
echo $arr."<br>";
echo $seatnum."<br>";



if($rem_seats < $arr){
	echo "reserve exceed";
}
elseif($rem_seats > 0){ ?>

  	<form action="reserving.php?id=<?php echo $busno?>" method="post">
  		<input type="text" name="firstname" placeholder='first_name'>
  		<input type="text" name="lastname" placeholder='last name'>
  		<input type="text" name="contact" placeholder='contact'>
  		<input type="text" name="address" placeholder='address'>
  		<input type="hidden" name="seat" value="<?php echo $rem_seats ?>">
  		<input type="hidden" name="seatnum" value="<?php echo $seatnum ?>">
  		<input type="hidden" name="payable" value="<?php echo $total_payable ?>">
  		<input type="hidden" name="busno" value="<?php echo $busno ?>">
      <input type="hiddent" name="seat_count" value="<?php echo $arr ?>">
  		<button type="submit">Save</button>
  	</form>
<?php
	
}
else{
	echo "NO seats available";
}
// print_r(unserialize($r));


// $total_reserve = $row['total_reserve'];
// $array = unserialize($row['total_reserve']);

// var_dump($array);
// var_dump($aary);
// $data = unserialize($aary);
// print_r($data);
// if(is_array($data) and count($data)) {
//     echo '<ul>';
//     foreach($total_reserve as $value) {
//         echo '<li>' . $value . '</li>';
//     }
//     echo '</ul>';
// }

 ?>