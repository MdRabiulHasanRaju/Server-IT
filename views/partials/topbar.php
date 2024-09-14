<div class="top-bar" id="top-bar">
  <div class="row">
    <div class="col-md-8">
      <div class="top-left">
      <?php 
          $topbar_sql = "SELECT * FROM `top_bar`";
          $topbar_stmt = fetch_data($connection,$topbar_sql);
          mysqli_stmt_bind_result($topbar_stmt,$id,$address,$email,$number);
          if(mysqli_stmt_fetch($topbar_stmt)){ ?>
        <ul>
          <!-- <li>
            <a href="https://goo.gl/maps/NHuDSZ8DdW1ga2ou5" name="Address">
              <i class="fa-solid fa-location-dot"></i> 
             <?//=$address;?>
            </a>
          </li> -->
          <li>
            <a href="mailto:<?=$email;?>" name="mail"
              ><i class="fa-regular fa-envelope"></i> <?=$email;?></a
            >
          </li>
          <li>
            <a href="tel:<?=$number;?>" name="phone"
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
          <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){?>
          <a class="topbar-profile-image" href="<?=LINK;?>profile"> <img style="height: 30px;border-radius: 50%;margin-right: 4px;" src="<?=UPLOADIMAGEPATH,$_SESSION['image'];?>" alt="profile image" /></a>
          <a class="btn btn-danger" href="<?=LINK;?>controllers/logoutController.php"> <i class="fa-solid fa-right-from-bracket"></i> Logout</a>
          <?php }else{?>
          <a href="<?=LINK;?>views/pages/auth/auth.php"> <i class="fa-solid fa-user-plus"></i> Login/Sign Up</a>
          <?php }?>
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
              <a target="_blank" name="<?=$name;?>" href="<?=$links;?>">
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