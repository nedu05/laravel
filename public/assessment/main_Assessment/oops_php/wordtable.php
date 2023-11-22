<?php

session_start();
ob_start();
include("admin.php");
include("config.php");

if(isset($_SESSION['name'])){
  $name = $_SESSION['name'];
}else{
  header("location:./index.php");
  ob_end_flush();
}

$sql="SELECT * FROM `dict_words_data`";
$result=mysqli_query($conn,$sql);

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

<h1 class="text-warning">WORDS TABLE</h1>
<table class="table table-dark bg-gradient">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">IMAGE</th>
      <th scope="col">WORD</th>
      <th scope="col">USER</th>
      <th scope="col">STATUS</th>
      <th scope="col "  colspan="2">ACTION</th>
    </tr>
  </thead>
  <tbody>
    
   <?php
   while($row=mysqli_fetch_assoc($result)){

    $word_id=$row['word_id'];
    $word=$row['words'];
    $image=$row['word_img'];
    $user=$row['username'];
   $status=$row['status'];
  
  ?>
  
  
    <tr>
      <th scope="row"><?php   echo  $word_id;  ?></th>
      <td><img src="<?php echo $image; ?>" width="200px"  height="150px"   class=" rounded mx-auto d-block "></td>
      <td><?php echo  $word;  ?></td>
      <td><?php echo  $user;  ?></td>
      <td><?php echo  $status;  ?></td>
      
      <?php 
      if($status == 0){
        echo '<td><a href="./approve.php?app_id='.$word_id.'" class="btn btn-info mx-2 text-light">approve</a></td>';
      }else{
        echo '<td> <a href="./disapprove.php?dis_id='.$word_id.'"class="btn btn-warning mx-2 text-light">Disapprove</a></td>';
        
      }
      
      ?>
        
        <td>
        <a href="./delete.php?del_id=<?php echo $word_id; ?>"class="btn btn-danger mx-2 text-light">Delete</a>
       

      </td>
    </tr>


<?php
   }
?>
  </tbody>
</table>

</div>
    
</body>
</html>