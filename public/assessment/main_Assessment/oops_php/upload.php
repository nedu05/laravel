<?php
session_start();
ob_start();
include("config.php");
$mss=$err='';


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
   $foldername='images';



if(move_uploaded_file($tempname,$foldername.'/'.$file)){
    $img=$foldername.'/'.$file;
  
    
    $sql ="INSERT INTO `dict_words_data` (words,username,word_img) VALUES ('$word','$name','$img')";
    $result=mysqli_query($conn,$sql);
if($result){

    $mss="file uploaded successfully";
}
}else{
    $err=" file upload error";
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
    <style>
       body{
      background-image: url("./images/view.png");
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

    <div><h5 class="text-warning">Add word Here</h5></div>
    <div> <input type="text" name="word" class="w-25 p-2" ></div>
    <div class="mt-3"><input type="file" name="fileUpload"  class="bg-secondary p-2 text-light" ></div>
    <input type="submit" value="Add" name="submit" class="btn btn-secondary mt-4 px-3">
    
    <a href="./index.php" class="btn btn-danger ms-5 mt-4">back</a>
</form>  

  <p  class="text-success h3"><?php  echo $mss;?></p>
  <p  class="text-danger h3"><?php  echo $err;?></p>

</div>

<div class="container m-5">
<div>

</div>
</div>
</body>
</html>