<div id="container">

    <div id="title">

        <div class="centerTitle">
            <h1><?php echo($title) ?></h1>
        </div>

        <!--Display new menu-->
        <div id="menuBar">
            <div class="centerTitle">
                <!-- Add a link to the post page. -->
                <?php echo HTML::anchor("/", "Software"); ?>
                <?php echo " | " ?>
                <?php echo HTML::anchor("/electronics", "Electronics"); ?>
                <?php echo " | " ?>
                <?php echo HTML::anchor("/music", "Music"); ?>
                <?php echo " | " ?>
                <?php echo HTML::anchor("/everything_else", "Everything Else"); ?>
                <?php echo " | " ?>
                <?php echo HTML::anchor("/contact", "Contact"); ?>
            </div>
        </div>

    </div>

    <?php foreach ($postItems as $post) : ?>
        <div class="menuItem">
            <h2><?php echo $post->title; ?></h2>
            <?php echo $post->content; ?>
        </div>

    <?php endforeach; ?>

</div>
