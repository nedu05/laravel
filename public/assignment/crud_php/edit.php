<?php
include ('config.php');
$script = file_get_contents('script.js');
$id=$_GET['E_id'];
$sqll2="SELECT *FROM studentsinfo WHERE id=$id";

$reqq=mysqli_query($conn,$sqll2);



$row=mysqli_fetch_assoc($reqq);
$name=$row['studentname'];
$email=$row['email'];
$password=$row['pwd'];

if(isset($_POST['submit'])){

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];

$sql3="UPDATE studentsinfo  SET  id=$id,studentname='$name',email='$email',
pwd='$password' WHERE id=$id";

$result=mysqli_query($conn,$sql3);

if($result){
    header("location:display.php");   
    // echo "data updated sucessfully";
}else{
    echo "data not updated".$conn->errno;
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="POST">
<input type="text" name="name" placeholder="studentname " value="<?php echo $name; ?>"  required > <br><br>
<input type="email" name="email" placeholder="email" value="<?php echo $email; ?>" required><br><br>
<input type="password" name="password" placeholder="password"  value="<?php echo $password; ?>" required><br><br>
<input type="submit" value="update" name="submit">
</form>
<?php

echo "<script>".$script."</script>";

?>
</body>
</html>