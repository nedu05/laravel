<?php
include ('cofigure.php');

session_start();

$id=$_SESSION['id'];

echo $id;
$username=$_SESSION['name'];

$uu=strtoupper($username);
if(isset($_POST['submit'])){
   
    $image=$_FILES['upload'];
    $imgnam=$image['name'];
    $tempadd=$image['tmp_name'];
    $error=['error'];  
    $file_seperate=explode('.',$imgnam);

   $fileext=strtolower(end($file_seperate));

    $ext=array('jpeg','jpg','png');

if(in_array($fileext,$ext)){
    $upload='images/'. $imgnam;
    move_uploaded_file($tempadd,$upload);

    $sql="UPDATE  studentlist SET img='$upload' WHERE id=$id";
    $reso=mysqli_query($conn,$sql);

    if($reso){
        echo "fil e uploaded successfully";
    }else{
        echo "not insert <br><br> ".$conn->error;
    }  
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

<h1>Welcome  <?php echo '<span>'.$uu.'</span>';?></h1>
<div>
<form action="logout.php" method="post">
<input type="submit" name="submit" value="logout">
</form>
</div><br>
<form  method="post" enctype="multipart/form-data">

<input type="file" name="upload"  ><br><br>
<input type="submit"  name="submit">

</form>

<?php
$sqlimg="SELECT *FROM studentlist";
$result=mysqli_query($conn,$sqlimg);
while($row=mysqli_fetch_assoc($result)){

    $img=$row['img'];
    $user=$row['username'];  

    echo '<br><br>';
    echo '<img src='.$img.'>';
}
?>

</body>
</html>

<!-- file upload to folder -->

<?php
// $tempname=$_FILES["filetoupload"]['temp_name'];
// $file=$_FILES["filetoupload"]['name'];

// $foldername='images';
// if(move_uploaded_file($tempname,$foldername.'/'.$file)){
//     echo "file uploaded successfully";
// }else{
//     echo "upload error";
// }

?>