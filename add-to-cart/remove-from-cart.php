<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_product_id'])) {
    $remove_product_id = $_POST['remove_product_id'];
    if (isset($_SESSION['cart'][$remove_product_id])) {
        unset($_SESSION['cart'][$remove_product_id]);
        // If the cart is empty after removal, reset it
        if (empty($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }
    // Redirect back to the cart page after removal
    header('Location: cart.php');
    exit();
}