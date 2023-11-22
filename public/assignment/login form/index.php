<?php 
include("head.php");

$alt=$name=$email=$password='';

if($_SERVER['REQUEST_METHOD'] == 'POST'){  
  
  include("data.php");
    $name=trim($_POST['name']);
    $email=trim($_POST['email']);
    $password=trim($_POST['password']);


    if(empty($name)|| empty($email) ||empty($password)){

        $alt="Enter all the fields ";

    }else{
            $sql="INSERT INTO students_data (student_name,email_id,user_pwd)
            VALUES('$name','$email','$password')";
            
            $result=mysqli_query($conn,$sql);        

            if($result  == true ){
              //  echo "data insert ";      
            header("location:login.php");
            exit;  
             }else{     
              
             
                echo "data not insert".$conn->error;            
        }        
    }
}



?>


  <body>
   <div class="main">   
     <div class="container"> 

      <form action="index.php"  method="post">       
       <label for="chk" class="d-flex justify-content-center">Sign up</label>
       <input type="text" name="name" placeholder="Username" value="<?php  echo   $name; ?>">
       <input type="email" name="email" placeholder="Email" value="<?php  echo   $email; ?>" >
       <input type="password" name="password" placeholder="Password" value="<?php  echo   $password; ?>"> 
       
         
       
       <button type="submit">Sign up</button>       
       <p  class="d-flex justify-content-center">Already have an account?<span class="mx-1"><a href="login.php" class="text-light"> Login</a></span> </p>
      </form>
      </div>
      <?php  echo '<div class="text-danger mt-2 h4 d-flex justify-content-center">'.$alt.'</div>'; ?>
  
     
   </div>
  </body>
  </html>

  
  