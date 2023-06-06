<section class="latest-news">
  <div class="container">
    <div class="row">
      <!-- post-news -->
      <div class="col-md-6">
        <h3 class="mb-3 title-h3" style="font-size: 30px">Notice Board</h3>
        <?php
        $postSql = "SELECT * FROM `posts`";
        $postStmt = mysqli_prepare($connection, $postSql);
        mysqli_query($connection, 'SET CHARACTER SET utf8');
        #mysqli_query($connection,"SET SESSION collation_connection ='utf8_general_ci'");
        mysqli_stmt_execute($postStmt);
        mysqli_stmt_store_result($postStmt);
        if ($postStmt) {
          mysqli_stmt_bind_result($postStmt, $id, $title, $des, $image, $date, $tag);
          while (mysqli_stmt_fetch($postStmt)) { ?>
            <div class="col-md-12 post-news">
              <div class="col-md-4 post-news-1">
                <a href="">
                  <img src="<?= IMAGEPATH, $image; ?>" alt="latest news post image">
                </a>
              </div>
              <div class="col-md-8 post-news-2">
                <h5><a href=""><?= $title; ?></a></h5>
                <p class="post-date"><?= $format->formatDate($date); ?></p>
                <p class="post-short-des"><?= $des; ?></p>
              </div>
            </div>
        <?php }
        } ?>

        <a href="" class="btn btn-success slide-btn news-btn">VIEW ALL</a>
      </div>
      <!-- post-news -->
      <!-- course-news -->
      <!-- <div class="col-md-6">
        <h3 class="mb-3 title-h3" style="font-size: 30px">Upcoming Courses</h3>
        <?php
        $upCourseSql = "SELECT * FROM `upcoming_courses`";
        $upCourseStmt = fetch_data($connection, $upCourseSql);
        if ($upCourseStmt) {
          mysqli_stmt_bind_result($upCourseStmt, $id, $title, $des, $image, $date);
          while (mysqli_stmt_fetch($upCourseStmt)) { ?>
        <div class="col-md-12 post-news">
          <div class="col-md-4 post-news-1">
            <a href="">
              <img src="<?= IMAGEPATH, $image; ?>" alt="upcoming course pic">
            </a>
          </div>
          <div class="col-md-8 post-news-2">
            <h5><a href=""><?= $title; ?></a></h5>
            <p class="post-date"><?= $format->formatDate($date); ?></p>
            <p class="post-short-des"><?php echo $format->short_text($des, 100); ?></p>
          </div>
        </div>
        <?php }
        } ?>
        <a href="" class="btn btn-success slide-btn news-btn">VIEW ALL</a>
      </div> -->
      <div class="col-md-6">
        <h3 class="mb-3 title-h3" style="font-size: 30px">Social Posts</h3>
        <div class="fb-post" 
           data-href="https://www.facebook.com/serverITStudio/posts/pfbid02st23NWLvXE8EGrYxmFwYMCgQaKhdVTWDQAtwC64zv9Vtm1SyJ1SNTM6LfnTeycLfl" 
           data-width="auto"
           data-show-text=""
           >
        </div>
        <a href="" class="btn btn-success slide-btn news-btn">VIEW ALL</a>
      </div>
      <!-- course-news -->
    </div>
  </div>
</section>