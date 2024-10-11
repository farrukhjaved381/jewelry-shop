<?php
include($_SERVER['DOCUMENT_ROOT']."/myweb/Jewellery-website/helper.php");

$record_id = $_GET["id"];

$result = delete_record("tbl_products", $record_id);
header("Location: products.php?msg=" . urlencode($result));
exit();
