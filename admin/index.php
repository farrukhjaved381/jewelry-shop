<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:login/admin_login.php");
    exit();
}
?>
<?php
$conn = new mysqli("localhost", "root", "", "jewelry_website");
?>
<!-- Header -->
<?php include("includes/admin-panel-header.php"); ?>

<!-- Dashboard Navbar -->
<?php include("includes/admin-panel-sidebar.php"); ?>

<!-- articles stats overview -->
<?php include("includes/stats_overview.php"); ?>
<script src="js/index.js"></script>
</body>

</html>
