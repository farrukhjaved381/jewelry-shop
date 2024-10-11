<?php
include("../includes/admin-panel-header.php"); 
include("../includes/admin-panel-sidebar.php"); 
$products = get_records("tbl_products");
?>

<div class="container mt-3">
<h1 style="text-align: center;">Products
  <span style="text-align:right;">
          <a href='add_products.php?id=$id'>
          <h5><button style='padding:5px'>Add New Products</button></h5>
          </a>
          </span>
  </h1>
  <table class="table table-bordered">
    <>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
      <?php
           foreach ($products as $product) {
            $id = $product["id"];
            $name = $product["name"];
            $description = $product["description"];
            $price = $product["price"];
            $image = $product["image"];
          echo "<tr>";
          echo "<td>$id</td>";
          echo "<td>$name</td>";
          echo "<td>$description</td>";
          echo "<td>$price</td>";
          echo "<td><img src='$image' alt='Product Image' width='50' height='50'></td>";
          echo "<td>
          <span>
          <a href='edit_products.php?id=$id'>
          <button style='padding:5px'>Edit</button>
          </a>
          </span>
          <span style='padding-left:20px'>
          <a href='delete_products.php?id=$id'>
          <button style='padding:5px'>Delete</button>
          </a>
          </span>
          </td>";
          echo "</tr>";
         
          
      }
      ?>
  </table>
</div>

</body>
</html>
