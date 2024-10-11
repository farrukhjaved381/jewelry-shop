<?php declare(strict_types=1); 
$products = get_records("tbl_products");
?>
<section class="latest-products">
  <h2>LATEST PRODUCTS</h2>
  <div class="Jwellery-container">
  <?php foreach ($products as $product): 
    $id = $product["id"];?>
    <div class="box">
     <?php echo "<a href='product-details/product-details.php?id=$id'>"; ?>
        <div class="box-img">
          <span class="new">NEW</span>
          <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="Product Pic" width="50" height="50">
        </div>
        <div class="name-price">
          <p><?php echo htmlspecialchars($product['name']); ?></p>
          <p>Price <span><?php echo htmlspecialchars($product['price']); ?></span></p>
        </div>
      </a>
    </div>
  <?php endforeach; ?>
  </section>
