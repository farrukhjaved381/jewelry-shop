<?php
ob_start(); // Start output buffering

include($_SERVER['DOCUMENT_ROOT'] . "/myweb/Jewellery-website/admin/includes/admin-panel-header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/myweb/Jewellery-website/admin/includes/admin-panel-sidebar.php");

$record_id = $_GET["id"];

$conn = new mysqli("localhost", "root", "", "jewelry_website");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$q = "SELECT * FROM tbl_orders WHERE id='$record_id'";
$record = $conn->query($q);

if ($record->num_rows > 0) {
    $row = $record->fetch_assoc();
    $id = $row["id"];
    $name = $row["name"];
        $address = $row["address"];
     $email = $row["email"];
       $phone = $row["phone"];
       $card_type = $row["card_type"];
   $card_number = $row["card_number"];
     $exp_date  = $row["exp_date"];
   $cvv  = $row["cvv"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fields = [
        'name' => $_POST["name"],
        'address' => $_POST["address"],
        'email' => $_POST["email"],
        'phone' => $_POST["phone"],
        'card_type' => $_POST["card_type"],
        'card_number' => $_POST["card_number"],
        'exp_date' => $_POST["exp_date"],
        'cvv' => $_POST["cvv"]
    ];

    $result = update_record("tbl_orders", $record_id, $fields);
    if ($result === "Record updated successfully") {
        ob_end_clean(); // Clear the buffer before redirecting
        header("Location: orders.php");
        exit();
    } else {
        echo $result;
    }
}

$conn->close();
?>
<!-- *************** -->
<div class="container mt-3">
    <h2 style="text-align: center;">Edit Order</h2>
    <form method="POST" action="">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Card Type</th>
                    <th>Card Number</th>
                    <th>Expiry Date</th>
                    <th>CVV</th>
                    <th>Order Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                td><?php echo $id; ?></td>
                    <td>
                        <input type="text" class="form-control" name="name" required value="<?php echo $name; ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="email" value="<?php echo $email; ?>" required>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>" required>
                    </td>
                    <td>
                    <select name="card_type" id="card_type" required value="<?php echo $card_type; ?>">
                    <option value="">--Select a Card Type--</option>
                    <option value="jazzcash">JazzCash</option>
                    <option value="easypaisa">EasyPaisa</option>
                    <option value="sadapay">Sadapay</option>
                    <option value="nayapay">Nayapay</option>
                </select>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="card_number" value="<?php echo  $card_number; ?>" required>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="exp_date" value="<?php echo $exp_date; ?>" required>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="cvv" value="<?php echo $cvv; ?>" required>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="order_amount" required>
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Edit Order</button>
    </form>
</div>

</body>

</html>
