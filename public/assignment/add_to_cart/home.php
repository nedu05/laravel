<?php  

session_start();

$name=$_SESSION['name'];
$id= $_SESSION['id'];
$storedvalue = file_get_contents ("products.json");
$products = json_decode($storedvalue, true);
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
  
    <div class="container my-5">
    <div class="row">
      <?php  echo $name ;?>
    <?php foreach ($products as $product): ?>    
      <div class="col">
           <div class="card">
             <img src='<?php echo ($product['img']);  ?>' class="card-img-top" alt="images" width="200" height="200">
             <div class="card-body text-center">
               <h5 class="card-title"><?php echo ($product['name']);  ?></h5>
               <p class="card-text"><?php echo ($product['price']);  ?></p>                
               
               <form  method="post">
                <input type="hidden" name="product_id" value="<?php echo $product['id'] ;  ?>">
               <input type="number" min="1" name="quantity" >
               <input type="submit"  name="addcart" value="ADD" class=" mt-2 btn btn-info  text-light">

               </form>
    </div>
  </div>
</div>
<?php endforeach ;?>

</div>
<div class="d-grid gap-2 d-md-flex justify-content-md-center">
  <button class="btn btn-success mt-3"><a href="cart.php" class="text-light">go to cart</a></button>

</div>
</div>

</body>
</html>


<?php
include("connection.php");


if (!isset($_SESSION['cart'])){
  $_SESSION['cart'] = [];
}

if (isset($_POST['addcart'])) { 
  
  $product_id = $_POST['product_id'];  
  // $quantity = $_POST['quantity'];   
  foreach( $products as $product ){    
    if($product['id'] == $product_id){ 

      $_SESSION['cart'][$product_id] = $product;     
            
    }
  }
}    

$storing=json_encode($_SESSION['cart']);


$sql2="SELECT  * FROM add_to_cart  WHERE  id=$id";
$rlt=mysqli_query($conn,$sql2);


if(!$rlt){
  echo "connection not working fine".$conn->error;
   }else{  

    $row=mysqli_fetch_assoc($rlt);
    $val=$row['cart'];
   if($val != NULL){    
      $ff=json_decode($val,true); 
      foreach($_SESSION['cart'] as $ass){
        if($ass['id'] == $product_id){          
        array_push($ff,$ass);   

        }
      }
              $enc=json_encode($ff);
              $sql="UPDATE add_to_cart SET cart='$enc' WHERE  id=$id ";
              $result=mysqli_query($conn,$sql);            
         }else{         
        $sql="UPDATE add_to_cart SET cart='$storing' WHERE  id=$id";
           $result=mysqli_query($conn,$sql);
}
}

?>


