<?php 

include_once 'header.php'; 

?>
<div class="content-table">
	<div class="container">
		<div class="col-lg-12">
			<h3 class="text-center">Add New Theatre and Its Information</h3><br>
		    <form action="addtheatre.php" method="post" class="form-horizontal" enctype="multipart/form-data">
				<div class="form-group">
					<label for="theatrename" class="col-sm-4 control-label">Enter Theatre Name</label>
          			<div class="col-sm-8">
				    	<input type="text" class="form-control" name="theatre_name" placeholder="Enter theatre Name">
				    </div>
				</div>
				<div class="form-group">
					<label for="manager" class="col-sm-4 control-label">Enter Manager Name</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="manager" placeholder="Enter Manager name">
					</div>
				</div>
				<div class="form-group">
					<label for="language" class="col-sm-4 control-label">Select City</label>
					<div class="col-sm-8">
						<select name="city" id="" class="form-control">
							<option>Select City</option>
							<?php 
							// include_once '../include/config.php';
							$query = "SELECT * from cities";
							$result = mysqli_query($con, $query);
							while($obj= $result->fetch_object()) {
                                  if (!$result) {
                                    die("Error: Data not Found. . ");
                                  }
                                  echo "<option value=".$obj->city_id.">".$obj->city."</option>"; 
                                }
                                $result->close();
							 ?>

						</select>
					</div>
				</div>
				<div class="col-lg-8 col-lg-offset-3" style="padding-top: 15px;">
                  <button type="submit" name="movie_btn" style="background:#1abc9c" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus"></span>Add new Theatre</button>
                </div>

			</form>
		</div>
	</div>
</div>
<?php include_once 'footer.php'; ?>