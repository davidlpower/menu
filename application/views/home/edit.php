<?php
defined('SYSPATH') or die('No direct script access.');
include 'headder.php';
?>
<div id="container">
    <div id="title">
        <h1>Create new menu item</h1>
    </div>
    <br/>
    <?php echo Form::open('menu/post/' . $menu->id); ?>
    <?php echo Form::label("title", "Title"); ?>
    <br/>
    <?php echo Form::input("title", $menu->title); ?>
    <br/>
    <br/>
    <?php echo Form::label("content", "Content"); ?>
    <br/>
    <?php echo Form::textarea("content", $menu->content); ?>
    <br/>
    <br/>
    <?php echo Form::submit("submit", "Submit"); ?>
    <?php echo Form::close(); ?>
</div>
<?php
include 'footer.php';
?>