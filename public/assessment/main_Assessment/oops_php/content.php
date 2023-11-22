<?php ob_start(); ?>
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



<?php
session_start();
include("config.php");
$err=$msg='';  

$words= explode(".", basename($_SERVER['REQUEST_URI']))[0];

$_SESSION['words'] = $words;
if(isset($_SESSION['name'])){

  $name = $_SESSION['name'];


$sql = "SELECT * FROM dict_words_data WHERE words='$words' AND status=1";

$resq=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($resq);

if($row){
  $word_id=$row['word_id'];
  $word=$row['words'];
  $img=$row['word_img'];
  $synonym=$row['synonyms'];
  $antonym=$row['antonyms']; 

  $antt=json_decode($antonym,true); 
  $syno=json_decode($synonym,true);
  
  
 
}else{
$sql = "SELECT * FROM `dict_words_data` WHERE words='$words' AND username='$name'";
$resq=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($resq);

if($row){

  $word_id=$row['word_id'];
  $word=$row['words'];
  $img=$row['word_img'];
  $synonym=$row['synonyms'];
  $antonym=$row['antonyms']; 

  $antt=json_decode($antonym,true); 
  $syno=json_decode($synonym,true);
 
}else{
  echo "error".$conn->error;
  header("location:./error.php");
  ob_end_flush();
}
}

if(isset($_POST['submit'])){
  $wordfound=$_POST['wordfound'];

  $sql = "SELECT * FROM `dict_words_data` WHERE words='$wordfound' AND status=1";
$resq=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($resq);

if($row){

  $word_id=$row['word_id'];
  $word=$row['words'];
  $img=$row['word_img'];
  $synonym=$row['synonyms'];
  $antonym=$row['antonyms']; 

  $antt=json_decode($antonym,true); 
  $syno=json_decode($synonym,true);
 
}else{
  $sql = "SELECT * FROM `dict_words_data` WHERE words='$wordfound' AND username='$name'";
  $resq=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($resq);
  
  if($row){
  
    $word_id=$row['word_id'];
    $word=$row['words'];
    $img=$row['word_img'];
    $synonym=$row['synonyms'];
    $antonym=$row['antonyms']; 
  
    $antt=json_decode($antonym,true); 
    $syno=json_decode($synonym,true);
   
  }else{
    $err="searched word not found";
  }}
  
}  

if(isset($_POST['submit1'])){
    
  $comment=$_POST['comment'];
  $name = $_SESSION['name'];
  $wd_id =$_POST['wd_id'];
  $word=$_POST['word'];
  
  $sql= "INSERT INTO `dict_comments_data` (com_word,word_id,cc_word,user_name) VALUES ('$comment',$wd_id,'$word','$name')";
  $result=mysqli_query($conn,$sql);
  
  if($result){           

    $msg="comment posted successfully";

  }else{
      echo "error".$conn->error;
      
  }
}
?>

  <nav class="navbar bg-body-tertiary" data-bs-theme="dark">    
    <div class="container ">
      <form class="d-flex" role="search" action="" method="post">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="wordfound">
        <button class="btn btn-success" type="submit" name="submit">Search</button>
      </form>
      
    <span class="navbar-text">
       <a href="./upload.php" class="btn btn-info text-light ">+</a>
       <a href="./logout.php" class="btn btn-danger text-light ">logout</a>
       <a href="./index.php" class="btn btn-info text-light ">back</a>
      </span>
    </div>
  </nav>
  <h3 class="text-danger text-center"> <?php echo $err;  ?> </h3>
  <h3 class="text-success text-center"> <?php  echo $msg; ?> </h3>
  
<div class="container  bg-gradient p-3 mt-4 rounded-5 ">
<h4 class="my-2 text-light ">Word : <?php echo strtoupper($word);  ?> </h4>

<div class="my-3 ">
<img src="<?php echo $img; ?>" alt="images " width="200px">

</div>

<h2 class="text-light">Synonyms :<?php if($synonym == Null){
  echo "<span class='fs-5'>Add synonym</span>";
   }else{  
  foreach($syno as $syn): ?> 
  <span class="fs-4"><?php echo $syn; ?>,</span>
  <?php endforeach ;
  }
  ?>  
<span><a href="./syno.php?word_id=<?php  echo  $word_id ;?>" class="btn btn-danger text-light">+</a></span></h2>

<h2 class="text-light">Antonyms :<?php if($antonym == NULL) {
echo "<span class='fs-5'>Add antonym</span>";
}else{
  foreach($antt as $ants): ?>
 <span class="fs-4"><?php echo $ants; ?>,</span>
  <?php endforeach ;
}
  ?>
  <span><a href="./ant.php?word_id=<?php  echo  $word_id ;?>" class="btn btn-danger text-light">+</a>
</span></h2>

<form method="post" action="">

<h4 class="text-light my-3">Add comments here :</h4>
<textarea name="comment"  cols="70" rows="5" placeholder="enter your comments" required></textarea><br>
<input type="hidden" value="<?php echo  $word; ?>" name="word">
<input type="hidden" value="<?php echo  $word_id; ?>" name="wd_id">
<input type="submit" name="submit1" class="btn btn-info text-light mt-3 " value="post">
</form>

<h4 class="mt-3 text-light">Comments</h4>

<?php 

$sql2="SELECT * FROM `dict_comments_data`  WHERE cc_word='$word' and status=0";
$reqq=mysqli_query($conn,$sql2);
if($reqq){
  while($rows=mysqli_fetch_assoc($reqq)){
    $comm=$rows['com_word'];
    $user=$rows['user_name'];    
  
?>
<div>
<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="light" class="bi bi-chat-quote-fill" viewBox="0 0 16 16">
  <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM7.194 6.766a1.688 1.688 0 0 0-.227-.272 1.467 1.467 0 0 0-.469-.324l-.008-.004A1.785 1.785 0 0 0 5.734 6C4.776 6 4 6.746 4 7.667c0 .92.776 1.666 1.734 1.666.343 0 .662-.095.931-.26-.137.389-.39.804-.81 1.22a.405.405 0 0 0 .011.59c.173.16.447.155.614-.01 1.334-1.329 1.37-2.758.941-3.706a2.461 2.461 0 0 0-.227-.4zM11 9.073c-.136.389-.39.804-.81 1.22a.405.405 0 0 0 .012.59c.172.16.446.155.613-.01 1.334-1.329 1.37-2.758.942-3.706a2.466 2.466 0 0 0-.228-.4 1.686 1.686 0 0 0-.227-.273 1.466 1.466 0 0 0-.469-.324l-.008-.004A1.785 1.785 0 0 0 10.07 6c-.957 0-1.734.746-1.734 1.667 0 .92.777 1.666 1.734 1.666.343 0 .662-.095.931-.26z"/>
</svg>
<span class="fs-4 text-light"><?php echo $user; ?> : <?php echo  $comm; ?></span>

</div>

<?php
}
}
?>
</div>

</div>
</div>


<?php
}else{
include("config.php");
$errmsg='';
$word= explode(".", basename($_SERVER['REQUEST_URI']))[0];

$sql= "SELECT * FROM `dict_words_data` WHERE words='$word' AND status=1 ";
$result = mysqli_query($conn,$sql);
$num = mysqli_fetch_assoc($result);
if($num){

  $letter =$num['words'];
  $img=$num['word_img'];
  $synonym=$num ['synonyms'];
  $antonym=$num ['antonyms'];

  $syno=json_decode($synonym,true);
  $antt=json_decode($antonym,true); 
}else{
 $errmsg="you searched word not found.";
 header("location:./error.php");
 ob_end_flush();
}
if(isset($_POST['submit'])){
  $findword=trim($_POST['findword']);

  $sql= "SELECT * FROM `dict_words_data` WHERE words='$findword' AND status=1";

  $result = mysqli_query($conn,$sql);
  $num = mysqli_fetch_assoc($result);
  if($num){
  
    $letter =$num['words'];
    $img=$num['word_img'];
    $synonym=$num ['synonyms'];
    $antonym=$num ['antonyms'];
  
    $syno=json_decode($synonym,true);
    $antt=json_decode($antonym,true); 

    
  }else{
    $errmsg="searched word not found";
    header("location:./error.php");
    ob_end_flush();
  }
}
?>


  <nav class="navbar bg-body-tertiary" data-bs-theme="dark">
  <div class="container">
  <form class="d-flex " role="search" method="post" action="">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="findword">
    <button class="btn btn-success" type="submit" name="submit">Search</button>
  </form>
  
  <span class="navbar-text">
    <a href="./login.php" class="btn btn-info text-light">Login</a>
    <a href="./signup.php" class="btn btn-danger text-light">Register</a>       
    <a href="./index.php" class="btn btn-info text-light">Back</a>
  </span>
</div>
</nav>


<div class="container  bg-gradient p-3 mt-4 rounded-5">
<h3 class="text-danger text-center"> <?php echo $errmsg;  ?> </h3>
<h4 class="my-3 text-light ">Word : <?php  echo strtoupper($letter); ?></h4>
<img src="<?php echo $img ?>" alt="image" width="200px" >

<h2 class="text-light mt-2">Synonyms :<?php if($synonym == Null){
  echo "<span class='fs-5'>Add synonym</span>";
   }else{  
  foreach($syno as $syn): ?> 
  <span class="fs-4"><?php echo $syn; ?>,</span>
  <?php endforeach ;
  }
  ?> </h2>

<h2 class="text-light">Antonyms :<?php if($antonym == NULL) {
echo "<span class='fs-5'>Add antonym</span>";
}else{
  foreach($antt as $ants): ?>
 <span class="fs-4"><?php echo $ants; ?>,</span>
  <?php endforeach ;
}
?></h2>

<form action="signup.php">

<h4 class="text-light">Add Comments Here</h4>
<textarea name=""  cols="50" rows="3" placeholder="enter your comments"></textarea><br>
<input type="submit" name="submit" class="btn btn-info text-light mt-3" value="post">
</form>


<h4 class="mt-3 text-light">Comments</h4>
<?php 
$sql2="SELECT * FROM dict_comments_data WHERE cc_word='$word' AND status=1  ";
$reqq=mysqli_query($conn,$sql2);
if($reqq){
  while($rows=mysqli_fetch_assoc($reqq)){
    $comm=$rows['com_word'];
    $user=$rows['user_name'];     
?>
<div>
<p  class="fs-4 text-light"><?php echo strtoupper($user); ?>:
<span class="fs-5 text-light"><?php echo  $comm; ?></span></p>
</div>
<?php
}
}
?>
</div>
</body>
</html>
<?php
}
?>