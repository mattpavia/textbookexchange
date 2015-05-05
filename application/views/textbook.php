<?php $this->load->view('header'); ?>

<div class="single_item">
	<div class="item_list_title"><?php echo $textbook->title; ?></a></div>
	<div class="item_wrapper">
		<div class="item_left">
			<?php if (isset($image_url)) { ?>
			<img src="<?php echo $image_url; ?>">
			<?php } else { ?>
			<div class="book_not_found"><i class="fa fa-book"></i></div>
			<?php } ?>
		</div>
		<div class="item_right">
			<p>Author: <?php echo $textbook->author; ?></p>
			<p>ISBN: <?php echo $textbook->isbn; ?></p>
			<p>Bookstore Price: <?php echo "$" . $textbook->price; ?></p>
			<p>Amazon List Price: <?php echo isset($list_price) ? $list_price : "N/A"; ?></p>
			<p>Amazon Lowest New Price: <?php echo isset($lowest_new_price) ? $lowest_new_price : "N/A"; ?></p>
			<p>Amazon Lowest Used Price: <?php echo isset($lowest_used_price) ? $lowest_used_price : "N/A"; ?></p>
		</div>
	</div>
	<div class="clear"></div>

	
	<div class="list_textbook"><a href="#"><i class="fa fa-plus"></i> List this textbook</a></div>
	<?php echo form_open('textbooks/submit', array('class' => 'textbook_form')); ?>
	    <div class="input">
	        <input type="hidden" name="isbn" value="<?php echo $textbook->isbn; ?>" />
	        <input type="text" name="price" placeholder="Price" />
	    </div>
	    <input type="submit" value="List Textbook" class="submit" />
	</form>


	<div class="mid_page_title">Student Listed Textbooks</div>
	<?php if (count($listed_textbooks) > 0) { ?>
	<table class="item_list">
		<tr class="table_head">
		<td>Student Email</td>
		<td>Price</td>
		</tr>
	    <?php foreach($listed_textbooks as $textbook) { ?>
	    <tr>
	        <td><a href="mailto:<?php echo $textbook->email; ?>"><?php echo $textbook->email; ?></a></td>
	        <td><?php echo "$" . $textbook->user_price; ?></td>
	    </tr>
	    <?php } ?>
	</table>
	<?php } else { ?>
	<div class="no_data_for_table">No student textbooks found for sale.</div>
	<?php } ?>
</div>
    
<?php $this->load->view('footer'); ?>