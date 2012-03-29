<?php foreach ($postItems as $post) : ?>

    <div class="menuItem">
        <h2><?php echo $post->title; ?></h2>
        <?php echo $post->content; ?>
        <br />
        <?php echo HTML::anchor("admin/edit/" . $post->id, "Edit"); ?>
        <?php echo " | "; ?>
        <?php echo HTML::anchor("admin/delete/" . $post->id, "Delete"); ?>

    </div>

<?php endforeach; ?>