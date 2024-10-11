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
        'username' => $_POST["username"],
        'password' => $_POST["password"],
        'profile_pic' => $_POST["profile_pic"]
    ];


    $result = add_record("tbl_users", $fields);
    if ($result === "Record added successfully") {
        ob_end_clean(); // Clear the buffer before redirecting
        header("Location: users.php");
        exit();
    } else {
        echo $result;
    }

    $conn->close();
}
?>

<div class="container mt-3">
    <h2 style="text-align: center;">Add User</h2>
    <form method="POST" action="">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Profile Picture URL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="text" class="form-control" name="username" required>
                    </td>
                    <td>
                        <input type="password" class="form-control" name="password" required>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="profile_pic">
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Add User</button>
    </form>
</div>

</body>
</html>
