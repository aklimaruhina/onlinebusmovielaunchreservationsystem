<?php 
  include 'header.php';
  $mvid = $_GET['movie_id'];
  
?>
  <header>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="movie-details">
            <?php
              $sel_mov_id = "SELECT * FROM movies WHERE movie_id=".$mvid;
              $sel_mov_id_qry = mysqli_query($con, $sel_mov_id);
              $sel_mov_id_qry_row = mysqli_fetch_object($sel_mov_id_qry);
            ?>
            <div class="col-md-6">
              <img src="<?php echo $sel_mov_id_qry_row->movie_poster; ?> " alt="" class='img-responsive'>
            </div>
            <p>Movie name: <?php echo $sel_mov_id_qry_row->movie_name; ?></p>
            <p>Movie language: <?php echo $sel_mov_id_qry_row->movie_language; ?></p>
            <p>Movie Director: <?php echo $sel_mov_id_qry_row->movie_director ?></p>
            <p>Movie Description: <?php echo $sel_mov_id_qry_row->movie_decription ?></p>
            <p>Movie Status: <?php echo $sel_mov_id_qry_row->islive ?></p>
            
          </div>
        </div>
      </div>
    </div>
  </header>