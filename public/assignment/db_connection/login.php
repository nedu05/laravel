<?php
$name=$password=$err='';
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include ('cofigure.php');

    $name=trim($_POST['username']);
    $password=trim($_POST['password']);  

    $sql="SELECT * FROM studentlist WHERE  username='$name' AND pwd ='$password'";

    $reqq=mysqli_query($conn,$sql);

    if(empty($name) || empty($password)){
        echo "fill the field";
            }else{
                if($reqq){
                    $num=mysqli_fetch_assoc($reqq);
                   
                    if($num>0){    
                        $_SESSION['name']=$name;                   
                        $_SESSION['id']=$num['id'];                   
                        
                           header("location:home.php");
                           echo "you login now!";
                           exit();
                    }else{
                       $err="invalid username or password";
                    }
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
</head>
<body>

<?php  echo $err; ?>
<form action="login.php" method="post">
<input type="text" name="username" placeholder="user_name"   value="<?php  echo   $name; ?>"><br><br>
<input type="password" name="password" placeholder="password"  value="<?php  echo  $password; ?>"><br><br>
<input type="submit" value="login" name="submit">
</form>

<small>you don't have an account?</small><a href="index.php">signup</a>

</body>
</html>





