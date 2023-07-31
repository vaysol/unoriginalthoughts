<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Unoriginal Thoughts</title>
    <meta
        content="Vaysol is a leading web development company dedicated to delivering exceptional web solutions to businesses of all sizes. Our team of experienced developers, designers, and project managers work together to bring your ideas to life, providing innovative, functional, and user-friendly websites."
        name="description">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/old/css/style.css">
    <link rel="icon" href="<?php echo base_url(); ?>assets/old/images/website/icon.png">

    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>assets/img/icon/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url(); ?>assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <!-- <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
    a {
        text-decoration: none;
    }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top m-0">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="<?php echo base_url(); ?>" class="logo d-flex align-items-center">
                <img class="img-logo" src="<?php echo base_url(); ?>assets/img/icon/logo.png" alt="">
            </a>
            <!-- Navigation Bar -->
            <nav class="navbar active">
                <a href="<?php echo base_url(); ?>">Home</a>
                <a href="products">Products</a>
                <a href="portfolio">Portfolio</a>
                <a id="yellow-font" href="sale">Sale</a>
                <a href="about">About Us</a>
                <!-- <a href="contact">Contact Us</a> -->
            </nav>

            <div class="icons">
                <i class="fas fa-bars" id="menu-bars"></i>
                <i class="fas fa-search" id="search"></i>
                <i class="fas fa-heart" id="wishlist" onclick="window.open('wishlist.php', '_self')"></i>
                <i class="fas fa-shopping-basket" id="addToCart"></i>
                <i class="fas fa-user" id="Account"></i>
            </div>

            <!-- Search pop-up -->
            <div class="search-form">
                <input type="search" id="search-box" placeholder="Search here..">
                <label for="search-box" class="fas fa-search"></label>
            </div>

        </div>
    </header><!-- End Header -->