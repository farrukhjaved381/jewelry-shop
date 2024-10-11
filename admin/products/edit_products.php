<?php
ob_start(); // Start output buffering

include($_SERVER['DOCUMENT_ROOT'] . "/myweb/Jewellery-website/admin/includes/admin-panel-header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/myweb/Jewellery-website/admin/includes/admin-panel-sidebar.php");

$record_id = $_GET["id"];

$conn = new mysqli("localhost", "root", "", "jewelry_website");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$q = "SELECT * FROM tbl_products WHERE id='$record_id'";
$record = $conn->query($q);

if ($record->num_rows > 0) {
    $row = $record->fetch_assoc();
    $id = $row["id"];
    $name = $row["name"];
    $description = $row["description"];
    $price = $row["price"];
    $image = $row["image"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fields = [
        'name' => $_POST["name"],
        'description' => $_POST["description"],
        'price' => $_POST["price"],
        'image' => $_POST["image"]
    ];

    $result = update_record("tbl_products", $record_id, $fields);
    if ($result === "Record updated successfully") {
        ob_end_clean(); // Clear the buffer before redirecting
        header("Location: products.php");
        exit();
    } else {
        echo $result;
    }
}

$conn->close();
?>

<div class="container mt-3">
    <h2 style="text-align: center;">Edit Product</h2>
    <form method="POST" action="">
        <table class="table table-bordered">
            <thead>
                <tr>
                <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td>
                        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" required>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="description" value="<?php echo $description; ?>" required>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="price" value="<?php echo $price; ?>" required>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="image" value="<?php echo $image; ?>" required>
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>

</body>
</html>
