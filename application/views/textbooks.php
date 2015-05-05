<?php $this->load->view('header'); ?>

<h1 class="list_header">All Textbooks</h1>
<table class="item_list">
	<tr class="table_head">
	<td>Title</td>
	<td>Author</td>
	<td>Price</td>
	</tr>
    <?php foreach($textbooks as $textbook) { ?>
    <tr>
        <td class="table_title"><a href="<?php echo site_url() . "textbooks/" . $textbook->id; ?>"><?php echo $textbook->title; ?></a></td>
        <td><?php echo $textbook->author; ?></td>
        <td><?php echo "$" . $textbook->price; ?></td>
    </tr>
    <?php } ?>
</table>
    
<?php $this->load->view('footer'); ?>