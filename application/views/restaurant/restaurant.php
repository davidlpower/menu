<?php
defined('SYSPATH') or die('No direct script access.');
include 'headder.php';
?>
<div id="container">
    <div id="title">
        <h1>Our Restaurants</h1>
        <!--Display new menu-->
        <div id="menuBar">
            <!-- Add a link to the home page. -->
            <?php echo HTML::anchor("restaurant/newRestaurant", "Add Restaurants"); ?>
        </div>

    </div>
    <?php foreach ($restaurantItems as $restaurant) : ?>

    <div class="menuItem">

        <h2><?php echo $restaurant->c_name; ?></h2>
        <pre><?php echo $restaurant->c_address; ?></pre>
        <?php echo HTML::anchor("restaurant/editRestaurant/" . $restaurant->id, "Edit"); ?>
        <?php echo HTML::anchor("restaurant/deleteRestaurant/" . $restaurant->id, "Delete"); ?>

    </div>

    <?php endforeach; ?>

</div>
<?php
include 'footer.php';
?>