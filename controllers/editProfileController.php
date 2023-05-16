<?php
include $_SERVER['DOCUMENT_ROOT'] . "/serverit/utility/Baseurl.php";
$baseurl = new Baseurl;
define("LINK", "{$baseurl->url()}/serverit/");
$root = $_SERVER['DOCUMENT_ROOT'] . "/serverit";
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['submit']) && isset($_POST['name']) && isset($_POST['title']) && isset($_POST['address']) && isset($_POST['mobile'])) {
            include_once $_SERVER['DOCUMENT_ROOT'] . "/serverit/lib/Database.php";

            $name = $title = $address = $phone = $image = "";
            $name_err = $title_err = $address_err = $phone_err = $image_err = "";

            if (empty(trim($_POST["name"]))) {
                $name_err = "Name cannot be blank";
                $_SESSION["name_err"] = $name_err;
                header("location: " . LINK . "views/pages/profile/edit-profile.php");
                die();
            }
            if (empty(trim($_POST["title"]))) {
                $title_err = "Title cannot be blank";
                $_SESSION["title_err"] = $title_err;
                header("location: " . LINK . "views/pages/profile/edit-profile.php");
                die();
            }
            if (empty(trim($_POST["address"]))) {
                $address_err = "Address cannot be blank";
                $_SESSION["address_err"] = $address_err;
                header("location: " . LINK . "views/pages/profile/edit-profile.php");
                die();
            }
            if (empty(trim($_POST["mobile"]))) {
                $phone_err = "Phone number cannot be blank";
                $_SESSION["phone_err"] = $phone_err;
                header("location: " . LINK . "views/pages/profile/edit-profile.php");
                die();
            }

            if (isset($_FILES['image'])) {
                $prev_image = $_SESSION['image'];
                $file = $_FILES['image'];
                $name_img = $file['name'];
                $temporary_file = $file['tmp_name'];
                $imgfile = $_FILES["image"]["name"];

                if (file_exists($_FILES["image"]["tmp_name"])) {

                    $str_to_arry = explode('.', $name_img);
                    $extension = end($str_to_arry);

                    $file_type = $file['type'];
                    if ($file_type == "image/jpg" || $file_type == "image/jpeg" || $file_type == "image/png") {
                        $finfo = finfo_open(FILEINFO_MIME_TYPE);
                        $file_type = finfo_file($finfo, $temporary_file);
                        if ($file_type == "image/jpeg" || $file_type == "image/png" || $file_type == "image/jpg") {
                            // $data 	  = getimagesize($temporary_file);
                            // $width 	  = $data[0]; // in pixel
                            // $height   = $data[1];  // in pixel

                            // if($width != 300 && $height != 300){
                            //  	echo "Please Upload 300x300 pixel Image.";
                            //  }

                            $size = $file['size']; // size in byte
                            $mb_2 = 2000000;

                            if ($size > $mb_2) {
                                $image_err = "File is too large, Upload less than or equal 2MB";
                                $_SESSION["image_err"] = $image_err;
                                header("location: " . LINK . "views/pages/profile/edit-profile.php");
                                die();
                            }

                            $upload_location = "../public/upload/";
                            $new_name = "profile-image-" . rand(9999, 999999) . md5($imgfile) . time() . "." . $extension;
                            $location_with_name = $upload_location . $new_name;
                            $uploadFile = move_uploaded_file($temporary_file, $location_with_name);
                            if (!$uploadFile) {
                                $image_err = "Problem in Uploading Image File";
                                $_SESSION["image_err"] = $image_err;
                                header("location: " . LINK . "views/pages/profile/edit-profile.php");
                                die();
                            } else {
                                $imageLink = "$root/public/upload/$prev_image";
                                if (file_exists($imageLink)) {
                                    $delImage = unlink($imageLink);
                                    if (!$delImage) {
                                        echo "Image not deleted!";
                                        die();
                                    }
                                }
                            }
                        } else {
                            $image_err = "This is not an image mimetype";
                            $_SESSION["image_err"] = $image_err;
                            header("location: " . LINK . "views/pages/profile/edit-profile.php");
                            die();
                        }
                    } else {
                        $image_err = "This is not an image";
                        $_SESSION["image_err"] = $image_err;
                        header("location: " . LINK . "views/pages/profile/edit-profile.php?");
                        die();
                    }
                } else {
                    $new_name = $_SESSION['image'];
                }
            } 

            $sql = "select * from users_info where user_id = ?";
            $stmt = mysqli_prepare($connection, $sql);
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            $param_id = $_SESSION['id'];
            if (mysqli_stmt_execute($stmt)) {
                if (mysqli_stmt_store_result($stmt)) {
                    if (mysqli_stmt_num_rows($stmt) == 1) {

                        $name = htmlspecialchars($_POST['name']);
                        $title = htmlspecialchars($_POST['title']);
                        $address = htmlspecialchars($_POST['address']);
                        $mobile = htmlspecialchars($_POST['mobile']);
                        $image = htmlspecialchars($_POST['image']);
                        $update_sql = "UPDATE users_info SET name=?,title=?,address=?,mobile=?,image=? WHERE user_id=?";
                        $update_stmt = mysqli_prepare($connection, $update_sql);
                        mysqli_stmt_bind_param($update_stmt, "sssssi", $param_name, $param_title, $param_address, $param_mobile, $param_image, $param_userid);
                        $param_userid = $_SESSION['id'];
                        $param_name = $name;
                        $param_title = $title;
                        $param_address = $address;
                        $param_mobile = $mobile;
                        $param_image = $new_name;
                        if (mysqli_stmt_execute($update_stmt)) {
                            $_SESSION["title"] = $title;
                            $_SESSION["image"] = $new_name;
                            $_SESSION["mobile"] = $mobile;
                            $_SESSION["name"] = $name;
                            $_SESSION["address"] = $address;
                            header("location: " . LINK . "views/pages/profile/profile.php");
                        }
                    } else {
                        header("location: " . LINK . "views/pages/profile/profile.php");
                    }
                }
            }
        } else {
            echo "Req data eror!";
        }
    } else {
        echo "Post method not working!";
    }
} else {
    header("location: " . LINK . "views/pages/auth/auth.php?p=1");
    die();
}
