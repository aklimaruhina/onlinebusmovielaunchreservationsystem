<?php 
include 'lib/app.php';
$id = $_GET['id'];
$query = "SELECT mv.movie_id, mv.movie_name, th.theatre_name, b_t_f_t.date_of_booking, s_t.show_time, t_r.ticket_price, t_r.ticket_type, b_t_f_t.number_of_seats, b_t_f_t.seat_numbers, b_t_f_t.booking_id
              FROM booking_ticket_for_theatre b_t_f_t
              JOIN theatre_show_timings t_s_t ON t_s_t.theatre_show_time_id = b_t_f_t.theatre_show_time_id
              JOIN screens scr ON scr.screen_id = t_s_t.screen_id
              JOIN movies mv ON mv.movie_id = scr.movie_id
              JOIN theatres th ON th.theatre_id = b_t_f_t.theatre_id
              JOIN show_timing s_t ON s_t.show_time_id = b_t_f_t.show_time_id
              JOIN ticket_rate t_r ON t_r.ticket_rate_id = b_t_f_t.ticket_rate_id
              WHERE b_t_f_t.booking_id= $id";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_assoc($result);
 ?>
<table>
	<tbody>
		<tr>
			<td><strong>Theatre Name: </strong><?php echo $row['theatre_name'] ?></td>
		</tr>
		<tr>
			<td><strong>Date Of booking: </strong><?php echo $row['date_of_booking'] ?></td>
		</tr>
		<tr>
			<td><strong>Show timing: </strong><?php echo $row['show_time'] ?></td>
		</tr>
		<tr>
			<td><strong>Ticket Type: </strong><?php echo $row['ticket_type'] ?></td>
		</tr>
		<tr>
			<td><strong>Number of Seats: </strong><?php echo $row['number_of_seats'] ?></td>
		</tr>
		<tr>
			<td><strong>Seat Numbers: </strong><?php echo $row['seat_numbers'] ?></td>
		</tr>
		<tr>
			<td><strong>Total ammount: </strong><?php echo $row['number_of_seats']*$row['ticket_price'] ?></td>
		</tr>
		<tr><td><a href="print">Print</a></td></tr>
	</tbody>
</table>