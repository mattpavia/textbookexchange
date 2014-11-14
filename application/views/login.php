<?php $this->load->view('header'); ?>

<div class="form_errors">
<?php
echo validation_errors();
if (isset($login_error)) {
	echo "<p>" . $login_error . "</p>";
}
?>
</div>

<?php echo form_open('main/auth', array('class' => 'login_form')); ?>
    <div class="page_header">Please Login</div>
    <div class="input">
        <?php echo form_input(array('name' => 'username', 'id' => 'username', 'placeholder' => 'Username')); ?>
        <?php echo form_password(array('name' => 'password', 'id' => 'password', 'placeholder' => 'Password')); ?>
        <?php echo form_submit(array('name' => 'submit', 'value' => 'Login', 'class' => 'submit')); ?>
    </div>
<?php echo form_close(); ?>

<?php $this->load->view('footer'); ?>