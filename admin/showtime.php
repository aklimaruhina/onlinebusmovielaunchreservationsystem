<?php 
include_once 'session.php';

include_once 'header.php'; ?>
<div class="content-table">
	<div class="container">
		<div class="col-lg-12">
			<h3 class="text-center">Add New Theatre and Movies Showtime Information</h3><br>
		    <form action="addshowtime.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                   <div class="form-group">
                      <label class="col-sm-4 control-label">Show Date</label>
                      <div class="col-sm-8">
                      <div class="input-group date" id="date1">
                      	
                        <input type="text" class="form-control" name="start_date">
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span></span>
                      </div>
                      </div>
                    </div>
                  <div class="form-group">
                      <label class="col-sm-4 control-label">End Date</label>
                      <div class="col-sm-8">
                      <div class="input-group date" id="date2">
                      	
                        <input type="text" class="form-control" name="end_date">
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span></span>
                      </div>
                      </div>
                    </div>
				<div class="form-group">
					<label for="language" class="col-sm-4 control-label">Select Screens</label>
					<div class="col-sm-8">
						<select name="screens" id="" class="form-control">
							<option>Select City</option>
							<?php 
							// include_once '../include/config.php';
							$query = "SELECT * from screens";
							$result = mysqli_query($con, $query);
							while($obj= $result->fetch_object()) {
                                  if (!$result) {
                                    die("Error: Data not Found. . ");
                                  }
                                  echo "<option value=".$obj->screen_id.">".$obj->screen_name."</option>"; 
                                }
                                $result->close();
							 ?>

						</select>
					</div>
				</div>
				<div class="col-lg-8 col-lg-offset-3" style="padding-top: 15px;">
                  <button type="submit" name="movie_btn" style="background:#1abc9c" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus"></span>Add new Show Time</button>
                </div>

			</form>
		</div>
	</div>
</div>
<?php include_once 'footer.php'; ?>
<script type="text/javascript">
          $(document).ready(function(){
             $('#date1').datetimepicker({
                  format: 'DD/MM/YYYY'
              });
             $('#date2').datetimepicker({
                 format: 'DD/MM/YYYY'
              });
             
          });
                     
        </script> 