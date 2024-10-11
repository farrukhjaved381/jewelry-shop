<?php
ob_start(); // Start output buffering

include($_SERVER['DOCUMENT_ROOT'] . "/myweb/Jewellery-website/admin/includes/admin-panel-header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/myweb/Jewellery-website/admin/includes/admin-panel-sidebar.php");

$record_id = $_GET["id"];

$conn = new mysqli("localhost", "root", "", "jewelry_website");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$q = "SELECT * FROM tbl_site_settings WHERE id='$record_id'";
$result = $conn->query($q);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row["id"];
    $setting_key = $row["setting_key"];
    $setting_value = $row["setting_value"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fields = [
        'setting_key' => $_POST["setting_key"],
        'setting_value' => $_POST["setting_value"]
    ];

    $result = update_record("tbl_site_settings", $record_id, $fields);
    if ($result === "Record updated successfully") {
        ob_end_clean(); // Clear the buffer before redirecting
        header("Location: settings.php");
        exit();
    } else {
        echo $result;
    }
}

$conn->close();
?>

<div class="container mt-3">
    <h2 style="text-align: center;">Edit Settings</h2>
    <form method="POST" action="">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Setting Key</th>
                    <th>Setting Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td>
                        <input type="text" class="form-control" name="setting_key" value="<?php echo $setting_key; ?>" required>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="setting_value" value="<?php echo $setting_value; ?>" required>
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Update Settings</button>
    </form>
</div>

</body>
</html>
