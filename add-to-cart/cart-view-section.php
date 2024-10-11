<?php
session_start();
?>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"

        <title>HEALET-Cart</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                text-decoration: none;
            }

            body {
                color: white;
            }

            .main-container {
                max-width: 1440px;
            }

            #container {
                height: 100px;
                width: 100%;
                background-color: rgb(189, 189, 189);
            }

            .nav {
                display: flex;
                justify-content: space-between;
                padding: 30px 25px 0 25px;
                margin-bottom: 100px;
            }

            .center-nav-bar {
                display: flex;
            }

            .center-nav-bar a {
                font-family: 'Poppins';
                padding: 0 10px;
                font-size: 18px;
                color: #fff;
                text-shadow: 0 white;
                text-decoration: none;
            }

            .hover-line {
                height: 3px;
                margin-top: 10px;
                background-color: white;
                width: 1%;
                border-radius: 3px;
                visibility: hidden;
                transition: 0.2s;
            }

            .center-nav-bar a:hover .hover-line {
                width: 100%;
                visibility: visible;
                transition: 0.2s;
                background-image: linear-gradient(to right, #fff, #ffff);
            }
        </style>
    </head>

        <section class="h-100 h-custom" style="background-color: #F8F8FF">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12">
                        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                            <div class="card-body p-0">
                                <div class="row g-0">
                                    <div class="col-lg-8">
                                        <div class="p-5">
                                            <div class="d-flex justify-content-between align-items-center mb-5">
                                                <h1 class="fw-bold mb-0">Shopping Cart</h1>
                                                <h6 class="mb-0 text-muted"><?php echo count($_SESSION['cart']); ?>
                                                    items
                                                </h6>
                                            </div>
                                            <hr class="my-4">

                                            <?php if (!empty($_SESSION['cart'])): ?>
    <?php foreach ($_SESSION['cart'] as $item): ?>
        <div class="row mb-4 d-flex justify-content-between align-items-center">
            <div class="col-md-2 col-lg-2 col-xl-2">
                <img src="<?php echo $item['image']; ?>" class="img-fluid rounded-3" alt="Product Image">
            </div>
            <div class="col-md-3 col-lg-3 col-xl-3">
                <h6 class="text-muted"><?php echo $item['name']; ?></h6>
                <h6 class="mb-0">Rs. <?php echo $item['price']; ?></h6>
            </div>
            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                <?php echo $item['quantity']; ?>
            </div>
            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <h6 class="mb-0">Rs. <?php echo intval($item['price']) * intval($item['quantity']); ?></h6>
            </div>
            <div class="col-md-1 col-lg-1 col-xl-1 text-black">
                <form method="post" action="remove-from-cart.php">
                    <input type="hidden" name="remove_product_id" value="<?php echo $item['id']; ?>">
                    <button type="submit" class="btn btn-link text-muted">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </div>
        </div>
        <hr class="my-4">
    <?php endforeach; ?>
<?php endif; ?>


                                            <div class="pt-5">
                                                <h6 class="mb-0"><a href="../index.php" class="text-body"><i
                                                            class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 bg-body-tertiary">
                                        <div class="p-5">
                                            <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between mb-4">
                
                                                <?php
                                                $total = 0;
                                                if (!empty($_SESSION['cart'])) {
                                                    foreach ($_SESSION['cart'] as $item) {
                                                        $total += $item['price'] * $item['quantity'];
                                                    }
                                                }
                                                ?>
                                            </div>



                                            <div class="d-flex justify-content-between mb-5">
                                                <h5 class="text-uppercase">Total price</h5>
                                                <h5>Rs. <?php echo $total; ?></h5>
                                            </div>

                                            <a href="checkout.php">
                                            <button type="button" class="btn btn-dark btn-block btn-lg"
                                                data-mdb-ripple-color="dark">Checkout</button>
                                                </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>