<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            margin: 30px 15px;
            font-size: 17px;
            padding: 8px;
        }
        .container {
            background-color: #f2f2f2;
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgray;
            border-radius: 4px;
        }
        input[type="text"], input[type="email"], input[type="number"], input[type="password"], input[type="date"], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        fieldset {
            background-color: #ffffff;
            border: 1px solid #ccc;
        }
        .main_heading {
            text-align: center;
        }
        input[type="submit"] {
            background-color: #26d1ba;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #4caf4c;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="/myweb/Jewellery-website/admin/orders/save_order.php" method="post">
            <h1 class="main_heading">Payment Form</h1>
            <h2>Contact Information</h2>
            <p>Name: <input type="text" name="name" required></p>
            <p>Address: <textarea name="address" id="address" cols="100" rows="7" required></textarea></p>
            <p>Email: <input type="email" name="email" id="email" required></p>
            <p>Phone: <input type="text" name="phone" required></p>
            <hr>
            <h2>Payment Information</h2>
            <p>Card Type:
                <select name="card_type" id="card_type" required>
                    <option value="">--Select a Card Type--</option>
                    <option value="jazzcash">JazzCash</option>
                    <option value="easypaisa">EasyPaisa</option>
                    <option value="sadapay">Sadapay</option>
                    <option value="nayapay">Nayapay</option>
                </select>
            </p>
            <p>Card Number: <input type="number" name="card_number" id="card_number" required></p>
            <p>Expiration Date: <input type="date" name="exp_date" id="exp_date" required></p>
            <p>CVV: <input type="password" name="cvv" id="cvv" required></p>
            <input type="submit" value="Pay Now">
        </form>
    </div>
 
</body>
</html>
