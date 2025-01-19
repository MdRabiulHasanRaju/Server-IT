<?php
header_remove('x-powered-by');
ob_start();
if (!isset($connection)) {
  include $_SERVER['DOCUMENT_ROOT'] . "/serverit/lib/Database.php";
}
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
  <meta name="creator" content="@Md Rabiul Hasan">
  <meta name="robots" content="index, follow">
  
  <meta name="description" content="<?php if (!$meta_description) {
                                      header("location:" . LINK . "error/404?metaDataError");
                                    } else {
                                      echo $meta_description;
                                    }; ?>">
  <meta name="keywords" content="<?= $meta_keywords; ?>">
  <meta name="title" content="<?= $meta_title; ?>">

  <meta property="og:title" content="Professional IT Training Institute in Chittagong - Server IT Studio"/>
  <meta property="og:image" content="<?=LINK;?>public/images/ogImage.jpg"/>
  <meta data-n-head="ssr" data-hid="og:image:type" property="og:image:type" content="image/jpg">
  <meta property="og:image:alt" content="Official Logo of Server IT Studio" />
  <meta property="og:type" content="article"/>
  <meta property="og:description" content="Server IT Studio is a computer training facility and IT solution for your business. We provide IT training as well as technological services such as website creation, digital marketing, and graphic design to help your company develop to the next level."/>
  <meta property="og:url" content="https://serveritstudio.com"/>
  <meta property="fb:app_id" content="1223755111835936"/>

  <link rel="canonical" href="https://serveritstudio.com/" />

  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title><?= $meta_title; ?></title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link href="https://fonts.cdnfonts.com/css/hind-siliguri" rel="stylesheet">

  <link rel="stylesheet" href="<?= LINK; ?>public/fontAwesome/css/fontawesome.min.css">
  <link rel="stylesheet" href="<?= LINK; ?>public/fontAwesome/css/all.min.css">
  <!-- <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    /> -->
  <link rel="stylesheet" href="<?= LINK; ?>public/bootstrap/bootstrap.min.css">

  <link rel="stylesheet" href="<?= LINK; ?>public/owl/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= LINK; ?>public/owl/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?= LINK; ?>public/WOW-master/css/libs/animate.css" />
  <link rel="stylesheet" href="<?= LINK; ?>public/croppie/croppie.css">
  <link rel="stylesheet" href="<?= LINK; ?>style.css" />
  <link rel="stylesheet" href="<?= LINK; ?>responsive.css" />

  <!-- <link rel="icon" href="<?// LINK; ?>public/images/logo.png" type="image/x-icon" /> -->

  <link rel="apple-touch-icon" sizes="180x180" href="<?=LINK;?>public/images/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?=LINK;?>public/images/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?=LINK;?>public/images/favicon-16x16.png">
  <!-- <link rel="manifest" href="<?=LINK;?>public/images/site.webmanifest"> -->
  <link rel="mask-icon" href="<?=LINK;?>public/images/safari-pinned-tab.svg" color="#5bbad5">


</head>
<style>
/*===== Preloader Style =====*/

.preloader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #fff;
  z-index: 9999;
}
.preloader .color-1 {
  background-color: #dc555b!important;
}
.rubix-cube {
  border: 1px solid #fff;
  width: 48px;
  height: 48px;
  background-color: #fff;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
.rubix-cube .layer {
  width: 14px;
  height: 14px;
  background-color: #07294d;
  border: 1px solid #fff;
  position: absolute;
}
.rubix-cube .layer-1 {
  left: 0px;
  top: 0px;
  -webkit-animation: rubixcube4 2s infinite linear;
  animation: rubixcube4 2s infinite linear;
}
.rubix-cube .layer-2 {
  left: 16px;
  top: 0px;
  -webkit-animation: rubixcube3 2s infinite linear;
  animation: rubixcube3 2s infinite linear;
}
.rubix-cube .layer-3 {
  left: 32px;
  top: 0px;
}
.rubix-cube .layer-4 {
  left: 0px;
  top: 16px;
  -webkit-animation: rubixcube5 2s infinite linear;
  animation: rubixcube5 2s infinite linear;
}
.rubix-cube .layer-5 {
  left: 16px;
  top: 16px;
  -webkit-animation: rubixcube2 2s infinite linear;
  animation: rubixcube2 2s infinite linear;
}
.rubix-cube .layer-6 {
  left: 32px;
  top: 16px;
  -webkit-animation: rubixcube1 2s infinite linear;
  animation: rubixcube1 2s infinite linear;
}
.rubix-cube .layer-7 {
  left: 0px;
  top: 32px;
  -webkit-animation: rubixcube6 2s infinite linear;
  animation: rubixcube6 2s infinite linear;
}
.rubix-cube .layer-8 {
  left: 16px;
  top: 32px;
  -webkit-animation: rubixcube7 2s infinite linear;
  animation: rubixcube7 2s infinite linear;
}
@-webkit-keyframes rubixcube1 {
  20% {
    top: 16px;
    left: 32px;
  }
  30% {
    top: 32px;
    left: 32px;
  }
  40% {
    top: 32px;
    left: 32px;
  }
  50% {
    top: 32px;
    left: 32px;
  }
  60% {
    top: 32px;
    left: 32px;
  }
  70% {
    top: 32px;
    left: 32px;
  }
  80% {
    top: 32px;
    left: 32px;
  }
  90% {
    top: 32px;
    left: 32px;
  }
  100% {
    top: 32px;
    left: 16px;
  }
}
@keyframes rubixcube1 {
  20% {
    top: 16px;
    left: 32px;
  }
  30% {
    top: 32px;
    left: 32px;
  }
  40% {
    top: 32px;
    left: 32px;
  }
  50% {
    top: 32px;
    left: 32px;
  }
  60% {
    top: 32px;
    left: 32px;
  }
  70% {
    top: 32px;
    left: 32px;
  }
  80% {
    top: 32px;
    left: 32px;
  }
  90% {
    top: 32px;
    left: 32px;
  }
  100% {
    top: 32px;
    left: 16px;
  }
}
@-webkit-keyframes rubixcube2 {
  30% {
    left: 16px;
  }
  40% {
    left: 32px;
  }
  50% {
    left: 32px;
  }
  60% {
    left: 32px;
  }
  70% {
    left: 32px;
  }
  80% {
    left: 32px;
  }
  90% {
    left: 32px;
  }
  100% {
    left: 32px;
  }
}
@keyframes rubixcube2 {
  30% {
    left: 16px;
  }
  40% {
    left: 32px;
  }
  50% {
    left: 32px;
  }
  60% {
    left: 32px;
  }
  70% {
    left: 32px;
  }
  80% {
    left: 32px;
  }
  90% {
    left: 32px;
  }
  100% {
    left: 32px;
  }
}

@-webkit-keyframes rubixcube3 {
  30% {
    top: 0px;
  }
  40% {
    top: 0px;
  }
  50% {
    top: 16px;
  }
  60% {
    top: 16px;
  }
  70% {
    top: 16px;
  }
  80% {
    top: 16px;
  }
  90% {
    top: 16px;
  }
  100% {
    top: 16px;
  }
}

@keyframes rubixcube3 {
  30% {
    top: 0px;
  }
  40% {
    top: 0px;
  }
  50% {
    top: 16px;
  }
  60% {
    top: 16px;
  }
  70% {
    top: 16px;
  }
  80% {
    top: 16px;
  }
  90% {
    top: 16px;
  }
  100% {
    top: 16px;
  }
}
@-webkit-keyframes rubixcube4 {
  50% {
    left: 0px;
  }
  60% {
    left: 16px;
  }
  70% {
    left: 16px;
  }
  80% {
    left: 16px;
  }
  90% {
    left: 16px;
  }
  100% {
    left: 16px;
  }
}
@keyframes rubixcube4 {
  50% {
    left: 0px;
  }
  60% {
    left: 16px;
  }
  70% {
    left: 16px;
  }
  80% {
    left: 16px;
  }
  90% {
    left: 16px;
  }
  100% {
    left: 16px;
  }
}
@-webkit-keyframes rubixcube5 {
  60% {
    top: 16px;
  }
  70% {
    top: 0px;
  }
  80% {
    top: 0px;
  }
  90% {
    top: 0px;
  }
  100% {
    top: 0px;
  }
}
@keyframes rubixcube5 {
  60% {
    top: 16px;
  }
  70% {
    top: 0px;
  }
  80% {
    top: 0px;
  }
  90% {
    top: 0px;
  }
  100% {
    top: 0px;
  }
}
@-webkit-keyframes rubixcube6 {
  70% {
    top: 32px;
  }
  80% {
    top: 16px;
  }
  90% {
    top: 16px;
  }
  100% {
    top: 16px;
  }
}
@keyframes rubixcube6 {
  70% {
    top: 32px;
  }
  80% {
    top: 16px;
  }
  90% {
    top: 16px;
  }
  100% {
    top: 16px;
  }
}
@-webkit-keyframes rubixcube7 {
  80% {
    left: 16px;
  }
  90% {
    left: 0px;
  }
  100% {
    left: 0px;
  }
}
@keyframes rubixcube7 {
  80% {
    left: 16px;
  }
  90% {
    left: 0px;
  }
  100% {
    left: 0px;
  }
}

  </style>
<body>
<!-- <div id="preloader" class="preloader">
 <div class="loader rubix-cube">
   <div class="layer layer-1"></div>
   <div class="layer layer-2"></div>
   <div class="layer layer-3 color-1"></div>
   <div class="layer layer-4"></div>
   <div class="layer layer-5"></div>
   <div class="layer layer-6"></div>
   <div class="layer layer-7"></div>
   <div class="layer layer-8"></div>
 </div>
</div> -->
  <?php include("authNotice.php"); ?>
  <?php include("topbar.php"); ?>
  <div class="header">
    <div class="container">
      <div class="row header-row">
        <div class="logo col-sm-2">
          <?php
          $imageSql = "SELECT `name`,`image` FROM `images` WHERE `name`='header-logo'";
          $imageStmt = fetch_data($connection, $imageSql);
          if ($imageStmt) {
            mysqli_stmt_bind_result($imageStmt, $name, $image);
            mysqli_stmt_fetch($imageStmt) ?>
            <a href="<?= LINK; ?>">
              <img src="<?php echo IMAGEPATH, $image; ?>" alt="<?= $name; ?>" />
            </a>
          <?php } ?>
        </div>
        <div class="search col-sm-2">
          <form action="/serverit/search" class="search-form" method="GET">
            <input id="searchid" name="searchValue" type="text" placeholder="Search Course..." />
            <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
          </form>
          <div id="realtimesearch" class="real-time-search-box">
          <div class="show-content">
            <p id="showsearch"></p>
          </div>
        </div>
        </div>
        <script>
          if(window.innerWidth<768){
            document.getElementsByClassName("search")[0].remove();
          }
        </script>
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
          <p>Category<i class="fa-solid fa-caret-down"></i></p>
          <ul class="category-option">
            <?php
            $cat_sql = "select id, cat_name ,icon from category";
            $cat_stmt = fetch_data($connection, $cat_sql);
            mysqli_stmt_bind_result($cat_stmt, $cat_id, $cat_name, $icon);
            while (mysqli_stmt_fetch($cat_stmt)) { ?>
              <a href="<?= LINK; ?>courses/category/<?= $cat_id; ?>">
                <li><?= $cat_name; ?></li>
              </a>
            <?php }
            ?>
          </ul>
        </div>
        <div class="mobile-menu-bar col-sm-10">
          <!-- <form action="/serverit/search" class="search-form-mobile" method="GET">
            <input id="searchid" name="searchValue" type="text" placeholder="Search Course.." />
            <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
          </form> -->


          <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){?>
          <a style="position: relative;right: 20px;padding: 6px 20px;border: 1px solid #ededed;border-radius: 8px;font-size: 15px;" href="<?=LINK?>auth">
            <img style="height: 30px;border-radius: 50%;margin-right: 4px;" src="<?=UPLOADIMAGEPATH,$_SESSION['image'];?>" alt="profile image" />
              Dashboard
          </a>
          <?php }else{?>
            <a style="position: relative;right: 20px;padding: 8px 60px;border: 1px solid #ededed;border-radius: 8px;font-size: 15px;" href="<?=LINK?>login"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
          <?php }?>


          <div id="realtimesearch" class="real-time-search-box">
          <div class="show-content">
            <p id="showsearch"></p>
          </div>
        </div>
          <i class="fa-solid fa-bars menu-bar"></i>
        </div>
        <div class="menu col-sm-6">
          <ul>
            <?php
            $menu_sql = "SELECT * FROM `menu`";
            $menu_stmt = fetch_data($connection, $menu_sql);
            if ($menu_stmt) {
              mysqli_stmt_bind_result($menu_stmt, $id, $menu_name, $link);
              while (mysqli_stmt_fetch($menu_stmt)) { 
                if($menu_name!="Privacy & Policy" && $menu_name!="Documents"){?>
                <li <?php
                    if (isset($header_active) && $header_active == $menu_name) {
                      echo "class='myactive'";
                    }
                    if (isset($menu_name) && $menu_name == "Admission") {
                      echo "class='btn btn-warning'";
                    } ?>>
                    <a href="<?= LINK; ?><?= $link; ?>">
                      <?= $menu_name;?>
                    </a><i class="fa-solid fa-caret-down"></i>

                </li>
            <?php }}
            } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>