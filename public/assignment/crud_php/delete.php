<?php
include ('config.php');

if(isset($_GET['Del_id'])){
    $delid=$_GET['Del_id'];    
    $sql2="DELETE FROM studentsinfo WHERE id=$delid";

    $result=mysqli_query($conn,$sql2);

    if($result){   
        header("location:display.php");
    }else{
        echo "query is error";
    }
}

?>