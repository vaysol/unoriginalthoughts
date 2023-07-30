<?php helper('custom'); ?>
<!Doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unoriginalthoughts</title>
    <link href="<?php echo base_url('admin-assets/logo/favicon.png'); ?>" rel="shortcut icon" type="image/x-icon" />

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
        <nav class="nav">
            <div>
                <div class="nav_list">
                    
                    <a href="<?php echo base_url('/admin/dashboard') . '/' ?>" class="nav_link">
                        <em class='fa fa-home'></em>
                        <span class="nav_name">Dashboard</span>
                    </a>

                    <a href="<?php echo base_url('/admin/banners') . '/' ?>" class="nav_link">
                        <em class='fa fa-picture-o'></em>
                        <span class="nav_name">Banners</span>
                    </a>

                    <a href="<?php echo base_url('/admin/product-categories') . '/' ?>" class="nav_link">
                        <em class='fa fa-bars'></em>
                        <span class="nav_name">Product Category</span>
                    </a>
                    
                    <a href="<?php echo base_url('/admin/logout') . '/' ?>" onclick="return confirm('Are you sure! You want to logout?')" class="blogs nav_link">
                        <em class='fa fa-sign-out'></em> <span class="nav_name">Logout</span>
                    </a>

                </div>
            </div>
        </nav>
    </div>