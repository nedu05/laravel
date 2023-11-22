<?php
session_start();
include("admin.php");
include("config.php");
$err='';
$arr_emp=[];


if(isset($_SESSION['name'])){
  $name = $_SESSION['name'];
}else{
  header("location:./index.php");
  ob_end_flush();
}



if(isset($_POST['submit'])){
    $word_id=$_POST['word_id'];
    $word=$_POST['word'];
    $opt=$_POST['option'];

  if( $opt == "synonyms"){
    array_push($arr_emp,$word);
    
    $storing=json_encode($arr_emp); 
    $sql2="SELECT * FROM `dict_words_data`  WHERE  word_id=$word_id";

    $result1=mysqli_query($conn,$sql2);
    $row=mysqli_fetch_assoc( $result1);
      $val=$row['synonyms'];

    if($val == NULL){
        $sql = " UPDATE  `dict_words_data` SET synonyms='$storing' WHERE word_id=$word_id";    
        $res=mysqli_query($conn,$sql);               
    }else{

        $ff=json_decode($val,true); 
        foreach($arr_emp as $ass){
              array_push($ff,$ass);
   
        }
                $enc=json_encode($ff);         

                $sql = " UPDATE  `dict_words_data` SET synonyms='$enc' WHERE word_id=$word_id";    
                $res=mysqli_query($conn,$sql);      

    }
  }else if($opt == "antonyms"){

    array_push($arr_emp,$word);   
    $storing=json_encode($arr_emp); 
    $sql2="SELECT * FROM `dict_words_data`  WHERE  word_id=$word_id";
    $result1=mysqli_query($conn,$sql2);
    $row=mysqli_fetch_assoc( $result1);
    $val=$row['antonyms'];

    if($val == NULL){
        $sql = " UPDATE  `dict_words_data` SET antonyms='$storing' WHERE word_id=$word_id";    
        $res=mysqli_query($conn,$sql);               
    }else{

        $ff=json_decode($val,true); 
        foreach($arr_emp as $ass){
              array_push($ff,$ass);
   
        }
                $enc=json_encode($ff);  
                $sql = " UPDATE  `dict_words_data` SET antonyms='$enc' WHERE word_id=$word_id";    
                $res=mysqli_query($conn,$sql);      

    }

  }else{

    $err="select any option";

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
      background-image: url("./images/background.jpg");
      height: 100vh; 
      width: auto;
      background-size: cover; 
      background-repeat: no-repeat;
        }
     
    </style>
</head>
<body>
    
<div class="container text-center">
 
<h1 class="text-warning mt-4"> Add Synonyms / Antonyms Here</h1>
<form action="" method="post"  enctype="multipart/form-data">
    
<input type="text" placeholder="Enter Word ID" class="mt-3 p-2 w-25" name="word_id"  required><br>
<input type="text" placeholder="Enter Word " class="mt-3 p-2 w-25" name="word" required><br>

<label for="option"></label>
<select name="option" class="w-25 mt-3 p-2" >
    <option >choose option</option>
    <option value="synonyms">Synonyms</option>
    <option value="antonyms">Antonyms</option>
</select>

<div>
<input type="submit" value="Add" name="submit" class="btn btn-secondary mt-2 px-3">

</div>

</form>

<span class="text-center text-danger fs-4"><?php  echo $err; ?></span>

</div>
</body>
</html>