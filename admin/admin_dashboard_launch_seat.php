<?php 
include_once 'session.php';

include_once 'header.php'; 
// include('../include/config.php');
$launch_query = "SELECT * FROM `launch_reserve`"; 
$result = mysqli_query($con, $launch_query);
$sno = 0;
$even_odd = '';
?>
<div class="content-table">
	<div class="container">
		<div class="col-lg-12">
			<div class="pull-right seat-button"><a href="newlaunch.php" class="btn btn-primary">Add New Lunch</a></div>
		    <table class="table table-bordered">
		    	<thead>
		    		<tr class="active">
				        <th>SL</th>
				        <th>User ID</th>
				        <th>Seat Number</th>
				        <th>Payable</th>
				        <th>Transaction Code</th>
				        <th>Departure Date</th>
				        <th>Book type</th>
				        <th>Total seat reserved</th>
				        <th>Action</th>
			    	</tr>
		    	</thead>
		    	<tbody>
		    		<?php if(mysqli_affected_rows($con)) :
		    		while($launch_row = mysqli_fetch_object($result)){
                  	$sno++;
                  	if($sno%2==0){$even_odd='even';}else{$even_odd='odd';}  ?>
		    		 	<tr class="<?php echo $even_odd ?>">
		    		 		<td><?php echo $sno; ?></td>
		    		 		<td><?php echo $launch_row->user_id  ?></td>
		    		 		<td><?php echo $launch_row->seat_number ?></td>
		    		 		<td><?php echo $launch_row->payable ?></td>
		    		 		<td><?php echo $launch_row->transaction_code ?></td>
		    		 		<td><?php echo $launch_row->dept_date ?></td>
		    		 		<td><?php echo $launch_row->book_type ?></td>
		    		 		<td><?php echo $launch_row->total_seat_no ?></td>
		    		 		<td><a href="deletelnseat.php?id=<?php echo $launch_row->r_id?>" class="btn btn-danger">Delete</a></td>
		    		 		<?php 
		    		 	}
		    		 	endif; ?>
		    	</tbody>
			    
			    <tr>
			    	<td></td>
			        <td></td>
			        <td></td>
			        <td></td>
			    </tr>
		    </table>
		</div>
	</div>
</div>
<?php include_once 'footer.php'; ?>