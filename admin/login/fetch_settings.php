<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$conn = new mysqli("localhost", "root", "", "jewelry_website");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Fetch the name and picture URL from tbl_users table
    $sql = "SELECT username, profile_pic FROM tbl_users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_name = $row['username'];
        $user_picture = $row['profile_pic'];

        // Debugging output
        echo "<script>console.log('Fetched URL: " . $user_picture . "');</script>";
    } else {
        $user_name = "Default User"; // Fallback user name
        $user_picture = "default_picture.png"; // Fallback picture URL
    }
} else {
    header("location: admin_login.php");
    exit();
}
