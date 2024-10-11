<?php
include("../../helper.php");

$record_id = $_GET["id"];

$result = delete_record("tbl_site_settings", $record_id);
header("Location:settings.php");
exit();
