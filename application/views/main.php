<?php $this->load->view('header'); ?>

<section class="getting_started">
    <!-- <h1 class="title">Getting Started</h1> -->
    <ul>
        <li class="completed">
            <i class="fa fa-check"></i>
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
            <a href="#" class="search_header_button"><i class="fa fa-search"></i>
            <div>
                <p class="big_title title">Search</p>
                <p>Search for textbooks or courses</p>
            </div></a>
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

<section class="popular_wrapper">

    <section class="popular_textbooks">
        <h1 class="title">Featured Textbooks</h1>
        <ul>
            <?php foreach($textbooks as $textbook) { ?>
            <li>
                <p class="pop_title"><a href="<?php echo site_url() . "textbooks/" . $textbook->id; ?>"><?php echo $textbook->title; ?></a></p>
                <span>Price: <?php echo "$" . $textbook->price; ?></span>
                <span>Author: <?php echo $textbook->author; ?></span>
                <!-- <span>Amazon: n/a</span> -->
            </li>
            <hr class="short">
            <?php } ?>
        </ul>
    </section>

    <section class="popular_courses">
        <h1 class="title">Featured Courses</h1>
        <ul>
            <?php foreach($courses as $course) { ?>
            <li>
                <p><a href="<?php echo site_url() . "courses/" . $course->id; ?>"><?php echo strtoupper($course->department) . " " . $course->course_number . ": " . $course->name; ?></a></p>
                <span>Professor: <?php echo $course->professor; ?></span>
                <!-- <span>Avg Rating: n/a</span> -->
            </li>
            <hr class="short">
            <?php } ?>
        </ul>
    </section>

</section>

<div style="clear: both;"></div>
    
<?php $this->load->view('footer'); ?>