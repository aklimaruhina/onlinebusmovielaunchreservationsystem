<?php 
include_once 'header.php'; 
include_once '../include/config.php';

//var_dump($_GET);die;
$date =urldecode( $_GET['date']);
$busnum = $_GET['id'];
// $date = $_GET['date'];

// $date = $_GET['dept_date'];

$query = "SELECT * FROM `bus_reserve` where id = '$busnum' AND dept_date = '$date'";

// $result = $mysqli->query($query);
// $query2 = "INSERT INTO `reserve_list` (`id`, `total_reserve`, `busno`) VALUES (NULL, '$qty', '$busnum')";
// $resul2 = $mysqli->query($query2);
// $query3 = "SELECT SUM(`total_reserve`) as reserve FROM `reserve_list` WHERE `busno`= ".$busnum;

// while($obj= $result->fetch_object()){
//     $numofseats=$obj->seat;
//     $result3 = $mysqli->query($query3);
//     while($objj = $result3->fetch_object()){
//         $inogbuwin = $objj->reserve;
//     }
//     $result3->free();
//     $avail=$numofseats-$inogbuwin;
//     $setnum=$inogbuwin+1;
// }
// $result->free();


?>
<div class="ticket-pick">
    <div class="container" style="border-bottom:2px solid #1abc9c; padding-bottom:30px">
      	<div class="row">
        	<div class="mid-content">
          		<div class="col-lg-6">
          			<div class="row">
            			<div class="col-lg-offset-1">
            				<form action="savequantity.php?id=<?php echo $busnum.'&date='.$date;?>" method="post"><!-- savequantity.php?id=<?php #echo $busnum.'&date='.$date;?>? -->
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?php echo $busnum; ?>" >
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
  /*
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","ajax_book_bus.php?q="+str,true);
  xmlhttp.send();
  */
  $('#img_link').load("ajax_book_bus.php?q="+str,true);
}
</script>
// <script>
//     $(document).ready(function(){
//         var path = '../ajax_validations/ajax_book_bus.php';
//         $(document).on('change', "#no-of-seats", function(){
//             var no_of_seats_id = $("#no-of-seats option:selected").attr('value');
//             pathArray = window.location.pathname.split( '/' );
//             host = pathArray[0];
//             $.ajax({
//                 url:host+path+'?no_of_seats_id='+no_of_seats_id,
//                 success:function(data){
//                     $('#total-amount-seats-book').html(data);
//                     $("#no-of-seats option[value="+no_of_seats_id+"]").attr("selected","selected");
//                 }
//             });
//         });
//     });
// </script>