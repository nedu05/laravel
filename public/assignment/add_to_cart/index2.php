<?php
// Start or resume the session
session_start();

// Read product data from JSON file
$productsJson = file_get_contents('products.json');
$products = json_decode($productsJson, true);

// Handle adding products to the cart
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Initialize the cart if not already set
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add product to the cart or update quantity
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = $quantity;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Listing</title>
</head>
<body>
    <h1>Product Listing</h1>
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <strong><?php echo $product['product_name']; ?></strong><br>
                Price: $<?php echo $product['product_price']; ?><br>
                Description: <?php echo $product['product_description']; ?><br>
                <form method="post">
                    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                    Quantity: <input type="number" name="quantity" value="1" min="1"><br>
                    <input type="submit" name="add_to_cart" value="Add to Cart">
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="cart.php">Go to Cart</a>
</body>
</html>