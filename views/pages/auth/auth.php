<?php
include $_SERVER['DOCUMENT_ROOT'] . "/serverit/lib/Database.php";
include $_SERVER['DOCUMENT_ROOT'] . "/serverit/utility/Baseurl.php";
include $_SERVER['DOCUMENT_ROOT'] . "/serverit/utility/Format.php";
$baseurl = new Baseurl;
define("IMAGEPATH", "{$baseurl->url()}/serverit/public/images/");
define("VIDEOPATH", "{$baseurl->url()}/serverit/public/video/");
define("LINK", "{$baseurl->url()}/serverit/");
$format = new Format;
?>
<!DOCTYPE html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="<?=LINK;?>public/fontAwesome/css/fontawesome.min.css">
  <link rel="stylesheet" href="<?=LINK;?>public/fontAwesome/css/all.min.css">
  <link rel="stylesheet" href="<?=LINK;?>public/bootstrap/bootstrap.min.css">

  <title>Server IT Studio || Auth</title>
  <link rel="shortcut icon" type="image/icon" href="<?= LINK; ?>public/images/serveritlogo.png" />
  <link rel="stylesheet" href="auth.css">
  <style>
    body{background-image: url('<?=IMAGEPATH;?>serverit2.jpeg');}
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="authfy-container col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3">
        <div class="col-sm-7 authfy-panel-right">
          <!-- login start -->
          <div class="authfy-login">
            <!-- panel-login start -->
            <div class="authfy-panel panel-login text-center active">
              <div class="authfy-heading">
                <h3 class="auth-title">Login to your account</h3>
                <p>Don’t have an account? <a class="lnk-toggler" data-panel=".panel-signup" href="#">Sign Up Free!</a></p>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12">
                  <form name="loginForm" class="loginForm" action="#" method="POST">
                    <div class="form-group">
                      <input type="email" class="form-control email" name="username" placeholder="Email address">
                    </div>
                    <div class="form-group">
                      <div class="pwdMask">
                        <input type="password" class="form-control password" name="password" placeholder="Password">
                        <span class="fa fa-eye-slash pwd-toggle"></span>
                      </div>
                    </div>
                    <!-- start remember-row -->
                    <div class="row remember-row">
                      <div class="col-xs-6 col-sm-6">
                        <label class="checkbox text-left">
                          <input type="checkbox" value="remember-me">
                          <span class="label-text">Remember me</span>
                        </label>
                      </div>
                      <div class="col-xs-6 col-sm-6">
                        <p class="forgotPwd">
                          <a class="lnk-toggler" data-panel=".panel-forgot" href="#">Forgot password?</a>
                        </p>
                      </div>
                    </div> <!-- ./remember-row -->
                    <div class="form-group">
                      <button class="btn btn-lg btn-primary btn-block slide-btn" type="submit">Login with email</button>
                    </div>
                  </form>
                </div>
              </div>
            </div> <!-- ./panel-login -->
            <!-- panel-signup start -->
            <div class="authfy-panel panel-signup text-center">
              <div class="row">
                <div class="col-xs-12 col-sm-12">
                  <div class="authfy-heading">
                    <h3 class="auth-title">Sign up for free!</h3>
                  </div>
                  <form name="signupForm" class="signupForm" action="#" method="POST">
                    <div class="form-group">
                      <input type="email" class="form-control" name="username" placeholder="Email address">
                    </div>
                    <div class="form-group">
                      <div class="pwdMask">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <span class="fa fa-eye-slash pwd-toggle"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="pwdMask">
                        <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password">
                        <span class="fa fa-eye-slash pwd-toggle"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <p class="term-policy text-muted small">I agree to the <a href="#">privacy policy</a> and <a href="#">terms of service</a>.</p>
                    </div>
                    <div class="form-group">
                      <button class="btn btn-lg btn-primary btn-block slide-btn" type="submit">Sign up with email</button>
                    </div>
                  </form>
                  <a class="lnk-toggler" data-panel=".panel-login" href="#">Already have an account?</a>
                </div>
              </div>
            </div> <!-- ./panel-signup -->
            <!-- panel-forget start -->
            <div class="authfy-panel panel-forgot">
              <div class="row">
                <div class="col-xs-12 col-sm-12">
                  <div class="authfy-heading">
                    <h3 class="auth-title">Recover your password</h3>
                    <p>We'll send you an email with additional instructions if you provide your email address below.</p>
                  </div>
                  <form name="forgetForm" class="forgetForm" action="#" method="POST">
                    <div class="form-group">
                      <input type="email" class="form-control" name="username" placeholder="Email address">
                    </div>
                    <div class="form-group">
                      <button class="btn btn-lg btn-primary btn-block slide-btn" type="submit">Recover your password</button>
                    </div>
                    <div class="form-group">
                      <a class="lnk-toggler" data-panel=".panel-login" href="#">Already have an account?</a>
                    </div>
                    <div class="form-group">
                      <a class="lnk-toggler" data-panel=".panel-signup" href="#">Don’t have an account?</a>
                    </div>
                  </form>
                </div>
              </div>
            </div> <!-- ./panel-forgot -->
          </div> <!-- ./login -->
        </div>
        <div class="col-sm-5 authfy-panel-left">
          <div class="brand-col">
            <div class="headline">
              <!-- brand-logo start -->
              <div class="brand-logo">
                <img src="<?= LINK; ?>public/images/serveritlogo.png" width="150" alt="serveritstudio-logo">
              </div><!-- ./brand-logo -->
              <p>To gain quick access, sign in with your social media account.</p>
              <!-- social login buttons start -->
              <div class="row social-buttons">
                <div class="col-xs-4 col-sm-4 col-md-12">
                  <a href="#" class="btn btn-block btn-facebook btn-lg">
                    <i class="fa-brands fa-facebook-f"></i> <span class="hidden-xs hidden-sm">Signin with facebook</span>
                  </a>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-12">
                  <a href="#" class="btn btn-block btn-google btn-lg">
                    <i class="fa-brands fa-google-plus"></i> <span class="hidden-xs hidden-sm">Signin with google</span>
                  </a>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-12">
                <a class="btn btn-warning btn-block mt-4 btn-lg" href="<?=LINK;?>index.php"><i class="fa-solid fa-house"></i><span class="hidden-xs hidden-sm">Back to Home</span></a>
                </div>
              </div><!-- ./social-buttons -->
            </div>
          </div>
        </div>
      </div>
    </div> <!-- ./row -->
  </div> <!-- ./container -->

  <!-- Javascript Files -->

  <script src="<?= LINK; ?>public/jquery/jquery.js"></script>
  <script src="<?= LINK; ?>public/owl/owl.carousel.min.js"></script>
  <script src="<?= LINK; ?>public/bootstrap/bootstrap.min.js"></script>
  <script src="<?= LINK; ?>public/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="<?= LINK; ?>public/WOW-master/dist/wow.min.js"></script>
  <script src="<?= LINK; ?>public/bootstrap/popper.min.js"></script>
  <script>
    new WOW().init();
  </script>
  <script src="auth.js"></script>

</body>

</html>