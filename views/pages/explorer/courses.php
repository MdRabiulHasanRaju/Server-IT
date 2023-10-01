<section class="featured-courses" id="featured-courses">
  <div class="container">
    <div class="row">
      <div class="col-12 title-div">
        <h3 class="title-h3 mb-3" style="font-size: 30px">Featured Courses</h3>
      </div>
      <div class="col-12">
        <div class="owl-carousel owl-theme">
          <?php
          $courseSql = "SELECT `id`,`image`,`title`,`sub_title`,`instructor_id`,`price`,`discount_price`,`total_students` FROM `courses`";
          $courseStmt = fetch_data($connection, $courseSql);
          if ($courseStmt) {
            mysqli_stmt_bind_result($courseStmt, $id, $image, $title, $subTitle, $instructorId, $price, $discount_price,$total_students);
            while (mysqli_stmt_fetch($courseStmt)) {
              $instructorSql = "SELECT `image` FROM `instructors` WHERE `id`='$instructorId'";
              $instructorStmt = fetch_data($connection, $instructorSql);
              mysqli_stmt_bind_result($instructorStmt, $image); ?>
              <a class="course-details-link" href="course-details/<?= $id; ?>">
                <div class="item course-item">
                  <div class="card">
                    <img class="img-fluid" style="min-height: 150px" alt="<?= $title; ?>" src="<?= IMAGEPATH, $image; ?>" />
                    <div class="card-body">
                      <h4 class="card-title"><?= $title; ?></h4>
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
                          <!-- <p class="">(<?=$total_students;?>) Students</p> -->
                          <p class="">Enroll Now</p>
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
                  } ?>
        </div>
        <a href="<?= LINK; ?>courses" class="btn btn-success slide-btn news-btn">VIEW ALL</a>
      </div>
    </div>
  </div>
</section>