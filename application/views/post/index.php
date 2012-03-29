
    <?php foreach ($postItems as $post) : ?>
        <div class="menuItem">
            <h2><?php echo $post['title']; ?></h2>
            <?php echo $post['content']; ?>
            <div class="toRight">
                <?php echo $post['dateAdded']; ?>
            </div>
        </div>

    <?php endforeach; ?>

