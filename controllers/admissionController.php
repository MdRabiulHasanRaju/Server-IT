<?php
include $_SERVER['DOCUMENT_ROOT'] . "/serverit/utility/Baseurl.php";
$baseurl = new Baseurl;
define("LINK", "{$baseurl->url()}/serverit/");
$root = $_SERVER['DOCUMENT_ROOT'] . "/serverit";
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (isset($_POST["name"]) && isset($_POST["mobile"]) && isset($_POST["course_id"]) && isset($_POST["courseName"])
        ){
            include_once $_SERVER['DOCUMENT_ROOT'] . "/serverit/lib/Database.php";
            if (empty(trim($_POST["name"]))) {
                echo json_encode(array(
                    'name' => 0,
                    'error_msg' => "Name cannot be blank"
                ));
                die();
            }
            if (empty(trim($_POST["mobile"]))) {
                echo json_encode(array(
                    'mobile' => 0,
                    'error_msg' => "Phone number cannot be blank",
                ));
                die();
            }
            $sql = "insert into admission_form (user_id,course_id,course_name,user_name,mobile,email) values(?,?,?,?,?,?)";
            $stmt = mysqli_prepare($connection,$sql);
            mysqli_stmt_bind_param($stmt,"iissss",$param_user_id,$param_couse_id,$param_course_name,$param_user_name,$param_mobile,$param_email);
            $param_user_id = $_SESSION['id'];
            $param_couse_id = htmlspecialchars(trim($_POST["course_id"]));
            $param_course_name = htmlspecialchars(trim($_POST["courseName"]));
            $param_user_name = htmlspecialchars(trim($_POST["name"]));
            $param_mobile = htmlspecialchars(trim($_POST["mobile"]));
            $param_email = $_SESSION['username'];

            if(mysqli_stmt_execute($stmt)){
                echo json_encode(array(
                    'success'=>"1",
                    'success_msg'=>"".LINK."profile",
                ));
            }else{
                echo "An Error Occured!";
            }

        } else {
            echo "red data error";
        }
    } else {
        echo "Post method not working!";
    }
} else {
    echo LINK."auth/1";
    die();
}
