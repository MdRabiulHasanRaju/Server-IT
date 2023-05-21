<?php
include $_SERVER['DOCUMENT_ROOT'] . "/serverit/lib/Database.php";
include $_SERVER['DOCUMENT_ROOT'] . "/serverit/utility/Baseurl.php";
include $_SERVER['DOCUMENT_ROOT'] . "/serverit/utility/Format.php";
$baseurl = new Baseurl;
define("IMAGEPATH", "{$baseurl->url()}/serverit/public/images/");
define("UPLOADIMAGEPATH", "{$baseurl->url()}/serverit/public/upload/");
define("VIDEOPATH", "{$baseurl->url()}/serverit/public/video/");
define("LINK", "{$baseurl->url()}/serverit/");
$format = new Format;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Server IT Studio</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">

  <link rel="stylesheet" href="<?= LINK; ?>public/fontAwesome/css/fontawesome.min.css">
  <link rel="stylesheet" href="<?= LINK; ?>public/fontAwesome/css/all.min.css">
  <link rel="stylesheet" href="<?= LINK; ?>public/bootstrap/bootstrap.min.css">

  <link rel="stylesheet" href="<?= LINK; ?>public/owl/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= LINK; ?>public/owl/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?= LINK; ?>public/WOW-master/css/libs/animate.css" />
  <link rel="stylesheet" href="<?= LINK; ?>public/croppie/croppie.css">
  <link rel="stylesheet" href="<?= LINK; ?>style.css" />
  <link rel="stylesheet" href="<?= LINK; ?>responsive.css" />
  <link rel="icon" href="<?= LINK; ?>public/images/serveritlogo.png" type="image/x-icon" />
</head>

<body>
    <?php include("topbar.php");?>
    <div class="header">
      <div class="container">
        <div class="row">
          <div class="logo col-sm-2">
            <?php 
              $imageSql = "SELECT `name`,`image` FROM `images` WHERE `name`='header-logo'";
              $imageStmt = fetch_data($connection,$imageSql);
              if($imageStmt){
                mysqli_stmt_bind_result($imageStmt,$name,$image);
                mysqli_stmt_fetch($imageStmt)?>
                <a href="<?=LINK;?>">
                <img src="<?php echo IMAGEPATH,$image;?>" alt="<?=$name;?>" />
                </a>
              <?php } ?>
          </div>
          <div class="search col-sm-2">
            <form action="" class="search-form">
              <input type="text" placeholder="Search..." />
              <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
            </form>
          </div>
          <div class="category col-sm-2">
            <div class="cat-bar">
              <div class="dot-bar">
                <span></span>
                <span></span>
                <span></span>
              </div>
              <div class="dot-bar">
                <span></span>
                <span></span>
                <span></span>
              </div>
              <div class="dot-bar">
                <span></span>
                <span></span>
                <span></span>
              </div>
            </div>
  
            <!-- <img src="menu.png" alt="" /> -->
            <p>Category<i class="fa-solid fa-caret-down"></i></p>
          </div>
          <div class="mobile-menu-bar col-sm-10">
            <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
            <!-- <i class="fa-solid fa-cart-shopping"><sup class="cart-num">( 0 )</sup></i> -->
            <i class="fa-solid fa-bars menu-bar"></i>
          </div>
          <div class="menu col-sm-6">
            <ul>
            <?php
              $menu_sql = "SELECT * FROM `menu`";
              $menu_stmt = fetch_data($connection,$menu_sql);
              if($menu_stmt){
                mysqli_stmt_bind_result($menu_stmt,$id,$menu_name,$link);
                while(mysqli_stmt_fetch($menu_stmt)){?>
              <li 
              <?php 
              if(isset($header_active) && $header_active == $menu_name){ 
              echo "class='myactive'"; 
              }
              if(isset($menu_name) && $menu_name == "Student Forum"){
              echo "class='btn btn-warning'";
              } ?>>
                <a href="<?=LINK;?><?=$link;?>"><?=$menu_name;?></a> <i class="fa-solid fa-caret-down"></i>
              </li>
              <?php }} ?>
              <div class="cart">
                <!-- <i class="fa-solid fa-cart-shopping"><sup class="cart-num">( 0 )</sup></i> -->
              </div>
            </ul>
          </div>
        </div>
      </div>
    </div>

