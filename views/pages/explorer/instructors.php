<section class="instructors">
    <div class="container">
      <div class="row">
        <div class="col-12 title-div">
          <h3 class="title-h3 mb-3" style="font-size: 30px">Our Skilled Instructors</h3>
        </div>
        <div class="col-12">
          <div class="owl-carousel owl-theme">
          <?php
            $instructorsSql = "SELECT * FROM `instructors`";
            $instructorsStmt = fetch_data($connection,$instructorsSql);
            if($instructorsStmt){
            mysqli_stmt_bind_result($instructorsStmt,$id,$name,$expertise,$about,$image);
            while(mysqli_stmt_fetch($instructorsStmt)){ ?>
            <div class="item course-item">
              <div class="card">
                <img class="img-fluid" alt="" src="<?=IMAGEPATH,$image;?>" />
                <div class="card-body">
                  <div class="instructor-info">
                    <h4 class="card-title"><?=$name;?></h4>
                    <p class="card-text">
                    <?=$expertise;?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          <?php }} ?>
          </div>
        </div>
      </div>
    </div>
  </section>