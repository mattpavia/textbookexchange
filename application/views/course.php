<?php $this->load->view('header'); ?>

<div class="single_item">
	<div class="item_list_title"><?php echo strtoupper($course->department) . " " . $course->course_number . ": " . $course->name; ?></div>
	<div class="item_wrapper">
		<div class="item_left"><img src="<?php echo $image_url; ?>"></div>
		<div class="item_right">
			<p>Professor: <?php echo $course->professor; ?></p>
		</div>
	</div>
	<div class="clear"></div>
</div>
    
<?php $this->load->view('footer'); ?>