<?php 
include_once 'session.php';
include_once 'header.php'; 
// include_once '../include/config.php';
$query = "SELECT * FROM users";
$result = mysqli_query($con, $query) or trigger_error($mysqli->error."[$query]");
$row_cnt = $result->num_rows;
?>


	<div class="content-table">
		<div class="container">
			<div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                        <tr class="active">
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($row_cnt>0): ?>
                        <?php while ($row_cnt = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row_cnt['first_name'] ?></td>
                                <td><?php echo $row_cnt['last_name'] ?></td>
                                <td><?php echo $row_cnt['address'] ?></td>
                                <td><?php echo $row_cnt['mobile_number'] ?></td>
                                <td><?php echo $row_cnt['user_name'] ?></td>
                                <td><?php echo $row_cnt['email']; ?></td>

                                <td><?php 
                                if($row_cnt['sid']==0)
                                    {echo "user"; }
                                else{echo "admin";}?>
                            </td>
                                <td></td>
                              </tr>
                            <?php 
                        } ?>       
                            
                        <?php endif ?>
                    </tbody>
                  
                  
                </table>
			</div>
		</div>
	</div>
<?php include_once 'footer.php'; ?>