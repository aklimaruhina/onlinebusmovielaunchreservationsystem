$(document).ready(function(){
	var path = '../ajax_validations/ajax_book_launch.php';

	$(document).on('change',"#city", function(){
		var city_ch_id = $("#city option:selected").attr('value');
		pathArray = window.location.pathname.split( '/' );
		host = pathArray[0];
		$.ajax({
				url:host+path+'?city_ch_id='+city_ch_id,
				success:function(data){
					$('#wrapper').html(data);
					
					$("#city option:selected").removeAttr("selected");
					$("#city option[value="+city_ch_id+"]").attr("selected","selected");					
				}
			});
	});
	$(document).on('change', "#launchname", function(){

		var l_id = $("#launchname option:selected").attr('value');
		var l_c_id = $("#city option:selected").attr('value');
		if(l_c_id==0){
			alert("please Select city");
		}
		pathArray = window.location.pathname.split('/');
		host = pathArray[0];
		$.ajax({
			url:host+path+'?l_id='+l_id+'&l_c_id='+l_c_id,
			success:function(data){
				$('#wrapper').html(data);
				$("#city option:selected").removeAttr("selected");
				$("#city option[value="+l_c_id+"]").attr("selected","selected");
				$("#launchname:selected").removeAttr("selected");
				$("#launchname option[value="+l_id+"]").attr("selected","selected");

			}
		});
	});
	$(document).on('change', "#date", function(){
		var d_id = $("#date option:selected").attr('value');
		var d_l_id = $("#launchname option:selected").attr('value');
		var d_c_id = $("#city option:selected").attr('value');

		if(d_l_id==0){
			alert("please select a launchname");
		}
		if(d_c_id==0){
			alert("please select a city"); 
		}
			pathArray = window.location.pathname.split('/');
			host = pathArray[0];
			$.ajax({
				url:host+path+'?d_id='+d_id+'&d_l_id='+d_l_id+'&d_c_id='+d_c_id,
				success:function(data){
					$('#wrapper').html(data);
					$("#city option:selected").removeAttr("selected");
					$("#city option[value="+d_c_id+"]").attr("selected","selected");

					$("#launchname:selected").removeAttr("selected");
					$("#launchname option[value="+d_l_id+"]").attr("selected","selected");
					
					$("#date:selected").removeAttr("selected");

					$("#date option[value="+d_id+"]").attr("selected", "selected");

				}
			});
		
	});
	$(document).on('change', "#boardingpoint", function(){
		var bp_id = $("#boardingpoint option:selected").attr('value');
		var bp_d_id = $("#date option:selected").attr('value');
		var bp_d_l_id = $("#launchname option:selected").attr('value');
		var bp_d_c_id = $("#city option:selected").attr('value');
		// alert('error');
		if(bp_d_id==0){
			alert('please select date');
		}
		if(bp_d_l_id==0){
			alert("please select a launchname");
		}
		if(bp_d_c_id==0){
			alert("please select a city"); 
		}
		pathArray = window.location.pathname.split('/');
			host = pathArray[0];
			$.ajax({
				url:host+path+'?bp_id='+bp_id+'&bp_d_id='+bp_d_id+'&bp_d_l_id='+bp_d_l_id+'&bp_d_c_id='+bp_d_c_id,
				success:function(data){
					$('#wrapper').html(data);

					$("#city option:selected").removeAttr("selected");
					$("#city option[value="+bp_d_c_id+"]").attr("selected","selected");

					$("#launchname:selected").removeAttr("selected");
					$("#launchname option[value="+bp_d_l_id+"]").attr("selected","selected");
					
					$("#date:selected").removeAttr("selected");

					$("#date option[value="+bp_d_id+"]").attr("selected", "selected");
					$("#boardingpoint:selected").removeAttr("selected");

					$("#boardingpoint option[value="+bp_id+"]").attr("selected", "selected");

				}
			});
		});
	$(document).on('change', "#ticket-type", function(){
		var ticket_type_id = $("#ticket-type option:selected").attr('value');
		var ticket_bp_id = $("#boardingpoint option:selected").attr('value');
		var ticket_d_id = $("#date option:selected").attr('value');
		var ticket_l_id = $("#launchname option:selected").attr('value');
		var ticket_c_id = $("#city option:selected").attr('value');

		if(ticket_type_id==0) {alert("error");}
		if(ticket_d_id==0){ alert("error");}
		if(ticket_l_id==0){alert("error");}
		if(ticket_bp_id==0){
			alert("error");
		}
		pathArray = window.location.pathname.split('/');
		host = pathArray[0];
		$.ajax({
			url:host+path+'?ticket_type_id='+ticket_type_id+'&ticket_bp_id='+ticket_bp_id+'&ticket_d_id='+ticket_d_id+'&ticket_l_id='+ticket_l_id+'&ticket_c_id='+ticket_c_id,

			success:function(data){
				$('#details').html(data);
				$("#ticket-type option:selected").removeAttr("selected");
				$("#ticket-type option[value="+ticket_type_id+"]").attr("selected","selected");
			
			}
		});
	});
	$(document).on('change', "#no-of-seats", function(){
		var no_of_seats_id = $("#no-of-seats option:selected").attr('value');
		var no_of_seats_tid = $("#ticket-type option:selected").attr('value');
		var no_of_seats_bpid=  $("#boardingpoint option:selected").attr('value');
		var no_of_seats_dtid = $("#date option:selected").attr('value');
		var no_of_seats_lnid = $("#launchname option:selected").attr('value');
		var no_of_seats_cid = $("#city option:selected").attr('value');

		if(no_of_seats_lnid==0){
			alert('please sellect one value');
		}
		if(no_of_seats_dtid==0){alert("Please select a value");}
		if(no_of_seats_bpid==0){alert("please select a value");}
		if(no_of_seats_tid==0){alert("please select a value");}
		pathArray = window.location.pathname.split( '/' );
		 host = pathArray[0];
		 $.ajax({
		 	url:host+path+'?no_of_seats_id='+no_of_seats_id+'&no_of_seats_tid='+no_of_seats_tid+'&no_of_seats_bpid='+no_of_seats_bpid+'&no_of_seats_dtid='+no_of_seats_dtid+'&no_of_seats_lnid='+no_of_seats_lnid+'&no_of_seats_cid='+no_of_seats_cid,
		 	success:function(data){
		 		$('#total-amount-seats-book').html(data);
		 		$("#no-of-seats option[value="+no_of_seats_id+"]").attr("selected","selected");
		 	}
		 });

	});
});
	$(document).on('click', ".available", function(){ 
		
		var sel_id = $(this).attr("id");
		$('#'+sel_id).removeAttr("class");
		$('#'+sel_id).attr("class","your-selection");
		
		$('.your-selection').removeAttr("src");
		$('.your-selection').attr("src","images/G_chair.gif");

	});
	$(document).on('click', ".your-selection", function(){ 
		
		var sel_id = $(this).attr("id");
		$('#'+sel_id).removeAttr("class");
		$('#'+sel_id).attr("class","available");
		
		$('#'+sel_id).removeAttr("src");
		$('#'+sel_id).attr("src","images/W_chair.gif");

	});
	$(document).on('mouseover', ".available", function(){
		var sel_id = $(this).attr("id");
				$('#'+sel_id).removeAttr("src");
				$('#'+sel_id).attr("src","images/G_chair.gif");
	});
	$(document).on('mouseout', ".available",function(){
		var sel_id = $(this).attr("id");
				$('#'+sel_id).removeAttr("src");
				$('#'+sel_id).attr("src","images/W_chair.gif");
	});
	$(document).on('click', "#book-div #book", function(){
		var selected_chairs_array = [];
		var i=0;
		$(".your-selection").each(function(){
			selected_chairs_array.push(this.id);
			i++;
		});
		var path = '../ajax_validations/ajax_book_launch.php';
		var book_no_of_seats = $("#no-of-seats option:selected").attr('value');
		var book_ticket_type_id = $("#ticket-type option:selected").attr('value');
		var book_launch_id = $("#launchname option:selected").attr('value');
		var book_boarding_id = $("#boardingpoint option:selected").attr('value');
		var book_city_id = $("#city option:selected").attr('value');
		var book_date_id = $("#date option:selected").attr('id');
		var book_total_amount = $("#total-amount-rs").attr('value');
		if(i > book_no_of_seats){ alert('You can\'t select more than '+book_no_of_seats+' seats.'); return false; }
		if(i < book_no_of_seats){ alert('Please Select '+book_no_of_seats+' seats.'); return false; }
		pathArray = window.location.pathname.split( '/' );
		host = pathArray[0];
		$.ajax({
			url:host+path+'?book_city_id='+book_city_id+'&book_launch_id='+book_launch_id+'&book_boarding_id='+book_boarding_id+'&book_date_id='+book_date_id+'&book_ticket_type_id='+book_ticket_type_id+'&book_no_of_seats='+book_no_of_seats+'&book_total_amount='+book_total_amount+'&selected_chairs_array='+selected_chairs_array,
			success:function(data){
					$('#selected-ticket-summary-div').html(data);
					// $('#selected-ticket-summary').leanModal();
					$('#book-div').remove();
				}
			});
		
	});

$(document).on('click', "#ticket-confirm", function(){
		var city = $("#summary-city-value").attr('class');
		var launch = $('#summary-launch-value').attr('class');
		var boardingpoint = $('#summary-boarding-value').attr('class');
		var booked_date = $('#summary-booked-date-value').attr('class');
		var ticket_type = $('#summary-ticket-type-value').attr('class');
		var fare = $('#summary-ticket-fare-value').attr('class');	
		var no_of_seats_booked = $('#summary-no-of-seats-booked-value').attr('class');
		var seat_numbers = $('#summary-seat-numbers-value').attr('class');
		var total_amount = $('#summary-total-amount-value').attr('class');

		var path = '../ajax_validations/ajax_book_launch.php';
		pathArray = window.location.pathname.split( '/' );
		host = pathArray[0];
			$.ajax({
				url:host+path+'?city='+city+'&launch='+launch+'&boardingpoint='+boardingpoint+'&booked_date='+booked_date+'&ticket_type='+ticket_type+'&fare='+fare+'&no_of_seats_booked='+no_of_seats_booked+'&seat_numbers='+seat_numbers+'&total_amount='+total_amount,
				success:function(data){
					$('#wrapper').html(data);
				}
			});  

	});