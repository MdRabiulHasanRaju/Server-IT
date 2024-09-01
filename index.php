<?php session_start();
$meta_title = "Professional IT Training Institute in Chittagong - Server IT Studio";
$meta_description = "Develop your professional skills through Server IT Studio We provide Graphic Design, Web Design, web Development, Microsoft Office etc Call 880 1945 4668 21";
$meta_keywords = "Server IT Studio, server it,server,server studio, Web design, web development, graphics design, microsoft office, html, css, javascipt,php";
$header_active = "Home";?>

<?php include("views/partials/header.php"); ?>

<?php //include("views/partials/slider.php"); ?>
<?php include("views/partials/banner.php"); ?>

<div class="content-body">
  <!-- on-slide-section -->
  <?php include("views/pages/explorer/category.php"); ?>
  <!-- on-slide-section -->

  <!-- Featured Courses -->
  <?php include("views/pages/explorer/courses.php"); ?>
  <!-- Featured Courses -->

  <!-- Our Campus Section -->
    <?php include("views/pages/explorer/ourCampus.php"); ?>
  <!-- Our Campus Section -->

  <!--Campus Video-->
  <?php include("views/pages/explorer/campusVideo.php"); ?>
  <!--Campus Video-->

  <!-- Instructors-->
  <?php include("views/pages/explorer/instructors.php"); ?>
  <!-- Instructors -->

  <!-- news-section -->
  <?php include("views/pages/explorer/latestNews.php"); ?>
  <!-- news-section -->

  <!-- review section -->
  <?php include("views/pages/explorer/review.php"); ?>
  <!-- review section -->
</div>

<?php include("views/partials/footer.php"); ?>


<div id="fb-root"></div>
<div id="fb-customer-chat" class="fb-customerchat">
</div>
<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "101601976219405");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml: true,
      version: 'v16.0'
    });
  };
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>


<script src="<?= LINK; ?>public/jquery/jquery.js"></script>
<script src="<?= LINK; ?>public/owl/owl.carousel.min.js"></script>
<script src="<?= LINK; ?>public/bootstrap/bootstrap.min.js"></script>
<script src="<?= LINK; ?>public/bootstrap/bootstrap.bundle.min.js"></script>
<script src="<?= LINK; ?>public/WOW-master/dist/wow.min.js"></script>
<script src="<?= LINK; ?>public/bootstrap/popper.min.js"></script>
<script>
  new WOW().init();
</script>
<script>
 setTimeout(()=>{
    let authModal = document.getElementById('authNoticeModal')
    if(authModal){
      let authModalObj = new bootstrap.Modal(authModal);
      authModalObj.toggle()
      authModalObj.show();
    }
  },3000)
</script>
<script src="main.js"></script>
</body>

</html>