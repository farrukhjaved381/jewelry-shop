<?php
include($_SERVER['DOCUMENT_ROOT'] . "/myweb/Jewellery-website/helper.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "jewelry_website");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare INSERT statement
    $sql = "INSERT INTO tbl_orders (name, address, email, phone, card_type, card_number, exp_date, cvv) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $name = $_POST["name"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $card_type = $_POST["card_type"];
    $card_number = $_POST["card_number"];
    $exp_date = $_POST["exp_date"];
    $cvv = $_POST["cvv"];

    $stmt->bind_param("ssssssss", $name, $address, $email, $phone, $card_type, $card_number, $exp_date, $cvv);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
