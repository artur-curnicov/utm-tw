<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

$active_page = 'home';
include_once('./parts/header.php');
?>

<section class="home-hero overlay overlay-dark bg-image">
    <div class="container dark">
        <div class="home-hero-info">
            <span class="italic-text">70% Discount</span>
            <h1 class="section-title">Winter<br />Collection</h1>
            <p>Best collection of 2020!</span>
        </div>
    </div>
</section>

<section class="simple-section shop-by-category light overlay overlay-light">
    <div class="container">
        <h2 class="title--centered">Shop by Category</h2>
        <div class="category-cards flex-columns">
            <?php
            $sql = "SELECT name, description, image FROM categories";

            $result = mysqli_query($link, $sql);

            while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) :
                $image_row = base64_encode($row[2]);
                $image = 'data:image/jpeg;base64,' . $image_row;
            ?>
                <div class="category-card light bg-image" style="background-image: url('<?php echo $image; ?>')">
                    <h3 class="card-title"><?php echo $row[1]; ?></h3>
                    <a href="shop.php" class="btn btn-yellow">Best New Deals</a>
                    <span class="italic-text">New Collection</span>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<section class="simple-section">
    <div class="div container">
        <div class="flex-columns">
            <h2 class="title">Latest Products</h2>
            <div class="categories">
                <ul class="listing">
                    <li class="listing-item active" data-category="All"><a href="#">All</a></li>

                    <?php
                    $sql = "SELECT name FROM categories";

                    $result = mysqli_query($link, $sql);
                    $item_count = 0;

                    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) :
                        $name = $row[0]; ?>
                        <li class="listing-item" data-category="<?php echo $name; ?>"><a href="#"><?php echo $name; ?></a></li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
        <div class="products-list">
            <div class="product-row">
                <?php
                $sql = "SELECT p.name, p.price, p.sale_price, p.image, c.name FROM products p INNER JOIN categories c ON p.category_id = c.id;";

                $result = mysqli_query($link, $sql);
                $item_count = 0;

                while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) :
                    $image_row = base64_encode($row[3]);
                    $image = 'data:image/jpeg;base64,' . $image_row;
                    $product_name = $row[0];
                    $product_sale_price = $row[2];
                    $product_price = $row[1];
                    $category_name = $row[4]; ?>

                    <div class="product" data-category="<?php echo $category_name; ?>">
                        <a href="#">
                            <div class="product-image-wrapper">
                                <img src="<?php echo $image; ?>" alt="<?php echo $product_name; ?>" class="product-image">
                            </div>
                            <h4 class="product-title"><?php echo $product_name; ?></h4>
                            <div class="product-prices">
                                <p class="product-price">$ <?php echo $product_sale_price; ?>.00</p>
                                <p class="product-price product-price--sale">$ <?php echo $product_price; ?>.00</p>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
</section>

<?php include_once('parts/gallery.php'); ?>

<section class="simple-section light section--full">
    <div class="container">
        <div class="flex-columns">
            <div class="tall-image">
                <img src="./img/latest-man.png" alt="man-tall">
            </div>
            <div class="section-info--center">
                <h2>Find the best products<br />from our shop</h2>
                <p>Designers who are interested in creating perfect clothes for you.</p>
            </div>
        </div>
    </div>
</section>

<?php include_once('parts/footer.php'); ?>
</body>

</html>