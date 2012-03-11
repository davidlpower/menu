<?php
defined('SYSPATH') or die('No direct script access.');
include 'headder.php';
?>

<div id="container">
    <div id="title">
        <div class="centerTitle">
            <h1>Edit or Post new stuff!</h1>
        </div>
    </div>
    <br/>
    <?php echo Form::open('post/post/' . $post->id); ?>
    <?php echo Form::label("title", "Title"); ?>
    <br/>
    <?php echo Form::input("title", $post->title); ?>
    <br/>
    <br/>
    <?php echo Form::label("content", "Content"); ?>
    <br/>
    <?php echo Form::textarea("content", $post->content); ?>
    <br/>
    <br/>
    <?php echo Form::submit("submit", "Submit"); ?>
    <?php echo Form::close(); ?>
</div>

<?php
include 'footer.php';
?>