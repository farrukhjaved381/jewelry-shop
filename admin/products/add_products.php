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
        'description' => $_POST["description"],
        'price' => $_POST["price"],
        'image' => $_POST["image"]
    ];


    $result = add_record("tbl_products", $fields);
    if ($result === "Record added successfully") {
        ob_end_clean(); // Clear the buffer before redirecting
        header("Location: products.php");
        exit();
    } else {
        echo $result;
    }

    $conn->close();
}
?>

<div class="container mt-3">
    <h2 style="text-align: center;">Add New Product</h2>
    <form method="POST" action="">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="text" class="form-control" name="name" required>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="description"
                            required>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="price" required>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="image" required>
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>

</body>

</html>