<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user = $_POST["un"];
    $password = $_POST["pass"];
    $conn = new mysqli("localhost", "root", "", "jewelry_website");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE username=? AND password=?");
    $stmt->bind_param("ss", $user, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION["username"] = $user;
        header("location:/myweb/Jewellery-website/admin/index.php");
    } else {
        echo '<script>alert("Invalid Username or password")</script>';
        header("location:admin_login.php");
    }

    $stmt->close();
    $conn->close();
}
