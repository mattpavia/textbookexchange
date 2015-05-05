<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Textbook Exchange</title>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:800,600,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Gentium+Basic' rel='stylesheet' type='text/css'>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
</head>
<body>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-62602712-1', 'auto');
        ga('send', 'pageview');

    </script>

    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <header>

        <?php if ($this->session->flashdata('success_flash')) { ?>
            <div class="success_flash_message flash_message"><?php echo $this->session->flashdata('success_flash'); ?></div>
        <?php } ?>

        <?php if ($this->session->flashdata('fail_flash')) { ?>
            <div class="fail_flash_message flash_message"><?php echo $this->session->flashdata('fail_flash'); ?></div>
        <?php } ?>
    
        <h1>Textbook Exchange</h1>
        <?php if ($this->session->userdata('user_id')) { ?>
        <ul>
            <li><a href="<?php echo site_url(); ?>">Home</a></li>
            <li><a href="<?php echo site_url(); ?>textbooks">Textbooks</a></li>
            <li><a href="<?php echo site_url(); ?>courses">Courses</a></li>
            <li><a href="<?php echo site_url(); ?>user">My Listings</a></li>
            <li><a href="<?php echo site_url(); ?>logout">Logout</a></li>
        </ul>

        <?php echo form_open('search', array('name' => 'search_form')); ?>
        <input type="text" name="search_value" class="header_search" placeholder="Search ISBN, Textbook Name, Course">
        <a href="#" onclick="document.search_form.submit(); return false;"><i class="fa fa-search"></i></a>
        </form>
        <?php } ?>
    </header>

    <main>