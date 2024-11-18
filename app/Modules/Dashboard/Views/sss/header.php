<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="-">
    <meta name="theme-color" content="#f9ca24">
    <meta name="google" content="notranslate" />
    <title>titlw</title>
    <link rel="shortcut icon" href="assets/logokecil.png" type="image/x-icon">
    <link href="<?php echo base_url('assets/backend/plugins/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" id="style" />
    <link href="<?php echo base_url('assets/backend/css/style.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/backend/css/dark-style.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/backend/css/transparent-style.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/backend/css/skin-modes.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/backend/css/icons.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/backend/colors/color1.css') ?>" id="theme" rel="stylesheet" type="text/css" media="all" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/backend/jquery-easy-loading/dist/jquery.loading.min.css') ?>">
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/backend/jquery-easy-loading/dist/jquery.loading.min.js') ?>"></script>
    <link href="<?php echo base_url("assets/backend/sweetalert2/dist/sweetalert2.min.css") ?>" rel="stylesheet">
    <script src="<?php echo base_url("assets/backend/sweetalert2/dist/sweetalert2.min.js") ?>"></script>
    <link href="<?php echo base_url('assets/backend/select2/css/select2.min.css'); ?>" rel="stylesheet" />
    <script type="text/javascript" charset="utf-8" async defer>
        function updateCSRF(value) {
            return $('input[name=csrf_myapp]').val(value);
        }

        function myCSRF(value) {
            return $('input[name=csrf_cadangan]').val(value);
        }
    </script>
    <style>
        .swal2-container {
            z-index: 20000 !important;
        }

        .page {
            min-height: auto !important;
        }

        .blink {
            animation: blinker 1.5s linear infinite;
            color: red;
            font-family: sans-serif;
        }

        .subactive {
            color: #000000;
        }

        .activeeee {
            background: #000000;
        }

        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }

        .side-menu__item {
            color: #fff;
        }

        .side-menu__item:hover,
        .side-menu__item:focus {
            color: #fff;
        }

        .side-menu .side-menu__icon {
            color: #000000 !important;
        }

        .side-menu__item:focus .side-menu__icon,
        .side-menu__item:hover .side-menu__icon {
            color: #000000;
        }

        .side-menu__item:hover .side-menu__label,
        .side-menu__item:focus .side-menu__label {
            color: #fff;
        }

        /* .side-menu__item.active {
            background: #000000 !important;
            color: #000 !important;
        } */

        body {
            background: #e8e8e8 !important;
        }

        .btn-custom {
            background: #f9ca24 !important;
            color: #000 !important;
        }

        .slide-item.active,
        .slide-item:hover,
        .slide-item:focus {
            color: #f9ca24 !important;
        }

        .slide-item {
            color: #dee0e3 !important;

        }

        .main-sidemenu {
            background-color: #E21F27 !important;
        }

        .side-menu .side-menu__icon {
            color: #f9ca24 !important;
        }

        .sub-category {
            color: #fff !important;
        }

        .slide-menu .subactive {
            color: #fff !important;
        }

        .activeeee {
            background: #000000;
            border-radius: 50px;
        }

        .activeeee>.side-menu__icon {
            color: #fff !important;

        }
    </style>
</head>

<body class="app sidebar-mini ltr">
    <?php
    $current_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    // modal akun baru menunggu varifikasi
    $userdata = userdata();
    ?>
    <!-- <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="resellerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content ">
                    <div class="modal-header d-flex justify-content-center flex-column align-items-center">
                        <div class="modal-title alert alert-warning d-flex align-items-center text-danger" role="alert">
                            <i class="ti-alert fs-40 me-3"></i>
                            <div class="fs-15">
                                Selamat datang <br>
                            </div>
                        </div>
                    </div>

                    <div class="modal-body">
                        Anda Mendaftar sebagai <b></b>, silahkan melakukan Transaksi Pertama dengan pembelian min. 50 pcs untuk <b>Mendapatkan Bonus Insentif</b>.
                    </div>
                    <div class="modal-footer p-1">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                // Check if the modal has been shown before in this session
                // if (sessionStorage.getItem('modalShown')) {
                var resellerModal = new bootstrap.Modal(document.getElementById('resellerModal'), {
                    keyboard: false
                });
                resellerModal.show();
                // }

                // Set sessionStorage when the modal is closed
                $('#resellerModal').on('hidden.bs.modal', function() {
                    sessionStorage.setItem('modalShown', 'true');
                });
            });
        </script> -->



    <div class="page">
        <div class="page-main">
            <!-- app-Header -->
            <div class="app-header header sticky" style="background: #E21F27 !important;border:none !important">
                <div class="container-fluid main-container">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)" style="color:#f9ca24"></a>

                        <a class="logo-horizontal " href="<?php echo site_url('dashboard') ?>" title="Gleh Store">
                            <center>
                                <img style="max-width:150px;" src="<?php echo base_url('assets/logo-gleh-black.svg') ?>" alt="Gleh Store" title="Logo">
                            </center>
                        </a>

                        <div class="d-flex order-lg-2 ms-auto header-right-icons">
                            <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon fe fe-more-vertical" style="color:#f9ca24"></span>
                            </button>
                            <div class="navbar navbar-collapse responsive-navbar p-0">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent-4" style="background: #E21F27 !important;border:none !important">
                                    <style>
                                        .menu-nav {
                                            display: block;
                                        }

                                        @media (max-width: 1000px) {

                                            .menu-nav {
                                                display: flex !important;
                                                justify-content: center !important;
                                            }

                                        }
                                    </style>
                                    <div class="d-flex order-lg-2 menu-nav" style="background: #E21F27 !important;border:none !important">

                                        <div class="dropdown d-flex">
                                            <a href="<?php echo site_url('komisi') ?>" class="nav-link icon nav-link-bg" style="color:#f9ca24">
                                                <i class="ti-wallet" style="color:#f9ca24"></i>
                                            </a>
                                        </div>

                                        <div class="dropdown d-flex profile-1">
                                            <a href="javascript:void(0)" data-bs-toggle="dropdown" class="nav-link leading-none d-flex">
                                                <img src="<?php echo base_url('assets/user-white.png') ?>" alt="profile-user" class="avatar  profile-user brround cover-image">
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <div class="drop-heading">
                                                    <div class="text-center">
                                                        <h5 class="text-dark mb-0 fs-14 fw-semibold"><?php echo $userdata->username ?></h5>
                                                        <small class="text-muted"><?php echo $userdata->username ?></small>
                                                    </div>
                                                </div>
                                                <div class="dropdown-divider m-0"></div>
                                                <a class="dropdown-item" href="<?php echo site_url('settings') ?>" title="Settings">
                                                    <i class="dropdown-icon fe fe-user"></i> Settings
                                                </a>
                                                <a class="dropdown-item" href="javascript:" onclick="logout_confirm()" title="Logout">
                                                    <i class="dropdown-icon fe fe-alert-circle"></i> Logout
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sticky">
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <div class="app-sidebar" style="background: #E21F27 !important;border:none !important">
                    <div class="side-header" style="background: #E21F27 !important; border:none !important">
                        <a class="header-brand1" href="<?php echo site_url('dashboard') ?>" title="Gleh Store">
                            <img style="max-width:60%" src="<?php echo base_url('assets/logo.png') ?>" alt="Gleh Store" title="Logo">
                        </a>
                    </div>
                    <div class="main-sidemenu">
                        <div class="slide-left disabled" id="slide-left">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                            </svg>
                        </div>
                        <?php
                        $uri = service('uri');
                        $userGroup = UsersGroups();
                        if ($userGroup->id == 1) {
                            $array_menu = [
                                [
                                    'heading' => 'DASHBOARD',
                                    'data' => [
                                        [
                                            'title' => 'Dashboard',
                                            'icon' => 'fa fa-home',
                                            'url' => 'admin/admin-dashboard',
                                            'submenu' => false,
                                        ],
                                        [
                                            'title' => 'Produk & Stok',
                                            'icon' => 'fa fa-folder',
                                            'url' => 'admin/produk',
                                            'submenu' => false,
                                        ],
                                        [
                                            'title' => 'Registrasi',
                                            'icon' => 'fa fa-user-plus',
                                            'url' => 'admin/registrasi',
                                            'submenu' => false,
                                        ],
                                        [
                                            'title' => 'Belanja',
                                            'icon' => 'fa fa-cart-plus',
                                            'url' => 'admin/laporan-penjualan',
                                            'submenu' => [
                                                ['title' => 'Penjualan produk', 'url' => 'admin/laporan-penjualan'],
                                                ['title' => 'Penjualan ID CARD', 'url' => 'admin/penjualan-idcard'],
                                                ['title' => 'Pengiriman Stok', 'url' => 'admin/pengiriman-stok'],
                                            ],
                                        ],
                                    ],
                                ],
                            ];
                        } else {
                            $array_menu = [
                                [
                                    'heading' => 'DASHBOARD',
                                    'data' => [
                                        [
                                            'title' => 'Dashboard',
                                            'icon' => 'ti-home',
                                            'url' => 'dashboard',
                                            'submenu' => false,
                                        ],
                                        [
                                            'title' => 'Produk & Stok',
                                            'icon' => 'fa fa-folder',
                                            'url' => 'produk',
                                            'submenu' => false,
                                        ],
                                    ],
                                ],
                            ];
                        }

                        foreach ($array_menu as $menus) : ?>
                            <ul class="side-menu">
                                <li class="sub-category">
                                    <h3><?= $menus['heading'] ?></h3>
                                </li>
                                <?php foreach ($menus['data'] as $submenu) :
                                    $active = ($uri->getPath() == $submenu['url']) ? 'active' : false;
                                    $activeOpen = false;
                                    $activeStyle = false;

                                    if ($submenu['submenu']) {
                                        $activeSubMenu = array_column($submenu['submenu'], 'url');
                                        if (in_array($uri->getPath(), $activeSubMenu)) {
                                            $activeOpen = 'open';
                                            $activeStyle = 'style="display: block;"';
                                        }
                                    }
                                ?>
                                    <li class="slide <?= $activeOpen ?>">
                                        <a href="<?= site_url($submenu['url']) ?>" class="side-menu__item <?= $active ?>" data-bs-toggle="slide">
                                            <i class="side-menu__icon <?= $submenu['icon'] ?>"></i>
                                            <span class="side-menu__label"><?= $submenu['title'] ?></span>
                                            <?php if ($submenu['submenu']) : ?>
                                                <i class="angle fe fe-chevron-right"></i>
                                            <?php endif; ?>
                                        </a>
                                        <?php if ($submenu['submenu']) : ?>
                                            <ul class="slide-menu" <?= $activeStyle ?> style="background-color: #E21F27;">
                                                <?php foreach ($submenu['submenu'] as $ngsubmenu) :
                                                    $activeR = ($uri->getPath() == $ngsubmenu['url']) ? 'subactive' : false;
                                                ?>
                                                    <li><a href="<?= site_url($ngsubmenu['url']) ?>" class="slide-item <?= $activeR ?>"><?= $ngsubmenu['title'] ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <style>
                .side-menu__item.active {
                    background-color: #f0f0f0;
                    color: #000;
                }
            </style>
            <span class="slide-left"></span>
            <span class="slide-right"></span>
            <div class="main-content app-content mt-0">
                <div class="side-app " style="padding: 1px !important;">
                    <!-- CONTAINER -->
                    <div class="main-container container-fluid ">

                        <?php if (session()->get('admin_userid') && (session()->get('admin_userid') !== userid())) :
                            $getgroups = $this->ionAuth->getUsersGroups(session()->get('admin_userid'))->getRow();
                            echo form_hidden('csrf_cadangan', csrf_hash());
                        ?>
                            <div class="alert alert-danger mt-5" role="alert" style="background: #e74c3c;color:#fff">
                                <?php echo 'ANDA LOGIN SEBAGAI <u><b>' . strtoupper($userdata->user_fullname) . '</b></u> <a href="javascript:" id="login-back-admin" class="badge bg-success p-2" style="color:#fff">KLIK DISINI</a> UNTUK KEMBALI KE ' . strtoupper($getgroups->name); ?>
                            </div>
                            <script type="text/javascript" charset="utf-8" async defer>
                                jQuery(document).ready(function($) {

                                    $('#login-back-admin').click(function(event) {

                                        $.ajax({
                                                url: '<?php echo site_url('postdata/public_post/auth/login_back_admin') ?>',
                                                type: 'post',
                                                dataType: 'json',
                                                data: {
                                                    userid: 1,
                                                    csrf_myapp: $('input[name=csrf_cadangan]').val()
                                                }
                                            })
                                            .done(function(data) {

                                                swal(
                                                    data.heading,
                                                    data.message,
                                                    data.type
                                                ).then(function() {
                                                    location.href =
                                                        '<?php echo site_url('admin/member') ?>';
                                                });

                                            });

                                    });

                                });
                            </script>
                        <?php endif ?>
                        <div class="page-header">
                            <h1 class="page-title"><?php echo $template->getTitle(); ?></h1>
                        </div>