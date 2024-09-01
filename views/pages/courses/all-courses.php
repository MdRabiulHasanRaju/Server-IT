<?php ob_start();
session_start();

$meta_title = "Professional IT Training Courses &amp; Certification - Server IT Studio";
$meta_description = "Study with us completing a certificate course in Web Design, Microsoft Office, Graphic Design, Digital Marketing, Web Development, Training etc grow your business or start your career Call 880 1945 4668 21";
$meta_keywords = "Server IT Studio, server it,server,server studio";
$header_active = "Courses";
include("../../partials/header.php");
?>
<style>
    nav.pagination-nav {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    a.page {
        padding: 7px;
        margin: 0 3px;
        background: #dddddd;
        font-size: 13px;
        font-weight: bold;
        border-radius: 4px;
    }

    .active-page {
        color: white !important;
        background-color: red !important;
    }
</style>
<section class="featured-courses" id="featured-courses">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-3 title-h3" style="font-size: 30px;">Courses-</h3>
            </div>
            <div class="col-12 all-couses">
                <?php
                if (isset($_REQUEST['page'])) {
                    $page = $_REQUEST['page'];
                } else {
                    $page = 1;
                }
                $per_page = 8;
                $star_from = ($page - 1) * $per_page;
                $courseSql = "SELECT `id`,`cat_id`,`image`,`title`,`sub_title`,`instructor_id`,`price`,`discount_price`,total_students FROM `courses` ORDER BY id DESC limit $star_from,$per_page";
                $courseStmt = fetch_data($connection, $courseSql);
                if ($courseStmt) {
                    if (mysqli_stmt_num_rows($courseStmt) == 0) {
                        header("location: " . LINK . "error/404");
                        die();
                    }
                    mysqli_stmt_bind_result($courseStmt, $id, $cat_id, $image, $title, $subTitle, $instructorId, $price, $discount_price,$total_students);
                    while (mysqli_stmt_fetch($courseStmt)) {
                        $instructorSql = "SELECT `image` FROM `instructors` WHERE `id`='$instructorId'";
                        $instructorStmt = fetch_data($connection, $instructorSql);
                        mysqli_stmt_bind_result($instructorStmt, $image); ?>
                        <a class="col-md-3 course-details-link mb-5" href="<?= LINK; ?>course-details/<?= $id; ?>">
                            <div class="course-item">
                                <div class="card">
                                    <img class="img-fluid" style="min-height: 150px" alt="<?= $title; ?>" src="<?= IMAGEPATH, $image; ?>" />
                                    <div class="card-body" style="min-height: 200px; display: grid;">
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
                                                <!-- <p class="">(<?=$total_students;?>) Students</p> -->
                                                <p class="">Enroll Now</p>
                                            </div>
                                            <div class="price-box">
                                                <h4 class="text-center">Course Fee
                                                    <b><?= $discount_price; ?> ৳</b>
                                                    <del><?= $price; ?> ৳</del>
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
            <?php
            $query =  "SELECT `id` FROM `courses`";
            $result = fetch_data($connection, $query);
            $total_rows = mysqli_stmt_num_rows($result);
            $total_page = ceil($total_rows / $per_page);

            $link = 5;
            $start = (($page - $link) > 0) ? $page - $link : 1;
            $last = (($page + $link) < $total_page) ? $page + $link : $total_page;

            $prev_class = ($page == 1) ? 'disabled' : '';
            $last_class = ($page == $total_page) ? 'disabled' : '';


            echo '
            <nav class="pagination-nav" aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item ' . $prev_class . '">
                            <a class="page-link" href="' . LINK . 'courses/' . ($page - 1) . '" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
            ';

            if ($start > 1) {
                echo '
                    <li class="page-item"><a class="page-link" href="' . LINK . 'courses/1">1</a></li>
                    <li class="disabled"><span>...</span></li>
                    ';
            }
            for ($i = $start; $i <= $last; $i++) {
                $activePage = ($i == $page) ? "active-page" : "";
                echo '
                        <li class="page-item"><a class="page-link ' . $activePage . '" href="' . LINK . 'courses/' . $i . '">' . $i . '</a></li>
                ';
            }
            if ($last < $total_page) {
                echo '
                <li class="disabled"><span>...</span></li>
                <li class="page-item"><a class="page-link" href="' . LINK . 'courses/' . $total_page . '">' . $total_page . '</a></li>
                ';
            }
            echo '
                        <li class="page-item ' . $last_class . '">
                            <a class="page-link" href="' . LINK . 'courses/' . ($page + 1) . '" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            ';
            ?>
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