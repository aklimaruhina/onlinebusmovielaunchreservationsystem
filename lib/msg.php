<!-- messages -->
<?php if(isset($_SESSION['msg_success']) AND !empty($_SESSION['msg_success'])):?>
	<h4 style="color:green"><?php echo $_SESSION['msg_success']; unset($_SESSION['msg_success'])?></h4>
<?php endif; ?>
<?php if(isset($_SESSION['msg_error']) AND !empty($_SESSION['msg_error'])):?>
	<h4 style="color:red"><?php echo $_SESSION['msg_error']; unset($_SESSION['msg_error'])?></h4>
<?php endif; ?>
<!-- ./end of msg -->