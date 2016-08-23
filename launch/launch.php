<?php 
include_once 'header.php'; ?>

  <div class="ticket-pick">
    <div class="container" style="border-bottom:2px solid #1abc9c; padding-bottom:30px">
      <div class="row">
        <div class="mid-content">
          <div class="col-lg-6">
          <div class="row">
            <div class="col-lg-offset-1">
              <div class="pick-form">
                  <form method="post" action="searchlaunch.php">
                    <div class="form-group">
                      
                      <label>From:</label>
                      <select class="form-control" name="city_from">

                                <option>----Select city----</option>
                                <?php 
                                $query = "SELECT * FROM `route_one`";
                                $result = mysqli_query($con, $query); 
                                while($obj= $result->fetch_object()) {
                                  if (!$result) {
                                    die("Error: Data not Found. . ");
                                  }
                                  echo "<option value=".$obj->route_from.">".$obj->route_from."</option>"; 
                                }
                                $result->close();
                                 ?>
                              </select>
                    </div>
                    <div class="form-group">
                      <label>To:</label>
                      <select class="form-control" name="city_to">

                                <option>----Select city----</option>
                                <?php 
                                $query = "SELECT * FROM `route_one`";
                                $result = mysqli_query($con,$query); 
                                while($obj= $result->fetch_object()) {
                                  if (!$result) {
                                    die("Error: Data not Found. . ");
                                  }
                                  echo "<option value=".$obj->route_to.">".$obj->route_to."</option>"; 
                                }
                                $result->close();
                                 ?>
                              </select>
                    </div>
              <div class="row">
                <div class="col-lg-6">
                   <div class="form-group">
                      <label>Date Of journey:</label>
                      <div class="input-group date" id="date1">
                        <input type="text" class="form-control" name="dept_date">
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span></span>
                      </div>
                    </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                      <label>Date Of return(Optional):</label>
                      <div class="input-group date" id="date2">
                        <input type="text" class="form-control" name="arr_date">
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                      </div>
                    </div>
                </div>
                <div class="col-lg-12" style="padding-top: 15px;">
                  <button type="submit" name="search_btn" style="background:#1abc9c" class="form-control"><span class="glyphicon glyphicon-search"></span>Search Launch</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        </div>
      </div>
        <div class="col-lg-6">
          <div class="ad-section text-center">
            <div class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="item active">
                  <img src="../img/ad 1.gif" alt="img 1" class="img-responsive text-center">
                </div>
                <div class="item">
                  <img src="../img/ad 2.jpg" alt="Img 2" class="img-responsive text-center">
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
       </div>
    </div>
  </div>


  <div class="why-buy">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
         <div class="row">
          <div class="col-lg-offset-2">
             <div class="first-whybuy">
            <h4 class="text-green">Why Buy ticket from us?</h4>
            <ul>
              <li><p class="text-default"><b>Buy bus tickets</b> anytime from anywhere</p></li>
              <li><p class="text-default">Pay by credit card, mobile banking or cash</p></li>
              <li><p class="text-default">Get tickets delivered to your doorstep</p></li>
              <li><p class="text-default">Dependable customer service 24 hours a day</p></li>
            </ul>
          </div>
          </div>
         </div>
        </div>
        <div class="col-lg-6">
          <div class="scnd-whybuy">
            <h4 class="text-green">Customer Testimonials</h4>
            <div class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="item active">
                 <div class="media">
                  <div class="media-left">
                    <a href="#">
                     <img class="media-object thumbnail" src="../img/cus1.png" alt="customer 1">
                    </a>
                  </div>
                  <div class="media-body">
                    <p>Unlike others, bus journey is not only journey to me, it's a matter of enjoyment. I had to strive a lot to get my desired seat in addition to the suffering due to the hours of traffic jam and long queue. Shohoz.com has made everything easy for me. </p><br>
                    <p><a href="" class="text-green">-Riad Ali, </a>Dhaka.</p>
                  </div>
                 </div>
                </div>
                <div class="item">
                   <div class="media">
                  <div class="media-left">
                    <a href="#">
                     <img class="media-object thumbnail" src="../img/cus2.png" alt="customer 2">
                    </a>
                  </div>
                  <div class="media-body">
                    <p>Booking bus tickets was a pain. I used to spend almost half the ticket price as CNG fare while going to the counters to get my ticket. Thank you Shohoz for saving my extra expenditure. </p><br>
                    <p><a href="" class="text-green">-Nusrat, </a>Dhaka.</p>
                  </div>
                 </div>
                </div>
                <div class="item">
                   <div class="media">
                  <div class="media-left">
                    <a href="#">
                     <img class="media-object thumbnail" src="../img/cus3.png" alt="customer 3">
                    </a>
                  </div>
                  <div class="media-body">
                    <p>It's just amaging system of ticket booking. I just love this system. Thank you Shohoz for saving my extra expenditure. </p><br>
                    <p><a href="" class="text-green">-Israt, </a>Dhaka.</p>
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="bus-operator">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h4>Available Launches</h4>
        </div>
        <div class="col-lg-6">
          <h4 class="text-green"><b>Refer and Earn Shohoz-e</b></h4>
        </div>
        <div class="row">
          <div class="col-lg-12">
        <hr style="border-color:black">
      </div>
        </div>
        <div class="row">
          <div class="col-lg-6 operator">
           <div class="row">
            <div class="col-lg-4">
               <ul>
          <li>AMV Bangali</li>
          <li>MV Flotilla</li>
          <li>MV Karnafully 10</li>
          <li>MV Sampad</li>
          <li>MV Sundarban 07</li>
          <li>P.S Mahsud</li>
          <li>P.S Tern</li>
        </ul>
            </div>
            <div class="col-lg-4">
              <ul>
                <li>MV Bhola</li>
                <li>MV Kalam Khan 1</li>
               <li>MV Karnafully 11</li>
               <li>MV Sattar Khan 1</li>
               <li>MV Sundarban 08</li>
               <li>P.S Ostrich</li>
              </ul>
            </div>
            <div class="col-lg-4">
              <ul>
                <li>MV Crystal Cruise</li>
                <li>MV Karnafully 09</li>
                <li>MV Madhumoti</li>
                <li>MV Sundarban 06</li>
                <li>P.S Lepcha</li>
                <li>P.S Sela</li>
              </ul>
            </div>
           </div>
          </div>
          <div class="col-lg-6">
            <div class="works-section">
              <h4 class="text-green">How does it work?</h4>
              <ul class="text-green">
                <li><p class="text-default"><b>Login with Facebook</b> and refer your friends</p></li>
                <li><p class="text-default">When your friends buy tickets from Shohoz.com, you get Tk. 50 talktime</p></li>
                <li><p class="text-default">Your friends also get Tk. 200 off on their first purchase</p></li>
                <li style="list-style-type:none"><a href=""><img src="../img/fb_connect.gif"></a></li>
              </ul>
            </div>
          </div>
         
        </div>
      </div>
    </div>
  </div>



  <?php include_once 'footer.php'; ?>
  <script type="text/javascript">
          $(document).ready(function(){
             $('#date1').datetimepicker({
                  format: 'DD/MM/YYYY'
              });
             $('#date2').datetimepicker({
                 format: 'DD/MM/YYYY'
              });
             
          });
                     
        </script> 