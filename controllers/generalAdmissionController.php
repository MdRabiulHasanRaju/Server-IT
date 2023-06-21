<?php
include $_SERVER['DOCUMENT_ROOT'] . "/serverit/utility/Baseurl.php";
$baseurl = new Baseurl;
define("LINK", "{$baseurl->url()}/serverit/");
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["mobile"]) && isset($_POST["getCourseName"])) {
		function validate($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$err = "";
		$name = $email = $mobile = $getCourseName = $description = "";

		$name = validate($_POST["name"]);
		$email = validate($_POST['email']);
		$mobile = validate($_POST['mobile']);
		$getCourseName = validate($_POST["getCourseName"]);

		if (empty($_POST['name'])) {
			http_response_code(403);
			$err = "*Name is required!";
			echo json_encode(array('err' => $err));
			die();
		} else {
			$name = validate($_POST['name']);
		}

		$email = filter_var($email, FILTER_SANITIZE_EMAIL);

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			http_response_code(403);
			$err = "*Enter valid email address!";
			echo json_encode(array('err' => $err));
			die();
		}

		if (empty($_POST['email'])) {
			http_response_code(403);
			$err = "*Email is required!";
			echo json_encode(array('err' => $err));
			die();
		} else {
			$email = validate($_POST['email']);
		}

		if (empty($_POST['mobile'])) {
			http_response_code(403);
			$err = "*Phone number is required!";
			echo json_encode(array('err' => $err));
			die();
		} else {
			$mobile = validate($_POST['mobile']);
		}

		if (empty($_POST['getCourseName'])) {
			http_response_code(403);
			$err = "*Select a course!";
			echo json_encode(array('err' => $err));
			die();
		} else {
			$courseName = validate($_POST['getCourseName']);
		}

		if (empty($err)) {
			include $_SERVER['DOCUMENT_ROOT'] . "/serverit/lib/Database.php";
			$sql = "insert into admission_form (course_name,user_name,mobile,email) values(?,?,?,?)";
			$stmt = mysqli_prepare($connection,$sql);
			mysqli_stmt_bind_param($stmt,"ssss",$param_course,$param_name,$param_mobile,$param_email);
			$param_name = $name;
			$param_email = $email;
			$param_mobile = $mobile;
			$param_course = $courseName;
			if(mysqli_stmt_execute($stmt)){
				http_response_code(200);
				$message = "আমাদের একজন প্রতিনিধি শীঘ্রই আপনার সাথে যোগাযোগ করবে - Server IT Studio";
				echo json_encode(array('success' => $message));
			}else{
				http_response_code(403);
				$err = "Failed to get admission!";
				echo json_encode(array('success' => $err));
			}

		}
	}
}
