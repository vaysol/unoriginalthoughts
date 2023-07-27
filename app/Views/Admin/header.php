<?php $menu_item_ids = session()->get('admin_user_menu_items'); 
$menu_items = explode(",", $menu_item_ids) ;
?>
<?php helper('custom'); ?>

<!Doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unoriginalthoughts</title>
    <link href="<?php echo base_url('admin-assets/logo/favicon.svg'); ?>" rel="shortcut icon" type="image/x-icon" />

    <!-- Online -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- Bootstrap CSS  -->
    <!-- Datatables -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- Datatables -->
    <!-- select -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- select -->


    <!-- Offline -->
    <!-- Font awsome -->
    <link rel="stylesheet" href="<?php echo base_url('admin-assets/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
    <!--  -->
    <!-- CK editor -->
    <script src="<?php echo base_url('/admin-assets/ckeditor/ckeditor.js'); ?>"></script>
    <!-- CK editor -->
    
    <!-- custom -->
    <link href="<?php echo base_url('admin-assets/css/admin-master.css'); ?>" rel="stylesheet">
    <!-- custom -->

</head>

<body id="body-pd" class="body-pd">
    <header class="header body-pd" id="header">
        <div class="header_toggle"> <i class='bx bx-menu bx-x"' id="header-toggle"></i> </div>
    </header>
    <div class="l-navbar show" id="nav-bar">
    <!-- <div class="logo-img">
        <img src="<?php echo base_url('admin-assets/logo/logo.svg') ?>" alt="">
    </div> -->
        <nav class="nav">
            <div>
                <div class="nav_list">
                    
                    <a href="<?php echo base_url('/admin/dashboard') . '/' ?>" class="nav_link">
                        <em class='fa fa-home'></em>
                        <span class="nav_name">Dashboard</span>
                    </a>
                    <?php if(in_array(1, $menu_items)) { ?>
                    <a href="<?php echo base_url('/admin/admin-users') . '/' ?>" class="nav_link">
                        <em class='fa fa-user-o'></em> <span class="nav_name">Admin users</span>
                    </a>
                    <?php } ?>

                    <?php if(in_array(2, $menu_items)) { ?>
                    <a href="<?php echo base_url('/admin/admin-roles') . '/' ?>" class="nav_link">
                        <em class='fa fa-address-card-o'></em> <span class="nav_name">Admin Roles</span>
                    </a>
                    <?php } ?>
                    

                    <?php if(in_array(3, $menu_items)) { ?>
                    <a href="<?php echo base_url('/admin/banners') . '/' ?>" class="nav_link">
                        <em class='fa fa-picture-o'></em> <span class="nav_name">Banners</span>
                    </a>
                    <?php } ?>

                    <?php if(in_array(4, $menu_items)) { ?>
                    <a href="<?php echo base_url('/admin/testimonials') . '/' ?>" class="nav_link">
                        <em class='fa fa-video-camera'></em> <span class="nav_name">Testimonials</span>
                    </a>
                    <?php } ?>

                    <?php if(in_array(5, $menu_items)) { ?>
                    <a href="<?php echo base_url('/admin/blogs') . '/' ?>" class="nav_link">
                        <em class='fa fa-pencil-square-o'></em> <span class="nav_name">Blogs</span>
                    </a>
                    <?php } ?>

                    <?php if(in_array(6, $menu_items)) { ?>
                    <a href="<?php echo base_url('/admin/news-events') . '/' ?>" class="nav_link">
                        <em class='fa fa-newspaper-o'></em> <span class="nav_name">News and Events</span>
                    </a>
                    <?php } ?>

                    <?php if(in_array(7, $menu_items)) { ?>
                    <a href="<?php echo base_url('/admin/research-papers') . '/' ?>" class="nav_link">
                        <em class='fa fa-file-text-o'></em> <span class="nav_name">Research papers</span>
                    </a>
                    <?php } ?>

                    <?php if(in_array(8, $menu_items)) { ?>
                    <a href="<?php echo base_url('/admin/case-studies') . '/' ?>" class="nav_link">
                        <em class='fa fa-commenting-o'></em> <span class="nav_name">Case Studies</span>
                    </a>
                    <?php } ?>

                    <?php if(in_array(9, $menu_items)) { ?>
                    <a href="<?php echo base_url('/admin/blog-categories') . '/' ?>" class="nav_link">
                        <em class='fa fa-video-camera'></em> <span class="nav_name">Blog Categories</span>
                    </a>
                    <?php } ?>

                    <?php if(in_array(10, $menu_items)) { ?>
                    <a href="<?php echo base_url('/admin/doctors') . '/' ?>" class="nav_link">
                        <em class='fa fa-user'></em> <span class="nav_name">Doctors</span>
                    </a>
                    <?php } ?>

                    <?php if(in_array(11, $menu_items)) { ?>
                    <a href="<?php echo base_url('/admin/specialities') . '/' ?>" class="nav_link">
                        <em class='fa fa-external-link-square'></em> <span class="nav_name">Specialities</span>
                    </a>
                    
                    <?php } ?>

                    <?php if(in_array(12, $menu_items)) { ?>
                    <a href="<?php echo base_url('/admin/subscriptions') . '/' ?>" class="nav_link">
                        <em class='fa fa-thumbs-o-up'></em> <span class="nav_name">Subscription</span>
                    </a>
                    <?php } ?>

                    <?php if(in_array(13, $menu_items)) { ?>
                    <a href="<?php echo base_url('/admin/partner-with-us') . '/' ?>" class="nav_link">
                        <em class='fa fa-user-plus'></em> <span class="nav_name">  Partner With Us</span>
                    </a>
                    <?php } ?>

                    <?php if(in_array(14, $menu_items)) { ?>
                    <a href="<?php echo base_url('/admin/careers') . '/' ?>" class="nav_link">
                        <em class='fa fa-building'></em> <span class="nav_name">  Careers</span>
                    </a>
                    <?php } ?>

                    <?php if(in_array(15, $menu_items)) { ?>
                    <a href="<?php echo base_url('/admin/contact-us') . '/' ?>" class="nav_link">
                        <em class='fa fa-phone'></em> <span class="nav_name"> Contact Us</span>
                    </a>
                    <?php } ?>

                    <?php if(in_array(16, $menu_items)) { ?>
                    <a href="<?php echo base_url('/admin/leaders') . '/' ?>" class="nav_link">
                        <em class='fa fa-users'></em> <span class="nav_name">Leaders</span>
                    </a>
                    <?php } ?>

                    <?php if(in_array(17, $menu_items)) { ?>
                    <a href="<?php echo base_url('/admin/home-matrixes') . '/' ?>" class="nav_link">
                        <em class='fa fa-home'></em> <span class="nav_name">Home Matrix</span>
                    </a>
                    <?php } ?>

                    <?php if(in_array(18, $menu_items)) { ?>
                    <a href="<?php echo base_url('/admin/jobs') . '/' ?>" class="nav_link">
                        <em class='fa fa-building'></em> <span class="nav_name">Jobs</span>
                    </a>
                    <?php } ?>
      
                    <a href="<?php echo base_url('/admin/logout') . '/' ?>" onclick="return confirm('Are you sure! You want to logout?')" class="blogs nav_link">
                        <em class='fa fa-sign-out'></em> <span class="nav_name">Logout</span>
                    </a>

                </div>
            </div>
        </nav>
    </div>