<?php $this->load->view('header'); ?>


<?php echo form_open('main/create', array('class' => 'register_form')); ?>
    <div class="register_header">Please enter your Lehigh email address to create an account.</div>
    <div class="register_sub">An email will be sent to your email address with information on how to finish registering.</div>
    <div class="register_sub">If you don't see the email in your inbox, <strong>please check your spam folder</strong>.</div>
    <div class="input">
        <?php echo form_input(array('name' => 'email', 'id' => 'email', 'placeholder' => 'Lehigh Email')); ?>
        <?php echo form_submit(array('name' => 'submit', 'value' => 'Register', 'class' => 'submit')); ?>
    </div>
<?php echo form_close(); ?>

<?php $this->load->view('footer'); ?>