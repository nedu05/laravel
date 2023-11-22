<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    include ('cofigure.php');

    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST["password"];


    $sql="INSERT INTO studentlist (studentname,email,pwd)
    VALUES('$name','$email','$password')";
    $result=mysqli_query($conn,$sql);
    if($result){
       echo "data insert"; 
       
    //    header("location : login.php");
     }else{       
        echo "data not insert".$conn->errno;
    }  
// print_r( mysqli_fetch_assoc($result));


    }
?>



<?php
session_start();

$id=$_SESSION['id'];
print_r($_FILES['upload']);

include ('cofigure.php');

if(isset($_POST['submit'])){   
    

    $img=$_POST['upload'];    
    
    $sql="UPDATE  studentlist SET img='$img' WHERE id=$id";
    $reso=mysqli_query($conn,$sql);

    if($reso){
        // echo "insert";
    }else{
        echo "not insert <br><br> ".$conn->error;

    }
    
}

?>