<?php
if (!isset($connection)) {
    include $_SERVER['DOCUMENT_ROOT'] . "/serverit/lib/Database.php";
}

DEFINE('DB_PSWD', '');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME1', 'server_it_admin');

date_default_timezone_set('Asia/Dhaka');
$conn =  new mysqli(DB_HOST, DB_USER, DB_PSWD, DB_NAME1);
if ($conn->connect_error)
    die("Failed to connect database " . $conn->connect_error);


$month = $_POST['monthAmount'];
$year = $_POST['yearAmount'];
$amount_income = 0;
$dateSql = "SELECT `paid`,`submitdate` FROM `fees_transaction`";
$dateStmt = $conn->query($dateSql);
while ($date_r = $dateStmt->fetch_assoc()) {

    $r_month = date("M", strtotime($date_r['submitdate']));
    $r_year = date("y", strtotime($date_r['submitdate']));
    if ($month == $r_month && $year == $r_year) {
        $amount_income = $amount_income + (int)$date_r['paid'];
    }
}
echo json_encode(array(
    'success'=>"1",
    'success_msg'=>$month .' '.$year. ' = ' . $amount_income . " ৳",
));