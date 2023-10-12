<?php

    $servername="localhost";
    $uname="root";
    $pass="";
    $database="server_it_admin";

    $conn=mysqli_connect($servername,$uname,$pass,$database);

if(!$conn){
    die("Connection Failed");
}

    $sql = "SELECT * FROM student";
    $query = $conn->query($sql);
    echo "$query->num_rows";
?>