<?php $this->load->view('header'); ?>

<div class="single_item">
	<div class="item_list_title"><?php echo $textbook->title; ?></a></div>
	<div class="item_wrapper">
		<div class="item_left"><img src="<?php echo $image_url; ?>"></div>
		<div class="item_right">
			<p>Author: <?php echo $textbook->author; ?></p>
			<p>ISBN: <?php echo $textbook->isbn; ?></p>
			<p>Bookstore Price: <?php echo "$" . $textbook->price; ?></p>
			<p>Amazon List Price: <?php echo $list_price; ?></p>
			<p>Amazon Lowest New Price: <?php echo $lowest_new_price; ?></p>
			<p>Amazon Lowest Used Price: <?php echo $lowest_used_price; ?></p>
		</div>
	</div>
	<div class="clear"></div>
	<div class="mid_page_title">Student Listed Texbooks</div>
	<table class="item_list">
		<tr class="table_head">
		<td>User</td>
		<td>Price</td>
		</tr>
	    <?php foreach($listed_textbooks as $textbook) { ?>
	    <tr>
	        <td><a href="mailto:<?php echo $textbook->email; ?>"><?php echo $textbook->email; ?></a></td>
	        <td><?php echo "$" . $textbook->user_price; ?></td>
	    </tr>
	    <?php } ?>
	</table>
</div>
    
<?php $this->load->view('footer'); ?>