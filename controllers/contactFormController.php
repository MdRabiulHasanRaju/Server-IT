<?php
include $_SERVER['DOCUMENT_ROOT'] . "/serverit/utility/Baseurl.php";
$baseurl = new Baseurl;
define("LINK", "{$baseurl->url()}/serverit/");
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["mobile"]) && isset($_POST["getCourseName"]) && isset($_POST["description"])) {
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
		$description = validate($_POST['description']);

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

		if (empty($_POST['description'])) {
			http_response_code(403);
			$err = "*Description message is required!";
			echo json_encode(array('err' => $err));
			die();
		} else {
			$description = validate($_POST['description']);
		}
		if (empty($err)) {
			include $_SERVER['DOCUMENT_ROOT'] . "/serverit/lib/Database.php";
			$sql = "insert into customer_queries_form (name,email,mobile,course_name,message) values(?,?,?,?,?)";
			$stmt = mysqli_prepare($connection,$sql);
			mysqli_stmt_bind_param($stmt,"sssss",$param_name,$param_email,$param_mobile,$param_course,$param_message);
			$param_name = $name;
			$param_email = $email;
			$param_mobile = $mobile;
			$param_course = $courseName;
			$param_message = $description;
			if(mysqli_stmt_execute($stmt)){
				http_response_code(200);
				$message = "Thanks for being awesome! <br><br>

				We have received your message and would like to thank you for writing to us. If your inquiry is urgent, please use the telephone number listed below to talk to one of our staff members. <br><br>
				
				Otherwise, we will reply by email as soon as possible.<br><br>
				
				Talk to you soon - Server IT Studio";
				echo json_encode(array('success' => $message));
			}else{
				http_response_code(403);
				$err = "Failed to sent message!";
				echo json_encode(array('success' => $err));
			}

		}
	}
}
