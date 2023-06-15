<style>
  @media only screen and (max-width: 768px) {
    .our-campus {
      background: url("<?= IMAGEPATH; ?>node-min.png") rgb(0, 0, 0, 0.9);
      background-size: cover;
    }
  }
</style>
<section class="our-campus" id="our-campus">
  <div class="container">
    <?php
    $campusSql = "SELECT * FROM `campus_des`";
    $campusStmt = fetch_data($connection, $campusSql);
    mysqli_stmt_bind_result($campusStmt, $id, $title, $des, $image);
    if (mysqli_stmt_fetch($campusStmt)) { ?>
      <div class="row">
        <div class="col-md-6 our-campus-left">
          <h1><?= $title; ?></h1>
          <p>
            <?php echo $format->short_text($des); ?>
          </p>
          <a href="about" class="btn btn-success slide-btn">READ MORE</a>
        </div>
        <div class="col-md-6 our-campus-right">
          <img src="<?= IMAGEPATH, $image; ?>" alt="our campus" />
        </div>
      </div>
    <?php } ?>
  </div>
</section>