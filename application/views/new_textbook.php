<?php $this->load->view('header'); ?>

<?php echo form_open('textbooks/submit', array('class' => 'textbook_form')); ?>
    <div class="page_header">List a Textbook</div>
    <div class="input">
        <input type="text" name="isbn" placeholder="ISBN" />
        <!-- <input type="text" name="author" placeholder="Author" /> -->
        <!-- <input type="text" name="title" placeholder="Title" /> -->
        <input type="text" name="price" placeholder="Price" />
    </div>
    <input type="submit" value="Submit" class="submit" />
</form>
    
<?php $this->load->view('footer'); ?>
