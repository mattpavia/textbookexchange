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
    <p>Textbook Exchange is a place for Lehigh students to buy and sell their textbooks.</p>
    <p>The bookstore grossly overcharges for textbooks each semester and gives you less than half of what you paid when you go to sell the same textbook back to them at the end of the semester.</p>
    <p>Our goal is to remove the bookstore from the picture. Here you can buy and sell your textbooks directly from Lehigh students who have the textbook you need.</p> 
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