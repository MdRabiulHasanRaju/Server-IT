<?php
  $videoSql = "SELECT * FROM `campus_video`";
  $videoStmt = fetch_data($connection,$videoSql);
  if($videoStmt){
  mysqli_stmt_bind_result($videoStmt,$id,$title,$text,$image,$video);
  while(mysqli_stmt_fetch($videoStmt)){ ?>
<section class="campus-video">
  <div class="container">
    <div class="row">
      <div class="campus-video-text">
        <h1><?=$title;?></h1>
          <p><?=$text;?></p>
          <i class="fa-solid fa-circle-play video-play-btn"></i>
      </div>
      <div class="video-player">
          <button class="video-btn-close"><i class="fa-solid fa-xmark"></i></button>
          <video class="video-file" width="100%" height="80%" controls>
            <source src="<?=VIDEOPATH,$video;?>" type="video/mp4">
          </video>
        </div>
    </div>
  </div>
</section>
<?php }}?>