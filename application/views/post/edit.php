<?php
defined('SYSPATH') or die('No direct script access.');
include 'headder.php';
?>

<script type="text/javascript" src="media/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
        mode : "textareas"
});
</script>



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


<form method="post" action="show.php">
        <p>     
                <textarea name="content" cols="50" rows="15">This is some content that will be editable with TinyMCE.</textarea>
                <input type="submit" value="Save" />
        </p>
</form>

<?php
include 'footer.php';
?>