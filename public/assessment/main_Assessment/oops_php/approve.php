<?php
ob_start();
include("config.php");

if(isset($_GET['app_id'])){
    $wd_id=$_GET['app_id'];
    
    $sql = "UPDATE `dict_words_data` SET status=1 WHERE word_id=$wd_id";
    $result =mysqli_query($conn,$sql);
    if($result){
        header("location:./wordtable.php");
        ob_end_flush();
    }else{
        echo "error".$conn->error;
    }    
}


?>