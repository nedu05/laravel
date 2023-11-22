<?php

$alt=$name=$email=$password='';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    include  ('cofigure.php');

    $name=trim($_POST['name']);
    $email=trim($_POST['email']);
    $password=trim($_POST['password']);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if(empty($name)|| empty($email) ||empty($password)){

        $alt="Enter all the fields ";

    }else{
            $sql="INSERT INTO studentlist (username,email,pwd)
            VALUES('$name','$email','$hashed_password')";
            $result=mysqli_query($conn,$sql);

            if($result  == true ){
               echo "data insert";      
            header("location:login.php");
            exit;  
              }else{       
                echo "data not insert".$conn->error;            
                } 
        }
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



<form  method="post" >
<h2 class="text-danger opacity-75 ">Signup Form</h2><br>
<input type="text" name="name"  placeholder="Enter your name"  value="<?php  echo   $name; ?>"> <span class="text-danger">*</span><br><br>
<input type="email" name="email" placeholder="email" value="<?php  echo   $email; ?>"> <span class="text-danger">*</span> <br><br>
<input type="password" name="password" placeholder="password" value="<?php  echo   $password; ?>"> <span class="text-danger">*</span> <br><br>
<input type="submit" value="signup" name="submit" class="btn btn-info fs-5 text-light">
</form>

<div class="m-3">
<small class="text-light fs-5">Already have an account? <span><a href="login.php" class="text-dark">login</a></span></small>
</div>

<?php  echo '<div class="text-danger mt-2 h4">'.$alt.'</div>'; ?>

</div>

</body>
</html>

