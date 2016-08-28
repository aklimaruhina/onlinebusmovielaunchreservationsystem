<?php
include_once 'header.php'; 
// include('../include/config.php');
$bus_query = "SELECT * FROM `reserve_section`"; 
$bus_query_1 = mysqli_query($con, $bus_query);
$sno = 0;
$even_odd = '';

?>
<div class="content-table">
	<div class="container">
		<div class="col-lg-12">
		    <table class="table table-bordered">
		    	<thead>
		    		<tr class="active">
				        <th>SL </th>
				        <th>User ID</th>
				        <th>Name</th>
				        <th>Address</th>
				        <th>Contact</th>
				        <th>Seat Reserved</th>
				        <th>Seat Number</th>
				        <th>Transection code</th>
				        <th>Payable</th>
				        <th>Date</th>
				        <th>Action</th>
				      </tr>
		    	</thead>
		    	<tbody>
		    		<?php if(mysqli_affected_rows($con)) :
		    		while($bus_query_row = mysqli_fetch_object($bus_query_1)){
                  	$sno++;
                  	if($sno%2==0){$even_odd='even';}else{$even_odd='odd';}  ?>
		    		 	<tr class="<?php echo $even_odd ?>">
		    		 		<td><?php echo $sno; ?></td>
		    		 		<td><?php echo $bus_query_row->user_id ?></td>
                     		<td><?php echo $bus_query_row->firstname." ".$bus_query_row->lastname ?></td>
                     		<td><?php echo $bus_query_row->address ?></td>
                     		<td><?php echo $bus_query_row->contact; ?></td>
                     		<td><?php echo $bus_query_row->seat ?></td>
							<td><?php echo $bus_query_row->setnum ?></td>
		                    <td><?php echo $bus_query_row->transaction_code ?></td>
		                    <td><?php echo $bus_query_row->payable; ?></td>
		                    <td><?php echo $bus_query_row->date; ?></td>
		                    <td><a href="deltres.php?id=<?php echo $bus_query_row->id ?>" class="btn btn-warning">Delete</a></td>

					        </tr>
		    		<?php } 
		    		?>
		    			
		    		<?php endif ?>
		    	</tbody>
		      
		      
		    </table>
		</div>
	</div>
</div>
<?php include_once 'footer.php'; 
mysqli_close($con);
?>