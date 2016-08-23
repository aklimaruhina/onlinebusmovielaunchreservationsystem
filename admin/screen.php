<?php 
include_once 'session.php';

include_once 'header.php'; ?>
<div class="content-table">
	<div class="container">
		<div class="col-lg-12">
			<h3 class="text-center">Add New Screen and Its Information</h3><br>
		    <form action="addscreen.php" method="post" class="form-horizontal" enctype="multipart/form-data">
				<div class="form-group">
					<label for="theatrename" class="col-sm-4 control-label">Enter Screen Name</label>
          			<div class="col-sm-8">
				    	<input type="text" class="form-control" name="screen_name" placeholder="Enter Screen Name">
				    </div>
				</div>
				
				<div class="form-group">
					<label for="language" class="col-sm-4 control-label">Select Theatre</label>
					<div class="col-sm-8">
						<select name="theatre" id="" class="form-control">
							<option>Select theatre</option>
							<?php 
							
							$query = "SELECT * from theatres";
							$result = mysqli_query($con, $query);
							while($obj= $result->fetch_object()) {
                                  if (!$result) {
                                    die("Error: Data not Found. . ");
                                  }
                                  echo "<option value=".$obj->theatre_id.">".$obj->theatre_name."</option>"; 
                                }
                                $result->close();
							 ?>

						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="language" class="col-sm-4 control-label">Select Movie </label>
					<div class="col-sm-8">
						<select name="movie" id="" class="form-control">
							<option>Select movie</option>
							<?php 
							// include_once '../include/config.php';
							$query = "SELECT * from movies";
							$result = mysqli_query($con, $query);
							while($obj= $result->fetch_object()) {
                                  if (!$result) {
                                    die("Error: Data not Found. . ");
                                  }
                                  echo "<option value=".$obj->movie_id.">".$obj->movie_name."</option>"; 
                                }
                                $result->close();
							 ?>

						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-4 control-label">Enter Screen Capacity</label>
					<div class="col-sm-8">
						<input type="text" name="capacity" class="form-control" placeholder="Enter capacity">
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