<?php 
  require_once 'header.php';
  $query = "SELECT *FROM movies";
  $result = mysqli_query($con, $query);
  $row_cnt =  $result->num_rows;
?>
  <header>
    <div class="now-showing">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h4>Now Showing</h4>
            <div class="row" style="padding-top: 15px;">
              <?php if ($row_cnt>0){
              while ($row_cnt = $result->fetch_assoc()){?>

              <div class="col-lg-3">
                <div class="well text-center">
                  <img src="<?php echo $row_cnt['movie_poster'];?>" width="170" height="240">
                  <div class="well-footer">
                    <a href="#"><?php echo $row_cnt['movie_name'] ?></a>
                    <a href="movie-details.php?id=<?php echo $id."&movie_id= ".$row_cnt['movie_id']?>" style="background:#1abc9c" class="form-control btn">View Movie Tickets</a>
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
  </header>