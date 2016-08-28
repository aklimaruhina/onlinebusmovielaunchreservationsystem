<?php 

include_once 'header.php'; 
// include_once '../include/config.php';
$query = "SELECT * FROM `launch_info` ";
$result = mysqli_query($con, $query);
$row_cnt = $result->num_rows;

?>
<div class="content-table">
	<div class="container">
		<div class="col-lg-12">
			<div class="pull-right seat-button"><a href="newlaunch.php" class="btn btn-primary">Add new Launch route</a></div>

	        <table class="table table-bordered">
	        	<thead>
			        <tr class="active">
			            <th>ID</th>
			            <th>Launch Info</th>
			            <th>Route</th>
			            <th>Totat Seat</th>
			            <th>Departure/Arrival time</th>
			            <th>Departure/Arrival Date</th>
			            <th>Reserve ID</th>
			            <th>Action</th>
			        </tr>
		        </thead>
		        <tbody>
		        	<?php
		          		if($row_cnt > 0){
		          			while ($row_cnt = $result->fetch_assoc()) {
		          				$dept_time = $row_cnt['dtime'];
		          				$newDateTime = date('h:i A', strtotime($dept_time));
		          				$arr_time = $row_cnt['arrtime'];
			       				$newDateTime2 = date('h:i A', strtotime($arr_time)); ?>
		          			<tr>
					            <td>
					            	<?php echo $row_cnt['launch_id'] ?>
					            </td>
					            <td>
					            	<?php echo $row_cnt['launch_name']." <br/>".$row_cnt['launch_info'] ?>
					            </td>
					            <td>
					            	<?php echo $row_cnt['city_from']." - ".$row_cnt['city_to'] ?>
					            </td>
					            <td>
					            	<?php echo $row_cnt['seat'] ?>
					            </td>
					            <td>
					            	<?php echo $newDateTime."-".$newDateTime2 ?>
					            </td>
					            <td>
					            	<?php echo $row_cnt['dept_date']. "/". $row_cnt['arr_date'] ?>
					            </td>
					            <td><?php echo $row_cnt['reserve_id'] ?></td>
					            <td>
					            	 <a href="editlaunch.php?id=<?php echo $row_cnt['launch_id'] ?>" class="btn btn-primary">Edit Launch</a>
					            	 <a href="deletelaunch.php?id=<?php echo $row_cnt['launch_id'] ?>" class="btn btn-danger">Delete Launch</a>
					            </td>
		            		</tr>

		          			<?php 
		          		}} ?>
		        </tbody>
		        
	        </table>
		</div>
	</div>
</div>
<?php include_once 'footer.php'; 
mysqli_close($con);
?>