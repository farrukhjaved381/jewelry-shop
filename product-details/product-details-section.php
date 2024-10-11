<!-- product-details.php -->
<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$quantity = isset($_SESSION['quantity']) ? $_SESSION['quantity'] : 1;

$tbl_name = 'tbl_products';
$product = fetch_edit_record($tbl_name);
?>

<div class="bg-img max-w-4xl mx-auto p-4">
    <div class="flex flex-col md:flex-row">
        <div class="md:w-1/2">
            <img style="height: 370px;" src="<?php echo $product['image']; ?>" alt="Product Image"
                class="w-full h-auto rounded-lg">
        </div>
        <div class="md:w-1/2 md:pl-8 mt-4 md:mt-0">
            <h1 class="text-2xl font-bold text-black"><?php echo $product['name']; ?></h1>
            <div class="flex items-center mt-2">
                <span class="text-2xl font-semibold text-yellow-600"><?php echo $product['price']; ?></span>
                <span class="text-zinc-500 line-through ml-4 text-black"><?php //echo $product['old_price']; ?></span>
                <span class="bg-yellow-500 text-white text-xs font-bold ml-2 px-2 py-1 rounded text-black">SAVE
                    20%</span>
            </div>
            <div class="flex items-center mt-2">
                <div class="flex items-center">
                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.18c.969 0 1.371 1.24.588 1.81l-3.392 2.46a1 1 0 00-.364 1.118l1.286 3.97c.3.921-.755 1.688-1.54 1.118l-3.392-2.46a1 1 0 00-1.176 0l-3.392 2.46c-.784.57-1.838-.197-1.54-1.118l1.286-3.97a1 1 0 00-.364-1.118L2.045 9.397c-.783-.57-.38-1.81.588-1.81h4.18a1 1 0 00.95-.69l1.286-3.97z">
                        </path>
                    </svg>
                    <!-- Repeat SVG for rating stars -->
                </div>
                <span class="ml-2 text-zinc-600 text-black">(3 reviews)</span>
            </div>
            <div class="mt-4">
                <h2 class="text-lg font-semibold text-black">Choose Your Color:</h2>
                <div class="flex mt-2">
                    <button class="bg-black  px-4 py-2 rounded mr-2 text-white">Multi</button>
                    <button class="bg-zinc-200 text-zinc-800 px-4 py-2 rounded mr-2 text-black">Champagne</button>
                    <button class="bg-zinc-200 text-zinc-800 px-4 py-2 rounded mr-2 text-black">Maroon</button>
                    <button class="bg-zinc-200 text-zinc-800 px-4 py-2 rounded text-black">Green</button>
                </div>
            </div>
            <div class="mt-4">
                <h2 class="text-lg font-semibold text-black">Quantity:</h2>
                <div class="flex items-center mt-2">
                    <button id="decreaseBtn" class="bg-zinc-200 text-zinc-800 px-4 py-2 rounded-l text-black">-</button>
                    <input id="quantityInput" type="text"
                        class="w-12 text-center border-t border-b border-zinc-200 text-black"
                        value="1" readonly>
                    <button id="increaseBtn" class="bg-zinc-200 text-zinc-800 px-4 py-2 rounded-r text-black">+</button>
                </div>
            </div>
            <form method="POST" action="../add-to-cart/cart.php">
    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
    <input type="hidden" name="product_name" value="<?php echo $product['name']; ?>">
    <input type="hidden" name="product_description" value="<?php echo $product['description']; ?>">
    <input type="hidden" name="product_price" value="<?php echo $product['price']; ?>">
    <input type="hidden" name="product_image" value="<?php echo $product['image']; ?>">
    <input type="hidden" name="quantity" id="formQuantityInput" value="<?php echo $quantity; ?>">
    <button type="submit" class="bg-black text-white px-8 py-3 mt-6 rounded w-full">ADD TO CART</button>
</form>


        </div>
    </div>
</div>


<script>
document.getElementById('increaseBtn').addEventListener('click', function() {
    const quantityInput = document.getElementById('quantityInput');
    quantityInput.value = parseInt(quantityInput.value) + 1;
    document.getElementById('formQuantityInput').value = quantityInput.value;
});

document.getElementById('decreaseBtn').addEventListener('click', function() {
    const quantityInput = document.getElementById('quantityInput');
    if (quantityInput.value > 1) {
        quantityInput.value = parseInt(quantityInput.value) - 1;
        document.getElementById('formQuantityInput').value = quantityInput.value;
    }
});
</script>

