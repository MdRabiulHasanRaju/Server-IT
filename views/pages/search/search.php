<?php ob_start();
session_start();
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (!isset($_GET['searchValue']) || $_GET['searchValue'] == NULL) {
        header("location: /serverit/error/404");
    }
    if (isset($_GET["searchValue"])) {
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $getSearchValue = validate($_GET["searchValue"]);
        $getSearchValue = strtolower($getSearchValue);
        $meta_title = "Search Result For :: ".$getSearchValue." - Server IT Studio";
        $meta_description = "Study with us completing a certificate course in Web Design, Microsoft Office, Graphic Design, Digital Marketing, Web Development, Training etc grow your business or start your career Call 880 1945 4668 21";
        $meta_keywords = "Server IT Studio, server it,server,server studio";
        $header_active = "";
        include("../../partials/header.php");
        $searchValue = '%' . $getSearchValue . '%';

        if (isset($_REQUEST['page'])) {
            $page = $_REQUEST['page'];
        } else {
            $page = 1;
        }
        $per_page = 8;
        $star_from = ($page - 1) * $per_page;

        $courseSql = "select id,cat_id,image,title,sub_title,instructor_id,price,discount_price from courses where title like ? or sub_title like ? or motivational_title like ? or motivational_des like ? or tags like ? limit $star_from,$per_page";

        $stmt = mysqli_prepare($connection, $courseSql);
        mysqli_stmt_bind_param($stmt, 'sssss', $search1, $search2, $search3, $search4, $search5);

        $search1 = $searchValue;
        $search2 = $searchValue;
        $search3 = $searchValue;
        $search4 = $searchValue;
        $search5 = $searchValue;

        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 0) { ?>
            <div class="col-12 mt-5">
                <h3 style="min-height: 400px;display:flex;align-items:center;justify-content:center;">Opps..Nothing Found!</h3>
            </div>
        <?php } else {
            mysqli_stmt_bind_result($stmt, $id, $cat_id, $image, $title, $subTitle, $instructorId, $price, $discount_price);
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
                            <h3 class="mb-3 title-h3" style="font-size: 30px;">Search Result For - <?= $getSearchValue; ?></h3>
                        </div>
                        <div class="col-12 all-couses">
                            <?php
                            while (mysqli_stmt_fetch($stmt)) {

                                $instructorSql = "SELECT `image` FROM `instructors` WHERE `id`='$instructorId'";
                                $instructorStmt = fetch_data($connection, $instructorSql);
                                mysqli_stmt_bind_result($instructorStmt, $image); ?>
                                <a class="col-md-3 course-details-link mb-5" href="<?= LINK; ?>course-details/<?= $id; ?>">
                                    <div class="course-item">
                                        <div class="card">
                                            <img class="img-fluid" style="min-height: 150px" alt="<?= $title; ?>" src="<?= IMAGEPATH, $image; ?>" />
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
                                        }
                                    } else {
                                        // header("location: " . LINK . "error/404");
                                    }
                                } else {
                                    // header("location: " . LINK . "error/404");
                                }
            ?>
                        </div>
                        <?php
                        $query =  "SELECT id FROM courses WHERE title like '$searchValue' or sub_title like '$searchValue' or motivational_title like '$searchValue' or motivational_des like '$searchValue' or tags like '$searchValue'";
                        $result = mysqli_prepare($connection, $query);
                        mysqli_stmt_execute($result);
                        mysqli_stmt_store_result($result);
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
                            <a class="page-link" href="' . LINK . 'search?searchValue=' . $getSearchValue . '&&page=' . ($page - 1) . '" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
            ';

                        if ($start > 1) {
                            echo '
                    <li class="page-item"><a class="page-link" href="' . LINK . 'search?searchValue=' . $getSearchValue . '&&page=1">1</a></li>
                    <li class="disabled"><span>...</span></li>
                    ';
                        }
                        for ($i = $start; $i <= $last; $i++) {
                            $activePage = ($i == $page) ? "active-page" : "";
                            echo '
                        <li class="page-item"><a class="page-link ' . $activePage . '" href="' . LINK . 'search?searchValue=' . $getSearchValue . '&&page=' . $i . '">' . $i . '</a></li>
                ';
                        }
                        if ($last < $total_page) {
                            echo '
                <li class="disabled"><span>...</span></li>
                <li class="page-item"><a class="page-link" href="' . LINK . 'search?searchValue=' . $getSearchValue . '&&page=' . $total_page . '">' . $total_page . '</a></li>
                ';
                        }
                        echo '
                        <li class="page-item ' . $last_class . '">
                            <a class="page-link" href="' . LINK . 'search?searchValue=' . $getSearchValue . '&&page=' . ($page + 1) . '" aria-label="Next">
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