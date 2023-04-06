<section class="on-slide wow fadeIn">
    <div class="container">
      <div class="row">
      <?php 
        $onslideSql = "SELECT `icon`,`title`,`des` FROM `on_slider`";
        $onslideStmt = fetch_data($connection, $onslideSql);
        if($onslideStmt){
          mysqli_stmt_bind_result($onslideStmt,$icon,$title,$des);
          while(mysqli_stmt_fetch($onslideStmt)){ ?>
        <div class="card">
          <div class="card-body">
            <?=$icon;?>
            <h5 class="card-title"><?=$title;?></h5>
            <p class="card-text">
            <?=$des;?>
            </p>
          </div>
        </div>
        <?php }} ?>
      </div>
    </div>
  </section>