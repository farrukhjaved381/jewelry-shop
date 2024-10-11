<?php
ob_start(); // Start output buffering

include($_SERVER['DOCUMENT_ROOT'] . "/myweb/Jewellery-website/admin/includes/admin-panel-header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/myweb/Jewellery-website/admin/includes/admin-panel-sidebar.php");

$record_id = $_GET["id"];

$conn = new mysqli("localhost", "root", "", "jewelry_website");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$q = "SELECT * FROM tbl_users WHERE secondCond=44 && id='$record_id'";
$record = $conn->query($q);

if ($record->num_rows > 0) {
    $row = $record->fetch_assoc();
    $id = $row["id"];
    $username = $row["username"];
    $password = $row["password"];
    $profile_pic = $row["profile_pic"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fields = [
        'username' => $_POST["username"],
        'password' => $_POST["password"],
        'profile_pic' => $_POST["profile_pic"]
    ];

    $result = update_record("tbl_users", $record_id, $fields);
    if ($result === "Record updated successfully") {
        ob_end_clean(); // Clear the buffer before redirecting
        header("Location: users.php");
        exit();
    } else {
        echo $result;
    }
}

$conn->close();
?>

<div class="container mt-3">
    <h2 style="text-align: center;">Edit User</h2>
    <form method="POST" action="">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Profile Picture URL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td>
                        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" required>
                    </td>
                    <td>
                        <input type="password" class="form-control" name="password" value="<?php echo $password; ?>" required>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="profile_pic" value="<?php echo $profile_pic; ?>" required>
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>

</body>
</html>
