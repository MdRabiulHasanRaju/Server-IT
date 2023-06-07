<style>
  @media only screen and (max-width: 768px) {
    .our-campus {
      background: url("<?= IMAGEPATH; ?>node.png") rgb(0, 0, 0, 0.9);
      background-attachment: fixed;
      background-size: cover;
    }

    section.browse-courses {
      display: block !important;
      position: absolute;
      margin: 0 !important;
      padding: 0 !important;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 1;
    }
  }

  section.browse-courses {
    display: none;
  }

  .mobile-browse-course {
    background-color: #009197;
    border-top-right-radius: 18px;
    border-top-left-radius: 18px;
    display: grid;
  }
</style>
<section class="browse-courses">
  <a href="<?= LINK; ?>courses" class="btn btn-success slide-btn mobile-browse-course"><i class="fa-solid fa-folder-tree"></i> Browse Course</a>
</section>
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
          <a href="" class="btn btn-success slide-btn">READ MORE</a>
        </div>
        <div class="col-md-6 our-campus-right">
          <img src="<?= IMAGEPATH, $image; ?>" alt="our campus" />
        </div>
      </div>
    <?php } ?>
  </div>
</section>