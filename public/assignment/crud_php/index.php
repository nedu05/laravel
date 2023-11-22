<?php
include ('config.php');

$script = file_get_contents('script.js');
   

if(isset($_POST['submit'])){

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];



$sql="INSERT INTO studentsinfo (studentname,email,pwd)
VALUES('$name','$email','$password')";

$result=mysqli_query($conn,$sql);

if($result){

    header("location:display.php");
    // echo "data inserted";
}else{
    echo "data not inserted".$conn->errno;
}}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="index.php" method="POST">
<input type="text" name="name" placeholder="studentname " id='name'  required> <br><br>


<input type="email" name="email" placeholder="email" required><br><br>
<input type="password" name="password" placeholder="password" required><br><br>
<input type="submit" value="signup" name="submit">
</form>

<small>wants to view<button onclick="add()"> <a href="display.php">users</a> </button> </small>

<!-- <script >
   var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {

        console.log(this.responseText);
        // document.getElementById("txtHint").innerHTML = ;
      }
    };
    xmlhttp.open("GET","config.php",true);
    xmlhttp.send();
  

</script> -->

<?php

echo "<script>".$script."</script>";

?>
</body>
</html>










