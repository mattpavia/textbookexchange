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

<section class="about_section">
    <h1>What is Textbook Exchange?</h1>
    <p>The Lehigh bookstore is grossly overcharging students to buy and sell their textbooks. Textbook Exchange was created for Lehigh students to save money by creating a student marketplace for textbooks.</p>
    <p>Looking to buy or sell a textbook? Start by locating your course and clicking the corresponding textbook to find textbooks for sale. You can contact the seller or list your own textbook from the textbook page.</p>
    <p>When finished, check out the My Listings page to see what books you have listed and remove any you may have sold.</p>
    <p>Thanks for using Textbook Exchange and enjoy!</p>
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
        <?php echo form_input(array('name' => 'email', 'id' => 'email', 'placeholder' => 'Lehigh Email')); ?>
        <?php echo form_password(array('name' => 'password', 'id' => 'password', 'placeholder' => 'Password')); ?>
        <?php echo form_submit(array('name' => 'submit', 'value' => 'Login', 'class' => 'submit')); ?>
    </div>
<?php echo form_close(); ?>

<hr>

<div class="register_link">
    <h3>Don't have an account?</h3>
    <a href="<?php echo site_url('register') ?>">Create one!</a>
</div>

<?php $this->load->view('footer'); ?>