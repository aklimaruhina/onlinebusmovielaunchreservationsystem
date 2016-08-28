<?php 
require_once 'header.php' ?>
<div class="main-container">
	<div class="container">
      <div class="row">
        <div class="col-md-12" id="wrapper">
          <div class="form-horizontal contact-form">
          	<legend>Book a Movie</legend>
             <div class="row form-group">
               <div class="col-sm-6">
                  <label for="phone">Select city</label>
                  <select name="city" id='city' class="form-control">
                    <option value="0">Select a city</option>
                    <?php 
                      $query = "SELECT city_id, city FROM cities";
                      $cities = mysqli_query($con, $query);
                      while($cities_row = mysqli_fetch_array($cities)) {
                        echo "<option value='$cities_row[city_id]' >$cities_row[city]</option>";
                      }
                    ?>
                   </select>
               </div>
               <div class="col-sm-6">
                 	<label for="email">Select Theater</label>
               		<select name="theater" id='theatre' class="form-control">
               			<option value="0">........Theater .........</option>
               		</select>
               </div>
             </div>
             <hr>
             <div class="row form-group">
               <div class="col-sm-6">
                 <label for="phone">Select Movie</label>
                 <select name="movie" id='movie' class="form-control">
                     <option value="0">......movie.......</option>
                   </select>
               </div>
               <div class="col-sm-6">
                 	<label for="email">Select Date</label>
               		<select name="date" id='date' class="form-control">
               			<option value="0">Date</option>
               		</select>
               </div>
             </div><br>
            <!-- <div class="row id='details">
             	<div class="form-group">
					      <label for="showtime" class="col-sm-4 control-label">Select Show timing</label>
          			<div class="col-sm-6">
				    	    <select name="showtiming" id="show-timing" class="form-control">
               			<option value="0">show time</option>
               		</select>
				        </div>
				      </div>
      				<div class="form-group">
      					<label for="showtime" class="col-sm-4 control-label">Select Ticket type</label>
                	<div class="col-sm-6">
      				    	<select name="ticket-type" id="ticket-type" class="form-control">
                     	<option value="0">Ticket type</option>
                    </select>
      				    </div>

				      </div>
				      <div class="form-group text-center" id='fare-div'>
					      <label for="">Ticket Fare: </label>
				      </div>
      				<div class="form-group text-center" id='available-seats-div'>
      					<label for="">Total Available seats: </label>
      				</div>
      				<div class="form-group"></div>
      				<div class="form-group" id='seats'>
      					<label for="showtime" class="col-sm-4 control-label">Select No of Seats</label>
            			<div class="col-sm-6">
      				    	<select name="no-of-seats" id="no-of-seats" class="form-control">
               				<option value="0">No of seat</option>
               			</select>
      		        </div>
      				</div>
              <div class="form-group text-center" id='total-amount-seats-book'>
                <label for="">Total Amount: </label></div>

			     </div> -->
          <!--  <div class="row">
             <div class="ticket-summery">
               
             </div>
           </div> -->
          </div>
        </div>
      </div>
    </div>
</div>
<?php mysqli_close($con) ?>
<?php include 'footer.php'; ?>