<?php ob_start();
session_start();
if (isset($_GET['id'])) {
    $course_id = $_GET["id"];
}
require_once $_SERVER['DOCUMENT_ROOT'] . "/serverit/lib/Database.php";
$title_sql = "select title,sub_title from courses where id=$course_id";
$title_stmt = mysqli_prepare($connection, $title_sql);
mysqli_stmt_execute($title_stmt);
mysqli_stmt_store_result($title_stmt);
mysqli_stmt_bind_result($title_stmt, $course_title, $course_sub_title);
mysqli_stmt_fetch($title_stmt);
$meta_title = "$course_title Training Course in Chittagong - Server IT Studio";
$meta_description = "$course_sub_title - server it studio Call 880 1945 4668 21";
$meta_keywords = "$course_title, Server IT Studio, server it,server,server studio";
$header_active = "Courses";
include("../../partials/header.php");
include $_SERVER['DOCUMENT_ROOT']."/serverit/views/pages/courses/admission-form.php";
?>
<?php
$sql = "select * from courses where id=?";
$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, "i", $param_id);
$param_id = $course_id;
if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_store_result($stmt);
    if (mysqli_stmt_num_rows($stmt) == 0) {
        header("location: " . LINK . "error/404");
        die();
    } else {
        mysqli_stmt_bind_result(
            $stmt,
            $id,
            $cat_id,
            $image,
            $title,
            $sub_title,
            $motivational_title,
            $motivational_des,
            $summary,
            $purpose,
            $for_whom,
            $pre_idea,
            $instructor_id,
            $admission_title,
            $admission_box_title,
            $admission_box_des,
            $price,
            $discount_price,
            $tags,
            $total_students
        );
        if (mysqli_stmt_fetch($stmt)) { ?>
            <section class="course-details-page">
                <div class="container">
                    <div class="row lefts FadeIN-Right">
                        <div class="course-details">
                            <div class="background" style="background:url(<?= IMAGEPATH, $image; ?>);background-size: cover;border-radius: 6px;">
                                <div class="top-details">
                                    <h1>
                                        <?= $title; ?>
                                    </h1>
                                    <h3>
                                        <?= $sub_title; ?>
                                    </h3>
                                    <a href="#purchaseid">
                                        <button class="btn btn-primary slide-btn"><i class="fas fa-shopping-cart"></i> Enroll Now</button>
                                    </a>
                                </div>
                            </div>
                            <div class="row top-details-2">
                                <!--Motivation of this course start-->
                                <div class="top-details-2-1 col-md-6 ">
                                    <h5 class="title-h3"><?= $motivational_title; ?></h5>
                                    <?= $motivational_des; ?>
                                    <a href="#purchaseid">
                                        <button class="btn btn-primary slide-btn"><i class="fas fa-shopping-cart"></i> Enroll Now</button>
                                    </a>
                                </div>
                                <!--Motivation of this course start-->

                                <!--Course summary start-->
                                <div class="top-details-2-2 col-md-6 ">
                                    <div class="top-color"></div>
                                    <?= $summary; ?>
                                </div>
                                <!--Course summary end-->
                            </div>

                            <!--course_purpose start-->
                            <div class="middle-details-1">
                                <h1 class="title-h3">By the end of this course, you'll be able to…</h1>
                                <?= $purpose; ?>
                            </div>
                            <!--course_purpose end-->

                            <!--Who is this course for? start-->
                            <div class="middle-details-2">
                                <h1 class="title-h3">Who is this course for?</h1>
                                <?= $for_whom; ?>
                            </div>
                            <!--Who is this course for? end-->

                            <!--No prior knowledge needed! start-->
                            <div class="middle-details-3">
                                <h1 class="title-h3">No prior knowledge needed!</h1>
                                <?= $pre_idea; ?>
                            </div>
                            <!--No prior knowledge needed! end-->

                            <!--Instructor start-->
                            <div class="bottom-details-1">
                                <h1 class="title-h3">Your Instructor</h1>
                                <div class="instructor-details-2">
                                    <?php
                                    $ins_sql = "select * from instructors where id=$instructor_id";
                                    $ins_stmt = fetch_data($connection, $ins_sql);
                                    mysqli_stmt_bind_result($ins_stmt, $ins_id, $ins_name, $ins_expertise, $ins_about, $ins_image);
                                    mysqli_stmt_fetch($ins_stmt);
                                    ?>
                                    <img src="<?= IMAGEPATH, $ins_image; ?>" alt="instuctor image" />
                                    <p><?= $ins_name; ?></p>
                                    <p><?= $ins_expertise; ?></p>
                                </div>
                            </div>
                            <!--Instructor end-->

                            <!--purchase part start-->
                            <div class="bottom-details-2" id="purchaseid">
                                <h1>
                                    <?= $admission_title; ?>
                                </h1>
                                <div class="purchase">
                                    <h2>
                                        <?= $admission_box_title; ?>
                                    </h2>
                                    <?= $admission_box_des; ?>
                                    <p class="price1">৳
                                        <?= $discount_price; ?> <del>৳
                                            <?= $price; ?>
                                        </del>
                                    </p>

                                    <?php
                                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
                                        <button id="admission" class="btn btn-primary slide-btn">Admission</button>
                                    <?php } else { ?>
                                        <a href="<?= LINK; ?>admission">
                                            <button class="btn btn-primary slide-btn">Admission</button>
                                        </a>
                                    <?php } ?>


                                </div>
                            </div>
                            <!--purchase part start-->
                        </div>
                    </div>
                </div>
            </section>
<?php
        }
    }
}
?>
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
<script src="<?=LINK;?>views/pages/courses/admissionForm.js"></script>
<script src="<?= LINK; ?>main.js"></script>
</body>

</html>