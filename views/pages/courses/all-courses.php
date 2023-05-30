<?php ob_start();
session_start();
$header_active = "Courses";
include("../../partials/header.php");
?>
<section class="featured-courses" id="featured-courses">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-3" style="font-size: 30px;padding: 10px;background: white;text-align: center;">All Courses-</h3>
            </div>
            <div class="col-12 all-couses">
                <?php
                $courseSql = "SELECT `id`,`image`,`title`,`sub_title`,`instructor_id`,`price` FROM `courses`";
                $courseStmt = fetch_data($connection, $courseSql);
                if ($courseStmt) {
                    mysqli_stmt_bind_result($courseStmt, $id, $image, $title, $subTitle, $instructorId, $price);
                    while (mysqli_stmt_fetch($courseStmt)) {
                        $instructorSql = "SELECT `image` FROM `instructors` WHERE `id`='$instructorId'";
                        $instructorStmt = fetch_data($connection, $instructorSql);
                        mysqli_stmt_bind_result($instructorStmt, $image); ?>
                        <a class="col-md-3 course-details-link mb-4" href="course-details/<?= $id; ?>">
                            <div class="course-item">
                                <div class="card">
                                    <img class="img-fluid" style="min-height: 150px" alt="100%x280"
                                        src="<?= IMAGEPATH, $image; ?>" />
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <?= $title; ?>
                                        </h4>
                                        <p class="card-text">
                                            <?= $subTitle; ?>
                                        </p>
                                        <?php if (mysqli_stmt_fetch($instructorStmt)) { ?>
                                            <div class="auth-des">
                                                <img src="<?= IMAGEPATH, $image; ?>" alt="Author image" />
                                                <div class="star">
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                </div>
                                                <p class="">(0) Students</p>
                                            </div>
                                            <div class="price-box">
                                                <h4 class="text-center">Course Fee
                                                    <?= $price; ?> ৳
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php }
                    }
                } ?>
            </div>
            <a href="<?= LINK; ?>courses" class="btn btn-success slide-btn news-btn">VIEW MORE</a>
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