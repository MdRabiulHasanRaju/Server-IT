<?php
include $_SERVER['DOCUMENT_ROOT'] . "/serverit/utility/Baseurl.php";
$baseurl = new Baseurl;
define("LINK", "{$baseurl->url()}/serverit/");
$root = $_SERVER['DOCUMENT_ROOT'] . "/serverit";
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if (isset($_POST['image'])) {
            $prev_image = $_SESSION['image'];
			include_once $_SERVER['DOCUMENT_ROOT'] . "/serverit/lib/Database.php";

			$sql = "select image from users_info where user_id = ?";
			$stmt = mysqli_prepare($connection, $sql);
			mysqli_stmt_bind_param($stmt, "i", $param_id);
			$param_id = $_SESSION['id'];
			if (mysqli_stmt_execute($stmt)) {
				if (mysqli_stmt_store_result($stmt)) {
					if (mysqli_stmt_num_rows($stmt) == 1) {
                        $data = $_POST["image"];
						$insert_sql = "UPDATE users_info SET image=? WHERE user_id=?";
						$insert_stmt = mysqli_prepare($connection, $insert_sql);
						mysqli_stmt_bind_param($insert_stmt, "si", $param_image,$param_userid);
						$param_userid = $_SESSION['id'];
                        $data = $_POST['image'];
                        $image_array_1 = explode(";", $data);
                        $image_array_2 = explode(",", $image_array_1[1]);
                        $data = base64_decode($image_array_2[1]);
                        $imageName = "profile-image-" . rand(9999, 999999) . time() . '.png';
                        $destination = "../public/upload/".$imageName ;
						$param_image = $imageName;
						if (mysqli_stmt_execute($insert_stmt)) {
                            $imageLink = "$root/public/upload/$prev_image";
                            if (file_exists($imageLink)) {
                                $delImage = unlink($imageLink);
                                if (!$delImage) {
                                    echo "Image not deleted!";
                                    die();
                                }
                            }
							$_SESSION["image"] = $imageName;
                            file_put_contents($destination, $data);
                            echo "/serverit/public/upload/".$imageName;
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
	header("location: " . LINK . "views/pages/auth/auth.php?p=1");
	die();
}

?>