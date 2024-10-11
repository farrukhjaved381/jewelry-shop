<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include($_SERVER['DOCUMENT_ROOT'] . "/myweb/Jewellery-website/dbconn.php");
include($_SERVER['DOCUMENT_ROOT'] . "/myweb/Jewellery-website/helper.php");
include($_SERVER['DOCUMENT_ROOT'] . "/myweb/Jewellery-website/inc/header/header.php");



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $quantity = intval($_POST['quantity']);

    // Initialize the cart if not already set
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if the product is already in the cart
    if (isset($_SESSION['cart'][$product_id])) {
        // If the product is already in the cart, update the quantity
        $_SESSION['cart'][$product_id]['quantity'] += $quantity;
    } else {
        // If the product is not in the cart, add it with the provided details
        $_SESSION['cart'][$product_id] = [
            'id' => $product_id,
            'name' => $product_name,
            'description' => $product_description,
            'price' => $product_price,
            'image' => $product_image,
            'quantity' => $quantity
        ];
    }
}

// Include the cart view section
include('cart-view-section.php');
?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php

// Include footer
include($_SERVER['DOCUMENT_ROOT'] . "/myweb/Jewellery-website/inc/footer/footer-section.php");
