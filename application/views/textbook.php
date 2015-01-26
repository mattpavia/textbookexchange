<?php $this->load->view('header'); ?>

<div class="single_item">
	<div class="item_list_title"><?php echo $textbook->title; ?></a></div>
	<div>Author: <?php echo $textbook->author; ?></div>
	<div>Price: <?php echo "$" . $textbook->price; ?></div>
	<!-- <div>Amazon: n/a</div> -->
	<?php if ($user) { ?>
	<div>User: <?php echo $user->first_name . $user->last_name; ?></div>
	<div>Email: <a href="mailto:<?php echo $user->username . "@lehigh.edu"; ?>"><?php echo $user->username . "@lehigh.edu"; ?></a></div>
	<?php } ?>
</div>
    
<?php $this->load->view('footer'); ?>