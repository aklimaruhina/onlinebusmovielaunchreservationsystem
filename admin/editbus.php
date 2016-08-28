<?php 
include_once '../lib/app.php';
$id = $_GET['id'];
$query = "SELECT * FROM `bus_reserve` where id = ".$id;
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

include_once 'header.php';?>
<div class="ticket-pick">
    <div class="container" style="border-bottom:2px solid #1abc9c; padding-bottom:30px">
      <div class="row">
        <div class="mid-content">
          <div class="col-lg-10">
          	<div class="row">
            	<div class="col-lg-offset-1">
             		<h3>Enter Bus and route information</h3>
              		<div class="pick-form">
                  		<form class="form-horizontal" action="updatebus.php?id=<?php echo $id ?>" method="POST">
                        <div class="form-group">
                          <input type="hidden" name="id" value="<?php echo $id ?>">
                        </div>
                    		<div class="form-group">
                      			<label for="busname" class="col-sm-2 control-label">Bus Name</label>
                      			<div class="col-sm-10">
          							    	<input type="text" class="form-control" name="bus_name" value="<?php echo $row['bus_name'] ?>">
          							    </div>
                      		</div>
                      		<div class="form-group">
                      			<label for="businfo" class="col-sm-2 control-label">Bus Description</label>
                      			<div class="col-sm-10">
          							    	<input type="text" class="form-control" name="bus_info" value="<?php echo $row['bus_info'] ?>">
          							    </div>
                      		</div>
                      		<div class="form-group">
                      			<label for="city_from" class="col-sm-2 control-label">From</label>
                      			<div class="col-sm-10">
                      				<select class="form-control" name="city_from">

                      					<option><?php echo $row['city_from'] ?></option>
                      					<?php 
                      					$query = "SELECT * FROM `route_one`";
                      					$result = mysqli_query($con, $query); 
                      					while($obj= $result->fetch_object()) {
                      						if (!$result) {
                      							die("Error: Data not Found. . ");
                      						}
                      						echo "<option value=".$obj->route_from.">".$obj->route_from."</option>"; 
                      					}
                                $result->close();
                      					 ?>
                      				</select>
							              </div>
                      		</div>
                      		<div class="form-group">
                      			<label for="city_to" class="col-sm-2 control-label">To</label>
                      			<div class="col-sm-10">
                      				<select class="form-control" name="city_to">
                      					<option><?php echo $row['city_to'] ?></option>
                      					<?php 
                      					$query = "SELECT * FROM `route_one`";
                      					$result = mysqli_query($con, $query); 
                      					while($obj= $result->fetch_object()) {
                      						if (!$result) {
                      							die("Error: Data not Found. . ");
                      						}
                      						echo "<option value=".$obj->route_to.">".$obj->route_to."</option>"; 
                      					}
                      					 ?>
                      				</select>
							    </div>
                      		</div>
                      		<div class="form-group">
                      			<label for="seat" class="col-sm-2 control-label">Total Seat</label>
                      			<div class="col-sm-10">
							    	          <input type="number" class="form-control" name="seat" value="<?php echo $row['seat'] ?>">
							              </div>
                      		</div>
                      		<div class="form-group">
                      			<label for="fare" class="col-sm-2 control-label">Enter Bus fare</label>
                      			<div class="col-sm-10">
							    	<input type="number" class="form-control" name="fare" value="<?php echo $row['fare'] ?>">
							    </div>
                      		</div>
                          <div class="form-group">
                            <label for="dtime" class="col-sm-2 control-label">Departure time</label>
                            <div class="col-sm-10">
                              <div class="input-group date" id="time1">
                                <input type="text" class="form-control" name="dtime" value="<?php echo $row['dtime'] ?>">
                                <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-time"></span>
                              </div>
                            </div>
                          </div>
                      		
                          <div class="form-group">
                            <label for="arrtime" class="col-sm-2 control-label">Arrival time</label>
                            <div class="col-sm-10">
                              <div class="input-group date" id="time2">
                                <input type="text" class="form-control" name="arrtime" value="<?php echo $row['arrtime'] ?>">
                                <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-time"></span>
                              </div>
                            </div>
                          </div>

                      		<div class="form-group">
                      			<label for="dept_date" class="col-sm-2 control-label">Departure Date</label>
                      			<div class="col-sm-10">
                      				<div class="input-group date" id="date1">
                      					<input type="text" class="form-control" name="dept_date" value="<?php echo $row['dept_date'] ?>">
                      					<span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span></span>
                      				</div>
                      			</div>
                      		</div>
                          <?php //var_dump($row['dept_date']);die();?>
                      		<div class="form-group">
                      			<label for="arrival_date" class="col-sm-2 control-label">Arrival Date</label>
                      			<div class="col-sm-10">
                      				<div class="input-group date" id="date2">
                      					<input type="text" class="form-control" name="arr_date" value="<?php echo $row['arr_date'] ?>">
                      					<span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                      				</div>
                      			</div>
                      		</div>
                      		<div class="col-lg-5 col-md-offset-5 pull-right" style="padding-top: 15px;">
                 				<button type="submit" style="background:#1abc9c" class="form-control"><span class="glyphicon glyphicon-plus"></span>Added Buses</button>
                			</div>
                      	</form>
                    </div>
                </div>
            </div>
        </div>
        </div>
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
             $('#time1').datetimepicker({
                    format: 'LT'
                });
             $('#time2').datetimepicker({
                    format: 'LT'
                });
          });
                     
        </script>