<?php
ob_start();
include ("head.php");
$name=$password=$err='';
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include ('config.php');

    $name=trim($_POST['username']);
    $password=trim($_POST['password']);  
    $aa= md5($password);
    $_SESSION['name']=$name;   
    $sql="SELECT * FROM `dict_students_data` WHERE  student_name='$name' AND user_pwd='$aa'";

    $res=mysqli_query($conn,$sql);   
        if($num=mysqli_fetch_assoc($res)){  
        $admin = $num['is_admin'];  
        if($admin == 1){
            $_SESSION['status']=$num['is_admin'];  
            header("location:./wordtable.php");
            ob_end_flush();
        }else{     
                             
            $_SESSION['id']=$num['user_id']; 
            $_SESSION['status']=$num['is_admin'];     
        header("location:./index.php");
        ob_end_flush();
   
     
        }  
    }
    else{
        $err.="Invalid username or password";
    }

}
?>

<style>
        body{
           background-color: plum;
        }
    </style>
<div class="main "> 

      <form action="login.php"  method="post">
       <label for="chk" aria-hidden="true" class="d-flex justify-content-center">Login</label>
       <input type="text" name="username" placeholder="Username" value="<?php  echo   $name; ?>" required>
       <input type="password" name="password" placeholder="Password"  value="<?php  echo   $password; ?>"required>
       <button >Login</button>
       <p  class="d-flex justify-content-center mt-3">Create an account <span class="mx-1 "> <a href="signup.php" class="text-light">  signup</a></span></p>
       <p  class="d-flex justify-content-center mt-3"><span class="mx-1 "> <a href="index.php" class="text-light btn btn-info">guest user</a></span></p>
      </form>
      <?php echo '<div class="text-danger mt-2 h4 d-flex justify-content-center  " >'.$err.'</div>' ?>


</div>