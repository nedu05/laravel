<?php
$servername='192.168.7.254';
$user_name='nedumaran_juntrdev_usr';
$pass_word='mtd8MI8lglFViK8W';
$database="nedumaran_juntrdev_db";
$port_no='42209';

$conn = new mysqli($servername,$user_name,$pass_word,$database,$port_no);

if(!$conn){
   die("connection".$conn->error);
}

?>


