<?php $this->load->view('header'); ?>

<?php echo form_open('main/update', array('class' => 'register_form')); ?>
    <div class="register_header">Please pick a password for account <?php echo $user->email; ?>.</div>
    <div class="input">
        <?php echo form_password(array('name' => 'password', 'id' => 'password', 'placeholder' => 'Password')); ?>
        <?php echo form_hidden('email', $user->email); ?>
        <?php echo form_submit(array('name' => 'submit', 'value' => 'Add Textbook', 'class' => 'submit')); ?>
    </div>
<?php echo form_close(); ?>

<?php $this->load->view('footer'); ?>