<?php 
include_once 'header.php'; 

$query1 = "SELECT * FROM users";
$success = mysqli_query($con,$query1) or die(mysqli_error($con));
$row_cnt = mysqli_num_rows($success);
// $data = mysqli_fetch_assoc($success);
// $row_cnt = $result->num_rows;

// include_once '../include/config.php';
// $query = "SELECT * FROM users";
// $result = mysqli_query($con, $query) or trigger_error($mysqli->error."[$query]");
// 
?>


	<div class="content-table">
		<div class="container">
			<div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                        <tr class="active">
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($row_cnt>0): ?>
                        <?php while ($row_cnt = $success->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row_cnt['username'] ?></td>
                                <td><?php echo $row_cnt['email']; ?></td>

                                <td><?php 
                                if($row_cnt['is_admin']==0)
                                    {echo "user"; }
                                else{echo "admin";}?>
                            </td>
                                <td><a href="dltuser.php?id=<?php echo $row_cnt['id'] ?>" class="btn btn-warning">Delete</a></td>
                              </tr>
                            <?php 
                        } ?>       
                            <!-- $result->close(); -->
                        <?php endif ?>
                    </tbody>
                  
                  
                </table>
			</div>
		</div>
	</div>
<?php include_once 'footer.php';
/* close connection */
mysqli_close($con);
 ?>