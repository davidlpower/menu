<!--Display new menu-->
<div id="menuBar">
    <div class="centerTitle">
        <?php echo HTML::anchor('admin/new','New Post') ?>
        <?php echo " | " ?>
        <?php echo HTML::anchor('admin/software','Software') ?>
        <?php echo " | " ?>
        <?php echo HTML::anchor('admin/electronics','Electronics') ?>
        <?php echo " | " ?>
        <?php echo HTML::anchor('admin/music','Music') ?>
        <?php echo " | " ?>
        <?php echo HTML::anchor('admin/cooking','Cooking') ?>
        <?php echo " | " ?>
        <?php echo HTML::anchor('admin/everything_else','Everything Else') ?>
        <?php echo " | " ?>
        <?php echo HTML::anchor('contact','Say Hello') ?>
        <?php 
        if(Auth::instance()->logged_in())
        {
            echo " | ";
            echo HTML::anchor('admin/logout','Logout');
        }
        ?>

    </div>
</div>