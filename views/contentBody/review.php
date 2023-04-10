<section class="review-part">
    <div class="container">
      <div class="row">
        <div class="title-div">
          <h3 class="mb-3 title-h3" style="font-size: 30px">What Our Students Say</h3>
        </div>
        <!-- Carousel wrapper -->
        <div id="carouselMultiItemExample" class="carousel slide carousel-dark text-center" data-bs-ride="carousel">
          <!-- Controls -->
          <div class="d-flex justify-content-center mb-4">
            <button class="carousel-control-prev position-relative" type="button" data-bs-target="#carouselMultiItemExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next position-relative" type="button" data-bs-target="#carouselMultiItemExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <!-- Inner -->
          <div class="carousel-inner py-4">
            <!-- Single item -->

            <?php 
        $reviewSql = "SELECT * FROM `review`";
        $reviewStmt = fetch_data($connection, $reviewSql);
        if($reviewStmt){
          mysqli_stmt_bind_result($reviewStmt,$id,$name,$courseName,$comment,$star,$userId);
          $i=0;
          while(mysqli_stmt_fetch($reviewStmt)){ ?>

            <div class="carousel-item <?php if($i==0) echo 'active'?>">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <img class="rounded-circle shadow-1-strong mb-4" src="public/images/review.png" alt="" style="width: 150px;height: 150px;" />
                    <h5 class="mb-3 reviewer-name"><?=$name;?></h5>
                    <p class="reviewer-stack"><?=$courseName;?></p>
                    <p class="text-muted reviewer-des">
                      <i class="fas fa-quote-left pe-2"></i>
                      <?=$comment;?>
                    </p>
                    <?=$star;?>
                  </div>
                </div>
              </div>
            </div>
            <?php $i++; }} ?>
          </div>
          <!-- Inner -->
        </div>
        <!-- Carousel wrapper -->
      </div>
    </div>
  </section>