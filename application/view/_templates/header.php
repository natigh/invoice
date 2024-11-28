<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="<?php echo URL; ?>public/img/icons8-factura-64.png" />


    <title>INVOICE</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- Bootstrap -->
    <link href="<?php echo URL;?>admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo URL;?>admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo URL;?>admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo URL;?>admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="<?php echo URL;?>admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"
        rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo URL;?>admin/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo URL;?>admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo URL;?>admin/build/css/custom.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    const url = "<?php echo URL;?>";
    </script>
    <!-- jQuery -->

    <script src="<?php echo URL; ?>js/invoice.js"></script>
    <script src="<?php echo URL; ?>js/user.js"></script>
    <script src="<?php echo URL; ?>js/common.js"></script>
    <script src="<?php echo URL; ?>js/sku.js"></script>
    <!-- <script src="<?php echo URL;?>admin/vendors/jquery/dist/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"
        integrity="sha512-U6K1YLIFUWcvuw5ucmMtT9HH4t0uz3M366qrF5y4vnyH6dgDzndlcGvH/Lz5k8NFh80SN95aJ5rqGZEdaQZ7ZQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
    .nav.side-menu>li>a,
    .nav.child_menu>li>a {
        color: black;
        font-weight: 500;
    }

    .nav.side-menu>li>a,
    .nav.child_menu>li>a {
        color: black;
        font-weight: 500;
    }

    .profile_pic{
        height: 100px;
    }


    .nav_title {
        width: 230px;
        text-align: center;
        background: #2A3F54;
        border-radius: 0;
        height: 100px;
        padding: 0px;
    }

    .site_title {
        background-color: #50c3a5;
        text-overflow: ellipsis;
        overflow: hidden;
        font-weight: 400;
        font-size: 22px;
        width: 100%;
        color: black !important;
        line-height: 59px;
        display: block;
        height: 100px;
    }

    .nav.side-menu>li.active>a {
        text-shadow: rgba(0, 0, 0, 0.25) 0 -1px 0;
        background: -webkit-gradient(linear, left top, left bottom, from(#8fe9d0), to(#8fe9d0)), #8fe9d0;
        background: linear-gradient(#8fe9d0, #8fe9d0), #8fe9d0;
        -webkit-box-shadow: rgba(0, 0, 0, 0.25) 0 1px 0, inset rgba(255, 255, 255, 0.16) 0 1px 0;
        box-shadow: rgba(0, 0, 0, 0.25) 0 1px 0, inset rgba(255, 255, 255, 0.16) 0 1px 0;
    }

    .sidebar-footer a {
        padding: 7px 0 3px;
        text-align: center;
        width: 25%;
        font-size: 17px;
        display: block;
        float: left;
        background: #50c3a5;
    }

    a {
        color: black;
        text-decoration: none;
    }

    .sidebar-footer {
        bottom: 0px;
        clear: both;
        display: block;
        padding: 5px 0 0 0;
        position: fixed;
        width: 230px;
        background: #50c3a5;
    }

    .profile_info h2 {
        font-size: 14px;
        color: black;
        margin: 0;
        font-weight: 300;
    }

    .profile_info span {
        font-size: 13px;
        line-height: 30px;
        color: black;
    }

    .left_col {
        color: black;
        background: #50c3a5;
    }

    #profileIcon {
        font-size: 7em;
    }

    #usersIcon {
        font-size: 1.5em;
    }

    #objectIcon {
        font-size: 1.5em;
    }

    #btnCancel a {
        color: white;
    }

    #tableItems {
        min-height: 70px;
    }

    div#is-relative {
        max-width: 420px;
        position: relative;
    }

    #icon {
        position: absolute;
        display: block;
        bottom: .5rem;
        right: 1rem;

        user-select: none;
        cursor: pointer;
    }

    #txtRemark {
        resize: none;
    }
    </style>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><img src="<?php echo URL; ?>img/logo.jpg" alt="logo"
                                height="100"></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <span class="material-symbols-outlined" id="profileIcon">
                                account_circle
                            </span>

                        </div>
                        <div class="profile_info">
                            <span>Welcome <?php echo $_SESSION['name']; ?></span>
                            <h2><?php echo $_SESSION['rol']; ?></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h2>MENU</h2>
                            <ul class="nav side-menu">
                                <?php if($_SESSION['rol'] == 'Admin'): { ?>
                                <li><a><span class="material-symbols-outlined" id="usersIcon">
                                            group
                                        </span> USERS MANAGEMENT<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?php echo URL; ?>user/viewUsers">View Users</a></li>
                                        <li><a href="<?php echo URL; ?>user/registerUser">Register User</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php } endif; ?>
                                <li><a><span class="material-symbols-outlined" id="objectIcon">
                                            emoji_objects
                                        </span> SKU MANAGEMENT <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?php echo URL; ?>sku/viewSku">View Sku</a></li>
                                        <li><a href="<?php echo URL; ?>sku/registerSku">Register Sku</a></li>
                                    </ul>
                                </li>
                                <li><a><span class="material-symbols-outlined">
                                            receipt_long
                                        </span> INVOICING <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?php echo URL; ?>invoice/registerSale">Register Sales Invoice</a>
                                        </li>
                                        <li><a href="<?php echo URL; ?>invoice/viewHistorySales">History Sales
                                                Invoices</a></li>
                                        <li><a href="<?php echo URL; ?>invoice/creditNote">Credit Notes</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                        <div class="menu_section">
                            <h3></h3>
                            <ul class="nav side-menu">

                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Logout"
                            href="<?php echo URL; ?>user/logOut">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>



            <!-- page content -->
            <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="">