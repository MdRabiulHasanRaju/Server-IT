<section class="featured-courses">
    <div class="container">
      <div class="row">
        <div class="col-12 title-div">
          <h3 class="title-h3 mb-3" style="font-size: 30px">Featured Courses</h3>
        </div>
        <div class="col-12">
          <div class="owl-carousel owl-theme">
          <?php 
            $courseSql = "SELECT `id`,`image`,`title`,`sub_title`,`instructor_id` FROM `courses`";
            $courseStmt = fetch_data($connection,$courseSql);
            if($courseStmt){
              mysqli_stmt_bind_result($courseStmt,$id,$image,$title,$subTitle,$instructorId);
              while(mysqli_stmt_fetch($courseStmt)){ 
                $instructorSql = "SELECT `image` FROM `instructors` WHERE `id`='$instructorId'";
                $instructorStmt = fetch_data($connection,$instructorSql);
                mysqli_stmt_bind_result($instructorStmt,$image);?>
            <div class="item course-item">
              <div class="card">
                <img class="img-fluid" style="height: 200px" alt="100%x280" src="<?=IMAGEPATH,$image;?>" />
                <div class="card-body">
                  <h4 class="card-title"><?=$title;?></h4>
                  <p class="card-text">
                    <?=$subTitle;?>
                  </p>
                  <?php if(mysqli_stmt_fetch($instructorStmt)){ ?>
                  <div class="auth-des">
                    <img src="<?=IMAGEPATH,$image;?>" alt="Author image" />
                    <div class="star">
                      <i class="fa-regular fa-star"></i>
                      <i class="fa-regular fa-star"></i>
                      <i class="fa-regular fa-star"></i>
                      <i class="fa-regular fa-star"></i>
                      <i class="fa-regular fa-star"></i>
                    </div>
                    <p class="">(0) Students</p>
                  </div>


                  <div class="price-box">
                    <h4 class="text-center">Course Fee 13000 BDT</h4>
                  </div>



                </div>
              </div>
            </div>
            <?php }}} ?>
          </div>
        </div>
      </div>
    </div>
  </section>