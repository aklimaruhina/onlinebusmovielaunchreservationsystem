<?php include_once 'header.php'; ?>
<div class="content-table">
	<div class="container">
		<div class="col-lg-12">
			<h3 class="text-center">Add New movie and Its Information</h3><br>
		    <form action="addmovie.php" method="post" class="form-horizontal" enctype="multipart/form-data">
				<div class="form-group">
					<label for="movie name" class="col-sm-4 control-label">Enter Movie Name</label>
          			<div class="col-sm-8">
				    	<input type="text" class="form-control" name="mvname" placeholder="Enter Movie Name Name">
				    </div>
				</div>
			    <div class="form-group">
					<label for="movie description" class="col-sm-4 control-label">Enter Movie Description</label>
          			<div class="col-sm-8">
				    	<textarea name="mvdescription" rows="3" class="form-control"></textarea>
				    </div>
				</div>
				<div class="form-group">
					<label for="movie-director" class="col-sm-4 control-label">Enter Director Name</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="mvdirector" placeholder="Enter movie director name">
					</div>
				</div>
				<div class="form-group">
					<label for="language" class="col-sm-4 control-label">Select Language</label>
					<div class="col-sm-8">
						<select name="mvlanguage" id="" class="form-control">
							<option value="0">Select Language</option>
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
							<option value="0">Select Option</option>
							<option value="running">Running</option>
							<option value="not running">Not Running</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="" class="col-sm-4 control-label">Upload Picture</label>
					<div class="col-sm-6">
						<input type="file" id="moviepic" name="movie_poster">
					</div>
				</div>
				<div class="col-lg-8 col-lg-offset-3" style="padding-top: 15px;">
                  <button type="submit" name="movie_btn" style="background:#1abc9c" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus"></span>Add new movie</button>
                </div>

			</form>
		</div>
	</div>
</div>
<?php include_once 'footer.php'; ?>