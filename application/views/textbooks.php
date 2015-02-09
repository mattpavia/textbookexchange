<?php $this->load->view('header'); ?>

<div class="list_textbook"><a href="<?php echo site_url() . "textbooks/new"; ?>"><i class="fa fa-plus"></i> List a textbook</a></div>

<h1 class="list_header">All Textbooks</h1>
<ul class="item_list">
    <?php foreach($textbooks as $textbook) { ?>
    <li>
        <div class="item_list_title"><a href="<?php echo site_url() . "textbooks/" . $textbook->id; ?>"><?php echo $textbook->title; ?></a></div>
        <div>Author: <?php echo $textbook->author; ?></div>
        <!-- <div>Average: <?php echo "$" . $textbook->price; ?></div> -->
    </li>
    <hr class="short">
    <?php } ?>
</ul>
    
<?php $this->load->view('footer'); ?>