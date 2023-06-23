<?php session_start();
$meta_title = "Professional IT Training Institute in Chittagong - Server IT Studio";
$meta_description = "Develop your professional skills through Server IT Studio We provide Graphic Design, Web Design, web Development, Microsoft Office etc Call 880 1945 4668 21";
$meta_keywords = "Server IT Studio, server it,server,server studio, Web design, web development, graphics design, microsoft office, html, css, javascipt,php";
$header_active = "Home";?>

<?php include("views/partials/header.php"); ?>

<div class="content-body">
  <?php include "views/pages/explorer/explorer.php";?>
</div>

<?php include("views/partials/footer.php"); ?>


<script src="<?= LINK; ?>admin/public/jquery/jquery.js"></script>
<script src="<?= LINK; ?>admin/public/owl/owl.carousel.min.js"></script>
<script src="<?= LINK; ?>admin/public/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= LINK; ?>admin/public/WOW-master/dist/wow.min.js"></script>
<script>
  new WOW().init();
</script>
<script src="main.js"></script>
</body>

</html>