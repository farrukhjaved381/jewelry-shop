<?php
$conn = new mysqli("localhost", "root", "", "jewelry_website");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
