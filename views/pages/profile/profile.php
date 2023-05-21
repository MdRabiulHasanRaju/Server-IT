<?php ob_start();
session_start();
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
       mysqli_stmt_bind_result($stmt,$name);
       if(mysqli_stmt_fetch($stmt)){
        if(empty($name)){
          unset($_SESSION["name"]);
          header("location: " . LINK . "views/pages/profile/create-profile.php");
          die();
        }
       }
      if (mysqli_stmt_num_rows($stmt) == 0) {
        header("location: " . LINK . "views/pages/profile/create-profile.php");
        die();
      }
    }
  }
} else {
  header("location: " . LINK . "views/pages/auth/auth.php");
  die();
}
?>
<style>
  .inside-profile-sidebar-1 {
    background-image: url('<?= IMAGEPATH; ?>serveritlogo.png');
    background-size: contain;
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
            <a class="<?php if ($profile_active == 'dashboard') echo 'profile_active'; ?>" href="<?= LINK; ?>views/pages/profile/profile.php">
              <i class="fa-solid fa-table"></i>
              <li>Dashboard</li>
            </a>
            <a class="<?php if ($profile_active == 'editProfile') echo 'profile_active'; ?>" href="<?= LINK; ?>views/pages/profile/edit-profile.php">
              <i class="fa-sharp fa-solid fa-user-pen"></i>
              <li>Edit Your Profile Info</li>
            </a>
            <a class="<?php if ($profile_active == 'changePassword') echo 'profile_active'; ?>" href="<?= LINK; ?>views/pages/profile/change-password.php">
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
          <div class="empty-order">
            <h1>Empty Courses!</h1>
          </div>

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