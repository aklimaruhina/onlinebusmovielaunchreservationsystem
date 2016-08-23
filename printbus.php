<?php 

include 'include/config.php';
$id = $_GET['id'];
$query = "SELECT * FROM `reserve_section` where id = '$id'";

$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
 ?>
 <table class="table table-hover">
 	<tbody>
 		<tr>
 			<td><strong>Full Name: </strong><?php echo $row['firstname']." ".$row['lastname'] ?></td>
 		</tr>
 		<tr>
 			<td><strong>Contact Number: </strong><?php echo $row['contact'] ?></td>
 		</tr>
 		<tr>
 			<td><strong>Address : </strong><?php echo $row['address'] ?></td>
 		</tr>
 		<tr>
 			<td><strong>Seat Number: </strong><?php echo $row['setnum'] ?></td>
 		</tr>
 		<tr>
 			<td><strong>Transaction code: </strong><?php echo $row['transaction_code'] ?></td>
 		</tr>
 		<tr>
 			<td><strong>Total ammount: </strong><?php echo $row['payable'] ?></td>
 		</tr>
 		<tr>
 			<td><strong>Date of departure: </strong><?php echo $row['date'] ?></td>
 		</tr>
 		
 		<tr><td><a href="print" class="btn">Print</a></td></tr>
 	</tbody>
 </table>