<?php
ob_start();
include("config.php");

if(isset($_GET['del_id'])){
    $wd_id=$_GET['del_id']; 

    $sql="DELETE FROM `dict_comments_data` WHERE com_id=$wd_id";
    $result =mysqli_query($conn,$sql);
    if($result){
        header("location:./comment.php");
        ob_end_flush();
    }else{
        echo "error".$conn->error;
    }    
}

?>