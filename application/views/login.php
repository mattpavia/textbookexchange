<?php $this->load->view('header'); ?>

<section class="getting_started">
    <!-- <h1 class="title">Getting Started</h1> -->
    <ul>
        <li>
            <i class="fa fa-sign-in"></i>
            <div>
                <p class="big_title title">Login</p>
                <p>Login with Lehigh account</p>
            </div>
        </li>
        <li class="arrow">
            <i class="fa fa-long-arrow-right"></i>
        </li>
        <li>
            <i class="fa fa-search"></i>
            <div>
                <p class="big_title title">Search</p>
                <p>Search for textbooks or courses</p>
            </div>
        </li>
        <li class="arrow">
            <i class="fa fa-long-arrow-right"></i>
        </li>
        <li>
	        <i class="fa fa-book"></i>
	        <div>
	            <p class="big_title title">List</p>
	            <p>Create a textbook listing</p>
	        </div>
        </li>
    </ul>
</section>

<hr>

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