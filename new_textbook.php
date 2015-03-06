<?php $this->load->view('header'); ?>

<?php echo form_open('textbooks/submit', array('class' => 'textbook_form')); ?>
    <div class="page_header">List a Textbook</div>
    <div class="input">
        <input type="text" name="isbn" placeholder="ISBN" />
    </div>
    <input type="submit" value="Submit" class="submit" />
</form>
    
<?php $this->load->view('footer'); ?>
