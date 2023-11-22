<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>crud operation</h3>
<button> <a href="index.php">Add user</a></button>   

<table border="1">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">STUDENT_NAME</th>
      <th scope="col">EMAIL_ID</th>
      <th scope="col">PASSWORD</th>
      <th scope="col">OPERATIONS</th>
    </tr>
  </thead>
  <tbody>


  <?php
include ('config.php');

$script = file_get_contents('script.js');
$sqll="SELECT * FROM studentsinfo";
$res=mysqli_query($conn,$sqll);

if($res){

    while($row = mysqli_fetch_assoc($res)){

        $id=$row['id'];
        $name=$row['studentname'];
        $email=$row['email'];
        $password=$row['pwd'];

        echo '<tr>
        <th >'.$id.'</th>
        <td>'.$name.'</td>
        <td>'.$email.'</td>
        <td>'.$password.'</td>
        <td><button><a href="edit.php?E_id='.$id.'">Edit</a></button>
        <button><a href="delete.php?Del_id='.$id.'">delete</a></button></td>   
        </tr>';}   
}else{
    echo "ur connection some error to view";
}
?>

</tbody>
</table>
<?php

echo "<script>".$script."</script>";

?>
</body>
</html>