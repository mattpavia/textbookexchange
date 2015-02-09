<?php $this->load->view('header'); ?>

<div class="single_item">
	<div class="item_list_title"><?php echo $textbook->title; ?></a></div>
	<div><img src="<?php echo $image_url; ?>"></div>
	<div>Author: <?php echo $textbook->author; ?></div>
	<div>User Price: <?php echo "$" . $textbook->price; ?></div>
	<div>Amazon List Price: <?php echo $list_price; ?></div>
	<div>Amazon Lowest New Price: <?php echo $lowest_new_price; ?></div>
	<div>Amazon Lowest Used Price: <?php echo $lowest_used_price; ?></div>
	<?php if ($user) { ?>
	<div>User: <?php echo $user->first_name . $user->last_name; ?></div>
	<div>Email: <a href="mailto:<?php echo $user->username . "@lehigh.edu"; ?>"><?php echo $user->username . "@lehigh.edu"; ?></a></div>
	<?php } ?>
</div>
    
<?php $this->load->view('footer'); ?>