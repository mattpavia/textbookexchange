<?php $this->load->view('header'); ?>

<section class="getting_started">
    <h1 class="title">Getting Started</h1>
    <ul>
        <li>
            <i class="fa fa-sign-in"></i>
            <div>
                <p class="big_title title">Login</p>
                <p>Login with Lehigh account</p>
            </div>
        </li>
        <li>
            <i class="fa fa-search"></i>
            <div>
                <p class="big_title title">Search</p>
                <p>Search for textbooks or courses</p>
            </div>
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

<section class="popular_wrapper">

    <section class="popular_textbooks">
        <h1 class="title">Popular Textbooks</h1>
        <ul>
            <?php foreach($textbooks as $textbook) { ?>
            <li>
                <p class="pop_title"><a href="<?php echo site_url() . "textbooks/" . $textbook->id; ?>"><?php echo $textbook->title; ?></a></p>
                <span>Average: <?php echo "$" . $textbook->price; ?></span>
                <span>Amazon: n/a</span>
            </li>
            <hr class="short">
            <?php } ?>
        </ul>
    </section>

    <section class="popular_courses">
        <h1 class="title">Popular Courses</h1>
        <ul>
            <?php foreach($courses as $course) { ?>
            <li>
                <p><a href="<?php echo site_url() . "courses/" . $course->id; ?>"><?php echo strtoupper($course->department) . " " . $course->course_number . ": " . $course->name; ?></a></p>
                <span>Professor: <?php echo $course->professor; ?></span>
                <span>Avg Rating: n/a</span>
            </li>
            <hr class="short">
            <?php } ?>
        </ul>
    </section>

</section>

<div style="clear: both;"></div>
    
<?php $this->load->view('footer'); ?>