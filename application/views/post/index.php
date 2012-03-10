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
            <!-- Add a link to the post page. -->
            <?php echo HTML::anchor("post/new", "New post"); ?>
        </div>

    </div>

    <?php foreach ($postItems as $post) : ?>

    <div class="menuItem">

        <h2><?php echo $post->title; ?></h2>
        <pre><?php echo $post->content; ?></pre>
        <?php echo HTML::anchor("post/edit/" . $post->id, "Edit"); ?>
        <?php echo HTML::anchor("post/delete/" . $post->id, "Delete"); ?>

    </div>

    <?php endforeach; ?>

</div>

<?php
    include 'footer.php';
?>