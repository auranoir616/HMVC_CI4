<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title><?php echo $this->renderSection('title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
    <meta name="author" content="Zoyothemes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/backend') ?>/images/favicon.ico">
    <!-- App css -->
    <link href="<?php echo base_url('assets/backend') ?>/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <!-- Icons -->
    <link href="<?php echo base_url('assets/backend') ?>/css/icons.min.css" rel="stylesheet" type="text/css" />
</head>

<!-- body start -->

<body data-menu-color="light" data-sidebar="default">

    <div id="app-layout">
        <!-- Topbar Start -->
        <div class="topbar-custom">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                        <li>
                            <button class="button-toggle-menu nav-link">
                                <i data-feather="menu" class="noti-icon"></i>
                            </button>
                        </li>
                        <li class="d-none d-lg-block">
                            <h5 class="mb-0"><?php echo ucapan() ?>, <?php echo userdata()->username ?></h5>
                        </li>
                    </ul>

                    <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                        <!-- FORM SEARCH -->
                        <li class="d-none d-lg-block">
                            <div class="position-relative topbar-search">
                                <input type="text" class="form-control bg-light bg-opacity-75 border-light ps-4" placeholder="Search...">
                                <i class="mdi mdi-magnify fs-16 position-absolute text-muted top-50 translate-middle-y ms-2"></i>
                            </div>
                        </li>

                        <!-- TOMBOL FULLSCREEN -->
                        <li class="d-none d-sm-flex">
                            <button type="button" class="btn nav-link" data-toggle="fullscreen">
                                <i data-feather="maximize" class="align-middle fullscreen noti-icon"></i>
                            </button>
                        </li>

                        <!-- NOTIFIKASI -->
                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i data-feather="bell" class="noti-icon"></i>
                                <span class="badge bg-danger rounded-circle noti-icon-badge">9</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-lg">

                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                        <span class="float-end">
                                            <a href="" class="text-dark">
                                                <small>Clear All</small>
                                            </a>
                                        </span>Notification
                                    </h5>
                                </div>

                                <div class="noti-scroll" data-simplebar>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item text-muted link-primary active">
                                        <div class="notify-icon">
                                            <img src="<?php echo base_url('assets/backend') ?>/images/users/user-12.jpg" class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="notify-details">Carl Steadham</p>
                                            <small class="text-muted">5 min ago</small>
                                        </div>
                                        <p class="mb-0 user-msg">
                                            <small class="fs-14">Completed <span class="text-reset">Improve workflow in Figma</span></small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item text-muted link-primary">
                                        <div class="notify-icon">
                                            <img src="<?php echo base_url('assets/backend') ?>/images/users/user-2.jpg" class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <div class="notify-content">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <p class="notify-details">Olivia McGuire</p>
                                                <small class="text-muted">1 min ago</small>
                                            </div>

                                            <div class="d-flex mt-2 align-items-center">
                                                <div class="notify-sub-icon">
                                                    <i class="mdi mdi-download-box text-dark"></i>
                                                </div>

                                                <div>
                                                    <p class="notify-details mb-0">dark-themes.zip</p>
                                                    <small class="text-muted">2.4 MB</small>
                                                </div>
                                            </div>

                                        </div>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item text-muted link-primary">
                                        <div class="notify-icon">
                                            <img src="<?php echo base_url('assets/backend') ?>/images/users/user-3.jpg" class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <div class="notify-content">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <p class="notify-details">Travis Williams</p>
                                                <small class="text-muted">7 min ago</small>
                                            </div>
                                            <p class="noti-mentioned p-2 rounded-2 mb-0 mt-2"><span class="text-primary">@Patryk</span> Please make sure that you're....</p>
                                        </div>
                                    </a>


                                </div>

                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                    View all
                                    <i class="fe-arrow-right"></i>
                                </a>

                            </div>
                        </li>

                        <!-- PANEL MEMBER -->
                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="<?php echo base_url('assets/backend') ?>/images/users/user-5.jpg" alt="user-image" class="rounded-circle">
                                <span class="pro-user-name ms-1">
                                    <?php echo userdata()->username ?> <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="pages-profile.html" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-circle-outline fs-16 align-middle"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="auth-lock-screen.html" class="dropdown-item notify-item">
                                    <i class="mdi mdi-lock-outline fs-16 align-middle"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a href="auth-logout.html" class="dropdown-item notify-item">
                                    <i class="mdi mdi-location-exit fs-16 align-middle"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </li>

                    </ul>
                </div>

            </div>

        </div>
        <!-- end Topbar -->

        <!-- Left Sidebar Start -->
        <?php
        $menu_items = [
            [
                'heading' => 'Menu',
                'items' => [
                    [
                        'title' => 'Dashboard',
                        'icon' => 'fa fa-home',
                        'url' => 'dashboard',
                        'submenu' => [
                            ['title' => 'CRM', 'url' => 'dashboard/crm'],
                            ['title' => 'Analytics', 'url' => 'dashboard/analytics'],
                            ['title' => 'eCommerce', 'url' => 'dashboard/ecommerce'],
                        ],
                    ],
                ],
            ],
            [
                'heading' => 'Pages',
                'items' => [
                    [
                        'title' => 'Authentication',
                        'icon' => 'fa fa-users',
                        'url' => 'authentication',
                        'submenu' => [
                            ['title' => 'Login', 'url' => 'authentication/login'],
                            ['title' => 'Register', 'url' => 'authentication/register'],
                        ],
                    ],
                ],
            ],
            [
                'heading' => 'Apps',
                'items' => [
                    [
                        'title' => 'Todo List',
                        'icon' => 'fa fa-list',
                        'url' => 'apps/todolist',
                        'submenu' => false,
                    ],
                ],
            ],
        ];

        ?>

        <div class="app-sidebar-menu">
            <div class="h-100" data-simplebar>
                <div id="sidebar-menu">
                    <div class="logo-box">
                        <a href="<?= site_url('dashboard') ?>" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="<?= base_url('assets/backend/images/logo-sm.png') ?>" alt="Logo" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="<?= base_url('assets/backend/images/logo-light.png') ?>" alt="Logo" height="24">
                            </span>
                        </a>
                    </div>
                    <ul id="side-menu">
                        <?php foreach ($menu_items as $menu): ?>
                            <li class="menu-title"><?= $menu['heading'] ?></li>
                            <?php foreach ($menu['items'] as $item): ?>
                                <li>
                                    <?php if (!$item['submenu']): ?>
                                        <a href="<?= site_url($item['url']) ?>" <?= $item['submenu'] ? 'data-bs-toggle="collapse"' : '' ?>>
                                            <i class="<?= $item['icon'] ?>"></i>
                                            <span><?= $item['title'] ?></span>
                                        </a>
                                    <?php else: ?>
                                        <a href="#submenu-<?= strtolower(str_replace(' ', '-', $item['title'])) ?> " data-bs-toggle="collapse" class="waves-effect">
                                            <i class="<?= $item['icon'] ?>"></i>
                                            <span><?= $item['title'] ?></span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="submenu-<?= strtolower(str_replace(' ', '-', $item['title'])) ?>">
                                            <ul class="nav-second-level">
                                                <?php foreach ($item['submenu'] as $sub): ?>
                                                    <li class="tp-link">
                                                        <a href="<?= site_url($sub['url']) ?>"><?= $sub['title'] ?></a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                        <div class="flex-grow-1">
                            <h4 class="fs-18 fw-semibold m-0">
                                <?php echo $this->renderSection('title'); ?>
                            </h4>
                        </div>
                    </div>
                    <?= $this->renderSection('content') ?>
                </div> <!-- container-fluid -->
            </div> <!-- content -->

            <!-- modal -->
            <div class="modal fade" id="dinamicModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="myModalLabel">Modal Title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">OK</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col fs-13 text-muted text-center">
                            &copy; <script>
                                document.write(new Date().getFullYear())
                            </script> - Made with <span class="mdi mdi-heart text-danger"></span> by <a href="#!" class="text-reset fw-semibold">Erp</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Vendor -->
    <script src="<?php echo base_url('assets/backend') ?>/libs/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/backend') ?>/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('assets/backend') ?>/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url('assets/backend') ?>/libs/node-waves/waves.min.js"></script>
    <script src="<?php echo base_url('assets/backend') ?>/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url('assets/backend') ?>/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url('assets/backend') ?>/libs/feather-icons/feather.min.js"></script>
    <script src="<?php echo base_url('assets/backend/select2/js/select2.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/bootstrap/js/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/jquery.sparkline.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/circle-progress.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/charts-c3/d3.v5.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/charts-c3/c3-chart.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/input-mask/jquery.mask.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/sidebar/sidebar.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/sidemenu/sidemenu.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/p-scroll/perfect-scrollbar.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/p-scroll/pscroll.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/p-scroll/pscroll-1.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/themeColors.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/sticky.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/custom.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/sweetalert2/dist/sweetalert2.min.js') ?>"></script>


    <!-- Apexcharts JS -->
    <script src="<?php echo base_url('assets/backend') ?>/libs/apexcharts/apexcharts.min.js"></script>

    <!-- for basic area chart -->
    <script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>

    <!-- Widgets Init Js -->
    <script src="<?php echo base_url('assets/backend') ?>/js/pages/crm-dashboard.init.js"></script>

    <!-- App js-->
    <script src="<?php echo base_url('assets/backend') ?>/js/app.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2-single').select2();
        });
        $("#dinamicModals").on("show.bs.modal", function(e) {
            var link = $(e.relatedTarget);
            $(this).find(".modal-body").load(link.attr("data-bs-href"));
            $(this).find("#myModalLabel").text(link.attr("data-bs-title"));
        });
        $("#dinamicModal").on("show.bs.modal", function(e) {
            var link = $(e.relatedTarget);
            $(this).find(".modal-body").load(link.attr("data-bs-href"));
            $(this).find("#myModalLabel").text(link.attr("data-bs-title"));
        });
    </script>

</body>

</html>