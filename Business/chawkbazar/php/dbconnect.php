<?php
//error_reporting(0);
ob_start();
session_start();
$siteName = "serveritstudio.com";

DEFINE("BASE_URL","http://localhost/serverit/business");

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PSWD', ''); 
DEFINE ('DB_HOST', 'localhost'); 
DEFINE ('DB_NAME', 'server_it_chawkbazar'); 

date_default_timezone_set('Asia/Dhaka'); 
$conn =  new mysqli(DB_HOST,DB_USER,DB_PSWD,DB_NAME);
if($conn->connect_error)
die("Failed to connect database ".$conn->connect_error );