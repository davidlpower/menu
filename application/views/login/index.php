<?php echo Form::open('login/'); ?>
<?php echo Form::label("username", "Username"); ?>
<br/>
<?php echo Form::input("username"); ?>
<br/>
<?php echo Form::label("password", "Password"); ?>
<?php echo Form::password("password"); ?>
<br/>
<?php echo Form::submit("submit", "Login"); ?>
<?php echo Form::close(); ?>