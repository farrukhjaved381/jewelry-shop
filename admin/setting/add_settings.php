<?php
ob_start(); // Start output buffering

include($_SERVER['DOCUMENT_ROOT'] . "/myweb/Jewellery-website/admin/includes/admin-panel-header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/myweb/Jewellery-website/admin/includes/admin-panel-sidebar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "jewelry_website");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $fields = [
        'setting_key' => $_POST["setting_key"],
        'setting_value' => $_POST["setting_value"]
    ];


    $result = add_record("tbl_site_settings", $fields);
    if ($result === "Record added successfully") {
        ob_end_clean(); // Clear the buffer before redirecting
        header("Location: settings.php");
        exit();
    } else {
        echo $result;
    }

    $conn->close();
}
?>

<div class="container mt-3">
    <h2 style="text-align: center;">Add Setting</h2>
    <form method="POST" action="">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Setting Key</th>
                    <th>Setting Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="text" class="form-control" name="setting_key" required>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="setting_value" required>
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Update Settings</button>
    </form>
</div>

</body>
</html>
