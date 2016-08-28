<?php 
include_once 'header.php'; 
include_once '../lib/database.php';

//var_dump($_GET);die;
$date =urldecode( $_GET['date']);

$busnum = $_GET['busid'];

$query = "SELECT * FROM `bus_reserve` where id = '$busnum' AND dept_date = '$date'";

?>
<div class="ticket-pick">
    <div class="container" style="border-bottom:2px solid #1abc9c; padding-bottom:30px">
      	<div class="row">
        	<div class="mid-content">
          		<div class="col-lg-6">
          			<div class="row">
            			<div class="col-lg-offset-1">
            				<form action="savequantity.php?id=<?php echo $id.'&busno= '.$busnum.'&date='.$date;?>" method="post"><!-- savequantity.php?id=<?php #echo $busnum.'&date='.$date;?>? -->
                                <div class="form-group">
                                  <input type="hidden" name="userid" value="<?php echo $id ?>">
                                    <input type="hidden" name="busid" value="<?php echo $busnum; ?>" >
                                    <input type="hidden" name="date" value="<?php echo $date ?>">
                                </div>
                                <input type="hidden" id="selected_seat" name="selected_seat" value="" />
                                <!-- <input type="hidden" id="payable" name="payable" value=""> -->
            					<div class="form-group">
            						<label>Select Your Bus: </label> <!--onchange='onChangeOfNoOfSeats(this.value)'-->
            						    <select class="form-control" name="qty" id="no-of-seats" onchange="onChangeOfNoOfSeats(this.value)">
            						    	<option selected>Select Bus</option>
                              <?php 
                                $query = "SELECT * FROM `bus_reserve` where id= ".$busnum;
                                $result = mysqli_query($con, $query); 
                                while($obj= $result->fetch_object()) {
                                  if (!$result) {
                                    die("Error: Data not Found. . ");
                                  }
                                  echo "<option value=".$obj->id.">".$obj->id."</option>"; 
                                }
                                $result->close();
                                 
                               ?>
            						    </select>

            					</div>
                      <div class="col-lg-12" id="img_link" style="white-space:nowrap">
                        <!-- Eikhane image boshate chan? -->
                      </div>
                      <div class="form-group">
                        <label for="">First Name</label>
                        <input type="text" name="firstname" placeholder="firstname" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="">Last Name</label>
                        <input type="text" name="lastname" placeholder="lastname" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="">Contact</label>
                        <input type="text" name="contact" placeholder="Contact number" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="">Address</label>
                        <textarea name="address" rows="3" class="form-control"></textarea>
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
function onChangeOfNoOfSeats(str) {
  $('#img_link').load("ajax_book_bus.php?q="+str,true);
}
</script>