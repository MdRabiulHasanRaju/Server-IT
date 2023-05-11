<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/serverit/utility/Baseurl.php";
$baseurl = new Baseurl;
define("LINK", "{$baseurl->url()}/serverit/");
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	if (isset($_SESSION['name'])) {
		header("location: " . LINK . "views/pages/profile/profile.php");
		exit;
	}

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if (isset($_POST['submit']) && isset($_POST['name']) && isset($_POST['title']) && isset($_POST['address']) && isset($_POST['mobile']) && isset($_POST['image'])) {


			include_once $_SERVER['DOCUMENT_ROOT'] . "/serverit/lib/Database.php";

			$name = $title = $address = $phone = "";
			$name_err = $title_err = $address_err = $phone_err = "";

			if (empty(trim($_POST["name"]))) {
				$name_err = "Name cannot be blank";
				$_SESSION["name_err"] = $name_err;
				header("location: " . LINK . "views/pages/profile/create-profile.php");
				die();
			}
			if (empty(trim($_POST["title"]))) {
				$title_err = "Name cannot be blank";
				$_SESSION["title_err"] = $title_err;
				header("location: " . LINK . "views/pages/profile/create-profile.php");
				die();
			}
			if (empty(trim($_POST["address"]))) {
				$address_err = "Name cannot be blank";
				$_SESSION["address_err"] = $address_err;
				header("location: " . LINK . "views/pages/profile/create-profile.php");
				die();
			}
			if (empty(trim($_POST["mobile"]))) {
				$phone_err = "Name cannot be blank";
				$_SESSION["phone_err"] = $phone_err;
				header("location: " . LINK . "views/pages/profile/create-profile.php");
				die();
			}

			$sql = "select * from users_info where user_id = ?";
			$stmt = mysqli_prepare($connection, $sql);
			mysqli_stmt_bind_param($stmt, "i", $param_id);
			$param_id = $_SESSION['id'];
			if (mysqli_stmt_execute($stmt)) {
				if (mysqli_stmt_store_result($stmt)) {
					if (mysqli_stmt_num_rows($stmt) == 0) {

						$name = htmlspecialchars($_POST['name']);
						$title = htmlspecialchars($_POST['title']);
						$address = htmlspecialchars($_POST['address']);
						$mobile = htmlspecialchars($_POST['mobile']);
						$image = htmlspecialchars($_POST['image']);
						$insert_sql = "insert into users_info(user_id,name,title,address,mobile,image) values(?,?,?,?,?,?)";
						$insert_stmt = mysqli_prepare($connection, $insert_sql);
						mysqli_stmt_bind_param($insert_stmt, "isssss", $param_userid, $param_name, $param_title, $param_address, $param_mobile, $param_image);
						$param_userid = $_SESSION['id'];
						$param_name = $name;
						$param_title = $title;
						$param_address = $address;
						$param_mobile = $mobile;
						$param_image = $image;
						if (mysqli_stmt_execute($insert_stmt)) {
							$_SESSION["title"] = $title;
							$_SESSION["image"] = $image;
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
		} else{echo "Req data eror!";}
	}else{
		echo "Post method not working!";
	}
} else {
	header("location: " . LINK . "views/pages/auth/auth.php?p=1");
	die();
}
