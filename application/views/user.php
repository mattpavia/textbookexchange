<?php $this->load->view('header'); ?>

<h1 class="user_title">User</h1>

<?php if (count($textbooks) > 0) { ?>
<table class="item_list">
	<tr class="table_head">
	<td>Textbook Title</td>
	<td>Price</td>
	<td>Delete</td>
	</tr>
    <?php foreach($textbooks as $textbook) { ?>
    <tr>
        <td><?php echo $textbook->title; ?></td>
        <td><?php echo "$" . $textbook->user_price; ?></td>
        <td><a href="<?php echo site_url('delete_textbook/' . $textbook->listed_id); ?>"><div class="delete_textbook_icon"><i class="fa fa-trash-o"></i></div></a></td>
    </tr>
    <?php } ?>
</table>
<?php } else { ?>
<div class="no_data_for_table">No student textbooks found.</div>
<?php } ?>
    
<?php $this->load->view('footer'); ?>