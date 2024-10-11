<?php
ob_start(); // Start output buffering

include ($_SERVER['DOCUMENT_ROOT'] . "/myweb/Jewellery-website/admin/includes/admin-panel-header.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/myweb/Jewellery-website/admin/includes/admin-panel-sidebar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "jewelry_website");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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


    $result = add_record("tbl_orders", $fields);
    if ($result === "Record added successfully") {
        ob_end_clean(); // Clear the buffer before redirecting
        header("Location: orders.php");
        exit();
    } else {
        echo $result;
    }

    $conn->close();
}
?>

<div class="container mt-3">
    <h2 style="text-align: center;">Add Order</h2>
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
                    <td>
                        <input type="text" class="form-control" name="name" required>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="address">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="email">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="phone">
                    </td>
                    <td>
                    <select name="card_type" id="card_type" required>
                    <option value="">--Select a Card Type--</option>
                    <option value="jazzcash">JazzCash</option>
                    <option value="easypaisa">EasyPaisa</option>
                    <option value="sadapay">Sadapay</option>
                    <option value="nayapay">Nayapay</option>
                </select>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="card_number">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="exp_date">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="cvv">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="order_amount">
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Add Order</button>
    </form>
</div>

</body>

</html>