<!-- orders.php -->
<?php
include($_SERVER['DOCUMENT_ROOT']."/myweb/Jewellery-website/admin/includes/admin-panel-header.php");
include($_SERVER['DOCUMENT_ROOT']."/myweb/Jewellery-website/admin/includes/admin-panel-sidebar.php");

$orders = get_records("tbl_orders");
?>

<div class="container mt-3">
  <h1 style="text-align: center;">Orders
  <span style="text-align:right;">
          <a href='add_order.php?id=$id'>
          <h5><button style='padding:5px'>Add New Order</button></h5>
          </a>
          </span>
  </h1>
  
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Card Type</th>
        <th>Card Number</th>
        <th>Expiry Date</th>
        <th>CVV</th>
        <th>Order Amount</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($orders as $order) {
          $id = $order["id"];
          $name = $order["name"];
          $address = $order["address"];
          $email = $order["email"];
          $phone = $order["phone"];
          $card_type = $order["card_type"];
          $card_number = $order["card_number"];
          $exp_date = $order["exp_date"];
          $cvv = $order["cvv"];
          echo "<tr>";
          echo "<td>$id</td>";
          echo "<td>$name</td>";
          echo "<td>$address</td>";
          echo "<td>$email</td>";
          echo "<td>$phone</td>";
          echo "<td>$card_type</td>";
          echo "<td>$card_number</td>";
          echo "<td>$exp_date</td>";
          echo "<td>$cvv</td>";
          echo "<td>$cvv</td>";
          echo "<td>
          <span>
          <a href='edit_order.php?id=$id'>
          <button style='padding:5px'>Edit</button>
          </a>
          </span>
          <span style='padding-left:20px'>
          <a href='delete_order.php?id=$id' onclick='return confirm(\"Are you sure you want to delete this order?\")'>
          <button style='padding:5px'>Delete</button>
          </a>
          </span>
          </td>";
          echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</div>

</body>
</html>
