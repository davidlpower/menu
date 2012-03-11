<!--Display new menu-->
<div id="menuBar">
    <div class="centerTitle">
        <!-- Add a link to the post page. -->
        <?php echo HTML::anchor("admin/new", "New Post"); ?>
        <?php echo " | " ?>
        <?php echo HTML::anchor("admin/", "Software"); ?>
        <?php echo " | " ?>
        <?php echo HTML::anchor("admin/", "Electronics"); ?>
        <?php echo " | " ?>
        <?php echo HTML::anchor("admin/", "Music"); ?>
        <?php echo " | " ?>
        <?php echo HTML::anchor("admin/", "Everything Else"); ?>
        <?php echo " | " ?>
        <?php echo HTML::anchor("post/", "Contact"); ?>
    </div>
</div>