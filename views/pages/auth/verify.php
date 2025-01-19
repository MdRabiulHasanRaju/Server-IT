<?php ob_start();
session_start();

$meta_title = "Verification - Server IT Studio";
$meta_description = "Study with us completing a certificate course in Web Design, Microsoft Office, Graphic Design, Digital Marketing, Web Development, Training etc grow your business or start your career Call 880 1945 4668 21";
$meta_keywords = "Server IT Studio, server it,server,server studio";
$header_active = "Account";
include("../../partials/header.php");
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




<style>
    .title-h3 {
    font-size: 30px;
    display: grid;
    align-items: center;
    justify-content: center;
}
    .s-form {
        display: flex;
        flex-direction: column;
        gap: 10px;
        background-color: #ffffff;
        padding: 30px;
        width: 450px;
        box-shadow: 1px 1px 20px -15px black;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    ::placeholder {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    .s-form button {
        align-self: flex-end;
    }

    .s-flex-column>label {
        color: #151717;
        font-weight: 600;
    }

    .s-inputForm {
        border: 1.5px solid #ecedec;
        border-radius: 10px;
        height: 50px;
        display: flex;
        align-items: center;
        padding-left: 10px;
        transition: 0.2s ease-in-out;
    }

    .s-input {
        margin-left: 10px;
        border-radius: 10px;
        border: none;
        width: 85%;
        height: 100%;
    }

    .s-input:focus {
        outline: none;
    }

    .s-inputForm:focus-within {
        border: 1.5px solid #2d79f3;
    }

    .s-flex-row {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 10px;
        justify-content: space-between;
    }

    .s-flex-row>div>label {
        font-size: 14px;
        color: black;
        font-weight: 400;
    }

    .s-span {
        font-size: 14px;
        margin-left: 5px;
        color: #2d79f3;
        font-weight: 500;
        cursor: pointer;
    }

    .s-button-submit {
        margin: 20px 0 10px 0;
        background-color: #151717;
        border: none;
        color: white;
        font-size: 15px;
        font-weight: 500;
        border-radius: 10px;
        height: 50px;
        width: 100%;
        cursor: pointer;
    }

    .s-button-submit:hover {
        background-color: #252727;
    }

    .s-p {
        text-align: center;
        color: black;
        font-size: 14px;
        margin: 5px 0;
    }

    .s-btn {
        margin-top: 10px;
        width: 100%;
        height: 50px;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: 500;
        gap: 10px;
        border: 1px solid #ededef;
        background-color: white;
        cursor: pointer;
        transition: 0.2s ease-in-out;
    }

    .s-btn:hover {
        border: 1px solid #2d79f3;
        ;
    }

    .Login-form {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 20px;
        padding-bottom: 50px;
    }
    svg#Layer_1 {
    height: 30px;
}
</style>

<div class="container" style="padding-top:50px;">
    <div class="row">
        <div class="col-12">
            <h3 class="mb-3 title-h3">Confirm Your Account-
            <p>Check your mail: <b><?= $email; ?></b> for confirm your account. </p></h3>
        </div>
    </div>
</div>
<section class="Login-form">
    <form class="s-form" action="<?= LINK; ?>controllers/verificationController.php" method="post">
        <div class="s-flex-column">
            <label>OTP </label>
        </div>
        <div class="s-inputForm">
        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 93.22 122.88"><defs><style>.cls-1{fill-rule:evenodd;}</style></defs><title>otp</title><path class="cls-1" d="M12.71,0h43A12.74,12.74,0,0,1,68.43,12.71V31.52H64.78V16H3.66v89.07H64.79V95.22l3.65-3v17.93a12.74,12.74,0,0,1-12.71,12.71h-43A12.74,12.74,0,0,1,0,110.17V12.71A12.74,12.74,0,0,1,12.71,0ZM36.4,52a1.85,1.85,0,0,1,3.69,0v2.38l2-1.32a1.83,1.83,0,1,1,2,3l-2.54,1.71,2.55,1.69a1.84,1.84,0,0,1-2,3.06l-2-1.32v2.39a1.85,1.85,0,0,1-3.69,0V61.27l-2,1.32a1.83,1.83,0,1,1-2-3.05l2.55-1.7-2.55-1.7a1.83,1.83,0,1,1,2-3.06l2,1.32V52Zm38.73,0a1.84,1.84,0,0,1,3.68,0v2.38l2-1.32a1.83,1.83,0,0,1,2,3l-2.55,1.71,2.55,1.69a1.84,1.84,0,1,1-2,3.06l-2-1.32v2.39a1.84,1.84,0,1,1-3.68,0V61.27l-2,1.32a1.84,1.84,0,1,1-2-3.05l2.55-1.7-2.55-1.7a1.84,1.84,0,1,1,2-3.06l2,1.32V52ZM55.77,52a1.84,1.84,0,0,1,3.68,0v2.38l2-1.32a1.84,1.84,0,0,1,2,3l-2.55,1.71,2.55,1.69a1.84,1.84,0,1,1-2,3.06l-2-1.32v2.39a1.84,1.84,0,0,1-3.68,0V61.27l-2,1.32a1.83,1.83,0,0,1-2-3.05l2.55-1.7-2.55-1.7a1.84,1.84,0,1,1,2-3.06l2,1.32V52ZM26.55,39.11H88.17a5.08,5.08,0,0,1,5,5.06V71.24a5.26,5.26,0,0,1-5,5.26H66.53C61,83.51,53.79,87.73,45.27,90a1.89,1.89,0,0,1-1.88-.56,1.86,1.86,0,0,1,.15-2.64,20.35,20.35,0,0,0,2.74-2.9,25.27,25.27,0,0,0,3.45-7.6H26.55a5.09,5.09,0,0,1-5.06-5.06V44.17a5.07,5.07,0,0,1,5.06-5.06ZM34.22,109A5.21,5.21,0,1,1,29,114.25,5.22,5.22,0,0,1,34.22,109Z"/></svg>
            <input type="hidden" name="email" value="<?= $email; ?>">
            <input name="otp" type="text" class="s-input" placeholder="Enter your OTP">
        </div>
        <span style="color:red;"><?php echo $wrong_otp;
                                                unset($_SESSION['wrong_otp']); ?></span>

        <button name="otpsubmit" type="submit" class="s-button-submit">Submit</button>


    </form>

</section>
<?php  } else {
  header("location: " . LINK . "views/error/404.php");
} ?>

<?php include("../../partials/footer.php");
ob_end_flush(); ?>
<script src="<?= LINK; ?>public/jquery/jquery.js"></script>
<script src="<?= LINK; ?>public/owl/owl.carousel.min.js"></script>
<script src="<?= LINK; ?>public/bootstrap/bootstrap.min.js"></script>
<script src="<?= LINK; ?>public/bootstrap/bootstrap.bundle.min.js"></script>
<script src="<?= LINK; ?>public/WOW-master/dist/wow.min.js"></script>
<script src="<?= LINK; ?>public/bootstrap/popper.min.js"></script>

<script>
    new WOW().init();
</script>
<script src="<?= LINK; ?>main.js"></script>
</body>

</html>