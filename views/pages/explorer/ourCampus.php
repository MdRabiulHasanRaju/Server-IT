<style>
  .mobile-p {
    display: none;
  }

  @media only screen and (max-width: 768px) {
    .our-campus {
      /* background: url("<?= IMAGEPATH; ?>serveritstudio-class_room_2.jpg") rgb(0, 0, 0, 0.9);
      background-size: cover;  */
      color: black;
    }

    .campus-row {
      margin: 0;
      display: flex;
      flex-direction: column-reverse;
      gap: 20px;
    }

    .desktop-p {
      display: none;
    }

    .mobile-p {
      display: block;
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
      <div class="row campus-row">
        <div class="col-md-6 our-campus-left">
          <h1><?= $title; ?></h1>
          <p class="desktop-p">
            <?php echo $format->short_text($des); ?>
          </p>
          <p class="mobile-p">
            <?php echo $format->short_text($des, 150); ?>
          </p>
          <a href="about" class="btn btn-success slide-btn">READ MORE</a>
        </div>
        <div class="col-md-6 our-campus-right">
          <img class="desktop-p" src="<?= IMAGEPATH, $image; ?>" alt="our campus" />
          <img class="mobile-p" src="<?= IMAGEPATH; ?>team-serverit-1.jpg" alt="our campus" />
        </div>
      </div>
    <?php } ?>
  </div>
</section>