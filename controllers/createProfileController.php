<?php
include $_SERVER['DOCUMENT_ROOT'] . "/serverit/utility/Baseurl.php";
$baseurl = new Baseurl;
define("LINK", "{$baseurl->url()}/serverit/");
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	if (isset($_SESSION['name'])) {
		header("location: " . LINK . "profile");
		exit;
	}

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if (isset($_POST['submit']) && isset($_POST['name']) && isset($_POST['title']) && isset($_POST['address']) && isset($_POST['mobile']) || isset($_FILES['image'])) {


			include_once $_SERVER['DOCUMENT_ROOT'] . "/serverit/lib/Database.php";

			$name = $title = $address = $phone = $image = "";
			$name_err = $title_err = $address_err = $phone_err = $image_err = "";

			if (empty(trim($_POST["name"]))) {
				$name_err = "Name cannot be blank";
				$_SESSION["name_err"] = $name_err;
				header("location: " . LINK . "create-profile");
				die();
			}
			if (empty(trim($_POST["title"]))) {
				$title_err = "Name cannot be blank";
				$_SESSION["title_err"] = $title_err;
				header("location: " . LINK . "create-profile");
				die();
			}
			if (empty(trim($_POST["address"]))) {
				$address_err = "Name cannot be blank";
				$_SESSION["address_err"] = $address_err;
				header("location: " . LINK . "create-profile");
				die();
			}
			if (empty(trim($_POST["mobile"]))) {
				$phone_err = "Name cannot be blank";
				$_SESSION["phone_err"] = $phone_err;
				header("location: " . LINK . "create-profile");
				die();
			}

			if (isset($_FILES['image'])) {
				if (!file_exists($_FILES["image"]["tmp_name"])) {
					$image_err = "Please Choose an Image";
					$_SESSION["image_err"] = $image_err;
					header("location: " . LINK . "create-profile");
					die();
				}
			}

			$sql = "select name from users_info where user_id = ?";
			$stmt = mysqli_prepare($connection, $sql);
			mysqli_stmt_bind_param($stmt, "i", $param_id);
			$param_id = $_SESSION['id'];
			if (mysqli_stmt_execute($stmt)) {
				if (mysqli_stmt_store_result($stmt)) {
					mysqli_stmt_bind_result($stmt, $name);
					if (mysqli_stmt_fetch($stmt)) {
						if (empty($name)) {
							$name = htmlspecialchars($_POST['name']);
							$title = htmlspecialchars($_POST['title']);
							$address = htmlspecialchars($_POST['address']);
							$mobile = htmlspecialchars($_POST['mobile']);
							$insert_sql = "UPDATE users_info SET name=?,title=?,address=?,mobile=? WHERE user_id=?";
							$insert_stmt = mysqli_prepare($connection, $insert_sql);
							mysqli_stmt_bind_param($insert_stmt, "ssssi", $param_name, $param_title, $param_address, $param_mobile,$param_userid);
							$param_userid = $_SESSION['id'];
							$param_name = $name;
							$param_title = $title;
							$param_address = $address;
							$param_mobile = $mobile;
							if (mysqli_stmt_execute($insert_stmt)) {
								$_SESSION["title"] = $title;
								$_SESSION["mobile"] = $mobile;
								$_SESSION["name"] = $name;
								$_SESSION["address"] = $address;
								header("location: " . LINK . "profile");
							}
						} else {
							header("location: " . LINK . "profile");
						}
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
	header("location: " . LINK . "auth?p=1");
	die();
}
