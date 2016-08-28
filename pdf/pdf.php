<?php
require_once('../lib/app.php');
$busid = $_GET['busid'];
$userid = $_GET['id'];
$query = "SELECT * FROM `reserve_section` where id = '$busid' and user_id = '$userid'";

$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);

$firstname = $row['firstname'];
$lastname = $row['lastname'];
$contact = $row['contact'];
$setnum = $row['setnum'];
$transaction_code = $row['transaction_code'];
$payable = $row['payable'];
$date = $row['date'];

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
                    <p>Booking date: $date</p>
                    <p>Payable: $payable</p>
                    <p>Seat number: $setnum</p>
                </div>s
                <div class='scnd_sec'>
                    <h5>Contact</h5>
                    <p>Mobile: 01921369610</p>
                    <p>Mail: admin.shohoz@yahoo.com</p>
                </div>
                <div class='thrd_sec'>
                    <h4>Transaction code: $transaction_code</h4>
                    
                    
                </div>  
            </div>
           
            <div class='reminder'>
                <h4>Remember:</h4>
                <ul>
                    <li>In case of online reservation, you must have to carry the tickets before travelling and should confirm from the bus in-charge</li>
                    <li>Tickets are cant be refundable.</li>
                    <li>But tickets can be replacement</li>
                </ul>
            </div>
            <div class='reminder'>
                <p> &COPY;All rights reserved Sohoz ticket</p>
            </div>
        </div>
	 </body>");

    // set HTTP response headers
    header("Content-Type: application/pdf");
    header("Cache-Control: max-age=0");
    header("Accept-Ranges: none");
    header("Content-Disposition: attachment; filename=\"Bus Reservation Confirmation.pdf\"");

    // send the generated PDF 
    echo $pdf;
}
catch(PdfcrowdException $why)
{
    echo "Pdfcrowd Error: " . $why;
}
?>