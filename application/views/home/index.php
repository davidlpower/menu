<?php
    defined('SYSPATH') or die('No direct script access.');
    include 'headder.php';
?>

<div id="container">

    <div id="title">

        <div class="centerTitle">
            <h1>Exposition</h1>
        </div>

        <!--Display new menu-->
        <div id="menuBar">
            <!-- Add a link to the home page. -->
            <?php echo HTML::anchor("menu/new", "New Menu Item"); ?>
            |
            <?php echo HTML::anchor("restaurant/restaurant", "View Restaurants"); ?>
        </div>

    </div>

    <?php foreach ($menuItems as $menu) : ?>

    <div class="menuItem">

        <h2><?php echo $menu->title; ?></h2>
        <pre><?php echo $menu->content; ?></pre>
        <?php echo HTML::anchor("menu/edit/" . $menu->id, "Edit"); ?>
        <?php echo HTML::anchor("menu/delete/" . $menu->id, "Delete"); ?>

    </div>

    <?php endforeach; ?>

</div>

<?php
    include 'footer.php';
?>
