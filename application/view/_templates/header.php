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
        min-height: 500px;
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
    </style>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><span class="material-symbols-outlined">
                                receipt_long
                            </span><span>Invoice</span></a>
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
                            <h3>MENU</h3>
                            <ul class="nav side-menu">
                                <?php if($_SESSION['rol'] == 'Administrador'): { ?>
                                <li><a><span class="material-symbols-outlined" id="usersIcon">
                                            group
                                        </span> USERS MANAGEMENT</a>
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
                                        <li><a href="<?php echo URL; ?>invoice/registerPurchase">Register Purchase
                                                Invoice</a></li>
                                        <li><a href="<?php echo URL; ?>invoice/viewHistorySales">History Sales
                                                Invoices</a></li>
                                        <li><a href="<?php echo URL; ?>invoice/viewHistoryPurchases">History Purchase
                                                Invoices</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="chartjs.html">Chart JS</a></li>
                                        <li><a href="chartjs2.html">Chart JS2</a></li>
                                        <li><a href="morisjs.html">Moris JS</a></li>
                                        <li><a href="echarts.html">ECharts</a></li>
                                        <li><a href="other_charts.html">Other Charts</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                                        <li><a href="fixed_footer.html">Fixed Footer</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="menu_section">
                            <h3>Live On</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-bug"></i> Additional Pages <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="e_commerce.html">E-commerce</a></li>
                                        <li><a href="projects.html">Projects</a></li>
                                        <li><a href="project_detail.html">Project Detail</a></li>
                                        <li><a href="contacts.html">Contacts</a></li>
                                        <li><a href="profile.html">Profile</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="page_403.html">403 Error</a></li>
                                        <li><a href="page_404.html">404 Error</a></li>
                                        <li><a href="page_500.html">500 Error</a></li>
                                        <li><a href="plain_page.html">Plain Page</a></li>
                                        <li><a href="login.html">Login Page</a></li>
                                        <li><a href="pricing_tables.html">Pricing Tables</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="#level1_1">Level One</a>
                                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li class="sub_menu"><a href="level2.html">Level Two</a>
                                                </li>
                                                <li><a href="#level2_1">Level Two</a>
                                                </li>
                                                <li><a href="#level2_2">Level Two</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#level1_2">Level One</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span
                                            class="label label-success pull-right">Coming Soon</span></a></li>
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
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