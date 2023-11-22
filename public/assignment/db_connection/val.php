<?php


$alt=$name=$email=$password='';
// $alt='';
// $name='';
// $email='';
// $password='';
include ('cofigure.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){


    $name=trim($_POST['name']);
    $email=trim($_POST['email']);
    $password=trim($_POST['password']);

    if(empty($name)|| empty($email) ||empty($password)){

        $alt="enter all the data";

    }else{


        $sql="INSERT INTO studentlist (username,email,pwd)
        VALUES('$name','$email','$password')";
        $result=mysqli_query($conn,$sql);
        if($result){
           echo "data insert";      
        header("location:index.php");
        exit;  
         }else{       
            echo "data not insert".$conn->error;
        }  
    }
    }
?>