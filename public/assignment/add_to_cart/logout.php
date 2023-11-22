<?php
session_start();
session_destroy();

// unset($_SESSION['cart']);
// $_SESSION['cart'] = [];

header("location:index.php");



?>
