<?php
$active_page = 'contact';
include_once('./parts/header.php');
?>

<section class="hero-section hero-section--shop overlay overlay-dark bg-image dark">
    <h1 class="title--centered">Contact us</h1>
</section>

<section class="simple-section shop-by-category light">
    <div class="container">
        <h2 class="title--centered">Get in Touch</h2>
        <div class="contact-form">
            <form action="#">
                <textarea name="message" cols="30" rows="10" placeholder="Message" class="contact-input contact-message"></textarea>
                <div class="contact-name flex-columns">
                    <input type="text" placeholder="First name" class="contact-input contact-first-name">
                    <input type="text" placeholder="Last name" class="contact-input">
                </div>
                <a href="#" class="btn btn-blue contact-send">Send</a>
            </form>
        </div>
    </div>
</section>

<section class="map">
    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A7fc517671c0a98548be8e925b0c9e7e2ac1c5b338517bc01a705030ed8baf5b2&amp;source=constructor" width="1030" height="400" frameborder="0"></iframe>
</section>

<?php include_once('parts/gallery.php'); ?>

<?php include_once('parts/footer.php'); ?>
</body>

</html>