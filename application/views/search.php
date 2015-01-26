<?php $this->load->view('header'); ?>

<section class="popular_wrapper">

    <section class="popular_textbooks">
        <h1 class="title">Textbook Results</h1>
        <ul>
            <?php foreach($textbooks as $textbook) { ?>
            <li>
                <p class="pop_title"><a href="<?php echo site_url() . "textbooks/" . $textbook->id; ?>"><?php echo $textbook->title; ?></a></p>
                <span>Average: <?php echo "$" . $textbook->price; ?></span>
            </li>
            <hr class="short">
            <?php } ?>
        </ul>
    </section>

    <section class="popular_courses">
        <h1 class="title">Course Results</h1>
        <ul>
            <?php foreach($courses as $course) { ?>
            <li>
                <p><a href="<?php echo site_url() . "courses/" . $course->id; ?>"><?php echo strtoupper($course->department) . " " . $course->course_number . ": " . $course->name; ?></a></p>
                <span>Professor: <?php echo $course->professor; ?></span>
            </li>
            <hr class="short">
            <?php } ?>
        </ul>
    </section>

</section>

<div style="clear: both;"></div>

<?php $this->load->view('footer'); ?>