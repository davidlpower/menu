<script type="text/javascript" src="/media/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
        theme : "advanced",
        mode : "textareas",
        plugins : "fullpage",
        theme_advanced_buttons3_add : "fullpage"
});
</script>

<div id="container">
    <div id="title">
        <div class="centerTitle">
            <h1>Edit or Post new stuff!</h1>
        </div>
    </div>
    <div class="centerTitle">
        <br/>
        <?php echo Form::open('admin/post/' . $post->id); ?>
        <?php echo Form::label("title", "Title: "); ?>
        <?php echo Form::input("title", $post->title, $settings=array("size='100'","style='height:35px; font-size: large;'")); ?>
        <br/>
        <br/>
        <div class="floatLeft">
            <?php echo Form::label("content", "Content"); ?>
        </div>
        <?php echo Form::textarea("content", $post->content, $settings=array("style='WIDTH: 650px; HEIGHT: 400px'")); ?>
        <br/>
        <br/>
        <?php echo Form::submit("submit", "Submit"); ?>
        <?php echo Form::close(); ?>
    </div>
</div>