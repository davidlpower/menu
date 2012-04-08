<script type="text/javascript" src="/media/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        theme : "advanced",
        mode : "textareas",
        plugins : "fullpage",
        theme_advanced_buttons3_add : "fullpage"
    });
</script>

<br/>
<?php echo Form::open('admin/post/' . $post->id); ?>
<?php echo Form::label("title", "Title"); ?>
<br/>
<?php
if ($post->type == null)
{
    Form::label("type", "Type");
    Form::input("type", $post->type);
}
?>
<?php echo Form::input("title", $post->title, $settings = array("style='height:35px; width: 80%; font-size: large;'")); ?>
<br/>
<br/>
<?php echo Form::label("content", "Content"); ?>
<?php echo Form::textarea("content", $post->content, $settings = array("style='width: 80%; height: 400px'")); ?>
<br/>
<br/>
<?php echo Form::label("category", "Category"); ?>

<select id="category" name="category">
    <?php
    // print the groups available to the user here.
    foreach ($category as $id => $category) {
        echo '<option value="' . $id . '" ';
        echo ' >';
        echo $category;
        echo '</option>';
    }
    ?>
</select>

<br/>
<br/>
<?php echo Form::submit("submit", "Submit"); ?>
<?php echo Form::close(); ?>
