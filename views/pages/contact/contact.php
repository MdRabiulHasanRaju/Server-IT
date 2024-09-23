<?php ob_start();
session_start();

$meta_title = "Contact Us - Server IT Studio";
$meta_description = "We’re here to answer your questions provide all the information you need on our certification programs Call 880 1945 4668 21 to solve your problems within your budget timeframe!";
$meta_keywords = "Server IT Studio, server it,server,server studio";
$header_active = "Contact";
include("../../partials/header.php");
?>
<style>
    section.contact-us {
        margin-top: 60px;
    }

    .contact-top-text>p {
        font-size: 15px;
        padding-bottom: 20px;
    }

    .footer-title>h6 {
        font-size: 24px;
        padding: 20px 0px;
    }

    .contact-map {
        margin-bottom: 40px;
    }

    .google-map>iframe {
        height: 320px;
    }

    .address>ul>li {
        display: flex;
        font-size: 13px;
        column-gap: 10px;

    }

    .contact-form {
        padding: 20px 0;
    }

    .contact-form>form>.form-group>.form-control {
        padding: 26px;
        border-radius: 5px
    }

    .contact-form>form>.form-group>.form-control::placeholder {
        font-size: 14px;

    }

    .contact-form>form>.form-group>.form-control {
        font-size: 14px;

    }

    .contact-form>form>.form-group {
        display: flex;
        align-items: center;
        column-gap: 10px;
        padding: 2px;
    }

    select {
        height: 60px !important;
        font-size: 14px !important;
        padding: 0px 26px !important;
        color: #555 !important;
    }

    .submit-button {
        display: block !important;
    }
</style>
<section class="contact-us">
    <div class="container">
        <div class="row">
            <div class="contact-top-text footer-title pb-25">
                <h6 style="color:black!important;">Contact Us</h6>
                <p>You can come immediately to our office if you have any questions. You can also phone the hotline
                    number for any training-related information. You can also contact me by email or Facebook Messenger.
                </p>
            </div>
            <div class="col-md-12 row contact-map">
                <div class="col-md-6 google-map">
                    <iframe name="google-map-server-it-studio" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3689.8656585501585!2d91.78024547483585!3d22.358700879644655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd94b007e74f5%3A0x37902ac49758f433!2sServer%20IT%20Studio!5e0!3m2!1sen!2sbd!4v1681164990494!5m2!1sen!2sbd" width="100%" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-6 address">
                    <?php
                    $topbar_sql = "SELECT * FROM `top_bar`";
                    $topbar_stmt = fetch_data($connection, $topbar_sql);
                    mysqli_stmt_bind_result($topbar_stmt, $id, $address, $email, $number);
                    if (mysqli_stmt_fetch($topbar_stmt)) { ?>

                        <div class="footer-title pb-25">
                            <h6 style="color:black!important;">Alonkar Branch - Chattogram</h6>
                        </div>
                        <ul>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-home"></i>
                                </div>
                                <div class="cont">
                                    <p>
                                        <?= $address; ?>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="cont">
                                    <p>
                                        <?= $number; ?>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="cont">
                                    <a href="mailto:<?= $email; ?>">
                                        <p>
                                            <?= $email; ?>
                                        </p>
                                    </a>
                                </div>
                            </li>
                        </ul>

                    <?php } ?>
                </div>
            </div>
            <div class="col-md-12 row contact-map">
                <div class="col-md-6 google-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29521.624481922467!2d91.80043977522212!3d22.345960297813427!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30ad27a5f2b3ddbd%3A0x94e897a86845b1d1!2sServer%20IT%20Studio%2C%20Chawkbazar%20Branch!5e0!3m2!1sen!2sbd!4v1696175815772!5m2!1sen!2sbd" width="100%" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-6 address">
                    <?php
                    $topbar_sql = "SELECT * FROM `top_bar`";
                    $topbar_stmt = fetch_data($connection, $topbar_sql);
                    mysqli_stmt_bind_result($topbar_stmt, $id, $address, $email, $number);
                    if (mysqli_stmt_fetch($topbar_stmt)) { ?>

                        <div class="footer-title pb-25">
                            <h6 style="color:black!important;">Chawkbazar Branch - Chattogram</h6>
                        </div>
                        <ul>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-home"></i>
                                </div>
                                <div class="cont">
                                    <p>
                                    K.B Plaza, Gulzar Tower Opposite, Chawkbazar, Chattogram, Bangladesh
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="cont">
                                    <p>
                                        <?= $number; ?>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="cont">
                                    <a href="mailto:<?= $email; ?>">
                                        <p>
                                            <?= $email; ?>
                                        </p>
                                    </a>
                                </div>
                            </li>
                        </ul>

                    <?php } ?>
                </div>
            </div>





            <div class="col-md-8 offset-md-2 contact-form">
                <div class="footer-title pb-25">
                    <h6 style="color:black!important;">Inbox Your Queries</h6>
                </div>
                <form id="contactForm" action="" method="POST">
                    <div class="form-group">
                        <input type="text" id="customerName" class="form-control" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Your Email" required>
                        <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Your Phone Number" required>
                    </div>
                    <div class="form-group">
                        <select name="courseName" id="courseName" class="form-control" required>
                            <option disabled selected value> -- Select a Course to Know about -- </option>
                            <?php
                            $sql = "select title from courses";
                            $stmt = fetch_data($connection, $sql);
                            mysqli_stmt_bind_result($stmt, $course_title);
                            while (mysqli_stmt_fetch($stmt)) { ?>
                                <option value="<?= $course_title; ?>"><?= $course_title; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea style="min-height:150px" cols="30" rows="10" id="description" name="description" class="form-control" placeholder="Write Your Queries" required></textarea>
                    </div>
                    <div class="form-group submit-button">

                        <span id="alertMessage"></span>

                        <input id="contactSubmit" type="submit" class="btn btn-warning slide-btn" value="Submit" name="submit">

                        <input style="display:none" id="resubmit" type="submit" class="btn btn-warning slide-btn" value="Resubmit" name="submit">

                        <span style="display:none;padding:5px 18px; font-size: 16px; width: fit-content;" id="spinner" type="submit" class="btn btn-primary text-right"><i class='fas fa-spinner fa-spin'></i></span>

                        <span style="display:none; width: fit-content;padding:5px 18px; font-size: 16px;" id="successMessage" class="btn btn-primary text-right"><i class="fas fa-check-circle"></i></span>
                    </div>
                </form>
                <script src="<?= LINK; ?>views/pages/contact/contact.js"></script>
            </div>
        </div>
    </div>
</section>
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