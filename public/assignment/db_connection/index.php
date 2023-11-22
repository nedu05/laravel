<?php
$alt=$name=$email=$password='';


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    include ('cofigure.php');

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
        // header("location:login.php");
        // exit;  
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
    <link rel="stylesheet" href="./bootstrap.min.css">
</head>
<body>
<div class="container my-5 text-center ">


<?php  echo '<div class="text-danger mt-2">'.$alt.'</div>'; ?>

<form action='val.php' method="post">
<input type="text" name="name" placeholder="studentname"  value="<?php  echo   $name; ?>"> <br><br>
<input type="email" name="email" placeholder="email" value="<?php  echo   $email; ?>"><br><br>
<input type="password" name="password" placeholder="password" value="<?php  echo   $password; ?>"><br><br>
<input type="submit" value="signup">
</form>

<div class="m-3">
<small >Already have an account? <span><a href="login.php">login</a></span></small>
</div>
</div>

</body>
</html>

