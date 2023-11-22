<?php
include("connection.php");

session_start();
$id= $_SESSION['id'];
$sql2="SELECT *FROM add_to_cart  WHERE id=$id";

$result2=mysqli_query($conn,$sql2);

if($result2){

  echo "query execute successfully";
  while($row=mysqli_fetch_assoc($result2)){
    $cart=$row['cart'];
    $products = json_decode($cart, true);   
    // unset($_SESSION['cart']);
  } 

}else{
  echo "cart cannot be load";
}

// session_destroy();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
</head>
<body>


<div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <button class="btn btn-success mb-3"><a href="home.php" class="text-light">back to cart</a></button>

</div>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <button class="btn btn-success mb-3"><a href="logout.php" class="text-light">logout</a></button>
 
</div> 
<div class="container my-5">
    <div class="row">

    <?php foreach ($products as $product): ?>    
      <div class="col">
           <div class="card">
             <img src='<?php echo ($product['img']);  ?>' class="card-img-top" alt="images" width="200" height="200">
             <div class="card-body text-center">
               <h5 class="card-title"><?php echo ($product['name']);  ?></h5>
               <p class="card-text"><?php echo ($product['price']);  ?></p>                

    </div>
  </div>
</div>
<?php endforeach ;?>


</div>
</body>
</html>