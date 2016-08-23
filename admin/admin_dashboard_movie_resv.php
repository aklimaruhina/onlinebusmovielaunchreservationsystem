<?php 
include_once 'session.php';

include_once 'header.php'; 
// include('../include/config.php');
$mvi_query = "SELECT mv.movie_id, mv.movie_name, th.theatre_name, b_t_f_t.date_of_booking, s_t.show_time, t_r.ticket_price, t_r.ticket_type, b_t_f_t.number_of_seats, b_t_f_t.seat_numbers, b_t_f_t.user_id FROM booking_ticket_for_theatre b_t_f_t JOIN theatre_show_timings t_s_t ON t_s_t.theatre_show_time_id = b_t_f_t.theatre_show_time_id JOIN screens scr ON scr.screen_id = t_s_t.screen_id JOIN movies mv ON mv.movie_id = scr.movie_id JOIN theatres th ON th.theatre_id = b_t_f_t.theatre_id JOIN show_timing s_t ON s_t.show_time_id = b_t_f_t.show_time_id JOIN ticket_rate t_r ON t_r.ticket_rate_id = b_t_f_t.ticket_rate_id "; 
$result = mysqli_query($con, $mvi_query);

$sno = 0;
$even_odd = '';
?>
<style>
	body{
		background-image: none;
	}
</style>
<div class="content-table">
	<div class="container">
		<div class="col-lg-12">
			<h3 class="text-center">Movie Reservation</h3>
		    <table class="table table-bordered">
		    	<thead>
		    		<tr class="active">
				        <th>SL</th>
				        <th>User ID</th>
				        <th>Movie Name</th>
				        <th>Theatre Name</th>
				        <th>Date Of Booking</th>
				        <th>Show time</th>
				        <th>Ticket type</th>
				        <th>Number Of seat </th>
				        <th>Seat Number</th>
				        <th>Action</th>
			    	</tr>
		    	</thead>
		    	<tbody>
		    		<?php if(mysqli_affected_rows($con)) :
		    		while($movie_row = mysqli_fetch_object($result)){
                  	$sno++;
                  	if($sno%2==0){$even_odd='even';}else{$even_odd='odd';}  ?>
		    		 	<tr class="<?php echo $even_odd ?>">
		    		 		<td><?php echo $sno; ?></td>
		    		 		<td><?php echo $movie_row->user_id  ?></td>
		    		 		<td><?php echo $movie_row->movie_name ?></td>
		    		 		<td><?php echo $movie_row->theatre_name ?></td>
		    		 		<td><?php echo $movie_row->date_of_booking ?></td>
		    		 		<td><?php echo $movie_row->show_time ?></td>
		    		 		<td><?php echo $movie_row->ticket_type ?></td>
		    		 		<td><?php echo $movie_row->number_of_seats ?></td>
		    		 		<td><?php echo $movie_row->seat_numbers ?></td>
		    		 		<td><a href="" class="btn btn-danger">Delete</a></td>
		    		 		<?php 
		    		 	}
		    		 	endif; ?>
		    	</tbody>
		    </table>
		</div>
		<div class="col-lg-12">
			<h3 class="text-center">Movie Information</h3>
		    <table class="table table-bordered">
		    	<thead>
		    		<tr class="active">
				        <th>SL</th>
				        <th>Movie Name</th>				        
				        <th>Movie Description</th>
				        <th>Movie director</th>
				        <th>Language</th>
				        <th>Movie Poster</th>
				        <th>IsLive</th>
				        <th>Action</th>
			    	</tr>
		    	</thead>
		    	<tbody>
		    		<?php 
		    		$movie_query2 = "SELECT * from movies";
					$result2 = mysqli_query($con, $movie_query2);
		    		if(mysqli_affected_rows($con)) :
		    		while($movie_row2 = mysqli_fetch_object($result2)){
                  	$sno++;
                  	if($sno%2==0){$even_odd='even';}else{$even_odd='odd';}  ?>
		    		 	<tr class="<?php echo $even_odd ?>">
		    		 		<td><?php echo $sno; ?></td>

		    		 		<td><?php echo $movie_row2->movie_name  ?></td>
		    		 		<td><?php echo $movie_row2->movie_decription  ?></td>
		    		 		<td><?php echo $movie_row2->movie_director?></td>
		    		 		<td><?php echo $movie_row2->movie_language ?></td>
		    		 		<td><img src="../<?php echo $movie_row2->movie_poster ?>" width="100" height="100"></td>
		    		 		<td><?php echo $movie_row2->islive ?></td>
		    		 		<td>
		    		 			<a href="#" id="<?php echo $movie_row2->movie_id ?>" class="delbutton" title="Click To Delete">delete</a>
		    		 			<!-- <a href="" class="btn btn-danger">Delete</a><br> -->
		    		 			<a href="editmovie.php?id=<?php echo $movie_row2->movie_id ?>" class="btn btn-info">Edit</a>

		    		 		</td>
		    		 		<?php 
		    		 	}
		    		 	endif; ?>
		    	</tbody>
		    </table>
		</div>
		<div class="col-lg-12">
			<h3 class="text-center">Theatre Information</h3>
		    <table class="table table-bordered">
		    	<thead>
		    		<tr class="active">
				        <th>SL</th>
				        <th>Theatre name</th>				        
				        <th>Manager</th>
				        <th>City</th>
				        <th>Action</th>
			    	</tr>
		    	</thead>
		    	<tbody>
		    		<?php 
		    		$query = "SELECT theatre_id,theatre_name,city,manager from theatres inner join cities on theatres.city_id = cities.city_id ORDER BY theatre_id ";
		    		$result = mysqli_query($con,$query);
		    		if(mysqli_affected_rows($con)) :
		    		while($theatre_row = mysqli_fetch_object($result)){
                  	$sno++;
                  	if($sno%2==0){$even_odd='even';}else{$even_odd='odd';}  ?>
		    		 	<tr class="<?php echo $even_odd ?>">
		    		 		<td><?php echo $sno; ?></td>
		    		 		<td><?php echo $theatre_row->theatre_name  ?></td>
		    		 		<td><?php echo $theatre_row->manager ?></td>
		    		 		<td><?php echo $theatre_row->city ?></td>
		    		 		<td>
		    		 			<a href="#" class="deletheatre btn btn-danger" id="<?php echo $theatre_row->theatre_id ?>">Delete</a><br>
		    		 			<a href="" class="btn btn-info">Edit</a>

		    		 		</td>
		    		 		<?php 
		    		 	}
		    		 	endif; ?>
		    	</tbody>
		    </table>
		</div>
		<div class="col-lg-12">
			<h3 class="text-center">Theatre Screen Information</h3>
		    <table class="table table-bordered">
		    	<thead>
		    		<tr class="active">
				        <th>SL</th>
				        <th>Screen Name</th>				        
				        <th>Theatre Name</th>
				        <th>Movie Name</th>
				        <th>Screen Capacity</th>
				        <th>Action</th>
			    	</tr>
		    	</thead>
		    	<tbody>
		    		<?php 
		    		$query = "SELECT screen_name,theatre_name,movie_name,screen_capactiy,screen_id FROM `screens` as scr INNER JOIN theatres as th on scr.theatre_id = th.theatre_id INNER JOIN movies on scr.movie_id = movies.movie_id order by screen_id";
		    		$result = mysqli_query($con,$query);
		    		if(mysqli_affected_rows($con)) :
		    		while($scr_row = mysqli_fetch_object($result)){
                  	$sno++;
                  	if($sno%2==0){$even_odd='even';}else{$even_odd='odd';}  ?>
		    		 	<tr class="<?php echo $even_odd ?>">
		    		 		<td><?php echo $sno; ?></td>
		    		 		
		    		 		<td><?php echo $scr_row->screen_name  ?></td>
		    		 		<td><?php echo $scr_row->theatre_name ?></td>
		    		 		<td><?php echo $scr_row->movie_name ?></td>
		    		 		<td><?php echo $scr_row->screen_capactiy ?></td>
		    		 		<td>
		    		 			<a href="deletescreen.php?id=<?php echo  $scr_row->screen_id ?>" class="btn btn-danger">Delete</a><br>
		    		 			<a href="" class="btn btn-info">Edit</a>

		    		 		</td>
		    		 		<?php 
		    		 	}
		    		 	endif; ?>
		    	</tbody>
		    </table>
		</div>
		<div class="col-lg-12">
			<h3 class="text-center">Theatre Show Timing Information</h3>
		    <table class="table table-bordered">
		    	<thead>
		    		<tr class="active">
				        <th>SL</th>
				        <th>Screen Name</th>				        
				        <th>Start Date</th>
				        <th>End Date</th>
				        <th>Action</th>
			    	</tr>
		    	</thead>
		    	<tbody>
		    		<?php 
		    		$query = "SELECT screen_name,start_date, end_date,theatre_show_time_id FROM `theatre_show_timings` as tst INNER JOIN screens as scr on tst.screen_id = scr.screen_id  ORDER by theatre_show_time_id ";
		    		$result = mysqli_query($con,$query);
		    		if(mysqli_affected_rows($con)) :
		    		while($show_row = mysqli_fetch_object($result)){
                  	$sno++;
                  	if($sno%2==0){$even_odd='even';}else{$even_odd='odd';}  ?>
		    		 	<tr class="<?php echo $even_odd ?>">
		    		 		<td><?php echo $sno; ?></td>
		    		 		<td><?php echo $show_row->screen_name  ?></td>
		    		 		<td><?php echo $show_row->start_date ?></td>
		    		 		<td><?php echo $show_row->end_date ?></td>
		    		 		<td>
		    		 			<a href="deleteshowtime.php?id=<?php echo $show_row->theatre_show_time_id ?>" class="btn btn-danger">Delete</a><br>
		    		 			<a href="" class="btn btn-info">Edit</a>

		    		 		</td>
		    		 		<?php 
		    		 	}
		    		 	endif; ?>
		    	</tbody>
		    </table>
		</div>
	</div>
</div>
<?php include_once 'footer.php'; ?>
<script>
$(function() {
$(".delbutton").click(function(){
var element = $(this);
var del_id = element.attr("id");
var info = 'id=' + del_id;
if(confirm("Are you Sure you want to delete this update? There is NO undo!"))
{
 $.ajax({
   type: "GET",
   url: "deletemovie.php",
   data: info,
   success: function(){
   
   }
});
$(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
    .animate({ opacity: "hide" }, "slow");

}
return false;
});
});
</script>
<script>
	$(function(){
		$(".deletheatre").click(function(){
		var element = $(this);
		var del_th = element.attr("id");
		var info = 'id=' + del_th;
		if(confirm("Are you Sure you want to delete this update? There is NO undo!"))
		{
		 $.ajax({
		   type: "GET",
		   url: "deletetheatre.php",
		   data: info,
		   success: function(){
		   
		   }
		});
		$(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		    .animate({ opacity: "hide" }, "slow");

		}
		return false;
		});
	})
</script>


