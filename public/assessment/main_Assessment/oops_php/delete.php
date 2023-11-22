<?php
ob_start();
include("config.php");


if(isset($_GET['del_id'])){
    $wd_id=$_GET['del_id'];

    $sql = "SELECT word_img FROM `dict_words_data` WHERE word_id=$wd_id";
    $result =mysqli_query($conn,$sql);

    if($row = mysqli_fetch_assoc($result) >0){        
                 ;               
                   $img= $row['word_img'];                   
                   unlink($img);               
    }
    
    $sql2="DELETE  FROM `dict_words_data` WHERE word_id=$wd_id";
    $result2 =mysqli_query($conn,$sql2);
    if($result2){
        header("location:./wordtable.php");
        ob_end_flush();
    }else{
        echo "error".$conn->error;
    }  

}


?>