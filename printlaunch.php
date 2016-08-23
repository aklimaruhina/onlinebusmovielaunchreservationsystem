<?php 

include 'include/config.php';
$id = $_GET['id'];
$query = "SELECT seat_number,transaction_code,payable,dept_date,launch_type_name FROM `launch_reserve` INNER JOIN launch_type on launch_reserve.book_type = launch_type.launch_type_id where r_id = '$id'";

$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
 ?>
 <table class="table table-hover">
 	<tbody>
 		<tr>
 			<td><strong>Seat Number: </strong><?php echo $row['seat_number'] ?></td>
 		</tr>
 		<tr>
 			<td><strong>Transaction code: </strong><?php echo $row['transaction_code'] ?></td>
 		</tr>
 		<tr>
 			<td><strong>Total ammount: </strong><?php echo $row['payable'] ?></td>
 		</tr>
 		<tr>
 			<td><strong>Date of departure: </strong><?php echo $row['dept_date'] ?></td>
 		</tr>
 		<tr>
 			<td><strong>Booking Cabin Type: </strong><?php echo $row['launch_type_name'] ?></td>
 		</tr>
 		<tr><td><a href="print" class="btn">Print</a></td></tr>
 	</tbody>
 </table>