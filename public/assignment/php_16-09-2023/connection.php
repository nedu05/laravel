<?php
$conn = new mysqli('localhost','root','','employees');
if(!$conn){
    echo "error occured".$conn->error;
}
?>