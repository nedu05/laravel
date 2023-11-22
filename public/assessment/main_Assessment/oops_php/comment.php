<?php
session_start();
include("admin.php");
include("config.php");
$sql= "SELECT * FROM `dict_comments_data`";
$result=mysqli_query($conn,$sql);

if(isset($_SESSION['name'])){
  $name = $_SESSION['name'];
}else{
  header("location:./index.php");
  ob_end_flush();



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

<h1 class="text-warning">COMMENTS TABLE</h1>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">WORD_ID</th>
      <th scope="col">COMMENT</th>
      <th scope="col">USER</th>
      <th scope="col">STATUS</th>
      <th scope="col"  colspan="2">ACTION</th>
    </tr>
  </thead>
  <tbody>

  <?php
while($row=mysqli_fetch_assoc($result)){

  $word_id=$row['com_id'];
  $comment=$row['com_word'];
  $user=$row['user_name'];
  $status=$row['status'];


  ?>
    <tr>
      <th scope="row"><?php  echo $word_id; ?></th>
      <td><?php  echo $comment; ?></td>
      <td><?php  echo $user; ?></td>
      <td><?php  echo $status; ?></td>



      <?php
            if($status == 0){
             echo '<td> <a href="./capp.php?cap_id='.$word_id.'" class="btn btn-info mx-2 text-light">Approve</a></td>';
            }else{
           echo '<td><a href="./dcapp.php?dcap_id='.$word_id.'" class="btn btn-warning mx-2 text-light">Disapprove</a> </td>';

             }
        ?>
   <td>
        <!-- <a href="capp.php?cap_id=<?php echo $word_id; ?>" class="btn btn-info mx-2 text-light">Approve</a>
        <a href="dcapp.php?dcap_id=<?php echo $word_id; ?>" class="btn btn-warning mx-2 text-light">Disapprove</a> -->
        <a href="./dcdel.php?del_id=<?php echo $word_id; ?>" class="btn btn-danger mx-2 text-light">Delete</a>

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
