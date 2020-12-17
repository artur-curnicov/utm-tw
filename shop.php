<?php
$active_page = 'shop';
include_once('./parts/header.php');
?>

<section class="hero-section hero-section--shop overlay overlay-dark bg-image dark">
    <h1 class="title--centered">Shop</h1>
</section>

<section class="simple-section">
    <div class="div container">
        <div class="flex-columns">
            <h2 class="title">Product List</h2>
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
            <div class="product-filter">
                <form action="#">
                    <input type="text" name="#" placeholder="Search keyword" class="product-search">
                </form>
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
    </div>
</section>

<?php include_once('parts/gallery.php'); ?>

<?php include_once('parts/footer.php'); ?>
</body>

</html>