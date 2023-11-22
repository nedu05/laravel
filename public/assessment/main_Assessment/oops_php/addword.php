<?php

session_start();
ob_start();
include("admin.php");
include("config.php");

$success=$err='';

if(isset($_SESSION['name'])){
    $name = $_SESSION['name'];
  
  }else{
    header("location:./index.php");
    ob_end_flush();

  }


if(isset($_POST['submit'])){

       $tempname=$_FILES["fileUpload"]['tmp_name'];
       $file=$_FILES["fileUpload"]['name'];
    
        $word=$_POST['word'];
        $name=$_SESSION['name'];
       
        $foldername='images';   

     
        if(move_uploaded_file($tempname,$foldername.'/'.$file)){
        $img=$foldername.'/'.$file;       
        $sql ="INSERT INTO `dict_words_data` (words,username,word_img) VALUES ('$word','$name','$img')";
        $result=mysqli_query($conn,$sql);

       if($result){    
        $success ="file uploaded successfully";
       }
       }else{
        $err="file not upload";
      
    }}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <style>
       body{
      background-image: url("./images/background.jpg");
      height: 100vh; 
      width: auto;
      background-size: cover; 
      background-repeat: no-repeat;
        }
    </style>
</head>
<body>
    <div class="container mt-5 text-center">
    <form action="" method="post" enctype="multipart/form-data">

<div><h5 class="text-warning">ADD WORDS HERE</h5></div>
   <div> <input type="text" name="word" class="w-25 p-2" placeholder="ADD WORDS ... " required></div>
  <div class="mt-3"><input type="file" name="fileUpload"  class="bg-secondary p-2 text-light" ></div>
  <input type="submit" value="Add" name="submit" class="btn btn-secondary mt-2 px-3">
</form><br><br>
     
    <?php  echo' <div class="text-success h5" >'.$success.'</div>' ;  ?>
    <?php  echo' <div class="text-danger h1" >'.$err.'</div>' ;  ?>


    </div>
</body>
</html>