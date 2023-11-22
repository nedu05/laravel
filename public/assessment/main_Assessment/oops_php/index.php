<?php
session_start();
ob_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <style>
     .bg {

            background-image: url("./images/front.jpg");
            height: 100vh; 
            width: auto;
            background-size: cover; 
            background-repeat: no-repeat;
     }
    </style>
</head>

<?php




include("config.php");
$_SESSION['def_url']=$_SERVER['REQUEST_URI'];

if(isset($_SESSION['name']) && $_SESSION['status'] == 0 ){  

 $err='';

$name=$id=$search="";
$name = $_SESSION['name'];
$id = $_SESSION['id'];

if(isset($_GET['submit'])){
    $search=$_GET['search'];
 

    $sql = "SELECT * FROM `dict_words_data` WHERE words='$search' AND status=1";

    $resq=mysqli_query($conn,$sql);
    $num=mysqli_fetch_assoc($resq);

if($num){

    header("location:./$search");   
    ob_end_flush();

}else{

    $sql = "SELECT * FROM `dict_words_data` WHERE words='$search' AND username='$name'";

    $resq=mysqli_query($conn,$sql);
    $num=mysqli_fetch_assoc($resq);
     
        if($num){
            header("location:./$search");
            ob_end_flush();

        }else{            
         
            header("location:./error.php");
            ob_end_flush();

        }
}
}

?>



<body class="bg">
    <div class="container-fluid " >
        <div class="row mb-5 text-light " >
            
            <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
                
                <div class="col d-flex justify-content-center ">
                    <h3>Dictionary</h3>
                </div>

            <div class="col d-flex justify-content-center">
                <h3>Welcome <span><?php echo strtoupper($name); ?> </span>                    
                <a href="./upload.php"><button class="btn btn-info ms-2">+</button></a>
                <a href="./logout.php" class="btn btn-danger ms-2 fs-6">logout</a>
             
                </h3>
            </div>

        </div>
    </nav>

        <div class="d-flex justify-content-center ">  
        
            <form action="" method="get">
                <label ><div><h4 class="text-light"> Search Word Here</h4></div></label><br>
                <input type="text" placeholder="Enter the word to search...." name="search" class="rounded-5 p-2" value="<?php echo $search;  ?>" required>
                <div class="mx-4 mt-3">
                    <input type="submit" name="submit" class="btn btn-warning rounded-5 px-5" value="search">

                </div>
    
            </form>
        </div>
        <h3 class="text-danger text-center"> <?php echo $err; ?> </h3>
    </div>
<?php
    
}else{   


if(isset($_GET['submit'])){
    
    $search=trim($_GET['gsearch']);



        $sql = "SELECT * FROM `dict_words_data` WHERE words='$search' AND status=1";
    
    $resq=mysqli_query($conn,$sql);
    $num=mysqli_fetch_assoc($resq);
    
    if($num){
        
        $_SESSION['get_url']=$_SERVER['REQUEST_URI'];      
           
        
        header("location:./$search");
        ob_end_flush();

        }else{     
            
            header("location:./error.php");
            ob_end_flush();
        }
      
}
?>

<div class="container-fluid bg" >
        <div class="row mb-5 text-light" >            
            <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">                
                <div class="col d-flex justify-content-center ">
                    <h1>Dictionary</h1>
                </div>
            <div class="col d-flex justify-content-center">
            <span class="mx-2"><a href="./login.php" class="btn btn-info text-light">login</a></span>
           <a href="./signup.php" class="btn btn-warning text-light">register</a>             
            </div>
        </div>
    </nav>


    <div class="row text-center"> 
        
            <form action="index.php" method="get">
                <h4 class="mt-5 text-light">Search Word Here</h4>
                <input type="search" name="gsearch" class="w-25 p-2 rounded-3" placeholder="Enter the word to search . . ."  required>
                <div class="mx-4  mt-3">
                <input type="submit" name="submit" class="btn btn-warning fs-5 rounded-3 px-5 " value="Search" >
                </div>
            </form>
    </div>
</div>
</body>
</html>

<?php

}
?>