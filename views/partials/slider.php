<div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-pause="hover" data-bs-interval="5000">
    <div class="carousel-inner">
    <?php 
      $slideSql = "SELECT * FROM `slider`";
      $slideStmt = fetch_data($connection,$slideSql);
      if($slideStmt){
      mysqli_stmt_bind_result($slideStmt,$id,$image,$title,$text,$btnName,$btnLink);
      $i=0;
      $j=0;
      while(mysqli_stmt_fetch($slideStmt)){?>
      <div class="carousel-item <?php if($j==0){?> active<?php } ?>">
        <img src="<?=IMAGEPATH,$image;?>" class="d-block w-100" />
        <div class="container">
          <div class="carousel-caption <?php if($i==0){?> text-start <?php }else if($i==2){?>text-end<?php } ?> ">
            <h1 class="wow bounceInUp" data-wow-duration="2s">
            <?=$title;?>
            </h1>
            <p class="wow slideInLeft" data-wow-duration="2s">
               <?=$text;?>
            </p>
            <p>
              <a class="btn btn-lg btn-primary slide-btn wow slideInRight" href="<?=$btnLink;?>" data-wow-duration="2s"><?=$btnName;?></a>
            </p>
          </div>
        </div>
      </div>
    <?php $j=1; $i++; if($i>2) $i=0; }} ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>