<?php include_once 'session.php';
 ?>
<div class="text-center">
Hi
<strong><?php echo "Welcome: ".$_SESSION['name'] ?></strong>
!
<br>
<a href="../logout.php">Logout</a>
</div>
