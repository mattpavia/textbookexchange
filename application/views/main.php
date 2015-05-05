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
    <p>Textbook Exchange is a place for Lehigh students to buy and sell their textbooks.</p>
    <p>The bookstore grossly overcharges for textbooks each semester and gives you less than half of what you paid when you go to sell the same textbook back to them at the end of the semester.</p>
    <p>Our goal is to remove the bookstore from the picture. Here you can buy and sell your textbooks directly from Lehigh students who have the textbook you need.</p> 
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