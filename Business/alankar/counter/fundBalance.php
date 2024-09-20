<?php

$servername = "localhost";
$uname = "root";
$pass = "";
$database = "server_it_admin";

$conn = mysqli_connect($servername, $uname, $pass, $database);

if (!$conn) {
    die("Connection Failed");
}

// $sql = "SELECT * FROM grade";
// $query = $conn->query($sql);
// echo "$query->num_rows";


$allMonth = [
    "Jan",
    "Fab",
    "Mar",
    "Apr",
    "May",
    "Jun",
    "Jul",
    "Aug",
    "Sep",
    "Oct",
    "Nov",
    "Dec"
];
$years = [
    "24",
    "25",
    // "26",
    // "27",
    // "28",
    // "29",
    // "30",
    // "31",
    // "32",
    // "33"
];

//get monthly income 
function calculateIncome($month,$year,$conn){
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
    return $amount_income;
    
};
//get income from April 2024 to current
$amount = 0;
foreach ($years as $y) {
    foreach ($allMonth as $m) {
        if(!(($m=="Jan" && $y == "24") || ($m=="Fab" && $y == "24") || ($m=="Mar" && $y == "24"))){
            $amount = $amount + calculateIncome($m,$y,$conn);
        }
    }
}
//get total expense
$total_sql = "SELECT SUM( amount) FROM expense";
$totalAmountStmt = $conn->query($total_sql);
$totalExpense = $totalAmountStmt->fetch_assoc();
echo $amount-$totalExpense['SUM( amount)'].' ৳';
?>