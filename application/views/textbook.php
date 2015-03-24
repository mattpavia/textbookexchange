<?php $this->load->view('header'); ?>

<div class="single_item">
	<div class="item_list_title"><?php echo $textbook->title; ?></a></div>
	<div class="item_wrapper">
		<div class="item_left"><img src="<?php echo $image_url; ?>"></div>
		<div class="item_right">
			<p>Author: <?php echo $textbook->author; ?></p>
			<p>User Price: <?php echo "$" . $textbook->price; ?></p>
			<p>Amazon List Price: <?php echo $list_price; ?></p>
			<p>Amazon Lowest New Price: <?php echo $lowest_new_price; ?></p>
			<p>Amazon Lowest Used Price: <?php echo $lowest_used_price; ?></p>
		</div>
	</div>
	<div class="clear"></div>
	<?php if ($user) { ?>
	<div>User: <?php echo $user->first_name . $user->last_name; ?></div>
	<div>Email: <a href="mailto:<?php echo $user->username . "@lehigh.edu"; ?>"><?php echo $user->username . "@lehigh.edu"; ?></a></div>
	<?php } ?>
</div>
    
<?php $this->load->view('footer'); ?>