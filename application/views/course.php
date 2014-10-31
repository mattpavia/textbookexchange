<?php $this->load->view('header'); ?>

<div class="single_item">
	<div class="item_list_title"><?php echo strtoupper($course->department) . " " . $course->course_number . ": " . $course->name; ?></div>
	<div>Professor: <?php echo $course->professor; ?></div>
	<div>Avg Rating: n/a</div>
</div>
    
<?php $this->load->view('footer'); ?>