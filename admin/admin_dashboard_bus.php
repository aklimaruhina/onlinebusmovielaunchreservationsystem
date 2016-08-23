<?php 
include_once 'session.php';
include_once 'header.php'; 
// include_once '../include/config.php';
$query = "SELECT * FROM `bus_reserve` ";
$result = mysqli_query($con, $query);
$row_cnt = $result->num_rows;

?>
<div class="content-table">
		<div class="container">
			<div class="col-lg-12">
				<div class="pull-right"><a href="route.php" class="btn btn-primary">Add new bus route</a></div>

		        <table class="table table-bordered">
		        	<thead>
		        		<tr class="active">
		        			<th>#ID</th>
				            <th>Bus Information</th>
				            <th>Route</th>
				            <th>Total Seat</th>
				            <th>Price</th>
				            <th>Time</th>
				            <th>Date </th>
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
			       				$newDateTime2 = date('h:i A', strtotime($arr_time));

		          				?>
		          			<tr>
					            <td>
					            	<?php echo $row_cnt['id'] ?>
					            </td>
					            <td>
					            	<?php echo $row_cnt['bus_name']." <br/>".$row_cnt['bus_info'] ?>
					            </td>
					            <td>
					            	<?php echo $row_cnt['city_from']." - ".$row_cnt['city_to'] ?>
					            </td>
					            <td>
					            	<?php echo $row_cnt['seat'] ?>
					            </td>
					            <td>
					            	<?php echo $row_cnt['fare'] ?>
					            </td>
					            <td>
					            	<?php echo $newDateTime."-".$newDateTime2 ?>
					            </td>
					            <td>
					            	<?php echo $row_cnt['dept_date']. "/". $row_cnt['arr_date'] ?>
					            </td>
					            <td>
					            	 <a href="editbus.php?id=<?php echo $row_cnt['id'] ?>" class="btn btn-primary">Edit Bus</a>
					            	 <a href="deletebus.php?id=<?php echo $row_cnt['id'] ?>" class="btn btn-danger">Delete Bus</a>
					            </td>
		            		</tr>

		          			<?php
		          				# code...
		          			}
		          		} 
		          		 ?>
		          		
		          	</tbody>
		          	

		        </table>
			</div>
		</div>
	</div>
<?php include_once 'footer.php'; ?>