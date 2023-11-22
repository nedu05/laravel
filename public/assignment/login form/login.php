<?php
include("head.php");

$name=$password=$err='';
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
   
      include("data.php");

    $name=trim($_POST['username']);
    $password=trim($_POST['password']); 


    
    $sql="SELECT * FROM students_data WHERE  student_name='$name' AND user_pwd ='$password'";
    
    $reqq=mysqli_query($conn,$sql);
    




    if(empty($name) || empty($password)){
        $err.= "Enter all the fields";
            }else{
                if($reqq){
                    $num=mysqli_fetch_assoc($reqq);
                   
                    if($num>0){    
                        $_SESSION['name']=$name;                   
                        $_SESSION['id']=$num['user_id'];                                            
                        
                           header("location:home.php");                         
                           exit();
                    }else{
                       $err.="Invalid username or password";
                    }
                       }                   
            }
        }




?>


<div class="main"> 

      <form action="login.php"  method="post">
       <label for="chk" aria-hidden="true" class="d-flex justify-content-center">Login</label>
       <input type="text" name="username" placeholder="Username" value="<?php  echo   $name; ?>" required>
       <input type="password" name="password" placeholder="Password"  value="<?php  echo   $password; ?>"required>
       <button >Login</button>
       <p  class="d-flex justify-content-center mt-3">Create an account <span class="mx-1 "> <a href="index.php" class="text-light">  signup</a></span></p>
      </form>
      <?php echo '<div class="text-danger mt-2 h4 d-flex justify-content-center ">'.$err.'</div>' ?>


</div>