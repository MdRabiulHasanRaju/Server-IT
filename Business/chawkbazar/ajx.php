<?php

include("php/dbconnect.php");

if($_GET['type'] == 'studentname'){
	$_GET['name_startsWith'] = substr($_GET['name_startsWith'],5);
	$result = $conn->query("SELECT sname,id FROM student where balance>0 and (sname LIKE '%".$_GET['name_startsWith']."%' or id LIKE '%".$_GET['name_startsWith']."%')   ");	
	$data = array();
	while ($row = $result->fetch_assoc()) {
		//array_push($data, $row['sname'].'-'.$row['id']);	
		// array_push($data, $row['sname']);	
		array_push($data, "SIT20".$row['id']);	
	}	
	echo json_encode($data);
}


if($_GET['type'] == 'report'){
	$_GET['name_startsWith'] = substr($_GET['name_startsWith'],5);
	$result = $conn->query("SELECT sname,id FROM student where (sname LIKE '%".$_GET['name_startsWith']."%' or id LIKE '%".$_GET['name_startsWith']."%')   ");	
	$data = array();
	while ($row = $result->fetch_assoc()) {
		//array_push($data, $row['sname'].'-'.$row['id']);	
		// array_push($data, $row['sname']);	
		array_push($data, "SIT20".$row['id']);	
	}	
	echo json_encode($data);
}


?>