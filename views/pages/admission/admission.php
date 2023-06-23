<?php ob_start();
session_start();

$meta_title = "Admission - Server IT Studio";
$meta_description = "Study with us completing a certificate course in Web Design, Microsoft Office, Graphic Design, Digital Marketing, Web Development, Training etc grow your business or start your career Call 880 1945 4668 21";
$meta_keywords = "Server IT Studio, server it,server,server studio";
$header_active = "Admission";
include("../../partials/header.php");
?>




<style>
    .admission-form {
        padding: 70px 0;
    }

    .admission-page-logo {
        width: 200px;
    }

    .admission-page-title {
        text-align: center;
        margin: auto;
        background: whitesmoke;
    }

    .admission-page-title>h3 {
        padding: 10px 0;
        font-weight: 700;
    }

    .admission-page-title>p {
        font-weight: 700;
        font-size: 12px;
    }

    .admission-input>label {
        font-size: 14px;
    }

    .admission-input>input {
        font-size: 13px;
    }

    #adclose {
        position: relative;
        bottom: 57px;
        margin: 0;
    }

    #contactSubmit,
    #resubmit {
        width: 100%;
    }

    .admission-input {
        margin-bottom: 15px;
        margin-top: 20px;
    }

    .main-form {
        border: 1px solid #f1f1f1;
    }

    select#courseName {
        font-size: 14px;
    }
</style>
<section class="admission-form">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-3 title-h3" style="font-size: 30px;">Admission-</h3>
            </div>
            <div class="col-md-6 offset-md-3 main-form">
                <div class="modal-title admission-page-title">
                    <h3>Fill out the form below with accurate information.</h3>
                    <p>ফর্মটি পূরণ করার পরে আমাদের একজন প্রতিনিধি শীঘ্রই আপনার সাথে যোগাযোগ করবে।</p>
                </div>

                <form id="formID" action="" method="post">
                    <div class="form-group admission-input">
                        <label for="customerName">নাম <span style="color:red;">*</span></label>
                        <input id="customerName" name="name" value="<?= (isset($_SESSION['name'])) ? $_SESSION['name'] : ''; ?>" type="text" class="form-control" placeholder="Full Name" required>
                        <span style="color:red;" id="admission_name"></span>
                    </div>
                    <div class="form-group admission-input">
                        <label for="mobile">ফোন নাম্বার <span style="color:red;">*</span></label>
                        <input name="mobile" value="<?= (isset($_SESSION['mobile'])) ? $_SESSION['mobile'] : ''; ?>" type="text" id="mobile" class="form-control" placeholder="Phone" required>
                        <span style="color:red;" id="admission_mobile"></span>
                    </div>
                    <div class="form-group admission-input">
                        <label for="email">ইমেইল <span style="color:red;">*</span></label>
                        <input id="email" name="email" value="<?= (isset($_SESSION['username'])) ? $_SESSION['username'] : ''; ?>" type="text" id="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group admission-input">
                        <label for="courseName">যে কোর্সটি করতে চাচ্ছেন <span style="color:red;">*</span></label>
                        <select name="courseName" id="courseName" class="form-control" required>
                            <option disabled selected value> -- কোর্স সিলেক্ট করুন -- </option>
                            <?php
                            $sql = "select title from courses";
                            $stmt = fetch_data($connection, $sql);
                            mysqli_stmt_bind_result($stmt, $course_title);
                            while (mysqli_stmt_fetch($stmt)) { ?>
                                <option value="<?= $course_title; ?>"><?= $course_title; ?></option>
                            <?php } ?>
                        </select>
                    </div>



                    <div class="form-group submit-button">

                        <span id="alertMessage"></span>

                        <input id="contactSubmit" type="submit" class="btn btn-warning slide-btn" value="Submit" name="submit">

                        <input style="display:none" id="resubmit" type="submit" class="btn btn-warning slide-btn" value="Resubmit" name="submit">

                        <span style="display:none;padding:5px 18px; font-size: 16px; width: fit-content;" id="spinner" type="submit" class="btn btn-primary text-right"><i class='fas fa-spinner fa-spin'></i></span>

                        <span style="display:none; width: fit-content;padding:5px 18px; font-size: 16px;" id="successMessage" class="btn btn-primary text-right"><i class="fas fa-check-circle"></i></span>
                    </div>


                </form>
                <script src="<?= LINK; ?>views/pages/admission/admission.js"></script>
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