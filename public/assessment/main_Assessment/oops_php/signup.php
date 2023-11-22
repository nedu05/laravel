<?php 
ob_start();
session_start();
include("head.php");
$alt=$name=$email=$password=$msg='';





if($_SERVER['REQUEST_METHOD'] == 'POST' ){  
    
    include("config.php");
    
    $name=trim($_POST['name']);
    $email=trim($_POST['email']);
    $password=trim($_POST['password']);
    $hashed_password=md5($password);

   $def_url=$_SESSION['get_url'];

    $url=$_SESSION['get_url'];


 

    if(empty($name)|| empty($email) ||empty($password)){

        $alt="Enter all the fields ";

    }else{
            $sql="INSERT INTO `dict_students_data` (student_name,email_id,user_pwd,u_entry,df_url)
            VALUES('$name','$email','$hashed_password','$url','$def_url')";
            $result=mysqli_query($conn,$sql);        

            if($result  == true ){
             session_destroy();        
            header("location:./login.php");
            ob_end_flush();
           
            // header("location:./login.php");
             
             }else{                   
             
                echo "data not insert".$conn->errno;            
        }        
    }
}



?>
<style>
        body{
           background-color: plum;
        }
    </style>

  <body>
   <div class="main">   
     <div class="container"> 

      <form action="signup.php"  method="post">       
       <label for="chk" class="d-flex justify-content-center">Sign up</label>
       <input type="text" name="name" placeholder="Username" value="<?php  echo   $name; ?>">
       <input type="email" name="email" placeholder="Email" value="<?php  echo   $email; ?>" >
       <input type="password" name="password" placeholder="Password" value="<?php  echo   $password; ?>"> 
       
         
       
       <button type="submit">Sign up</button>       
       <p  class="d-flex justify-content-center">Already have an account?<span class="mx-1"><a href="./login.php" class="text-light"> Login</a></span> </p>
       <p  class="d-flex justify-content-center"><span class="mx-1"><a href="./index.php" class="text-light btn btn-info"> guest user</a></span> </p>
      </form>
      </div>
      <?php  echo '<div class="text-danger mt-2 h4 d-flex justify-content-center">'.$alt.'</div>'; ?>
      <?php  echo '<div class="text-success mt-2 h4 d-flex justify-content-center">'.$msg.'</div>'; ?>
  
     
   </div>
  </body>
  </html>

  
  