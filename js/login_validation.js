$(document).ready(function(){
	var path = '/book-myshow/ajax_validations/ajax_book_myshow.php';
	
	/**
	 * Code for OnChange of cities
	 */
	$("#login-page #signin").click(function(){	
		 var user_name = $("#login-page #username").val();
		 var password = $("#login-page #password").val();
		 
		 if(user_name==''){ alert('Enter Username'); return false;}
		 if(password==''){ alert('Enter Password'); return false;}
	});  
	
});