<?php 
  include $_SERVER['DOCUMENT_ROOT']."/serverit/lib/Database.php";
  include $_SERVER['DOCUMENT_ROOT']."/serverit/utility/Baseurl.php";
  include $_SERVER['DOCUMENT_ROOT']."/serverit/utility/Format.php";
  $baseurl = new Baseurl;
  define("IMAGEPATH","{$baseurl->url()}/serverit/public/images/");
  define("VIDEOPATH","{$baseurl->url()}/serverit/public/video/");
  define("LINK","{$baseurl->url()}/serverit/");
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" media="all" />
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous" />

  <link rel="stylesheet" href="public/owl/owl.carousel.min.css">
  <link rel="stylesheet" href="public/owl/owl.theme.default.min.css">
  <link rel="stylesheet" href="public/WOW-master/css/libs/animate.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="responsive.css" />
  <link rel="icon" href="public/images/serveritlogo.png" type="image/x-icon" />
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
                <img src="<?php echo IMAGEPATH,$image;?>" alt="<?=$name;?>" />
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
            <i class="fa-solid fa-cart-shopping"><sup class="cart-num">( 0 )</sup></i>
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
              <li <?php if($menu_name == 'Home') echo "class='myactive'";?>>
                <a href="<?=$link;?>"><?=$menu_name;?></a> <i class="fa-solid fa-caret-down"></i>
              </li>
              <?php }} ?>
              <div class="cart">
                <i class="fa-solid fa-cart-shopping"><sup class="cart-num">( 0 )</sup></i>
              </div>
            </ul>
          </div>
        </div>
      </div>
    </div>

