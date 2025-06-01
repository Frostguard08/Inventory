<?php
include 'db/config_session.inc.php';
include 'db/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holiday Cafe | Menu</title>
    <link rel="stylesheet" href="css/menu-style.css">
    <link rel="shortcut icon" href="images/tab-logo.png">
</head>
<body>
    <!-- <div class="indicator"></div>
    <div class="container">
        <div class="sideNav">
            <a href="#" onclick="setActive(1)">Beverages</a>
            <a href="#" onclick="setActive(2)">Foods</a>
            <a href="#" onclick="setActive(3)">Souvenirs</a>
        </div>
        <div class="white-layer-1">
            <div class="topNav">
                <img src="images/tab-logo.png">
                <input type="text" placeholder="Search Products">
            </div>
            <div class="bevCategories">
                <a href="#">All</a>
                <a href="#">Frappucino</a>
                <a href="#">Tea</a>
                <a href="#">Latte</a>
            </div> -->
            <div id="app"></div>
            <div class="prodAndCart">
                <div class="bevList">
                    --empty menu--
                </div>
                <div class="cartContainer">
                    <h1>Cart</h1>
                    <div class="product-section">
                        --your cart is empty--
                    </div>
                    <div class="btn">
                        <a href="checkout.html"> <button class="checkout">Check-itout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/main.js" type="module"></script>
</body>
</html>