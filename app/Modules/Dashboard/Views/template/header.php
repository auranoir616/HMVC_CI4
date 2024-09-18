<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="-">
    <meta name="theme-color" content="#f9ca24">
    <meta name="google" content="notranslate" />
    <title><?= $title; ?></title>
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
?>