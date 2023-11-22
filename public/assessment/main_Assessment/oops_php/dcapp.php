<?php
ob_start();
include("config.php");

if(isset($_GET['dcap_id'])){
    $wd_id=$_GET['dcap_id'];
    
    
    $sql = "UPDATE `dict_comments_data` SET status=0 WHERE com_id=$wd_id";
    $result =mysqli_query($conn,$sql);
    if($result){
    
        header("location:./comment.php");
        ob_end_flush();
    }else{
        echo "error".$conn->error;
    }    
}


?>