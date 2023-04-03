<div class="top-bar">
  <div class="row">
    <div class="col-md-8">
      <div class="top-left">
      <?php 
          $topbar_sql = "SELECT * FROM `top_bar`";
          $topbar_stmt = fetch_data($connection,$topbar_sql);
          mysqli_stmt_bind_result($topbar_stmt,$id,$address,$email,$number);
          if(mysqli_stmt_fetch($topbar_stmt)){ ?>
        <ul>
          <li>
            <a href="">
              <i class="fa-solid fa-location-dot"></i> 
             <?=$address;?>
            </a>
          </li>
          <li>
            <a href=""
              ><i class="fa-regular fa-envelope"></i> <?=$email;?></a
            >
          </li>
          <li>
            <a href=""
              ><i class="fa-sharp fa-solid fa-phone"></i> <?=$number;?></a
            >
          </li>
        </ul>
        <?php } ?>
      </div>
    </div>
    <div class="col-md-4">
      <div class="top-right">
        <div class="login-btn">
          <i class="fa-solid fa-user-plus"></i> Login/Sign Up
        </div>
        <div class="social-bar">
          <ul>
          <?php 
          $link_sql = "SELECT * FROM `social_links`";
          $link_stmt = fetch_data($connection,$link_sql);
            if($link_stmt){
            mysqli_stmt_bind_result($link_stmt,$id,$name,$links,$icon);
            while(mysqli_stmt_fetch($link_stmt)){
            ?>
            <li>
              <a href="<?=$links;?>">
               <?=$icon;?>
              </a>
            </li>
            <?php }}?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>