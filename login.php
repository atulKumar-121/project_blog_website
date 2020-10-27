<?php
 include 'includes_login\header.php';
 if(!isset($_SESSION['username']))
 {
   ?>
  <body>
  <div id="form">
    <div class="container">
      <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-md-8 col-md-offset-2">
        <div id="userform">
          <ul class="nav nav-tabs nav-justified" role="tablist">
            <li class="active"><a href="#signup"  role="tab" data-toggle="tab">Sign up</a></li>
            <li><a href="#login"  role="tab" data-toggle="tab">Log in</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade active in" id="signup">
              <h2 class="text-uppercase text-center"> Sign Up </h2>
              <!-- signup form-->
              <form id="signup" action="sign_up_check.php" method="POST">
                <div class="row">
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                       <input type="text" name="first_name" class="form-control" id="first_name" required placeholder="First Name..." autocomplete="off">
                      <p class="help-block text-danger"></p>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <input type="text" name ="last_name"class="form-control" id="last_name" required  placeholder="Last Name..." autocomplete="off">
                      <p class="help-block text-danger"></p>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                <input type="text" name="username" class="form-control validate" id="username" placeholder="Enter your Username..." required autocomplete="off">
                      <p class="help-block text-danger"></p>
                </div>
                
                <div class="form-group">
                <input type="email" name="email" class="form-control validate" id="email" placeholder="Enter your email..." required autocomplete="off">
                    <label for="email"  data-error="Invalid email format"></label>
                   <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                   <input type="tel" name="number" class="form-control" id="phone" required  placeholder="Please enter your phone number..." autocomplete="off">
                   <label for="id"  data-error="Invalid phone number"></label>
                   <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                   
                  <input type="password" name="password" class="form-control"  required  placeholder="Please enter your password..." autocomplete="off">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="mrgn-30-top">
                  <button type="submit"  name="sign_up"class="btn btn-larger btn-block">
                  Sign up
                  </button>
                </div>
              </form>
              <!--sign up end-->
            </div>
            <div class="tab-pane fade in" id="login">
              <h2 class="text-uppercase text-center"> Log in to continue</h2>
              <?php
              if(isset($_SESSION['message']))
              {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
              }
              ?>
              <!--login in start-->
              <form id="login" action="login_check.php" method="POST">
                <div class="form-group">
                   <input type="text" name="username" class="form-control validate"  placeholder="Enter your username..." required autocomplete="off">
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                   <input type="password" name="password" class="form-control" id="password" required placeholder="Please enter your password..." autocomplete="off">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="mrgn-30-top">
                  <button type="submit" name="login" class="btn btn-larger btn-block">
                  Log in
                  </button>
                </div>
              </form>
              <!--login end-->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--container--> 
  </div>

<?php
 include 'includes_login\footer.php';
            }
            else{
              header("Location:dashboard.php");
            }
 
?>