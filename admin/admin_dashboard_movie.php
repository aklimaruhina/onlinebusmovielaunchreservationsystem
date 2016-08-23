<?php 
include_once 'session.php';
include_once 'header.php'; 
// include_once '../include/config.php';
$query = "SELECT * FROM `movies` ";
$result = mysqli_query($con, $query);
$row_cnt = $result->num_rows;
?>
<div class="now-showing">
    <div class="container">
      <div class="row">
        <div class="pull-right">
          <a href="movie.php" class="btn btn-primary">Add new Movie</a>
          <a href="theatre.php" class="btn btn-info">Add theatre</a>
          <a href="screen.php" class="btn btn-info">Add Screens</a>
          <a href="showtime.php" class="btn btn-primary">Add Showtiming</a>
        </div>

        <div class="col-lg-12">
          <div class="row" style="padding-top: 15px;">
          	<?php if ($row_cnt>0){
          	while ($row_cnt = $result->fetch_assoc()){?>

          	<div class="col-lg-3">
	            <div class="well text-center">
	              <img src="../<?php echo $row_cnt['movie_poster'];?>" width="170" height="240">
	              <div class="well-footer">
	                <a href=""><?php echo $row_cnt['movie_name'] ?></a>
	                  <p>Description:<?php echo $row_cnt['movie_decription'] ?></p>
                    <p>Language: <?php echo $row_cnt['movie_language'] ?></p>
	                  <a href="" class="btn btn-danger">Delete Movie</a>
                    <a href="" class="btn btn-info">Edit Movie</a>
	              </div>
	            </div>
            </div>

          		<?php

          	}
          	}
          	else{
          		echo "No data found";
          } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include_once 'footer.php'; ?>