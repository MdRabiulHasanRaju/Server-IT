<?php 
  include "lib/Database.php";
  include "utility/Baseurl.php";
  include "utility/Format.php";
  $baseurl = new Baseurl;
  define("IMAGEPATH","{$baseurl->url()}/serverit/public/images/");
  $format = new Format;
?>

<?php include ("views/partials/header.php"); ?>
<?php include ("views/partials/slider.php"); ?>

<div class="content-body">
  <!-- on-slide-section -->
  <?php include("views/contentBody/onslider.php"); ?>
  <!-- on-slide-section -->

  <!-- Our Campus Section -->
  <?php include("views/contentBody/ourCampus.php"); ?>
  <!-- Our Campus Section -->

  <!-- Featured Courses -->
  <?php include("views/contentBody/courses.php"); ?>
  <!-- Featured Courses -->

  <!--Campus Video-->
  <?php include("views/contentBody/campusVideo.php"); ?>
  <!--Campus Video-->

  <!-- Instructors-->
  <?php include("views/contentBody/instructors.php"); ?>
  <!-- Instructors -->

  <!-- news-section -->
  <?php include("views/contentBody/latestNews.php"); ?>
  <!-- news-section -->

  <!-- review section -->
  <?php include("views/contentBody/review.php"); ?>
  <!-- review section -->
</div>

<?php include("views/partials/footer.php"); ?>


<script src="public/jquery/jquery.js"></script>
<script src="public/owl/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" ></script>
<script src="public/WOW-master/dist/wow.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script>
  new WOW().init();
</script>

<script src="main.js"></script>
</body>

</html>