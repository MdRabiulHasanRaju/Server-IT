<?php

    $servername="localhost";
    $uname="root";
    $pass="";
    $database="server_it_admin";

    $conn=mysqli_connect($servername,$uname,$pass,$database);

if(!$conn){
    die("Connection Failed");
}

    $sql = "SELECT * FROM student WHERE delete_status = '1'";
    $query = $conn->query($sql);
    echo "$query->num_rows";
?>