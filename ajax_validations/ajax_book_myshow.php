<?php
// date_default_timezone_set('Asia/Calcutta');
//print_r($_SESSION);
//echo"-------";
//print_r($_SESSION['user_id']);

/**
 * if Condition to check onChange of Cities.
 */

if(count($_REQUEST)==1 && $_REQUEST['city_ch_id']){
	onChangeOfCity($_REQUEST['city_ch_id']);
}

/**
 * if Condition to check onChange of Theatres.
 */
if(count($_REQUEST)==2 && $_REQUEST['thr_id']!=0 && $_REQUEST['thr_city_id']){
	onChangeOfTheatre($_REQUEST['thr_id'], $_REQUEST['thr_city_id']);
}
elseif(isset($_REQUEST['thr_city_id'])){
 	onChangeOfCity($_REQUEST['thr_city_id']);
}

/**
 * if Condition to check onChange of Movies.
 */
if(count($_REQUEST)==3 && $_REQUEST['mov_id']!=0 && $_REQUEST['mov_thr_id']!=0 && $_REQUEST['mov_city_id']){
	onChangeOfMovies($_REQUEST['mov_id'], $_REQUEST['mov_thr_id'], $_REQUEST['mov_city_id']);
}
elseif(isset($_REQUEST['mov_id']) && $_REQUEST['mov_id']==0){
 	onChangeOfTheatre($_REQUEST['mov_thr_id'], $_REQUEST['mov_city_id']);
}
elseif(isset($_REQUEST['mov_thr_id']) && $_REQUEST['mov_thr_id']==0){
 	onChangeOfCity($_REQUEST['mov_city_id']);
}

/**
 * if Condition to check onChange of Dates.
 */
if(count($_REQUEST)==4 && $_REQUEST['date_id']!=0 && $_REQUEST['date_thr_id']!=0 && $_REQUEST['date_mov_id']!=0 && $_REQUEST['date_city_id']){
	onChangeOfDates($_REQUEST['date_id'], $_REQUEST['date_thr_id'], $_REQUEST['date_mov_id'], $_REQUEST['date_city_id']);
}
elseif(isset($_REQUEST['date_mov_id']) && $_REQUEST['date_mov_id']==0){
 	onChangeOfTheatre($_REQUEST['date_thr_id'], $_REQUEST['date_city_id']);
}
elseif(isset($_REQUEST['date_thr_id']) && $_REQUEST['date_thr_id']==0){
 	onChangeOfCity($_REQUEST['date_city_id']);
}
elseif(isset($_REQUEST['date_id']) && $_REQUEST['date_id']==0){
 	onChangeOfMovies($_REQUEST['date_mov_id'], $_REQUEST['date_thr_id'], $_REQUEST['date_city_id']);
}

/**
 * if Condition to check onChange of Ticket Type.
 */
if(count($_REQUEST)==6 && $_REQUEST['ticket_type_id'] && $_REQUEST['ticket_type_show_timing_id']){
	onChangeOfTicketTypes($_REQUEST['ticket_type_id'], $_REQUEST['ticket_type_show_timing_id'], $_REQUEST['ticket_type_thr_id'], $_REQUEST['ticket_type_mov_id'], $_REQUEST['ticket_type_date_id']);
}
elseif(count($_REQUEST)==6 && isset($_REQUEST['ticket_type_id']) && $_REQUEST['ticket_type_id']==0){
	onChangeOfTicketTypesEmpty();
}
elseif(count($_REQUEST)==6 && isset($_REQUEST['ticket_type_show_timing_id']) && $_REQUEST['ticket_type_show_timing_id']==0){
	onChangeOfShowTiming($_REQUEST['ticket_type_show_timing_id']);
}

/**
 * if Condition to check onChange of Show Timing.
 */
if(count($_REQUEST)==7 && $_REQUEST['show_timing_change_id']){
	onChangeOfShowTiming($_REQUEST['show_timing_change_id']);
}
elseif(count($_REQUEST)==7 && isset($_REQUEST['show_timing_change_id']) && $_REQUEST['show_timing_change_id']==0){
	onChangeOfShowTiming($_REQUEST['show_timing_change_id']);
}

/**
 * if Condition to check onChange Of No Of Seats.
 */

if(count($_REQUEST)==8 && $_REQUEST['no_of_seats_id']){
	onChangeOfNoOfSeats($_REQUEST['no_of_seats_id'], $_REQUEST['no_of_seats_ticket_type_id'], $_REQUEST['no_of_seats_mov_id'], $_REQUEST['no_of_seats_thr_id'], $_REQUEST['no_of_seats_city_id'], $_REQUEST['no_of_seats_date_id'], $_REQUEST['no_of_seats_show_timing_id']);
}
elseif(count($_REQUEST)==8 && isset($_REQUEST['no_of_seats_id']) && $_REQUEST['no_of_seats_id']==0){
	onChangeOfNoOfSeatsEmpty();
}


/**
 * if Condition to show the ticket booked summary.
 */
if(count($_REQUEST)==9 && $_REQUEST['selected_chairs_array']){
	onClickOfTicketSummary($_REQUEST['book_city_id'], $_REQUEST['book_thr_id'], $_REQUEST['book_mov_id'], $_REQUEST['book_date_id'], $_REQUEST['book_show_timing_id'], $_REQUEST['book_ticket_type_id'], $_REQUEST['book_no_of_seats'], $_REQUEST['book_total_amount'], $_REQUEST['selected_chairs_array']);
}


/**
 * if Condition to insert the booked ticket details.
 */
if(count($_REQUEST)==10){
	onClickOfTicketConfirm($_REQUEST['city'], $_REQUEST['theatre'], $_REQUEST['movie'], $_REQUEST['booked_date'], $_REQUEST['show_timing'], $_REQUEST['ticket_type'], $_REQUEST['fare'], $_REQUEST['no_of_seats_booked'], $_REQUEST['seat_numbers'], $_REQUEST['total_amount']);
}


/**
 * Function to call on OnChange of Cities.
 */
function onChangeOfCity($c_id){
	include '../lib/app.php';
	

	// var_dump($user_id);
	$cities_qry = "SELECT city_id, city FROM cities";

	$cities = mysqli_query($con,$cities_qry);
	$theatre_qry = "SELECT theatre_id, theatre_name FROM theatres WHERE city_id=$c_id";
	$theatres = mysqli_query($con, $theatre_qry);

	$result_data = "<div class='form-horizontal contact-form'>
          	<legend>Book a Movie</legend>
             <div class='row form-group'>
               <div class='col-sm-6'>
                  <label for='city'>Select city</label>
                  <select name='city' id='city' class='form-control'>"; 
				while($cities_row = mysqli_fetch_array($cities)) {
						$result_data .= "<option value='".$cities_row['city_id']."' >".$cities_row['city']."</option>";
				}
	$result_data .= "</select>
               </div>"; //end of col-sm-6

	$result_data .= "<div class='col-sm-6'>
                 	<label for='theatre'>Select Theater</label>
               		<select name='theater' id='theatre' class='form-control'>
				<option value='0'>-Theatre-</option>";
					while($theatres_row = mysqli_fetch_array($theatres)) {
						$result_data .= "<option value='".$theatres_row['theatre_id']."' >".$theatres_row['theatre_name']."</option>";
				}
	$result_data .= "</select></div></div><hr>"; //end of row
		
	$result_data .=	"<div class='row form-group'>
               <div class='col-sm-6'>
                 <label for='movie'>Select Movie</label>
                 <select name='movie' id='movie' class='form-control'>
                     <option value='0'>......movie.......</option>
                   </select>
               </div>
               <div class='col-sm-6'>
                 	<label for='date'>Select Date</label>
               		<select name='date' id='date' class='form-control'>
               			<option value='0'>Date</option>
               		</select>
               </div>
             </div><br></div>";

	print $result_data;
	mysqli_close($con);
}

/**
 * Function to call on OnChange of Theatres.
 */
function onChangeOfTheatre($t_id, $t_c_id) {
	include '../lib/app.php';
	$cities_qry = "SELECT city_id, city FROM cities";
	$cities = mysqli_query($con, $cities_qry);
	$theatre_qry = "SELECT theatre_id, theatre_name FROM theatres WHERE city_id=$t_c_id";
	$theatres = mysqli_query($con, $theatre_qry);
	$movies_qry = "SELECT movie_id, movie_name, movie_language FROM movies WHERE islive='running' and movie_id IN ( SELECT DISTINCT( movie_id) FROM screens WHERE theatre_id =$t_id)";
	$movies = mysqli_query($con, $movies_qry);
	
	$result_data = "<div class='form-horizontal contact-form'>
          	<legend>Book a Movie</legend>
             <div class='row form-group'>
               <div class='col-sm-6'>
                  <label for='city'>Select city</label>
                  <select name='city' id='city' class='form-control'>"; 
				while($cities_row = mysqli_fetch_array($cities)) {
						$result_data .= "<option value='".$cities_row['city_id']."' >".$cities_row['city']."</option>";
				}
	$result_data .= "</select>
               </div>"; //end of col-sm-6

	$result_data .= "<div class='col-sm-6'>
                 	<label for='theatre'>Select Theater</label>
               		<select name='theater' id='theatre' class='form-control'>
				<option value='0'>-Theatre-</option>";
					while($theatres_row = mysqli_fetch_array($theatres)) {
						$result_data .= "<option value='".$theatres_row['theatre_id']."' >".$theatres_row['theatre_name']."</option>";
				}
	$result_data .= "</select>
               </div></div><hr>"; //end of row
	$result_data .=	"<div class='row form-group'>
               <div class='col-sm-6'>
                 <label for='movie'>Select Movie</label>
                 <select name='movie' id='movie' class='form-control'>
                     <option value='0'>-Movie-</option>";
					while($movies_row = mysqli_fetch_array($movies)) {
					
							$result_data .= "<option value='".$movies_row['movie_id']."' >".$movies_row['movie_name']."(".$movies_row['movie_language'].")</option>";
					}

    $result_data .= "</select>
               </div>
               <div class='col-sm-6'>
                 	<label for='date'>Select Date</label>
               		<select name='date' id='date' class='form-control'>
               			<option value='0'>Date</option>
               		</select>
               </div>
             </div><br>"; //end of row

	$result_data .= "</div>";

	print $result_data;
	mysqli_close($con);
}

/**
 * Function to call on OnChange of Movies.
 */
function onChangeOfMovies($m_id, $m_t_id, $m_c_id) {
	include '../lib/app.php';
	$cities_qry = "SELECT city_id, city FROM cities";
	$cities = mysqli_query($con, $cities_qry);
	$theatre_qry = "SELECT theatre_id, theatre_name FROM theatres";
	$theatres = mysqli_query($con, $theatre_qry);
	$movies_qry = "SELECT movie_id, movie_name, movie_language FROM movies WHERE islive='running' and movie_id IN ( SELECT DISTINCT( movie_id) FROM screens WHERE theatre_id =$m_t_id)";
	$movies = mysqli_query($con, $movies_qry);
	$dates_qry = "SELECT tst.theatre_show_time_id, tst.start_date, tst.end_date
					FROM screens scr
					JOIN theatre_show_timings tst
					ON scr.screen_id = tst.screen_id
					WHERE scr.theatre_id=$m_t_id
					AND scr.movie_id=$m_id";
	$dates = mysqli_query($con, $dates_qry);
	
	$result_data = "<div class='form-horizontal contact-form'>
          	<legend>Book a Movie</legend>
             <div class='row form-group'>
               <div class='col-sm-6'>
                  <label for='city'>Select city</label>
                  <select name='city' id='city' class='form-control'>"; 
				while($cities_row = mysqli_fetch_array($cities)) {
						$result_data .= "<option value='".$cities_row['city_id']."' >".$cities_row['city']."</option>";
				}
	$result_data .= "</select>
               </div>";

	$result_data .= "<div class='col-sm-6'>
                 	<label for='theatre'>Select Theater</label>
               		<select name='theater' id='theatre' class='form-control'>
				<option value='0'>-Theatre-</option>";
					while($theatres_row = mysqli_fetch_array($theatres)) {
						$result_data .= "<option value='".$theatres_row['theatre_id']."' >".$theatres_row['theatre_name']."</option>";
				}
	$result_data .= "</select>
               </div>
             </div>
             <hr>"; //end of row 
	$result_data .=	"<div class='row form-group'>
               <div class='col-sm-6'>
                 <label for='movie'>Select Movie</label>
                 <select name='movie' id='movie' class='form-control'>
                     <option value='0'>-Movie-</option>";
					while($movies_row = mysqli_fetch_array($movies)) {
					
							$result_data .= "<option value='".$movies_row['movie_id']."' >".$movies_row['movie_name']."(".$movies_row['movie_language'].")</option>";
					}

    $result_data .= "</select>
               </div>
               <div class='col-sm-6'>
                 	<label for='date'>Select Date</label>
               		<select name='date' id='date' class='form-control'>
               			<option value='0'>Date</option>";

               			$dates_row = mysqli_fetch_array($dates);
						$i=0;
							$start_date=$dates_row['start_date'];
							$end_date=$dates_row['end_date'];
								if(strtotime("today") >= strtotime("$start_date") && strtotime("today") <= strtotime("$end_date")){
										$today = "Today".date(", d M", strtotime("today"));
										$result_data .= "<option id='".$dates_row['theatre_show_time_id']."-".strtotime("today")."' value='".$dates_row['theatre_show_time_id']."-".$i."' >".$today."</option>";
									}
									
									$i=1;
									
									if(strtotime("+$i day") >= strtotime("$start_date") && strtotime("+$i day") <= strtotime("$end_date")){
										$tomorrow = "Tomorrow".date(", d M", strtotime("+$i day"));
										$result_data .= "<option id='".$dates_row['theatre_show_time_id']."-".strtotime("+$i day")."' value='".$dates_row['theatre_show_time_id']."-".$i."' >".$tomorrow."</option>";
									}
									
									$i=2;
									
									if(strtotime("+$i day") >= strtotime("$start_date") && strtotime("+$i day") <= strtotime("$end_date")){
										$weakday = date("l, d M", strtotime("+$i day"));
										$result_data .= "<option id='".$dates_row['theatre_show_time_id']."-".strtotime("+$i day")."' value='".$dates_row['theatre_show_time_id']."-".$i."' >".$weakday."</option>";
									}
									
									$i=3;
									
									if(strtotime("+$i day") >= strtotime("$start_date") && strtotime("+$i day") <= strtotime("$end_date")){
										$weakday = date("l, d M", strtotime("+$i day"));
										$result_data .= "<option id='".$dates_row['theatre_show_time_id']."-".strtotime("+$i day")."' value='".$dates_row['theatre_show_time_id']."-".$i."' >".$weakday."</option>";
									}
		$result_data .= "</select>
               </div>
             </div><br>";
					
 	$result_data .= "</div>";
	print $result_data;
	mysqli_close($con);
}

/**
 * Function to call on OnChange of Dates.
 */
function onChangeOfDates($d_id, $d_t_id, $d_m_id, $d_c_id) {
	include '../lib/app.php';
	$cities_qry = "SELECT city_id, city FROM cities";
	$cities = mysqli_query($con, $cities_qry);
	$theatre_qry = "SELECT theatre_id, theatre_name FROM theatres";
	$theatres = mysqli_query($con, $theatre_qry);
	$movies_qry = "SELECT * FROM movies WHERE movie_id IN ( SELECT DISTINCT(movie_id) FROM screens WHERE theatre_id =$d_t_id)";
	$movies = mysqli_query($con, $movies_qry);
	$dates_qry = "SELECT tst.theatre_show_time_id, tst.start_date, tst.end_date
					FROM screens scr
					JOIN theatre_show_timings tst
					ON scr.screen_id = tst.screen_id
					WHERE scr.theatre_id=$d_t_id
					AND scr.movie_id=$d_m_id";
	$dates = mysqli_query($con, $dates_qry);
	
	$show_times_qry = "SELECT show_time_id, show_time FROM show_timing";
	$show_times = mysqli_query($con, $show_times_qry);
	
	$ticket_types_qry = "SELECT ticket_rate_id, ticket_type FROM ticket_rate";
	$ticket_types = mysqli_query($con, $ticket_types_qry);
	
	$result_data = "<div class='form-horizontal contact-form'>
          	<legend>Book a Movie</legend>
             <div class='row form-group'>
               <div class='col-sm-6'>
                  <label for='city'>Select city</label>
                  <select name='city' id='city' class='form-control'>"; 
				while($cities_row = mysqli_fetch_array($cities)) {
						$result_data .= "<option value='".$cities_row['city_id']."' >".$cities_row['city']."</option>";
				}
	$result_data .= "</select>
               </div>";

	$result_data .= "<div class='col-sm-6'>
                 	<label for='theatre'>Select Theater</label>
               		<select name='theater' id='theatre' class='form-control'>
				<option value='0'>-Theatre-</option>";
					while($theatres_row = mysqli_fetch_array($theatres)) {
						$result_data .= "<option value='".$theatres_row['theatre_id']."' >".$theatres_row['theatre_name']."</option>";
				}
	$result_data .= "</select>
               </div>
             </div>
             <hr>"; //end of row 
	$result_data .=	"<div class='row form-group'>
               <div class='col-sm-6'>
                 <label for='movie'>Select Movie</label>
                 <select name='movie' id='movie' class='form-control'>
                     <option value='0'>-Movie-</option>";
					while($movies_row = mysqli_fetch_array($movies)) {
					
							$result_data .= "<option value='".$movies_row['movie_id']."' >".$movies_row['movie_name']."(".$movies_row['movie_language'].")</option>";
					}

    $result_data .= "</select>
               </div>
               <div class='col-sm-6'>
                 	<label for='date'>Select Date</label>
               		<select name='date' id='date' class='form-control'>
               			<option value='0'>Date</option>";

               			$dates_row = mysqli_fetch_array($dates);
						$i=0;
							$start_date=$dates_row['start_date'];
							$end_date=$dates_row['end_date'];
								if(strtotime("today") >= strtotime("$start_date") && strtotime("today") <= strtotime("$end_date")){
										$today = "Today".date(", d M", strtotime("today"));
										$result_data .= "<option id='".$dates_row['theatre_show_time_id']."-".strtotime("today")."' value='".$dates_row['theatre_show_time_id']."-".$i."' >".$today."</option>";
									}
									
									$i=1;
									
									if(strtotime("+$i day") >= strtotime("$start_date") && strtotime("+$i day") <= strtotime("$end_date")){
										$tomorrow = "Tomorrow".date(", d M", strtotime("+$i day"));
										$result_data .= "<option id='".$dates_row['theatre_show_time_id']."-".strtotime("+$i day")."' value='".$dates_row['theatre_show_time_id']."-".$i."' >".$tomorrow."</option>";
									}
									
									$i=2;
									
									if(strtotime("+$i day") >= strtotime("$start_date") && strtotime("+$i day") <= strtotime("$end_date")){
										$weakday = date("l, d M", strtotime("+$i day"));
										$result_data .= "<option id='".$dates_row['theatre_show_time_id']."-".strtotime("+$i day")."' value='".$dates_row['theatre_show_time_id']."-".$i."' >".$weakday."</option>";
									}
									
									$i=3;
									
									if(strtotime("+$i day") >= strtotime("$start_date") && strtotime("+$i day") <= strtotime("$end_date")){
										$weakday = date("l, d M", strtotime("+$i day"));
										$result_data .= "<option id='".$dates_row['theatre_show_time_id']."-".strtotime("+$i day")."' value='".$dates_row['theatre_show_time_id']."-".$i."' >".$weakday."</option>";
									}
		$result_data .= "</select>
               </div>
             </div><br>"; //end of row form group

			
	$result_data .=	"<div class='row' id='details'>
             	<div class='form-group'>
					      <label for='showtime' class='col-sm-4 control-label'>Select Show timing</label>
          			<div class='col-sm-6'>
				    	    <select name='showtiming' id='show-timing' class='form-control'>
               			<option value='0'>show time</option>";
					while($show_times_row = mysqli_fetch_array($show_times)) {
							$result_data .= "<option value='".$show_times_row['show_time_id']."' >".$show_times_row['show_time']."</option>";
					}
	$result_data .=	"</select>
				        </div> 
				      </div>  
      				<div class='form-group'>
      					<label for='ticketype' class='col-sm-4 control-label'>Select Ticket type</label>
                	<div class='col-sm-6'>
      				    	<select name='ticket-type' id='ticket-type' class='form-control'>
                     	<option value='0'>Ticket type</option>";
					while($ticket_types_row = mysqli_fetch_array($ticket_types)) {
							$result_data .= "<option value='".$ticket_types_row['ticket_rate_id']."' >".$ticket_types_row['ticket_type']."</option>";
					}
	$result_data .=	"</select>
      				    </div>

				      </div>";
		/*<div id='fare-div'></div>
		<div id='available-seats-div'></div>
		<div id='seats'>		
			<span class='select-label'>No of Seats</span>
				<select class='field' id='no-of-seats'>
					<option value='0'>-Seats-</option>
				</select>
		</div>";
		/*<div id='total-amount-div'></div>
		<div>
			<span class='select-label'><a id='book' href='#'>Book</a></span>
		</div>*/
	
		$result_data .= "</div>";
	print $result_data;
	mysqli_close($con);
}

/**
 * Function to call on OnChange of Ticket Types.
 */
function onChangeOfTicketTypes($t_t_id, $t_t_s_t_id, $t_t_t, $t_t_m, $t_t_d_id) {
	include '../lib/app.php';
	$result_data ="
             	<div class='form-group'>
					      <label for='showtime' class='col-sm-4 control-label'>Select Show timing</label>
          			<div class='col-sm-6'>
				    	    <select name='showtiming' id='show-timing' class='form-control'>
				<option value='0'>-Timing-</option>";				
				$show_times_qry = "SELECT show_time_id, show_time FROM show_timing";
				$show_times = mysqli_query($con, $show_times_qry);
				while($show_times_row = mysqli_fetch_array($show_times)) {
							$result_data .= "<option value='".$show_times_row['show_time_id']."' >".$show_times_row['show_time']."</option>";
					}					
	$result_data .=	"</select>
				        </div>
				      </div>
      				<div class='form-group' id='ticket-type-div'>
      					<label for='ticketype' class='col-sm-4 control-label'>Select Ticket type</label>
                	<div class='col-sm-6'>
      				    	<select name='ticket-type' id='ticket-type' class='form-control'>
				<option value='0'>-Type-</option>";
				$ticket_types_qry = "SELECT ticket_rate_id, ticket_type FROM ticket_rate";
				$ticket_types = mysqli_query($con, $ticket_types_qry);
				while($ticket_types_row = mysqli_fetch_array($ticket_types)) {
							$result_data .= "<option value='".$ticket_types_row['ticket_rate_id']."' >".$ticket_types_row['ticket_type']."</option>";
					}
	$result_data .=	"</select></div></div>
	<div class='form-group text-center' id='fare-div'>";
		$ticket_types_price_qry = "SELECT ticket_rate_id, ticket_price FROM ticket_rate WHERE ticket_rate_id =$t_t_id";
		$ticket_types_price = mysqli_query($con, $ticket_types_price_qry);
		while($ticket_types_price_row = mysqli_fetch_array($ticket_types_price)) {
		$result_data .= "<label for='ticket-fare'>Ticket Fare: ".$ticket_types_price_row['ticket_price']." tk/- </label>";
		}
		$result_data .= "</div>";


	$capacity_count = "SELECT COUNT(booking_id) AS count_id FROM booking_ticket_for_theatre";
	$capacity_count_qry = mysqli_query($con, $capacity_count);
	$capacity_count_row = mysqli_fetch_object($capacity_count_qry);
	
	if($capacity_count_row->count_id == 0) { //6 == 0 so condition false 
		$total_ticket_avl = "SELECT scr.screen_capactiy FROM screens scr WHERE scr.movie_id = ".$t_t_m." AND scr.theatre_id = ".$t_t_t;
		$total_ticket_avl_qry = mysqli_query($con, $total_ticket_avl);
		$total_ticket_avl_row = mysqli_fetch_object($total_ticket_avl_qry);
		$s_k = 10;
		$available_tickets = $total_ticket_avl_row->screen_capactiy; //get available ticket tht is 300
	}
	
	if($capacity_count_row->count_id > 0) {
		$sel_date_id_exp = explode('-' ,$t_t_d_id);		
		$sel_date = date("Y-m-d", $sel_date_id_exp[1]);
		
		$total_ticket_avl = "SELECT scr.screen_capactiy, b_t_f_t.user_id, b_t_f_t.number_of_seats, b_t_f_t.ticket_rate_id, b_t_f_t.seat_numbers, b_t_f_t.show_time_id, t_r.ticket_price
							FROM booking_ticket_for_theatre b_t_f_t
							JOIN theatre_show_timings t_s_t ON b_t_f_t.theatre_show_time_id = t_s_t.theatre_show_time_id
							JOIN screens scr ON t_s_t.screen_id = scr.screen_id
							JOIN ticket_rate t_r ON b_t_f_t.ticket_rate_id = t_r.ticket_rate_id
							JOIN show_timing s_t ON b_t_f_t.show_time_id = s_t.show_time_id
							WHERE b_t_f_t.date_of_booking = '".$sel_date."'
							AND t_r.ticket_rate_id = ".$t_t_id."
							AND s_t.show_time_id = ".$t_t_s_t_id;
		//SELECT scr.screen_capactiy, b_t_f_t.user_id, b_t_f_t.number_of_seats, b_t_f_t.ticket_rate_id, b_t_f_t.seat_numbers, b_t_f_t.show_time_id, t_r.ticket_price FROM booking_ticket_for_theatre b_t_f_t JOIN theatre_show_timings t_s_t ON b_t_f_t.theatre_show_time_id = t_s_t.theatre_show_time_id JOIN screens scr ON t_s_t.screen_id = scr.screen_id JOIN ticket_rate t_r ON b_t_f_t.ticket_rate_id = t_r.ticket_rate_id JOIN show_timing s_t ON b_t_f_t.show_time_id = s_t.show_time_id WHERE b_t_f_t.date_of_booking = '2016-08-04' AND t_r.ticket_rate_id = 1 AND s_t.show_time_id = 1 


		$total_ticket_avl_qry = mysqli_query($con, $total_ticket_avl);
		
		if(mysqli_affected_rows($con) == 0){
		//print "zero";
		$total_ticket_avl = "SELECT scr.screen_capactiy FROM screens scr WHERE scr.movie_id = ".$t_t_m." AND scr.theatre_id = ".$t_t_t;
		
		$total_ticket_avl_qry = mysqli_query($con, $total_ticket_avl);
		$total_ticket_avl_row = mysqli_fetch_object($total_ticket_avl_qry);
		$s_k = 10; 
		$available_tickets = $total_ticket_avl_row->screen_capactiy;	
		}
		
		if(mysqli_affected_rows($con) > 0){
			$screen_capactiy = array();
			$number_of_seats = array();
			$user_id = array();
			$seat_numbers = array();
			$ticket_price = array();
			$user_seats = array();
			
			while($total_ticket_avl_row = mysqli_fetch_object($total_ticket_avl_qry)) {
				//print "in";
				
				$screen_capactiy[] = $total_ticket_avl_row->screen_capactiy; //300
				$number_of_seats[] = $total_ticket_avl_row->number_of_seats; //3
				$user_id[] = $total_ticket_avl_row->user_id;//2
				$ticket_price[] = $total_ticket_avl_row->ticket_price;//300
				$seat_numbers[] = $total_ticket_avl_row->seat_numbers; //3.4.5
				/**
				 * Check the user_id with $_SESSION['user_id'];
				 */
				// if(isset($_SESSION['id'])) {
					$user_id = $_SESSION['user']['id'];
					if($total_ticket_avl_row->user_id==$user_id){
						$user_seats[] = $total_ticket_avl_row->number_of_seats;
					}
					
				// }
			}
			////////////
		if(!empty($screen_capactiy)){
			$rem_seats = $screen_capactiy[0] - array_sum($number_of_seats);
				if($rem_seats == 0){
					$s_k = 0;
					$available_tickets = "Sorry No Seats Available !";
				}
				if($rem_seats > 0){
					if(!empty($user_seats)){
						$rem_user_seats = 10 - array_sum($user_seats);
						if($rem_user_seats == 0){
							$s_k = $rem_user_seats;
							$available_tickets = 'Sorry, you can\'t book more than 10 Tickets for this show !';
						}
						if($rem_user_seats > 0 && $rem_user_seats <= $rem_seats){
							$s_k = $rem_user_seats;
							$available_tickets = $rem_seats;
						}
					}
					if(empty($user_seats)){
						if($rem_seats < 10){
							$s_k = $rem_seats; 
							$available_tickets = $rem_seats;
						}
						else{ 
							$s_k = 10;
							$available_tickets = $rem_seats;
						}
			   	   }		
		   }
		}
		 /////////  
			
		}

		
	}
/**
 * Check, if the user is logged in or not, code start.
 */
$result_data .= "<div class='form-group text-center' id='available-seats-div'>
      					<span class='select-label' id='available-seats'>Total Available Seats: <span class='message'>".$available_tickets."</span></span></div>";

	$result_data .= "<div class='form-group'></div>
      				<div class='form-group' id='seats'>
      					<label for='no-of-seats' class='col-sm-4 control-label'>Select No of Seats</label>
            			<div class='col-sm-6'>
      				    	<select id='no-of-seats' class='form-control'>
								<option value='0'>-Seats one-</option>";
								for($k=1; $k<=$s_k; $k++){
			   $result_data .= "<option value='$k'>$k</option>";
			   					}
								
			$result_data .= "</select>
      		        </div>
      				</div>";

	/*$result_data .= "<div id='total-amount-div'></div>
		<div>
		<br/>
			<span class='select-label'><a id='book' href='#'>Book</a></span>
		</div>";*/
	$result_data .= "<div class='form-group text-center' id='total-amount-seats-book'></div>";

/**
 * Check the user is logged in or not, code End.
 */
	print $result_data;
	mysqli_close($con);
}

/**
 * Function to call on OnChange of No Of Seats.
 */
function onChangeOfNoOfSeats($s_id, $t_t_id, $m_id, $t_id, $c_id, $d_id, $s_t_id) {
	include '../lib/app.php';
	
	$ticket_type_id = "SELECT ticket_price FROM ticket_rate WHERE ticket_rate_id = ".$t_t_id;
	//var_dump($ticket_type_id);
	$ticket_type_id_qry = mysqli_query($con, $ticket_type_id);
	$ticket_type_id_row = mysqli_fetch_object($ticket_type_id_qry);
	
	$result_data = "<div class='form-group text-center' id='total-amount-seats-book'>
			<span class='select-label' id='total-amount'>Total Amount: <span class='message'><span id='total-amount-rs' value='".$s_id*$ticket_type_id_row->ticket_price."'>".$s_id*$ticket_type_id_row->ticket_price."</span> taka</span></span>
		</div>";
		
		$total_ticket_avl = "SELECT scr.screen_capactiy FROM screens scr WHERE scr.movie_id = ".$m_id." AND scr.theatre_id = ".$t_id;
		$total_ticket_avl_qry = mysqli_query($con, $total_ticket_avl);
		$total_ticket_avl_row = mysqli_fetch_object($total_ticket_avl_qry);

		$capacity = $total_ticket_avl_row->screen_capactiy;
		$ticket_type = $capacity/3;
		$ticket_type1 = round($ticket_type); 
		$ticket_type2 = $ticket_type1*2;

		$result_data .=	"<div id='seats-display'>";
		$result_data .=	"<div>platinum</div><br/>";
		$avail_chair = '';
		
		/**
		 * To Show the status of the chairs Code Start.
		 */ 	 
		$sel_date_id_exp = explode('-' ,$d_id);		
		$sel_date = date("Y-m-d", $sel_date_id_exp[1]);
		
		$total_ticket_avl = "SELECT scr.screen_capactiy, b_t_f_t.user_id, b_t_f_t.number_of_seats, b_t_f_t.ticket_rate_id, b_t_f_t.seat_numbers, b_t_f_t.show_time_id, t_r.ticket_price, b_t_f_t.seat_numbers
							FROM booking_ticket_for_theatre b_t_f_t
							JOIN theatre_show_timings t_s_t ON b_t_f_t.theatre_show_time_id = t_s_t.theatre_show_time_id
							JOIN screens scr ON t_s_t.screen_id = scr.screen_id
							JOIN ticket_rate t_r ON b_t_f_t.ticket_rate_id = t_r.ticket_rate_id
							JOIN show_timing s_t ON b_t_f_t.show_time_id = s_t.show_time_id
							WHERE b_t_f_t.date_of_booking = '".$sel_date."'
							AND t_r.ticket_rate_id = ".$t_t_id."
							AND s_t.show_time_id = ".$s_t_id;

		$total_ticket_avl_qry = mysqli_query($con, $total_ticket_avl);
		
		if(mysqli_affected_rows($con) == 0){
		//print "zero1";
			$all_available = false;
		}
		
		if(mysqli_affected_rows($con) > 0){
		//print "zero2";
			$all_available = true;
			$seats_numbers = array();
			while($total_ticket_avl_row = mysqli_fetch_object($total_ticket_avl_qry)) {
				$seats_numbers[] = $total_ticket_avl_row->seat_numbers;
			}
			$chair_num = array();
			$exp=array();
			$imp = implode(',', $seats_numbers);
			$exp = explode(',', $imp);
		}
		 
		/**
		 * To Show the status of the chairs Code End.
		 */
		 
			for($i=1; $i<=$capacity; $i++){	
				$avail_chair='available';
				$chair = 'W_chair.gif';
				
			 if($all_available){	

				foreach($exp as $c_n){
					if($i==$c_n){$avail_chair='booked'; $chair = 'R_chair.gif';}
				}
				
				if($t_t_id==1 && $i>$ticket_type1){ $avail_chair='unavailable'; $chair = 'Gy_chair.gif'; }
				if($t_t_id==2 && $i<=$ticket_type1){ $avail_chair='unavailable'; $chair = 'Gy_chair.gif'; }
				if($t_t_id==2 && $i>$ticket_type2){ $avail_chair='unavailable'; $chair = 'Gy_chair.gif'; }
				if($t_t_id==3 && $i<=$ticket_type2){ $avail_chair='unavailable'; $chair = 'Gy_chair.gif'; }
				
			 }
			 else{
				if($t_t_id==1 && $i>$ticket_type1){ $avail_chair='unavailable'; $chair = 'Gy_chair.gif'; }
				if($t_t_id==2 && $i<=$ticket_type1){ $avail_chair='unavailable'; $chair = 'Gy_chair.gif'; }
				if($t_t_id==2 && $i>$ticket_type2){ $avail_chair='unavailable'; $chair = 'Gy_chair.gif'; }
				if($t_t_id==3 && $i<=$ticket_type2){ $avail_chair='unavailable'; $chair = 'Gy_chair.gif'; }
			 }
			 
				$result_data .=	"<span class='white-space'>&nbsp;</span><image class='$avail_chair' title='Seat No: $i' id='$i' src='./images/$chair'>";	
				if($i%10==0){ $result_data .= "<br/>"; }
				if($i==$ticket_type1){ $result_data .= "<br/><hr/><div>Gold</div><br/>"; }
				if($i==$ticket_type2){ $result_data .= "<br/><hr/><div>Silver</div><br/>"; }
			}
		
		$result_data .= "</div>";
		
		$result_data .= '<div id="seats-info">
			<div>&nbsp;&nbsp;Key to Seat Layout</div>
			<div>
				<img title="Available Seats" src="./images/W_chair.gif">&nbsp;-&nbsp;Available Seats
			</div>
			<div>
				<img title="Booked Seats" src="./images/R_chair.gif">&nbsp;-&nbsp;Booked Seats
			</div>
			<div>
				<img title="Your Selection" src="./images/G_chair.gif">&nbsp;-&nbsp;Your Selection
			</div>
			<div>
				<img title="Unavailable Seats" src="./images/Gy_chair.gif">&nbsp;-&nbsp;Unavailable Seats
			</div>
			</div>';

$result_data .= "<div class='row' id='selected-ticket-summary-div'></div>";

		$result_data .= "<div class='row' id='book-div'>
			<br/>
			<span class='select-label'><a id='book' href='#selected-ticket-summary-div'>Book</a></span>
		</div>
	</div>";
		
	print $result_data;
	mysqli_close($con);

}

/**
 * Function to call on OnChange of No Of Seats if empty.
 */
function onChangeOfNoOfSeatsEmpty() {	
	$result_data = "<div class='form-group text-center' id='total-amount-seats-book'></div>";		
	print $result_data;
}

/**
 * Function to call on OnChange of Show Timings.
 */
function onChangeOfShowTiming() {
	include '../lib/app.php';

	$result_data = "
             	<div class='form-group'>
					      <label for='showtime' class='col-sm-4 control-label'>Select Show timing</label>
          			<div class='col-sm-6'>
				    	    <select name='showtiming' id='show-timing' class='form-control'>
				<option value='0'>-Timing-</option>";
				$show_times_qry = "SELECT show_time_id, show_time FROM show_timing";
				$show_times = mysqli_query($con, $show_times_qry);
				while($show_times_row = mysqli_fetch_array($show_times)) {
							$result_data .= "<option value='".$show_times_row['show_time_id']."' >".$show_times_row['show_time']."</option>";
					}					
	$result_data .=	"</select>
				        </div>
				      </div>
      				<div class='form-group' id='ticket-type-div'>
      					<label for='' class='col-sm-4 control-label'>Select Ticket type</label>
                	<div class='col-sm-6'>
      				    	<select id='ticket-type' class='form-control'>
				<option value='0'>-Type-</option>";
				$ticket_types_qry = "SELECT ticket_rate_id, ticket_type FROM ticket_rate";
				$ticket_types = mysqli_query($con, $ticket_types_qry);
				while($ticket_types_row = mysqli_fetch_array($ticket_types)) {
						$result_data .= "<option value='".$ticket_types_row['ticket_rate_id']."' >".$ticket_types_row['ticket_type']."</option>";
					}
	$result_data .=	"</select></div></div>
		<div class='form-group text-center' id='fare-div'>
				      </div>
      				<div class='form-group text-center' id='available-seats-div'>
      				</div>
      				<div class='form-group' id='seats'>
      					<label for='' class='col-sm-4 control-label'>Select No of Seats</label>
            			<div class='col-sm-6'>
      				    	<select id='no-of-seats' class='form-control'>
               				<option value='0'>....No of seat</option>
               			</select>
      		        </div>
      				</div>";
		/*<div id='total-amount-div'></div>
		<div>
			<span class='select-label'><a id='book' href='#'>Book</a></span>
		</div>";*/
		$result_data .= "<div class='form-group text-center' id='total-amount-seats-book'></div>";
	print $result_data;
	mysqli_close($con);
}

/**
 * Function to call on OnChange of Ticket Type Empty.
 */
function onChangeOfTicketTypesEmpty(){
	include '../lib/app.php';
	$result_data = "
             	<div class='form-group'>
					      <label for='showtime' class='col-sm-4 control-label'>Select Show timing</label>
          			<div class='col-sm-6'>
				    	    <select id='show-timing' class='form-control'>
				<option value='0'>-Timing-</option>";
				$show_times_qry = "SELECT show_time_id, show_time FROM show_timing";
				$show_times = mysqli_query($con, $show_times_qry);
				while($show_times_row = mysqli_fetch_array($show_times)) {
							$result_data .= "<option value='".$show_times_row['show_time_id']."' >".$show_times_row['show_time']."</option>";
					}					
	$result_data .=	"</select>
				        </div>
				      </div>
      				<div class='form-group' id='ticket-type-div>
      					<label for='' class='col-sm-4 control-label'>Select Ticket type</label>
                	<div class='col-sm-6'>
      				    	<select id='ticket-type' class='form-control'>
				<option value='0'>-Type-</option>";
				$ticket_types_qry = "SELECT ticket_rate_id, ticket_type FROM ticket_rate";
				$ticket_types = mysqli_query($con, $ticket_types_qry);
				while($ticket_types_row = mysqli_fetch_array($ticket_types)) {
						$result_data .= "<option value='".$ticket_types_row['ticket_rate_id']."' >".$ticket_types_row['ticket_type']."</option>";
					}
	$result_data .=	"</select></div></div>
		<div class='form-group text-center' id='fare-div'>
				      </div>
      				<div class='form-group text-center' id='available-seats-div'>
      				</div>
      				<div class='form-group'></div>
      				<div class='form-group' id='seats'>
      					<label for='seats' class='col-sm-4 control-label'>Select No of Seats</label>
            			<div class='col-sm-6'>
      				    	<select id='no-of-seats' class='form-control'>
               				<option value='0'>No 02 of seat</option>
               			</select>
      		        </div>
      				</div>";
		/*<div id='total-amount-div'></div>
		<div>
			<span class='select-label'><a id='book' href='#'>Book</a></span>
		</div>";*/
		$result_data .= "<div class='form-group text-center' id='total-amount-seats-book'></div>";

		/*$result_data .= "<div id='total-amount-div'></div>
		<div>
			<span class='select-label'><a id='book' href='#'>Book</a></span>
		</div>";*/
	print $result_data;
	mysqli_close($con);
}


/**
 * Function to call on OnClick of Book Ticket.
 */
function onClickOfTicketSummary($b_c_id, $b_t_id, $b_m_id, $b_d_id, $b_s_t_id, $b_t_t_id, $b_n_o_s, $b_t_a, $s_c_a){
	include '../lib/app.php';
	
	$qry = "SELECT ticket_price FROM ticket_rate WHERE ticket_rate_id=".$b_t_t_id;
	$ticket_fare = mysqli_query($con, $qry);
	$ticket_fare_row = mysqli_fetch_object($ticket_fare);
	
	$city = "SELECT city FROM cities WHERE city_id=".$b_c_id;
	$city_qry = mysqli_query($con, $city);
	$city_qry_row = mysqli_fetch_object($city_qry);
	
	$theatre = "SELECT theatre_name FROM theatres WHERE theatre_id=".$b_t_id;
	$theatre_qry = mysqli_query($con, $theatre);
	$theatre_qry_row = mysqli_fetch_object($theatre_qry);
	
	$movie = "SELECT movie_name FROM movies WHERE movie_id=".$b_m_id;
	$movie_qry = mysqli_query($con, $movie);
	$movie_qry_row = mysqli_fetch_object($movie_qry);
	
	$dt = explode('-',$b_d_id);
	$dt_format = date("Y-m-d", $dt[1]);
	
	$show_timing = "SELECT show_time FROM show_timing WHERE show_time_id=".$b_s_t_id;
	$show_timing_qry = mysqli_query($con, $show_timing);
	$show_timing_qry_row = mysqli_fetch_object($show_timing_qry);
	
	$ticket_type = "SELECT ticket_type FROM ticket_rate WHERE ticket_rate_id=".$b_t_t_id;
	$ticket_type_qry = mysqli_query($con, $ticket_type);
	$ticket_type_qry_row = mysqli_fetch_object($ticket_type_qry);
	
	$result_data = "<form id='selected-ticket-summary' action='movie.php' method='post'>
		<fieldset>
			<legend>Ticket Booking Summary</legend>
				<div id='selected-ticket-summary-indiv'>
				
					<div id='summary-city'>
						<span id='summary-city-label' class='sum_label' >City:</span>
						<span id='summary-city-value' class='".$b_c_id."' >".$city_qry_row->city."</span>
					</div>
					
					<div id='summary-theatre'>
						<span id='summary-theatre-label' class='sum_label' >Theatre:</span>
						<span id='summary-theatre-value' class='".$b_t_id."' >".$theatre_qry_row->theatre_name."</span>
					</div>
					
					<div id='summary-movie'>
						<span id='summary-movie-label' class='sum_label' >Movie:</span>
						<span id='summary-movie-value' class='".$b_m_id."' >".$movie_qry_row->movie_name."</span>
					</div>
					
					<div id='summary-booked-date'>
						<span id='summary-booked-date-label' class='sum_label' >Booked for the date:</span>
						<span id='summary-booked-date-value' class='".$b_d_id."' >".$dt_format."</span>
					</div>
					
					<div id='summary-show-timing'>
						<span id='summary-show-timing-label' class='sum_label' >Show Timing:</span>
						<span id='summary-show-timing-value' class='".$b_s_t_id."' >".$show_timing_qry_row->show_time."</span>
					</div>
					
					<div id='summary-ticket-type'>
						<span id='summary-ticket-type-label' class='sum_label' >Ticket Type:</span>
						<span id='summary-ticket-type-value' class='".$b_t_t_id."' >".$ticket_type_qry_row->ticket_type."</span>
					</div>
					
					<div id='summary-ticket-fare'>
						<span id='summary-ticket-fare-label' class='sum_label' >Ticket Fare:</span>
						<span id='summary-ticket-fare-value' class='".$ticket_fare_row->ticket_price."' >".$ticket_fare_row->ticket_price." taka</span>
					</div>
					
					<div id='summary-no-of-seats-booked'>
						<span id='summary-no-of-seats-booked-label' class='sum_label' >No of seats booked:</span>
						<span id='summary-no-of-seats-booked-value' class='".$b_n_o_s."' >".$b_n_o_s."</span>
					</div>
					
					<div id='summary-seat-numbers'>
						<span id='summary-seat-numbers-label' class='sum_label' >Seat numbers:</span>
						<span id='summary-seat-numbers-value' class='".$s_c_a."' >".$s_c_a."</span>
					</div>
					
					<div id='summary-total-amount'>
						<span id='summary-total-amount-label' class='sum_label' >Total amount:</span>
						<span id='summary-total-amount-value' class='".$b_t_a."' >".$b_t_a." taka</span>
					</div>			
					
				</div>
		</fieldset>
	</form>";

	$result_data .="<span class='ticket-confirm'>
	<a id='ticket-confirm' href='#wrapper'>Confirm</a>
	</span>";
		
	
	print $result_data;
	mysqli_close($con);
}


function onClickOfTicketConfirm($city, $theatre, $movie, $booked_date, $show_timing, $ticket_type, $fare, $no_of_seats_booked, $seat_numbers, $total_amount){
	include '../lib/app.php';
	$user_id = $_SESSION['user']['id'];
	$exp = explode('-',$booked_date);
	$dt = date("Y-m-d", $exp[1]);
	
	//$qry = "INSERT INTO booking_ticket_for_theatre (user_id, theatre_show_time_id, date_of_booking, show_time_id, ticket_rate_id, number_of_seats, seat_numbers, total_amount)
	//VALUES ($user_id,$exp[0],'$dt',$show_timing,$ticket_type,$no_of_seats_booked,'$seat_numbers',$total_amount)";
	
	$qry = "INSERT INTO booking_ticket_for_theatre (user_id, theatre_show_time_id, date_of_booking, show_time_id, ticket_rate_id, number_of_seats, seat_numbers,theatre_id)
	VALUES ($user_id,$exp[0],'$dt',$show_timing,$ticket_type,$no_of_seats_booked,'$seat_numbers', '$theatre')";
	
	mysqli_query($con, $qry) or die(mysqli_error($con));
	
	$result_data = "<div id='thanks-for-booking'>Thanks for Booking the Tickets!.
	To continue booking clik on this link &nbsp;&nbsp;<a href='movie.php?id=$user_id' >Book more tickets</a></div>";

	print $result_data;
	mysqli_close($con);
}


?>
