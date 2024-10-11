<!DOCTYPE html>
<html lang="en">
<?php
include($_SERVER['DOCUMENT_ROOT']."/myweb/Jewellery-website/helper.php");
include($_SERVER['DOCUMENT_ROOT']."/myweb/Jewellery-website/admin/login/fetch_settings.php");
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="/myweb/Jewellery-website/admin/css/style.css">
    <link rel="stylesheet" href="/myweb/Jewellery-website/admin/css/responsive.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <!-- for header part -->
    <header>
        <div class="logosec">
            <div class="logo"><?php echo htmlspecialchars($user_name); ?></div>
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png"
                class="icn menuicn" id="menuicn" alt="menu-icon">
        </div>

        <div class="searchbar">
            <input type="text" placeholder="Search">
            <div class="searchbtn">
                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
                    class="icn srchicn" alt="search-icon">
            </div>
        </div>

        <div class="message">
            <div class="circle"></div>
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/8.png" class="icn" alt="">
            <div class="dp">
                <img src="<?php echo htmlspecialchars($user_picture); ?>" class="dpicn" alt="dp">
            </div>
        </div>
    </header>
</body>
</html>
