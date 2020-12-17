<?php 
    function setActivePage($current_page, $active_page) {
        echo $current_page === $active_page ? ' active' : '';
    }

    include_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ucfirst($active_page); ?></title>
    <link rel="stylesheet" href="../style/reset.css">
    <link rel="stylesheet" href="../style/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@100;300;400;500;700&family=Yellowtail&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A7fc517671c0a98548be8e925b0c9e7e2ac1c5b338517bc01a705030ed8baf5b2&amp;width=1030&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
</head>

<body>

<header class="header">
    <div class="container">
        <div class="header-wrapper flex-columns">
            <div class="logo-wrapper">
                <a href="index.php" class="logo">
                    <img src="../img/logo.svg" alt="logo">
                </a>
            </div>
            <div class="flex-columns">
                <nav>
                    <ul class="listing">
                        <li class="listing-item <?php setActivePage('home', $active_page); ?>"><a href="index.php">Home</a></li>
                        <li class="listing-item <?php setActivePage('shop', $active_page); ?>"><a href="shop.php">Shop</a></li>
                        <li class="listing-item <?php setActivePage('checkout', $active_page); ?>"><a href="checkout.php">Checkout</a></li>
                        <li class="listing-item <?php setActivePage('contact', $active_page); ?>"><a href="contact.php">Contact</a></li>
                    </ul>
                </nav>
                <div class="login">
                    <a href="logout.php" class="btn btn-blue">Log out</a>
                </div>
            </div>
        </div>
    </div>
</header>