<script type="text/javascript" src="/media/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        theme : "advanced",
        mode : "textareas",
        plugins : "fullpage",
        theme_advanced_buttons3_add : "fullpage"
    });
</script>

<?php Blog::debugPrint('id: ' . $category['id'] . ' Cat:' . $category['category'])
        ?>

    <br/>
    <?php echo Form::open('admin/post/' . $post->id); ?>
    <?php echo Form::label("title", "Title"); ?>
    <br/>
    <?php
        if($post->type == null){
            Form::label("type", "Type");
        }   Form::input("type", $post->type);
    ?>
    <?php echo Form::input("title", $post->title, $settings = array("style='height:35px; width: 80%; font-size: large;'")); ?>
    <br/>
    <br/>
    <?php echo Form::label("content", "Content"); ?>
    <?php echo Form::textarea("content", $post->content, $settings = array("style='width: 80%; height: 400px'")); ?>
    <br/>
    <br/>
    <?php echo Form::label("category", "Category"); ?>
    <?php echo Form::select("category", $category['category']); ?><br/>
    <br/>
    <?php echo Form::submit("submit", "Submit"); ?>
    <?php echo Form::close(); ?>
