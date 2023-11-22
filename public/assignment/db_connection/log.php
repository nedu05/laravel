<?php
include ('cofigure.php');


session_start();

// if(isset($_POST['name'])) 
if(isset($_POST['email']) && isset($_POST['password']) ){
    $email=($_POST['email']);
    $password=($_POST['password']);

    if(empty($email)){
        // echo "email is required";
       header("location:login.php?error=email field is empty");
       exit();   
    }elseif(empty($password)){
        header("location:login.php?error=password field is empty");
       exit(); 
    }else{
        $sql2="SELECT *FROM studentlist WHERE email='$email' AND passcode='$password'";
        $result2=mysqli_query($conn,$sql2);

        if(mysqli_num_rows($result2)){

            $row=mysqli_fetch_assoc($result2);
            if($row['email' ==='$email'] && $row['passcode' ==='$password']){

                $_SESSION['email']=$row['email'];
                $_SESSION['id']=$row['id'];
                header("location:home.php");
                exit();
            }else{
                echo "error has occured";
                exit();
            }

        }

    }

}

?>