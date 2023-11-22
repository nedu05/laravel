<?php
$server= "localhost";
$username="root";
$password="";
$db="studentsdata";


$conn=new mysqli($server,$username,$password,$db);


if(!$conn){
    die("Connection failed: " . $conn->connect_error);
}


?>