<?php
defined('SYSPATH') or die('No direct script access.');
include 'headder.php';
?>
<div id="container">

    <div id="title">
        <h1>Edit Restaurants</h1>
    </div>

    <br/>
    <?php echo Form::open('restaurant/postRestaurant/' . $restaurant->id); ?>
    <br/>
    <?php echo Form::label("c_name", "Name"); ?>
    <br/>
    <?php echo Form::input("c_name", $restaurant->c_name); ?>
    <br/>
    <br/>
    <?php echo Form::label("c_address", "Address"); ?>
    <br/>
    <?php echo Form::textarea("c_address", $restaurant->c_address); ?>
    <br/>
    <br/>
    <?php echo Form::submit("submit", "Submit"); ?>
    <?php echo Form::close(); ?>
</div>
<?php
include 'footer.php';
?>
