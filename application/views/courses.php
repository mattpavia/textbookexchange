<?php $this->load->view('header'); ?>

<h1 class="list_header">All Courses</h1>
<table class="item_list">
	<tr class="table_head">
	<td>Name</td>
	<td>Professor</td>
	</tr>
    <?php foreach($courses as $course) { ?>
    <tr>
        <td class="table_title"><a href="<?php echo site_url() . "courses/" . $course->id; ?>"><?php echo strtoupper($course->department) . " " . $course->course_number . ": " . $course->name; ?></a></td>
        <td><?php echo $course->professor; ?></td>
    </tr>
    <?php } ?>
</table>
    
<?php $this->load->view('footer'); ?>