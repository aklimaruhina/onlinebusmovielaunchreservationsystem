<?php
require_once('../lib/app.php');
$bid = $_GET['bid'];
$userid = $_GET['id'];
$query = "SELECT mv.movie_id, mv.movie_name, th.theatre_name, b_t_f_t.date_of_booking, s_t.show_time, t_r.ticket_price, t_r.ticket_type, b_t_f_t.number_of_seats, b_t_f_t.seat_numbers, b_t_f_t.booking_id
              FROM booking_ticket_for_theatre b_t_f_t
              JOIN theatre_show_timings t_s_t ON t_s_t.theatre_show_time_id = b_t_f_t.theatre_show_time_id
              JOIN screens scr ON scr.screen_id = t_s_t.screen_id
              JOIN movies mv ON mv.movie_id = scr.movie_id
              JOIN theatres th ON th.theatre_id = b_t_f_t.theatre_id
              JOIN show_timing s_t ON s_t.show_time_id = b_t_f_t.show_time_id
              JOIN ticket_rate t_r ON t_r.ticket_rate_id = b_t_f_t.ticket_rate_id
              WHERE b_t_f_t.booking_id= $bid";

$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);

$theatre_name = $row['theatre_name'];
$date_of_booking = $row['date_of_booking'];
$show_time = $row['show_time'];
$ticket_type = $row['ticket_type'];
$seat_numbers = $row['seat_numbers'];
$number_of_seats = $row['number_of_seats'];
$price = $row['number_of_seats']*$row['ticket_price'];

	//echo $product_code;
 require 'pdfcrowd.php';


try
{   
    // create an API client instance
    $client = new Pdfcrowd("ruhina05", "53670bf3ce3a4b455dd8e74fc4436704");

    // convert a web page and store the generated PDF into a $pdf variable
     $pdf = $client->convertHtml("
	 
	 <head>
		<style>
			body{
                overflow: hidden;
            }
            .container{
                width: 705px;
                padding: 20px;
                height: auto;
                margin: auto;
                border: 1px solid black;
            }
            .menu h2,h4{
                text-align: center;
            }
            .breaking{
                border: 1px dashed black;
            }
            .booking_details{
            }
            .fst_sec{
                float: left;
                width: 350px;
            }
            .scnd_sec{
                float: left;
                width: 235px;
            }
            .thrd_sec{
                width: 235px;
            }
            .devider{
                border: 2px solid black;
            }
            .reminder{
                background: #a3a3a3;
                border: 1px dashed black;
            }
            .reminder h4{
                text-align: left;
            }
            .footer p{
                text-align: center;
            }
		</style>
	 </head>
	 <body>
	 <div class='container'>
            <div class='menu'>
                <h2>Shohoz ticket</h2>
                <h4>Money receipt</h4>
                <hr class='devider'>
            </div>
            <div class='booking_details'>
                <div class='fst_sec'>
                    <h5>Booking Details:</h5>
                    <p>Status: Confirmed</p>
                    <p>Booking date: $date_of_booking</p>
                    <p>Payable:$price</p>
                    <p>Seat number: $seat_numbers</p>
                    <p>Theatre Name: $theatre_name</p>
                    <p>Show time: $show_time</p>
                    <p>Ticket type: $ticket_type</p>
                </div>s
                <div class='scnd_sec'>
                    <h5>Contact</h5>
                    <p>Mobile: 01921369610</p>
                    <p>Mail: admin.shohoz@yahoo.com</p>
                </div>
                <div class='thrd_sec'>
                    <h4>Number Of Seat: $number_of_seats</h4>
                    
                    
                </div>  
            </div>
           
            <div class='reminder'>
                <h4>Remember:</h4>
                <ul>
                    <li>In case of online reservation, you must have to carry the tickets before travelling and should confirm from the Movie in-charge</li>
                    <li>Tickets are cant be refundable.</li>
                    <li>But tickets can be replacement</li>
                </ul>
            </div>
            <div class='footer'>
                <p> &COPY;All rights reserved Sohoz ticket</p>
            </div>
        </div>
	 </body>");

    // set HTTP response headers
    header("Content-Type: application/pdf");
    header("Cache-Control: max-age=0");
    header("Accept-Ranges: none");
    header("Content-Disposition: attachment; filename=\"Movie Reservation Confirmation.pdf\"");

    // send the generated PDF 
    echo $pdf;
}
catch(PdfcrowdException $why)
{
    echo "Pdfcrowd Error: " . $why;
}
?>