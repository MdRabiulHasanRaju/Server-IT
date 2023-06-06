<?php ob_start();
session_start();
$meta_title = $_SESSION['name'] . " - Server IT Studio";
$meta_description = "Develop your professional skills through Server IT Studio We provide Graphic Design, Web Design, web Development, Microsoft Office etc Call 880 1945 4668 21";
$meta_keywords = "Server IT Studio, server it,server,server studio, Web design, web development, graphics design, microsoft office, html, css, javascipt,php";
$header_active = "Account";
$profile_active = "dashboard";
include("../../partials/header.php"); ?>
<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $sql = "select name from users_info where user_id = ?";
  $stmt = mysqli_prepare($connection, $sql);
  mysqli_stmt_bind_param($stmt, "i", $param_id);
  $param_id = $_SESSION['id'];
  if (mysqli_stmt_execute($stmt)) {
    if (mysqli_stmt_store_result($stmt)) {
      mysqli_stmt_bind_result($stmt, $name);
      if (mysqli_stmt_fetch($stmt)) {
        if (empty($name)) {
          unset($_SESSION["name"]);
          header("location: " . LINK . "create-profile");
          die();
        }
      }
      if (mysqli_stmt_num_rows($stmt) == 0) {
        header("location: " . LINK . "create-profile");
        die();
      }
    }
  }
} else {
  header("location: " . LINK . "auth");
  die();
}
?>
<style>
  .inside-profile-sidebar-1 {
    background-image: url('<?= IMAGEPATH; ?>serveritlogo.png');
    background-size: contain;
  }

  ul.course-list {
    display: flex;
    list-style: none;
    justify-content: space-between;
  }

  ul.course-list>li {
    padding: 10px;
    font-size: 14px;
  }

  ul.course-list>li>img {
    width: 80px;
  }

  ul.course-list>li {
    width: 250px;
  }
  .course-box:hover{
    color: black;
    font-weight: 700;
  }

  nav.pagination-nav {
    width: fit-content;
    margin: auto;
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
<section class="profile-box">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="profile-sidebar">
          <div class="inside-profile-sidebar-1"></div>
          <div class="inside-profile-sidebar-2">
            <img class="profile-sidebar-img align-self-start img-thumbnail img-fluid rounded-circle" src="<?= UPLOADIMAGEPATH, $_SESSION['image']; ?>" alt="profile image" />
          </div>
          <div class="inside-profile-sidebar-3 text-center">
            <h4><?= $_SESSION['name']; ?></h4>
            <p><?= $_SESSION['title']; ?> </p>
          </div>
          <div class="profile-sidebar-recent">
            <p class="mt-2"><i class="fa-sharp fa-solid fa-location-dot"></i> <?= $_SESSION['address']; ?></p>
            <p class="mt-2"><i class="fa-solid fa-phone"></i> <?= $_SESSION['mobile']; ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="profile-page-link">
          <ul>
            <a class="<?php if ($profile_active == 'dashboard') echo 'profile_active'; ?>" href="<?= LINK; ?>profile">
              <i class="fa-solid fa-table"></i>
              <li>Dashboard</li>
            </a>
            <a class="<?php if ($profile_active == 'editProfile') echo 'profile_active'; ?>" href="<?= LINK; ?>edit-profile">
              <i class="fa-sharp fa-solid fa-user-pen"></i>
              <li>Edit Your Profile Info</li>
            </a>
            <a class="<?php if ($profile_active == 'changePassword') echo 'profile_active'; ?>" href="<?= LINK; ?>change-password">
              <i class="fa-solid fa-lock"></i>
              <li>Change Your Password</li>
            </a>
            <a href="<?= LINK; ?>controllers/logoutController.php">
              <i class="fa-solid fa-right-from-bracket"></i>
              <li>Logout</li>
            </a>
          </ul>
        </div>
        <div class="profile-page-content">
          <ul class="border-bottom course-list">
            <li>Date</li>
            <li>Course Name</li>
            <li>Fees</li>
            <li>Status</li>
          </ul>
          <?php
          $paginationHide = 0;
          if (isset($_REQUEST['page'])) {
            $page = $_REQUEST['page'];
          } else {
            $page = 1;
          }
          $per_page = 2;
          $star_from = ($page - 1) * $per_page;
          $ad_sql = "select course_id,status, date from admission_form where user_id=? ORDER BY id DESC limit $star_from,$per_page";
          $ad_stmt = mysqli_prepare($connection, $ad_sql);
          mysqli_stmt_bind_param($ad_stmt, "i", $ad_param_id);
          $ad_param_id = $_SESSION['id'];
          if (mysqli_stmt_execute($ad_stmt)) {
            if (mysqli_stmt_store_result($ad_stmt)) {
              if (mysqli_stmt_num_rows($ad_stmt) == 0) { $paginationHide = 1;?>
                <div class="empty-order">
                  <a class="btn slide-btn rounded" style="background:#01918a;" href="<?=LINK;?>courses">Browse Course</a>
                </div>
                <?php }
              mysqli_stmt_bind_result($ad_stmt, $course_id, $status, $course_date);
              while (mysqli_stmt_fetch($ad_stmt)) {
                $c_sql = "select image,title,price from courses where id=?";
                $c_stmt = mysqli_prepare($connection, $c_sql);
                mysqli_stmt_bind_param($c_stmt, "i", $param_course_id);
                $param_course_id = $course_id;
                if (mysqli_stmt_execute($c_stmt)) {
                  if (mysqli_stmt_store_result($c_stmt)) {
                    mysqli_stmt_bind_result($c_stmt, $course_image, $course_name, $course_price);
                    if (mysqli_stmt_fetch($c_stmt)) { ?>
                      <a class="course-box" href="<?= LINK; ?>course-details/<?= $course_id; ?>">
                        <ul class="border-bottom course-list">
                          <li><?= $format->formatDate($course_date); ?></li>
                          <li><img src="<?= IMAGEPATH, $course_image; ?>" alt="course-image"> <?= $course_name; ?></li>
                          <li><?= $course_price; ?></li>
                          <li><?= $status; ?></li>
                        </ul>
                      </a>
          <?php } else {
                      echo "Failed to fetch data!";
                    }
                  }
                } else {
                  echo "Course Deleted!";
                }
              }
            }
          }
          ?>

          <?php
          if($paginationHide==0){
          $user_id = $_SESSION['id'];
          $query =  "SELECT `id` FROM admission_form where user_id=$user_id";
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
                            <a class="page-link" href="' . LINK . 'profile/' . ($page - 1) . '" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
            ';

          if ($start > 1) {
            echo '
                    <li class="page-item"><a class="page-link" href="' . LINK . 'profile/1">1</a></li>
                    <li class="disabled"><span>...</span></li>
                    ';
          }
          for ($i = $start; $i <= $last; $i++) {
            $activePage = ($i == $page) ? "active-page" : "";
            echo '
                        <li class="page-item"><a class="page-link ' . $activePage . '" href="' . LINK . 'profile/' . $i . '">' . $i . '</a></li>
                ';
          }
          if ($last < $total_page) {
            echo '
                <li class="disabled"><span>...</span></li>
                <li class="page-item"><a class="page-link" href="' . LINK . 'profile/' . $total_page . '">' . $total_page . '</a></li>
                ';
          }
          echo '
                        <li class="page-item ' . $last_class . '">
                            <a class="page-link" href="' . LINK . 'profile/' . ($page + 1) . '" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            ';
        }
          ?>


        </div>
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