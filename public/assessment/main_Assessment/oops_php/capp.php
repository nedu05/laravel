<?php
ob_start();
include("config.php");

if(isset($_GET['cap_id'])){
    $wd_id=$_GET['cap_id'];
    
    
    $sql = "UPDATE `dict_comments_data` SET status=1 WHERE com_id=$wd_id";
    $result =mysqli_query($conn,$sql);
    if($result){
        echo "ok";
        header("location:./comment.php");
        ob_end_flush();
    }else{
        echo "error".$conn->error;
    }    
}


?>