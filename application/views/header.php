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
</head>
<body>

    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <header>
        <h1>Textbook Exchange</h1>
        <?php if ($this->auth_ldap->is_authenticated()) { ?>
        <ul>
            <?php if ($this->auth_ldap->is_authenticated()) { ?>
            <li><a href="<?php echo site_url(); ?>">Home</a></li>
            <li><a href="<?php echo site_url(); ?>textbooks">Textbooks</a></li>
            <li><a href="<?php echo site_url(); ?>courses">Courses</a></li>
            <li><a href="<?php echo site_url(); ?>about">About</a></li>
            <li><a href="<?php echo site_url(); ?>logout">Logout</a></li>
            <?php } ?>
        </ul>
        <input type="text" placeholder="Search ISBN, Course, Author...">
        <i class="fa fa-search"></i>
        <?php } ?>
    </header>

    <main>