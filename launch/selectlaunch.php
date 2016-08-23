<?php 
include_once 'header.php'; 
include_once '../include/config.php';

//var_dump($_GET);die;
$date =urldecode( $_GET['date']);
$lnid = $_GET['id'];

$query = "SELECT * FROM `launch_info` where launch_id = '$lnid' AND dept_date = '$date'";


?>
<div class="ticket-pick">
    <div class="container" style="border-bottom:2px solid #1abc9c; padding-bottom:30px">
      	<div class="row">
        	<div class="mid-content">
          		<div class="col-lg-6">
          			<div class="row">
            			<div class="col-lg-offset-1">
            				<form action="savelaunch.php?id=<?php echo $lnid.'&date='.$date;?>" method="post"><!-- savequantity.php?id=<?php #echo $busnum.'&date='.$date;?>? -->
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?php echo $lnid; ?>" >
                                    <input type="hidden" name="date" value="<?php echo $date ?>">
                                </div>
                                <input type="hidden" id="selected_seat" name="selected_seat" value="" />
                                <!-- <input type="hidden" id="payable" name="payable" value=""> -->
            					<div class="form-group">
            						<label>Select Your Launch: </label> <!--onchange='onChangeOfNoOfSeats(this.value)'-->
            						    <select class="form-control" name="selc" onchange="onChangeOfNoOfCabin(this.value)">
            						    	<option selected>Select Launch Value</option>
                              <?php 
                                $query = "SELECT * FROM `launch_info` where launch_id = ".$lnid;
                                $result = mysqli_query($con, $query); 
                                while($obj= $result->fetch_object()) {
                                  if (!$result) {
                                    die("Error: Data not Found. . ");
                                  }
                                  echo "<option value=".$obj->launch_id.">".$obj->launch_id."</option>"; 
                                }
                                $result->close();
                                 ?>
            						    </select>

            					</div>
                      <div class="col-lg-12" id="img_link" style="white-space:nowrap">
                        <!-- Eikhane image boshate chan? -->
                      </div>
                      <div class="form-group">
                        <label for="">Select Cabin Type</label>
                        <select name="cabin_type" id="" class="form-control">
                          <option value="0">Select your cabin</option>
                          <?php 
                                $query = "SELECT * FROM `launch_type`";
                                $result = mysqli_query($con, $query); 
                                while($obj= $result->fetch_object()) {
                                  if (!$result) {
                                    die("Error: Data not Found. . ");
                                  }
                                  echo "<option value=".$obj->launch_type_id.">".$obj->launch_type_name."</option>"; 
                                }
                                $result->close();
                          ?>
                        </select>
                      </div>
            					<div class="col-lg-12" style="padding-top: 15px;">
                  					<button type="submit" name="search_btn" style="background:#1abc9c" class="form-control"><span class="glyphicon glyphicon-search"></span>Continue</button>
                				</div>
            				</form>
            			</div>
            		</div>
            	</div>
                
            </div>
        </div>
    </div>
</div>
<?php 

include_once 'footer.php'; ?>
<script>
function onChangeOfNoOfCabin(strr) {
  $('#img_link').load("ajax_book_cabin.php?q="+strr,true);
}
</script>