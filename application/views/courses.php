<?php $this->load->view('header'); ?>

<h1 class="list_header">All Courses</h1>
<ul class="item_list">
    <?php foreach($courses as $course) { ?>
    <li>
        <div class="item_list_title"><a href="<?php echo site_url() . "courses/" . $course->id; ?>"><?php echo strtoupper($course->department) . " " . $course->course_number . ": " . $course->name; ?></a></div>
        <div>Professor: <?php echo $course->professor; ?></div>
    </li>
    <hr class="short">
    <?php } ?>
</ul>
    
<?php $this->load->view('footer'); ?>