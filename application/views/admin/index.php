<div id="container">

    <div id="title">

        <div class="centerTitle">
            <h1><?php echo($title) ?></h1>
        </div>

        <!--Display new menu-->
        <?php include 'application/views/template/menuBar.php';?>

    </div>

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

</div>
