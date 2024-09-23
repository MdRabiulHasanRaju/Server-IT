<?php
if (!isset($connection)) {
    include $_SERVER['DOCUMENT_ROOT'] . "/serverit/lib/Database.php";
}

DEFINE('DB_PSWD', '');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME1', 'server_it_chawkbazar');

date_default_timezone_set('Asia/Dhaka');
$conn =  new mysqli(DB_HOST, DB_USER, DB_PSWD, DB_NAME1);
if ($conn->connect_error)
    die("Failed to connect database " . $conn->connect_error);


$month = $_POST['monthAmount'];
$year = $_POST['yearAmount'];
$amount_expense = 0;
$dateSql = "SELECT `amount`,`date` FROM `expense`";
$dateStmt = $conn->query($dateSql);
while ($date_r = $dateStmt->fetch_assoc()) {

    $r_month = date("M", strtotime($date_r['date']));
    $r_year = date("y", strtotime($date_r['date']));
    if ($month == $r_month && $year == $r_year) {
        $amount_expense = $amount_expense + (int)$date_r['amount'];
    }
}
echo json_encode(array(
    'success'=>"1",
    'success_msg'=>$month .' '.$year. ' = ' . $amount_expense . " ৳",
    'search_input'=>$month .' '.$year,
));