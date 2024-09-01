<?php
header_remove('x-powered-by');
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
  <meta name="description" content="<?php if (!$meta_description) {
                                      header("location:" . LINK . "error/404?metaDataError");
                                    } else {
                                      echo $meta_description;
                                    }; ?>">
  <meta name="keywords" content="<?= $meta_keywords; ?>">
  <meta name="title" content="<?= $meta_title; ?>">
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title><?= $meta_title; ?></title>

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
  <link rel="icon" href="<?= LINK; ?>public/images/logo.png" type="image/x-icon" />
</head>

<body>
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
                <li><?= $icon; ?> <?= $cat_name; ?></li>
              </a>
            <?php }
            ?>
          </ul>
        </div>
        <div class="mobile-menu-bar col-sm-10">
          <form action="/serverit/search" class="search-form-mobile" method="GET">
            <input id="searchid" name="searchValue" type="text" placeholder="Search Course.." />
            <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
          </form>
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