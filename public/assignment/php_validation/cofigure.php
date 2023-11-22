<?php

$servername="localhost";
$username="root";
$passcode="";
$dbname="studentsdata";

$conn = new mysqli($servername,$username,$passcode,$dbname);

if(!$conn){
    die(mysqli_error($conn));
}

?>