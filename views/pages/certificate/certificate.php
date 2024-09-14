<?php ob_start();
session_start();

$meta_title = "Certificate Verification - Server IT Studio";
$meta_description = "Established in 2023, the Leading IT Training Institute in Chittagong offers a diverse selection of courses and quality training programs. Grow your business or start your career Call 880 1945 4668 21";
$meta_keywords = "Server IT Studio, server it,server,server studio";
$header_active = "certificate";
include("../../partials/header.php");
?>

<style>
    section.about-us {
        margin-top: 60px;
    }

    .about-text>h3 {
        padding: 20px 0;
    }

    .about-text {
        text-align: center;
        padding-top: 30px;
    }

    .about-text>h1 {
        font-size: 40px;
        font-weight: 700;
        letter-spacing: 4px;
    }

    .about-text>p {
        font-size: 16px;
        text-align: justify;
        color: gray;
        letter-spacing: 1px;
        line-height: .7cm;
    }

    .sis-images>img {
    width: 70%;
    border-radius: 8px;
    box-shadow: 5px 5px 40px -29px black;
}

    .sis-images {
        text-align: center;
        margin: 40px 0 100px;
    }

    .certificate-box {
        width: 50%;
        padding: 15px;
        box-shadow: 0px 8px 42px -21px black;
        border: none;
    }

    .certificate-box::placeholder {
        text-align: center;
    }

    .certificateLabel {}

    section.student-info {
        padding: 60px 0;
    }

    .student-profile-sidebar {
        text-align: center;
        background: #ebebeb;
        border-radius: 8px;
        width: 100%;
    }

    .student-image {
        text-align: center;
        background: #f9f9f9;
        padding: 25px;
        border-radius: 5px;
    }

    .student-image>img {
        height: 150px;
        border-radius: 50%;
    }

    .student-profile-sidebar>p {
        font-size: 13px;
        padding: 10px 0;
        font-weight: 700;
    }

    .student-profile-content {
        padding: 0 20px;
    }

    .student-profile-content>table>tbody>tr>td {
        padding: 10px;
        border: 1px solid whitesmoke;
        font-size: 13px;
    }

    .student-profile-content>table {
        width: 100%;
    }

    .student-profile-content>table>tbody>tr>td:nth-child(1) {
        font-weight: bold;
    }

    .content-center {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .student-profile-content>table>tbody>tr:nth-child(odd) {
        background: whitesmoke;
    }

    @media(max-width:768px) {
        .student-profile-content {
            margin-top: 30px;
        }
        .about-text>h1 {
            font-size: 20px;
        }
    }
</style>
<?php
$err = "";
$found = false;
if (isset($_GET['studentID'])) {
    $studentID = htmlspecialchars(trim($_GET['studentID']));

    $sql = "select * from students where student_id=?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_id);
    $param_id = $studentID;
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    if (mysqli_stmt_num_rows($stmt) == 1) {
        mysqli_stmt_bind_result($stmt, $id, $name, $student_id, $image, $student_phone, $gaurdian_phone, $address, $course_name, $course_duration, $fee, $paid, $due, $date_of_birth, $admission_date,$certificate);
        mysqli_stmt_fetch($stmt);
        $found = true;
    } else {
        // header('location: /serverit/error/404');
        //exit;
        $err = "Not Found!";
    }
} else {
    // header('location: /serverit/error/404');
    //exit;
}
?>

<section class="about-us">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-3 title-h3" style="font-size: 30px;">Certificate Verification-</h3>
            </div>
            <?php
            if (!$err) { ?>
                <div class="about-text wow bounceInUp" data-wow-duration="2s" data-wow-delay="0s">
                    <h1>Enter Your ID Number</h1>
                    <h3>
                        <form action="">
                            <input id="certicateInput" name="studentID" class="certificate-box" type="text" placeholder="ID NUMBER" required>
                            <input class="btn btn success slide-btn certificateLabel" type="submit" value="Verify">
                        </form>
                    </h3>
                    <?php 
                        if($found==true){?>
                        <br><br>
                             <h1 style="color:green">Verified</h1> 
                        <?php }
                    ?>
                </div>
            <?php } else { ?>
                <div class="about-text wow bounceInUp" data-wow-duration="2s" data-wow-delay="0s">
                    <h1 style="color:red"><?= $err; ?></h1> <br><br>
                    <h1>Enter Your ID Number</h1>
                    <h3>   
                        <form action="">
                            <input id="certicateInput" name="studentID" class="certificate-box" type="text" placeholder="ID NUMBER" required>
                            <input class="btn btn success slide-btn certificateLabel" type="submit" value="Verify">
                        </form>
                    </h3>
                </div>

            <?php }
            ?>



            <?php
            if (isset($_GET['studentID'])) {
                $student_ID = $_GET['studentID'];
                if ($student_ID != null) {
                    if (!$err) { ?>
                        <section class="student-info">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4 content-center">
                                        <div class="student-profile-sidebar">
                                            <div class="student-image">
                                                <img src="<?= IMAGEPATH, $image; ?>" alt="Student Image" />
                                            </div>
                                            <p><?= $course_name; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="student-profile-content">
                                            <div class="title-h3">
                                                <h3>Information</h3>
                                            </div>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td>Name</td>
                                                        <td><?= $name; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>ID</td>
                                                        <td><?= $student_id; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Due</td>
                                                        <td><?php echo ($due) ? $due . " ৳" : "N/A"; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date of Birth</td>
                                                        <td><?= $date_of_birth; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address</td>
                                                        <td><?= $address; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gaurdian's Phone</td>
                                                        <td><?php echo ($gaurdian_phone) ? $gaurdian_phone : "N/A"; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Student's Phone</td>
                                                        <td><?php echo ($student_phone) ? $student_phone : "N/A"; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Admission Date</td>
                                                        <td><?= $admission_date; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Program</td>
                                                        <td><?= $course_name; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Course Duration</td>
                                                        <td><?= $course_duration; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="col-md-12 sis-images wow bounceInDown" style="margin-top:0px" data-wow-duration="2s">
                            <img src="/serverit/public/certificate/<?= $certificate; ?>" alt="campus - server it studio">
                        </div>
            <?php }
                }
            } ?>
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