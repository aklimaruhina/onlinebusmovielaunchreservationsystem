<?php 
  include_once "header.php";
?> 
<div class="main-container">
	<div class="container">
      <div class="row card">
        <div class="col-md-10">
          <form class="form-horizontal contact-form" method="post" action="functions/registration_submit.php">
          	<legend class="text-center">Sign Up</legend>
             <div class="form-group">
              <label for="username" class="col-sm-3 control-label">User Name <span class='field-required'> *</span></label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="username" name="user_name" placeholder="Enter a user name">
              </div>
              <div class='field-error col-sm-4' id='field-error-username'></div>
            </div>
            <div class="form-group">
              <label for="password" class="col-sm-3 control-label">Password <span class='field-required'> *</span></label>
              <div class="col-sm-5">
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter a user name">
              </div>
              <!-- <div class='field-error' id='field-error-username'></div> -->
            </div>
            <div class="form-group">
              <label for="password" class="col-sm-3 control-label">Confirm Password <span class='field-required'> *</span></label>
              <div class="col-sm-5">
                <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm password">
              </div>
              <div class='field-error col-sm-4' id='field-error-confirm-password'>Password and Confirm Password Don't Match.</div>
              
            </div>
            <div class="form-group">
              <label for="first name" class="col-sm-3 control-label">First Name
                <span class="field-required"> *</span>
              </label>
              <div class="col-sm-5">
                <input type="text" name="first_name" id="firstname" class="form-control">
              </div>
              <div class="field-error col-sm-4" id="field-error-firstname">Fast Name should contain min 4, max 20 characters and may contain a-z, A-Z, 0-9, _</div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-3 control-label">Last Name
                <span class="field-required"> *</span>
              </label>
              <div class="col-sm-5">
                <input type="text" name="last_name" id="lastname" class="form-control">
              </div>
              <div class="field-error col-sm-4" id="field-error-lastname">Last Name should contain min 4, max 20 characters and may contain a-z, A-Z, 0-9, _</div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-3 control-label">Email
                <span class="field-required"> *</span>
              </label>
              <div class="col-sm-5">
                <input type="text" name="email" id="email" class="form-control">
              </div>
              <div class="field-error col-sm-4" id="field-error-email"></div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-3 control-label">Address
                <span class="field-required"> *</span>
              </label>
              <div class="col-sm-5">
                <textarea name="address" id="address" class="form-control" rows="3"></textarea>
              </div>
              <div class="field-error col-sm-4" id="field-error-address">Address should contain min 10, max 40 characters and may contain a-z, A-Z, 0-9, _</div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-3 control-label">Mobile Number
                <span class="field-required">*</span>+880
              </label>
              <div class="col-sm-5">
                <input type="text" name="mobileno" id="mobileno" class="form-control">
              </div>
              <div class="field-error col-sm-4" id="field-error-mobileno">Enter a valid 10 digits Mobile No.</div>

            </div>
            <div class="form-group">
              <div class="col-sm-6 col-md-offset-3">
                <button type='submit' class="btn btn-primary" id='sumit_reg_form'/>Sign UP</button>

              </div>
            </div>
			     </form>
        </div>
      </div>
  </div>
</div>
<?php include_once 'footer.php' ?>