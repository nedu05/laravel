<?php
$name=$password=$err='';
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include ('cofigure.php');

    $name=trim($_POST['username']);
    $password=trim($_POST['password']);  

    $sql="SELECT * FROM studentlist WHERE  username='$name'";

    $res=mysqli_query($conn,$sql);
 
    
    if(empty($name) || empty($password)){
        $err.= "Enter all the fields";
    }else{              
        
        
        $num=mysqli_fetch_assoc($res);
        $hashed_password=$num['pwd'];   


      if(password_verify($password, $hashed_password)){

        //  $num=mysqli_fetch_assoc($res);
                    
                    // if($num>0){    
                        $_SESSION['name']=$name;                   
                        $_SESSION['id']=$num['id'];    

// echo $num['id']; 
        

        header("location:home.php");
        exit();

                    // }

    }else{
        $err.="Invalid username or password";
    }

}
    
    
    
//     $sql="SELECT * FROM studentlist WHERE  username='$name' AND pwd ='$password'";
    
//         // password_verify($password, $hashed_password);
//         // $hashed_password=$num['pwd'];

//     $reqq=mysqli_query($conn,$sql);

// //     $num=mysqli_fetch_assoc($reqq);

// // print_r($num['username']);

//     if(empty($name) || empty($password)){
//         $err.= "Enter all the fields";
//             }else{

//                 if($reqq){

//                     $num=mysqli_fetch_assoc($reqq);
                    
//                     if($num>0){    
//                         $_SESSION['name']=$name;                   
//                         $_SESSION['id']=$num['id'];                   
                        
                    
                        
                        
//                            header("location:home.php");                         
//                            exit();
//                     }else{
//                         $err.="Invalid username or password";
                        
//                     }
//                        }                   
//             }
        }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">

</head>
<body>

<div class="container my-5 text-center signupPage p-3 w-25">
   
    <form action="login.php" method="post">
        <h2 class="text-danger opacity-75 ">Login Form</h2>
        <input type="text" name="username" placeholder="user_name" class="mt-4"  value="<?php  echo   $name; ?>"><br><br>
        <input type="password" name="password" placeholder="password"  value="<?php  echo  $password; ?>"><br><br>
        <input type="submit" value="login" name="submit" class="btn btn-info fs-5 text-light">
    </form>
    <small class="text-light fs-5" >you don't have an account? <span><a href="index.php" class="text-dark">signup</a></span></small>
    
    <div class="text-center">
    <?php echo '<div class="text-danger mt-2 h4">'.$err.'</div>' ?>
    </div>
    
</div>


</body>
</html>





