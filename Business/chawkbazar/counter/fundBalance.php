<?php

$servername = "localhost";
$uname = "root";
$pass = "";
$database = "server_it_chawkbazar";

$conn = mysqli_connect($servername, $uname, $pass, $database);

if (!$conn) {
    die("Connection Failed");
}

// $sql = "SELECT * FROM grade";
// $query = $conn->query($sql);
// echo "$query->num_rows";

//get total income
$total_income_sql = "SELECT SUM( paid) FROM fees_transaction";
$total_incomeStmt = $conn->query($total_income_sql);
$total_income = $total_incomeStmt->fetch_assoc();
$total_income['SUM( paid)'];

//get total expense
$total_sql = "SELECT SUM( amount) FROM expense";
$totalAmountStmt = $conn->query($total_sql);
$totalExpense = $totalAmountStmt->fetch_assoc();

echo $fund = $total_income['SUM( paid)']-$totalExpense['SUM( amount)'].' ৳';
?>