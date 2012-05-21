<!--Display new menu-->
<div id="menuBar">
    <div class="centerTitle">
        <?php echo HTML::anchor('software','Software') ?>
        <?php echo " | " ?>
        <?php echo HTML::anchor('electronics','Electronics') ?>
        <?php echo " | " ?>
        <?php echo HTML::anchor('music','Music') ?>
        <?php echo " | " ?>
        <?php echo HTML::anchor('cooking','Cooking') ?>
        <?php echo " | " ?>
        <?php echo HTML::anchor('everything_else','Everything Else') ?>
        <?php echo " | " ?>
        <?php echo HTML::anchor('contact','Say Hello') ?>
        <?php 
        if(!Auth::instance()->logged_in())
        {
            echo " | ";
            echo HTML::anchor('login','Login');
        }
        ?>
    </div>
</div>