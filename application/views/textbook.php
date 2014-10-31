<?php $this->load->view('header'); ?>

<div class="single_item">
	<div class="item_list_title"><?php echo $textbook->title; ?></a></div>
	<div>Author: <?php echo $textbook->author; ?></div>
	<div>Average: <?php echo "$" . $textbook->price; ?></div>
	<div>Amazon: n/a</div>
</div>
    
<?php $this->load->view('footer'); ?>