<?php
$active_page = 'checkout';
include_once('./parts/header.php');
?>

<section class="hero-section hero-section--checkout overlay overlay-dark bg-image dark">
    <h1 class="title--centered">Checkout</h1>
</section>

<section class="checkout-section simple-section">
    <div class="container">
        <div class="checkout">
            <table class="checkout-table">
                <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col" class="last-col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="checkout-product-media">
                                <div class="d-flex">
                                    <img src="./img/products/product1.jpeg" alt="" class="checkout-product-img">
                                </div>
                                <div class="media-body">
                                    <p>Minimalistic shop for multipurpose use</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <h5>$360.00</h5>
                        </td>
                        <td>
                            <div class="product-count">
                                <span class="number-change input-number-decrement bg-image"></span>
                                <input class="input-number" type="text" value="1" min="0" max="10">
                                <span class="number-change input-number-increment bg-image"></span>
                            </div>
                        </td>
                        <td class="last-col">
                            <h5>$720.00</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="checkout-product-media">
                                <div class="d-flex">
                                    <img src="./img/products/product2.jpeg" alt="" class="checkout-product-img">
                                </div>
                                <div class="media-body">
                                    <p>Minimalistic shop for multipurpose use</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <h5>$360.00</h5>
                        </td>
                        <td>
                            <div class="product-count">
                                <span class="number-change input-number-decrement bg-image"></span>
                                <input class="input-number" type="text" value="1" min="0" max="10">
                                <span class="number-change input-number-increment bg-image"></span>
                            </div>
                        </td>
                        <td class="last-col">
                            <h5>$720.00</h5>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <h5>Subtotal</h5>
                        </td>
                        <td>
                            <h5>$2160.00</h5>
                        </td>
                    </tr>
                    <tr class="bottom_button">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="cupon_text float-right">
                                <a class="btn btn-blue" href="#">Buy</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include_once('parts/gallery.php'); ?>

<?php include_once('parts/footer.php'); ?>
</body>

</html>