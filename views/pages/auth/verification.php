<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/serverit/lib/Database.php";
include $_SERVER['DOCUMENT_ROOT'] . "/serverit/utility/Baseurl.php";
include $_SERVER['DOCUMENT_ROOT'] . "/serverit/utility/Format.php";
$baseurl = new Baseurl;
define("IMAGEPATH", "{$baseurl->url()}/serverit/public/images/");
define("VIDEOPATH", "{$baseurl->url()}/serverit/public/video/");
define("LINK", "{$baseurl->url()}/serverit/");
$format = new Format;
?>
<?php ob_start();
$active = ''; ?>
<?php
$wrong_otp = '';
if (isset($_GET["email"])) {
  if (isset($_SESSION['wrong_otp'])) {
    $wrong_otp = $_SESSION['wrong_otp'];
  }
  $email = $_GET["email"];
  $ssql = "select otp from verification where email = '$email'";
  $femail = mysqli_query($connection, $ssql);
  $otp = mysqli_fetch_assoc($femail);
  if (!$otp['otp']) {
    header("location: " . LINK . "views/error/404.php");
  }
?>

  <!DOCTYPE html>

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="creator" content="@Md Rabiul Hasan">
    <meta name="description" content="Develop your professional skills through Server IT Studio We provide Graphic Design, Web Design, web Development, Microsoft Office etc Call 880 1945 4668 21">
    <meta name="keywords" content="Server IT Studio, server it,server,server studio, Web design, web development, graphics design, microsoft office, html, css, javascipt,php">
    <meta name="title" content="Verification - Server IT Studio">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="<?= LINK; ?>public/fontAwesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= LINK; ?>public/fontAwesome/css/all.min.css">
    <link rel="stylesheet" href="<?= LINK; ?>public/bootstrap/bootstrap.min.css">

    <title>Verification - Server IT Studio</title>
    <link rel="shortcut icon" type="image/icon" href="<?= LINK; ?>public/images/logo-min.png" />
    <link rel="stylesheet" href="<?= LINK; ?>views/pages/auth/auth.css">
    <style>
      body {
        background-image: url('<?= IMAGEPATH; ?>serverit2-min.jpeg');
      }
    </style>
  </head>

  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="authfy-container col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3">
          <div class="col-sm-5 authfy-panel-left">
            <div class="brand-col">
              <div class="headline">
                <!-- brand-logo start -->
                <div class="brand-logo">
                  <a href="<?= LINK; ?>index.php">
                    <img src="<?= LINK; ?>public/images/header-logo-min.png" width="150" alt="serveritstudio-logo">
                  </a>
                </div><!-- ./brand-logo -->
                <!-- social login buttons start -->
                <div class="row social-buttons">
                  <div class="col-xs-4 col-sm-4 col-md-12">
                    <a class="btn btn-warning btn-block mt-4 btn-lg" href="<?= LINK; ?>"><i class="fa-solid fa-house"></i><span>Back to Home</span></a>
                  </div>
                </div><!-- ./social-buttons -->
              </div>
            </div>
          </div>

          <div class="col-sm-7 authfy-panel-right">
            <!-- login start -->
            <div class="authfy-login">


              <!-- panel-login start -->
              <div class="authfy-panel panel-login text-center active">
                <div class="authfy-heading">
                  <h3 class="auth-title">Confirm Your Account</h3>
                  <p>Check your mail: <b><?= $email; ?></b> for confirm your account. </p>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-12">
                    <form name="loginForm" class="loginForm" action="<?= LINK; ?>controllers/verificationController.php" method="POST">
                      <input type="hidden" name="email" value="<?= $email; ?>">
                      <div class="form-group">
                        <input type="text" class="form-control email" name="otp" placeholder="OTP" required>
                      </div>
                      <span style="color:red;"><?php echo $wrong_otp;
                                                unset($_SESSION['wrong_otp']); ?></span>

                      <div class="form-group">
                        <button name="otpsubmit" class="btn btn-lg btn-primary btn-block slide-btn" type="submit">Enter OTP</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div> <!-- ./panel-login -->
            </div> <!-- ./login -->
          </div>
        </div>
      </div> <!-- ./row -->
    </div> <!-- ./container -->
  <?php  } else {
  header("location: " . LINK . "views/error/404.php");
} ?>

  <script src="<?= LINK; ?>public/jquery/jquery.js"></script>
  <script src="<?= LINK; ?>public/owl/owl.carousel.min.js"></script>
  <script src="<?= LINK; ?>public/bootstrap/bootstrap.min.js"></script>
  <script src="<?= LINK; ?>public/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="<?= LINK; ?>public/WOW-master/dist/wow.min.js"></script>
  <script src="<?= LINK; ?>public/bootstrap/popper.min.js"></script>
  <script>
    new WOW().init();
  </script>
  <script src="<?= LINK; ?>views/pages/auth/auth.js"></script>

  </body>

  </html>