<?php session_start();

if(count($_REQUEST)==1 && $_REQUEST['city_ch_id']){
	onChangeOfCity($_REQUEST['city_ch_id']);
}
if(count($_REQUEST)==2 && $_REQUEST['l_id']!=0 && $_REQUEST['l_c_id']){
	onChangeOfLaunch($_REQUEST['l_id'], $_REQUEST['l_c_id']);
}
elseif(isset($_REQUEST['l_c_id'])){
 	onChangeOfCity($_REQUEST['l_c_id']);
}

if(count($_REQUEST)==3 && $_REQUEST['d_id']!=0 && $_REQUEST['d_l_id'] &&$_REQUEST['d_c_id'] ){
	onChangeOfDate($_REQUEST['d_id'], $_REQUEST['d_l_id'], $_REQUEST['d_c_id']);
}
elseif(isset($_REQUEST['d_id']) && $_REQUEST['d_id']==0){
	onChangeOfLaunch($_REQUEST['d_l_id'], $_REQUEST['d_c_id']);
}
elseif(isset($_REQUEST['d_l_id']) && $_REQUEST['d_l_id']==0){
	onChangeOfCity($_REQUEST['d_c_id']);
}

if(count($_REQUEST)==4 && $_REQUEST['bp_id']!=0 && $_REQUEST['bp_d_id'] && $_REQUEST['bp_d_l_id'] && $_REQUEST['bp_d_c_id']){
	onChangeOfBoarding($_REQUEST['bp_id'], $_REQUEST['bp_d_id'], $_REQUEST['bp_d_l_id'], $_REQUEST['bp_d_c_id']);
}
elseif(isset($_REQUEST['bp_id']) && $_REQUEST['bp_id'] == 0){
	onChangeOfDate($_REQUEST['bp_d_id'], $_REQUEST['bp_d_l_id'], $_REQUEST['bp_d_c_id']);
}
elseif(isset($_REQUEST['bp_d_id']) && $_REQUEST['bp_d_id'] == 0){
	onChangeOfLaunch($_REQUEST['bp_d_l_id'], $_REQUEST['bp_d_c_id']);
}
elseif(isset($_REQUEST['bp_d_l_id']) && $_REQUEST['bp_d_l_id'] == 0){
	onChangeOfCity($_REQUEST['bp_d_c_id']);
}
 
if(count($_REQUEST)==5 && $_REQUEST['ticket_type_id']){
	onChangeOfTicketTypes($_REQUEST['ticket_type_id'], $_REQUEST['ticket_bp_id'], $_REQUEST['ticket_d_id'], $_REQUEST['ticket_l_id']);
}
elseif(count($_REQUEST)==5 && isset($_REQUEST['ticket_type_id']) && $_REQUEST['ticket_type_id']==0){
	onChangeOfTicketTypesEmpty();
} 

if(count($_REQUEST)==6 && $_REQUEST['no_of_seats_id']){
	onChangeOfNoOfSeats($_REQUEST['no_of_seats_id'], $_REQUEST['no_of_seats_tid'], $_REQUEST['no_of_seats_bpid'], $_REQUEST['no_of_seats_dtid'], $_REQUEST['no_of_seats_lnid'], $_REQUEST['no_of_seats_cid']);
}
elseif(count($_REQUEST)==7 && isset($_REQUEST['no_of_seats_id']) && $_REQUEST['no_of_seats_id']==0){
	onChangeOfNoOfSeatsEmpty();
}
if(count($_REQUEST)==8 && $_REQUEST['selected_chairs_array']){
	onClickOfTicketSummary($_REQUEST['book_city_id'], $_REQUEST['book_boarding_id'], $_REQUEST['book_launch_id'], $_REQUEST['book_date_id'], $_REQUEST['book_ticket_type_id'], $_REQUEST['book_no_of_seats'], $_REQUEST['book_total_amount'], $_REQUEST['selected_chairs_array']);

}

if(count($_REQUEST)==9){
	onClickOfTicketConfirm($_REQUEST['city'], $_REQUEST['launch'], $_REQUEST['boardingpoint'], $_REQUEST['booked_date'], $_REQUEST['ticket_type'], $_REQUEST['fare'], $_REQUEST['no_of_seats_booked'], $_REQUEST['seat_numbers'], $_REQUEST['total_amount']);
}


function onChangeOfCity($c_id){
	include '../include/config.php';
	$route_query = "SELECT * FROM `launch_route`";

	$routes = mysqli_query($con, $route_query);

	$launch_query = "SELECT * From launch_info where city_id = $c_id";
	$launches = mysqli_query($con, $launch_query);

	$result_data = "<div class='form-horizontal contact-form'>
          	<legend>Book a Launch</legend>
             <div class='row form-group'>
               <div class='col-sm-6'>
                  <label for='city'>Select city</label>
                  <select name='city' id='city' class='form-control'>"; 
                  while($cities_row = mysqli_fetch_array($routes)) {
                        $result_data .= "<option value='".$cities_row['city_id']."' >".$cities_row['city_from']." - ".$cities_row['city_to']."</option>";
                  }
	$result_data .= "</select>
               </div>"; //end of col-sm-6

	$result_data .= "<div class='col-sm-6'>
                 	<label for='launchname'>Select Launch Name</label>
               		<select name='launch_name' id='launchname' class='form-control'>
				<option value='0'>-Launch-</option>";
					while($launches_row = mysqli_fetch_array($launches)) {
						$result_data .= "<option value='".$launches_row['launch_id']."' >".$launches_row['launch_name']."</option>";
				}
	$result_data .= "</select></div></div><hr>"; //end of row
		
	$result_data .=	"<div class='row form-group'>
               
               <div class='col-sm-6'>
                 	<label for='date'>Select Date</label>
               		<select name='date' id='date' class='form-control'>
               			<option value='0'>Date</option>
               		</select>
               </div>
               <div class='col-sm-6'>
                 <label for='boarding'>Select Boardin Point</label>
                 <select name='boarding_point' id='b_point' class='form-control'>
                     <option value='0'>......Boarding.......</option>
                   </select>
               </div>
             </div><br></div>";

	print $result_data;
	mysqli_close($con);
}

function onChangeOfLaunch($ln_id, $ln_city){
	include '../include/config.php';
	$route_query = "SELECT * FROM `launch_route`";

	$routes = mysqli_query($con, $route_query);

	$launch_query = "SELECT * From launch_info where city_id = $ln_city";
	$launches = mysqli_query($con, $launch_query);

	$date_query = "SELECT *from launch_dept_date where launch_id= $ln_id";

	$dates = mysqli_query($con, $date_query);

	$result_data = "<div class='form-horizontal contact-form'>
          	<legend>Book a Launch</legend>
             <div class='row form-group'>
               <div class='col-sm-6'>
                  <label for='city'>Select city</label>
                  <select name='city' id='city' class='form-control'>"; 
                  while($cities_row = mysqli_fetch_array($routes)) {
                        $result_data .= "<option value='".$cities_row['city_id']."' >".$cities_row['city_from']." - ".$cities_row['city_to']."</option>";
                  }
	$result_data .= "</select>
               </div>"; //end of col-sm-6

	$result_data .= "<div class='col-sm-6'>
                 	<label for='launchname'>Select Launch Name</label>
               		<select name='launch_name' id='launchname' class='form-control'>
				<option value='0'>-Launch-</option>";
					while($launches_row = mysqli_fetch_array($launches)) {
						$result_data .= "<option value='".$launches_row['launch_id']."' >".$launches_row['launch_name']."</option>";
				}
	$result_data .= "</select></div></div><hr>"; //end of row
		
	$result_data .=	"<div class='row form-group'>
               
               <div class='col-sm-6'>
                 	<label for='date'>Select Date</label>
               		<select name='date' id='date' class='form-control'>
               			<option value='0'>Date</option>";
               			$dates_row = mysqli_fetch_array($dates);
               			$i = 0;
               			$start_date = $dates_row['start_date'];
               			$end_date = $dates_row['end_date'];
               			if(strtotime("today") >= strtotime("$start_date") && strtotime("today") <= strtotime("$end_date")){
							$today = "Today".date(", d M", strtotime("today"));
							$result_data .= "<option id='".$dates_row['dept_id']."-".strtotime("today")."' value='".$dates_row['dept_id']."-".$i."' >".$today."</option>";
						}
						$i = 1; 
						if(strtotime("+$i day") >= strtotime("$start_date") && strtotime("+$i day") <= strtotime("$end_date")){
							$tomorrow = "Tomorrow".date(", d M", strtotime("+$i day"));
							$result_data .= "<option id='".$dates_row['dept_id']."-".strtotime("+$i day")."' value='".$dates_row['dept_id']."-".$i."' >".$tomorrow."</option>";
						}
						$i=2;
						if(strtotime("+$i day") >= strtotime("$start_date") && strtotime("+$i day") <= strtotime("$end_date")){
							$weakday = date("l, d M", strtotime("+$i day"));
							$result_data .= "<option id='".$dates_row['dept_id']."-".strtotime("+$i day")."' value='".$dates_row['dept_id']."-".$i."' >".$weakday."</option>";
						}
						$i = 3;
						if(strtotime("+$i day") >= strtotime("$start_date") && strtotime("+$i day") <= strtotime("$end_date")){
							$weakday = date("l, d M", strtotime("+$i day"));
							$result_data .= "<option id='".$dates_row['dept_id']."-".strtotime("+$i day")."' value='".$dates_row['dept_id']."-".$i."' >".$weakday."</option>";
						}
    $result_data .= "</select>
               </div>
               <div class='col-sm-6'>
                 <label for='boarding'>Select Boardin Point</label>
                 <select name='boarding_point' id='boardingpoint' class='form-control'>
                     <option value='0'>......Boarding.......</option>
                   </select>
               </div>
             </div><br></div>";

	print $result_data;
	mysqli_close($con);	
}

function onChangeOfDate($dt_id, $dt_ln_id, $dt_c_id){
include '../include/config.php';
	$route_query = "SELECT * FROM `launch_route`";

	$routes = mysqli_query($con, $route_query);

	$launch_query = "SELECT * From launch_info where city_id = $dt_c_id";
	$launches = mysqli_query($con, $launch_query);

	$date_query = "SELECT *from launch_dept_date where launch_id= $dt_ln_id";

	$dates = mysqli_query($con, $date_query);

	$board_query = "SELECT *from boarding_point where launch_id = $dt_ln_id";
	$board = mysqli_query($con, $board_query);

	$result_data = "<div class='form-horizontal contact-form'>
          	<legend>Book a Launch</legend>
             <div class='row form-group'>
               <div class='col-sm-6'>
                  <label for='city'>Select city</label>
                  <select name='city' id='city' class='form-control'>"; 
                  while($cities_row = mysqli_fetch_array($routes)) {
                        $result_data .= "<option value='".$cities_row['city_id']."' >".$cities_row['city_from']." - ".$cities_row['city_to']."</option>";
                  }
	$result_data .= "</select>
               </div>"; //end of col-sm-6

	$result_data .= "<div class='col-sm-6'>
                 	<label for='launchname'>Select Launch Name</label>
               		<select name='launch_name' id='launchname' class='form-control'>
				<option value='0'>-Launch-</option>";
					while($launches_row = mysqli_fetch_array($launches)) {
						$result_data .= "<option value='".$launches_row['launch_id']."' >".$launches_row['launch_name']."</option>";
				}
	$result_data .= "</select></div></div><hr>"; //end of row
		
	$result_data .=	"<div class='row form-group'>
               
               <div class='col-sm-6'>
                 	<label for='date'>Select Date</label>
               		<select name='date' id='date' class='form-control'>
               			<option value='0'>Date</option>";
               			$dates_row = mysqli_fetch_array($dates);
               			$i = 0;
               			$start_date = $dates_row['start_date'];
               			$end_date = $dates_row['end_date'];
               			if(strtotime("today") >= strtotime("$start_date") && strtotime("today") <= strtotime("$end_date")){
							$today = "Today".date(", d M", strtotime("today"));
							$result_data .= "<option id='".$dates_row['dept_id']."-".strtotime("today")."' value='".$dates_row['dept_id']."-".$i."' >".$today."</option>";
						}
						$i = 1; 
						if(strtotime("+$i day") >= strtotime("$start_date") && strtotime("+$i day") <= strtotime("$end_date")){
							$tomorrow = "Tomorrow".date(", d M", strtotime("+$i day"));
							$result_data .= "<option id='".$dates_row['dept_id']."-".strtotime("+$i day")."' value='".$dates_row['dept_id']."-".$i."' >".$tomorrow."</option>";
						}
						$i=2;
						if(strtotime("+$i day") >= strtotime("$start_date") && strtotime("+$i day") <= strtotime("$end_date")){
							$weakday = date("l, d M", strtotime("+$i day"));
							$result_data .= "<option id='".$dates_row['dept_id']."-".strtotime("+$i day")."' value='".$dates_row['dept_id']."-".$i."' >".$weakday."</option>";
						}
						$i = 3;
						if(strtotime("+$i day") >= strtotime("$start_date") && strtotime("+$i day") <= strtotime("$end_date")){
							$weakday = date("l, d M", strtotime("+$i day"));
							$result_data .= "<option id='".$dates_row['dept_id']."-".strtotime("+$i day")."' value='".$dates_row['dept_id']."-".$i."' >".$weakday."</option>";
						}
    $result_data .= "</select>
               </div>
               <div class='col-sm-6'>
                 <label for='boarding'>Select Boardin Point</label>
                 <select name='boarding_point' id='boardingpoint' class='form-control'>
                     <option value='0'>......Boarding.......</option>";
                     while($board_row = mysqli_fetch_array($board)) {
						$result_data .= "<option value='".$board_row['boarding_id']."' >".$board_row['boarding_point_name']."</option>";
				}

    $result_data .= "
                   </select>
               </div>
             </div><br>";


	print $result_data;
	mysqli_close($con);	
}
function onChangeOfBoarding($b_id, $b_date_id, $b_ln_id, $b_ci_id){
	include '../include/config.php';
	$route_query = "SELECT * FROM `launch_route`";

	$routes = mysqli_query($con, $route_query);

	$launch_query = "SELECT * From launch_info where city_id = $b_ci_id";
	$launches = mysqli_query($con, $launch_query);

	$date_query = "SELECT *from launch_dept_date where launch_id= $b_ln_id";

	$dates = mysqli_query($con, $date_query);

	$board_query = "SELECT *from boarding_point where launch_id = $b_ln_id";
	$board = mysqli_query($con, $board_query);
	// var_dump($board_query);

	$ticket_query = "SELECT * FROM Launch_type"; 
	$ticketts = mysqli_query($con, $ticket_query);
	// var_dump($ticket_query);

	$result_data = "<div class='form-horizontal contact-form'>
          	<legend>Book a Launch</legend>
             <div class='row form-group'>
               <div class='col-sm-6'>
                  <label for='city'>Select city</label>
                  <select name='city' id='city' class='form-control'>"; 
                  while($cities_row = mysqli_fetch_array($routes)) {
                        $result_data .= "<option value='".$cities_row['city_id']."' >".$cities_row['city_from']." - ".$cities_row['city_to']."</option>";
                  }
	$result_data .= "</select>
               </div>"; //end of col-sm-6

	$result_data .= "<div class='col-sm-6'>
                 	<label for='launchname'>Select Launch Name</label>
               		<select name='launch_name' id='launchname' class='form-control'>
				<option value='0'>-Launch-</option>";
					while($launches_row = mysqli_fetch_array($launches)) {
						$result_data .= "<option value='".$launches_row['launch_id']."' >".$launches_row['launch_name']."</option>";
				}
	$result_data .= "</select></div></div><hr>"; //end of row
		
	$result_data .=	"<div class='row form-group'>
               
               <div class='col-sm-6'>
                 	<label for='date'>Select Date</label>
               		<select name='date' id='date' class='form-control'>
               			<option value='0'>Date</option>";
               			$dates_row = mysqli_fetch_array($dates);
               			$i = 0;
               			$start_date = $dates_row['start_date'];
               			$end_date = $dates_row['end_date'];
               			if(strtotime("today") >= strtotime("$start_date") && strtotime("today") <= strtotime("$end_date")){
							$today = "Today".date(", d M", strtotime("today"));
							$result_data .= "<option id='".$dates_row['dept_id']."-".strtotime("today")."' value='".$dates_row['dept_id']."-".$i."' >".$today."</option>";
						}
						$i = 1; 
						if(strtotime("+$i day") >= strtotime("$start_date") && strtotime("+$i day") <= strtotime("$end_date")){
							$tomorrow = "Tomorrow".date(", d M", strtotime("+$i day"));
							$result_data .= "<option id='".$dates_row['dept_id']."-".strtotime("+$i day")."' value='".$dates_row['dept_id']."-".$i."' >".$tomorrow."</option>";
						}
						$i=2;
						if(strtotime("+$i day") >= strtotime("$start_date") && strtotime("+$i day") <= strtotime("$end_date")){
							$weakday = date("l, d M", strtotime("+$i day"));
							$result_data .= "<option id='".$dates_row['dept_id']."-".strtotime("+$i day")."' value='".$dates_row['dept_id']."-".$i."' >".$weakday."</option>";
						}
						$i = 3;
						if(strtotime("+$i day") >= strtotime("$start_date") && strtotime("+$i day") <= strtotime("$end_date")){
							$weakday = date("l, d M", strtotime("+$i day"));
							$result_data .= "<option id='".$dates_row['dept_id']."-".strtotime("+$i day")."' value='".$dates_row['dept_id']."-".$i."' >".$weakday."</option>";
						}
    $result_data .= "</select>
               </div>
               <div class='col-sm-6'>
                 <label for='boarding'>Select Boardin Point</label>
                 <select name='boarding_point' id='boardingpoint' class='form-control'>
                     <option value='0'>......Boarding.......</option>";
                     while($board_row = mysqli_fetch_array($board)) {
						$result_data .= "<option value='".$board_row['boarding_id']."' >".$board_row['boarding_point_name']."</option>";
				}

    $result_data .= "
                   </select>
               </div>
             </div><br>";
    $result_data .= "<div class='row' id='details'>
               <div class='form-group'>
                   <label for='cabin' class='col-sm-4 control-label'>Select Cabin type</label>
                   <div class='col-sm-6'>
                     <select name='ticket-type' id='ticket-type' class='form-control'>
                       <option value='0'>Ticket type</option>";

                       while ($tickets_row= mysqli_fetch_array($ticketts)) {
                       	$result_data .= "<option value='".$tickets_row['launch_type_id']. "' >".$tickets_row['launch_type_name']."</option>";
                       }
    $result_data .= "
                     </select>
                   </div>
               </div><div class='form-group text-center' id='fare-div'>;
             </div></div>";

	print $result_data;
	mysqli_close($con);	
}
function onChangeOfTicketTypes($t_t_id, $t_bd_id, $t_date_id, $t_ln_id){
	include '../include/config.php';
	
	$result_data = "<div class='form-group' id='ticket-type-div'>
                   <label for='cabin' class='col-sm-4 control-label'>Select Cabin type</label>
                   <div class='col-sm-6'>
                     <select name='ticket_type' id='ticket-type' class='form-control'>
                       <option value='0'>Ticket type</option>";
                       $ticket_query = "SELECT * FROM Launch_type"; 
	$ticketts = mysqli_query($con, $ticket_query);
                       while ($tickets_row= mysqli_fetch_array($ticketts)) {
                       	$result_data .= "<option value='".$tickets_row['launch_type_id']. "' >".$tickets_row['launch_type_name']."</option>";
                       }
    $result_data .= "
                     </select>
                   </div>
               </div>
               <div class='form-group text-center' id='fare-div'>";
               $ticket_types_price_qry = "SELECT * FROM Launch_type where launch_type_id = $t_t_id";
               
               $ticket_types_price = mysqli_query($con, $ticket_types_price_qry);
               while($ticket_types_price_row = mysqli_fetch_array($ticket_types_price)) {
		$result_data .= "<label for='ticket-fare'>Ticket Fare: ".$ticket_types_price_row['price']." tk/- </label>";
		}
		$result_data .= "</div>";

		$capacity_count = "SELECT COUNT(`ln_book_id`) AS count_id FROM launch_booking ";
		$capacity_count_qry = mysqli_query($con, $capacity_count);
		$capacity_count_row = mysqli_fetch_object($capacity_count_qry);
		if($capacity_count_row->count_id == 0){
			$total_ticket_avl = "SELECT `capacity` FROM `launch_capacity` WHERE `launch_id` = $t_ln_id and `boarding_id` = $t_bd_id";
			$total_ticket_avl_qry = mysqli_query($con, $total_ticket_avl);
			$total_ticket_avl_row = mysqli_fetch_object($total_ticket_avl_qry);
			$s_k = 10;
			$available_tickets = $total_ticket_avl_row->capacity;
		}
		if($capacity_count_row->count_id > 0) {
			$sel_date_id_exp = explode('-' ,$t_date_id);		
		$sel_date = date("Y-m-d", $sel_date_id_exp[1]);
		$total_ticket_avl = "SELECT lc.capacity, b_t_f_t.user_id, b_t_f_t.number_of_seats, 
		b_t_f_t.ticket_rate_id, b_t_f_t.seat_numbers,b_t_f_t.launch_id,lt.price from 
		launch_booking as b_t_f_t JOIN launch_type as lt 
		on b_t_f_t.ticket_rate_id = lt.launch_type_id JOIN 
		launch_capacity as lc on lc.bd_id = b_t_f_t.launch_id 
		JOIN boarding_point as bp on bp.boarding_id = b_t_f_t.boarding_id 
		JOIN launch_info as ln on ln.launch_id = b_t_f_t.launch_id 
		WHERE b_t_f_t.`date_of_booking` = $sel_date AND lt.`launch_type_id` = $t_t_id AND ln.`launch_id` = $t_ln_id";
		// $total_ticket_avl = "SELECT lc.capacity, b_t_f_t.user_id, b_t_f_t.number_of_seats, 
		// b_t_f_t.ticket_rate_id, b_t_f_t.seat_numbers,b_t_f_t.launch_id, lc.price FROM 
		// launch_booking b_t_f_t JOIN boarding_point t_s_t ON b_t_f_t.boarding_id = t_s_t.boarding_id 
		// JOIN launch_capacity lc ON b_t_f_t.cabin_id = lc.launch_type_id 
		// join launch_info ln on b_t_f_t.launch_id = ln.launch_id
		// join Launch_type lt on b_t_f_t. 
		// WHERE b_t_f_t.date_of_booking = $sel_date AND lc.launch_type_id = $t_t_id AND ln.launch_id = $t_ln_id";
		$total_ticket_avl_qry = mysqli_query($con, $total_ticket_avl);
		if(mysqli_affected_rows($con) == 0){
			$total_ticket_avl = "SELECT `capacity` FROM `launch_capacity` WHERE `launch_id` = $t_ln_id and boarding_id = $t_bd_id";
			$total_ticket_avl_qry = mysqli_query($con, $total_ticket_avl);
			$total_ticket_avl_row = mysqli_fetch_object($total_ticket_avl_qry);
			$s_k = 10; 
			$available_tickets = $total_ticket_avl_row->capacity;

		}
		if(mysqli_affected_rows($con) > 0){
			$capacity = array();
			$number_of_seats = array();
			$user_id = array();
			$seat_numbers = array();
			$price = array();
			$user_seats = array();
			while($total_ticket_avl_row = mysqli_fetch_object($total_ticket_avl_qry)) {
				$capacity[] = $total_ticket_avl_row->capacity;
				$number_of_seats[]= $total_ticket_avl_row->number_of_seats;
				$user_id[] = $total_ticket_avl_row->user_id;
				$price[] = $total_ticket_avl_row->price;
				$seat_numbers[] = $total_ticket_avl_row->seat_numbers;
				if(isset($_SESSION['sid'])) {
					if($total_ticket_avl_row->user_id==$_SESSION['user_id']){
						$user_seats[] = $total_ticket_avl_row->number_of_seats;
					}
				}
			}

			if(!empty($capacity)){
				$rem_seats = $capacity[0] - array_sum($number_of_seats);
				if($rem_seats==0){
					$s_k = 0;
					$available_tickets= "Sorry No seats Available";

				}
				if($rem_seats>0){
					if(!empty($user_seats)){
						$rem_user_seats = 10 - array_sum($user_seats);
						if($rem_user_seats==0){
							$s_k = $rem_user_seats;
							$available_tickets = 'Sorry, you can\'t book more than 10 Tickets for this show !';

						}
						if($rem_user_seats > 0 && $rem_user_seats < $rem_seats){
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
			
		}
		}



		$result_data .= "<div class='form-group text-center' id='available-seats-div'>
      					<span class='select-label' id='available-seats'>Total Available Seats: <span class='message'>".$available_tickets."</span></span></div>";

	$result_data .= "
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
function onChangeOfNoOfSeats($s_id, $s_t_id, $s_b_id, $s_d_id, $s_l_id,$s_c_id){
		include '../include/config.php';
		$ticket_type_id = "SELECT price FROM `launch_type` where launch_type_id = $s_t_id";
		$ticket_type_id_qry = mysqli_query($con, $ticket_type_id);
		$ticket_type_id_row = mysqli_fetch_object($ticket_type_id_qry);

		$result_data = "<div class='form-group text-center' id='total-amount-seats-book'>
			<span class='select-label' id='total-amount'>Total Amount: <span class='message'><span id='total-amount-rs' value='".$s_id*$ticket_type_id_row->price."'>".$s_id*$ticket_type_id_row->price."</span> taka</span></span>
		</div>";

		$total_ticket_avl = "SELECT `capacity` FROM `launch_capacity` WHERE `launch_id` = $s_l_id and boarding_id= $s_b_id" ;
		$total_ticket_avl_qry = mysqli_query($con, $total_ticket_avl);
		$total_ticket_avl_row = mysqli_fetch_object($total_ticket_avl_qry);
		$t_capacity = $total_ticket_avl_row->capacity;
		// $ticket_type_id = $total_ticket_avl_row->ticket_type_id;

		$cabin_name = $t_capacity/3;
		$ticket_type1 = round($cabin_name); 
		$ticket_type2 = $ticket_type1*2;
		// var_dump($ticket_type2);
		$result_data .=	"<div id='seats-display'>";
		$result_data .=	"<div>Double Ac</div><br/>";
		$avail_chair = '';
		$sel_date_id_exp = explode('-' ,$s_d_id);		
		$sel_date = date("Y-m-d", $sel_date_id_exp[1]);
		$total_ticket_avl = "SELECT lc.capacity, b_t_f_t.user_id, b_t_f_t.number_of_seats, 
		b_t_f_t.ticket_rate_id, b_t_f_t.seat_numbers,b_t_f_t.launch_id,lt.price from 
		launch_booking as b_t_f_t JOIN launch_type as lt 
		on b_t_f_t.ticket_rate_id = lt.launch_type_id JOIN 
		launch_capacity as lc on lc.bd_id = b_t_f_t.launch_id 
		JOIN boarding_point as bp on bp.boarding_id = b_t_f_t.boarding_id 
		JOIN launch_info as ln on ln.launch_id = b_t_f_t.launch_id 
		WHERE b_t_f_t.`date_of_booking` = $sel_date AND lt.`launch_type_id` = $s_t_id AND ln.`launch_id` = $s_l_id";
		// $total_ticket_avl = "SELECT scr.capacity, b_t_f_t.user_id, b_t_f_t.number_of_seats, 
		// b_t_f_t.cabin_id, b_t_f_t.seat_numbers,b_t_f_t.launch_id, scr.price FROM 
		// launch_booking b_t_f_t JOIN boarding_point t_s_t ON b_t_f_t.boarding_id = t_s_t.boarding_id 
		// JOIN cabin scr ON b_t_f_t.cabin_id = scr.cabin_id 
		// join launch_info ln on b_t_f_t.launch_id = ln.launch_id 
		// WHERE b_t_f_t.date_of_booking = $sel_date AND scr.cabin_id = $s_t_id AND ln.launch_id = $s_l_id";
		$total_ticket_avl_qry = mysqli_query($con, $total_ticket_avl);
		if(mysqli_affected_rows($con) == 0){
			$all_available= false;
		}		
		if(mysqli_affected_rows($con) > 0){
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
		for($i=1; $i<=$t_capacity; $i++){	
			$avail_chair='available';
				$chair = 'W_chair.gif';
				if($all_available){
					foreach($exp as $c_n){
						var_dump($c_n);
					if($i==$c_n){$avail_chair='booked'; $chair = 'R_chair.gif';
				}
				}
				if($s_t_id==1 && $i>$ticket_type1){ $avail_chair='unavailable'; $chair = 'Gy_chair.gif'; }
				if($s_t_id==2 && $i<=$ticket_type1){ $avail_chair='unavailable'; $chair = 'Gy_chair.gif'; }
				if($s_t_id==2 && $i>$ticket_type2){ $avail_chair='unavailable'; $chair = 'Gy_chair.gif'; }
				if($s_t_id==3 && $i<=$ticket_type2){ $avail_chair='unavailable'; $chair = 'Gy_chair.gif'; }
				
				}
				else{
				if($s_t_id==1 && $i>$ticket_type1){ $avail_chair='unavailable'; $chair = 'Gy_chair.gif'; }
				if($s_t_id==2 && $i<=$ticket_type1){ $avail_chair='unavailable'; $chair = 'Gy_chair.gif'; }
				if($s_t_id==2 && $i>$ticket_type2){ $avail_chair='unavailable'; $chair = 'Gy_chair.gif'; }
				if($s_t_id==3 && $i<=$ticket_type2){ $avail_chair='unavailable'; $chair = 'Gy_chair.gif'; }
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
function onChangeOfTicketTypesEmpty() {	
	include '../include/config.php';
	$result_data = "<div class='form-group' id='ticket-type-div'>
                   <label for='cabin' class='col-sm-4 control-label'>Select Cabin type</label>
                   <div class='col-sm-6'>
                     <select name='ticket_type' id='ticket-type' class='form-control'>
                       <option value='0'>Ticket type</option>";
                       $ticket_query = "SELECT * FROM Launch_type"; 
	$ticketts = mysqli_query($con, $ticket_query);
                       while ($tickets_row= mysqli_fetch_array($ticketts)) {
                       	$result_data .= "<option value='".$tickets_row['launch_type_id']. "' >".$tickets_row['launch_type_name']."</option>";
                       }
    $result_data .= "
                     </select>
                   </div>
               </div>";
    $result_data .= "<div class='form-group text-center' id='fare-div'>
				      </div>
      				<div class='form-group text-center' id='available-seats-div'>
      				</div>
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
		print $result_data;
	mysqli_close($con);
}
function onClickOfTicketSummary($b_c_id,$b_bd_id,$b_launc_id,$b_dt_id,$b_tt_id,$b_no_of_set,$b_tt_amount,$s_c_a){
	include '../include/config.php';
	$ticket_qry = "SELECT price FROM `launch_type` where launch_type_id = $b_tt_id";
		
	// $ticket_qry = "SELECT price FROM `cabin` where cabin_id = $b_tt_id";
	$ticket_fare = mysqli_query($con, $ticket_qry);
	$ticket_fare_row = mysqli_fetch_object($ticket_fare);

	$city = "SELECT * FROM `launch_route` where city_id = $b_c_id";
	$city_qr = mysqli_query($con, $city);
	$city_qr_row = mysqli_fetch_object($city_qr);

	$boardingpoint = "SELECT * FROM `boarding_point` where boarding_id = $b_bd_id";
	$bd_query = mysqli_query($con, $boardingpoint);
	$bd_query_row=mysqli_fetch_object($bd_query);

	$launchr= "SELECT * FROM `launch_info` where launch_id = $b_launc_id";
	$launch_qry = mysqli_query($con, $launchr);
	$launch_qry_row = mysqli_fetch_object($launch_qry);

	$dt = explode('-',$b_dt_id);
	$dt_format = date("Y-m-d", $dt[1]);

	$ticket_type = "SELECT * from launch_type where launch_type_id = $b_tt_id";
	$ticket_typ_qry = mysqli_query($con, $ticket_type);
	$ticket_type_row = mysqli_fetch_object($ticket_typ_qry);

	$result_data = "<form id='selected-ticket-summary' action='launch.php' method='post'>
		<fieldset>
			<legend>Ticket Booking Summary</legend>
				<div id='selected-ticket-summary-indiv'>
				
					<div id='summary-city'>
						<span id='summary-city-label' class='sum_label' >City:</span>
						<span id='summary-city-value' class='".$b_c_id."' >".$city_qr_row->city_from." - ".$city_qr_row->city_to."</span>
					</div>
					
					<div id='summary-theatre'>
						<span id='summary-theatre-label' class='sum_label' >Launch:</span>
						<span id='summary-launch-value' class='".$b_launc_id."' >".$launch_qry_row->launch_name."</span>
					</div>
					
					<div id='summary-movie'>
						<span id='summary-movie-label' class='sum_label' >Boarding point</span>
						<span id='summary-boarding-value' class='".$b_bd_id."' >".$bd_query_row->boarding_point_name."</span>
					</div>
					
					<div id='summary-booked-date'>
						<span id='summary-booked-date-label' class='sum_label' >Booked for the date:</span>
						<span id='summary-booked-date-value' class='".$b_dt_id."' >".$dt_format."</span>
					</div>
					
					
					<div id='summary-ticket-type'>
						<span id='summary-ticket-type-label' class='sum_label' >Ticket Type:</span>
						<span id='summary-ticket-type-value' class='".$b_tt_id."' >".$ticket_type_row->launch_type_name."</span>
					</div>
					
					<div id='summary-ticket-fare'>
						<span id='summary-ticket-fare-label' class='sum_label' >Ticket Fare:</span>
						<span id='summary-ticket-fare-value' class='".$b_tt_id."' >".$ticket_fare_row->price." taka</span>
					</div>
					
					<div id='summary-no-of-seats-booked'>
						<span id='summary-no-of-seats-booked-label' class='sum_label' >No of seats booked:</span>
						<span id='summary-no-of-seats-booked-value' class='".$b_no_of_set."' >".$b_no_of_set."</span>
					</div>
					
					<div id='summary-seat-numbers'>
						<span id='summary-seat-numbers-label' class='sum_label' >Seat numbers:</span>
						<span id='summary-seat-numbers-value' class='".$s_c_a."' >".$s_c_a."</span>
					</div>
					
					<div id='summary-total-amount'>
						<span id='summary-total-amount-label' class='sum_label' >Total amount:</span>
						<span id='summary-total-amount-value' class='".$b_tt_amount."' >".$b_tt_amount." taka</span>
					</div>			
					
				</div>
		</fieldset>
	</form>";

	$result_data .="<div id='ticket-confirm'></div><span class='ticket-confirm'>
	<a id='ticket-confirm' href='#wrapper'>Confirm</a>
	</span></div>";
		
	
	print $result_data;
	mysqli_close($con);

}
function onClickOfTicketConfirm($city, $launch, $boardingpoint,$booked_date,$ticket_type,$fare, $no_of_seats_booked,$seat_numbers,$total_amount){
	include '../include/config.php';

	if(isset($_SESSION['sid'])) {
		$user_id = $_SESSION['user_id'];
	}
	$exp = explode('-',$booked_date);
	$dt = date("Y-m-d", $exp[1]);
	$query = "INSERT INTO `launch_booking` (`user_id`, `launch_id`, `date_of_booking`, `cabin_id`, `number_of_seats`, `seat_numbers`, `boarding_id`,`ticket_rate_id`) 
	VALUES ('$user_id','$launch', '$dt', '$ticket_type', '$no_of_seats_booked', '$seat_numbers', '$boardingpoint', '$ticket_type')";
	$result = mysqli_query($con, $query);
	if(!$result){
		echo "error";var_dump($query);
	}
	else{
	$result_data = "<div id='thanks-for-booking'>Thanks for Booking the Tickets!.
	To continue booking clik on this link &nbsp;&nbsp;<a href='movie.php' >Book more tickets</a></div>";
}
	print $result_data;
	mysqli_close($con);
}
 ?>