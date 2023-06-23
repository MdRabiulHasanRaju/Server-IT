<?php
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

  <link rel="stylesheet" href="<?= LINK; ?>admin/public/fontAwesome/css/fontawesome.min.css">
  <link rel="stylesheet" href="<?= LINK; ?>admin/public/fontAwesome/css/all.min.css">
  <link rel="stylesheet" href="<?= LINK; ?>admin/public/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= LINK; ?>admin/public/owl/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= LINK; ?>admin/public/owl/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?= LINK; ?>admin/public/WOW-master/css/libs/animate.css" />
  <link rel="stylesheet" href="<?= LINK; ?>admin/public/croppie/croppie.css">
  <link rel="stylesheet" href="<?= LINK; ?>admin/style.css" />
  <link rel="stylesheet" href="<?= LINK; ?>admin/responsive.css" />
  <link rel="icon" href="<?= LINK; ?>admin/public/images/logo.png" type="image/x-icon" />
</head>
<body>
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid header">
    <span class="navbar-brand mb-0 h1">Business - Server IT Studio</span>
  </div>
</nav>