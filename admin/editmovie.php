<?php 
include_once 'session.php';

include_once 'header.php';
// include_once '../include/config.php';
$id = $_GET['id'];
$query = "SELECT * from movies where movie_id =".$id;
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
 ?>
 <div class="content-table">
	<div class="container">
		<div class="col-lg-12">
			<h3 class="text-center">Edit movie and Its Information</h3><br>
		    <form action="updatemovie.php?id=<?php echo $id ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
				<div class="form-group">
					<input type="hidden" name="id" value="<?php echo $id ?>">
				</div>
				<div class="form-group">
					<label for="movie name" class="col-sm-4 control-label">Enter Movie Name</label>
          			<div class="col-sm-8">
				    	<input type="text" class="form-control" name="mvname" value="<?php echo $row['movie_name'] ?>">
				    </div>
				</div>
			    <div class="form-group">
					<label for="movie description" class="col-sm-4 control-label">Enter Movie Description</label>
          			<div class="col-sm-8">
				    	<textarea name="mvdescription" rows="3" class="form-control"><?php echo $row['movie_decription'] ?></textarea>
				    </div>
				</div>
				<div class="form-group">
					<label for="movie-director" class="col-sm-4 control-label">Enter Director Name</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="mvdirector" value="<?php echo $row['movie_director'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="language" class="col-sm-4 control-label">Select Language</label>
					<div class="col-sm-8">
						<select name="mvlanguage" id="" class="form-control">
							<option><?php echo $row['movie_language'] ?></option>
							<option value="Bangla">Bangla</option>
							<option value="English">English</option>
							<option value="Malaylam">Malaylam</option>
							<option value="Telegu">Telegu</option>
							<option value="Hindi">Hindi</option>

						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="status" class="col-sm-4 control-label">  Movie status</label>
					<div class="col-sm-8">
						<select name="islive" id="" class="form-control">
							<option><?php echo $row['islive'] ?></option>
							<option value="running">Running</option>
							<option value="not running">Not Running</option>
						</select>
					</div>
				</div>
				
				<div class="col-lg-8 col-lg-offset-3" style="padding-top: 15px;">
                  <button type="submit" name="movie_btn" style="background:#1abc9c" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus"></span>Update movie</button>
                </div>

			</form>
		</div>
	</div>
</div>
<?php include_once 'footer.php'; ?>