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
<?php echo Form::label("type", "Type"); ?>
<select id="type" name="type">
    <?php
    // print the groups available to the user here.
    foreach ($category as $id => $category) {
        echo '<option value="' . $id . '" ';
        if (isset($current_type))
        {
            if ($id == $current_type['type'])
            {
                echo 'selected="selected"';
            }
        }
        echo ' >';
        echo $category;
        echo '</option>';
    }
    ?>
</select>
<input type="hidden" value="<?php echo date('Y-m-d H:i:s') ?>" id="dateAdded" name="dateAdded">
<br/>
<br/>
<label for="published" class="published-label">Published: </label>
<?php
    echo Form::radio('Published', 1, 1);
    echo Form::radio('Published', 0, 0);
?>
<br/>
<br/>
<?php echo Form::submit("submit", "Submit"); ?>
<?php echo Form::close(); ?>
