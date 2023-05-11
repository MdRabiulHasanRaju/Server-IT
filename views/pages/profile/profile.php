<?php include ("../../partials/header.php"); ?>
<style>
    .inside-profile-sidebar-1 {
        background-image: url('<?=IMAGEPATH;?>serveritlogo.png');
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
                <img
                  class="profile-sidebar-img align-self-start img-thumbnail img-fluid rounded-circle"
                  src="<?=IMAGEPATH;?>raju.jpg"
                  alt="profile image"
                />
              </div>
              <div class="inside-profile-sidebar-3 text-center">
                <h4>Md Rabiul Hasan</h4>
                <p>I don't have any quality </p>
              </div>
              <div class="profile-sidebar-recent">
                <p class="mt-2"><i class="fa-sharp fa-solid fa-location-dot"></i> Agrabad, Chittagong, Bangladesh</p>
                <p class="mt-2"><i class="fa-solid fa-phone"></i>  01812546352</p>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="profile-page-link">
                <ul>
                <a href=""><li>Dashboard</li></a>
                <a href=""><li>Edit Profile</li></a>
                <a href=""><li>Change Your Password</li></a>
                <a href=""><li>Logout</li></a>
                </ul>
            </div>
            <div class="profile-page-content">
                <div class="empty-order">
                    <h1>Empty Order History!</h1>
                </div>
                
            </div>
        </div>
        </div>
    </div>
</section>

<?php include("../../partials/footer.php"); ?>


<script src="<?=LINK;?>public/jquery/jquery.js"></script>
<script src="<?=LINK;?>public/owl/owl.carousel.min.js"></script>
<script src="<?=LINK;?>public/bootstrap/bootstrap.min.js" ></script>
<script src="<?=LINK;?>public/bootstrap/bootstrap.bundle.min.js" ></script>
<script src="<?=LINK;?>public/WOW-master/dist/wow.min.js"></script>
<script src="<?=LINK;?>public/bootstrap/popper.min.js" ></script>
<script>
  new WOW().init();
</script>
</body>

</html>