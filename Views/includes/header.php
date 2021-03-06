<!DOCTYPE html>
<html ng-app="app">
<head>
    <?php $site_url = "http://" . $_SERVER['SERVER_NAME'] . ":81/xampp/www/FineMatePhp"; ?>
    <?php //$site_url = "http://" . $_SERVER['SERVER_NAME'] . "/finemate/"; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo $site_url ?>/Resources/Bootstrap/CSS/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo $site_url ?>/Resources/Bootstrap/CSS/bootstrap-datetimepicker.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Oswald:200,300,400,500,600,700|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link href="<?php echo $site_url ?>/Resources/UIGrids/CSS/ui-grid.css" rel="stylesheet" />
    <link href="<?php echo $site_url ?>/Resources/Select2/css/select2.min.css" rel="stylesheet" />
    <link href="<?php echo $site_url ?>/Content/SweetAlert/sweetalert.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

    <link href="<?php echo $site_url ?>/Resources/ngDialog/css/ngDialog.css" rel="stylesheet" />
    <link href="<?php echo $site_url ?>/Resources/ngDialog/css/ngDialog-theme-default.css" rel="stylesheet" />

    <link href="<?php echo $site_url ?>/Content/bootstrap/MaterialSwitch.css" rel="stylesheet" />

    <!--custom styles begins-->
    <!--<link href="<?php echo $site_url ?>/Content/Stylesheet/custom.css" rel="stylesheet" />-->
    <link href="<?php echo $site_url ?>/custom/css/style.css" rel="stylesheet" />
    <link href="<?php echo $site_url ?>/custom/css/custom.css" rel="stylesheet" />
    <!--<link href="<?php echo $site_url ?>/Resources/FineMateResource/responsive.min.css" rel="stylesheet" />-->
    <link href="<?php echo $site_url ?>/Content/Stylesheet/responsive.css" rel="stylesheet" />
    <!--custom styles ends-->

    <script src="<?php echo $site_url ?>/Resources/jquery-3.1.1.min.js"></script>
    <script src="<?php echo $site_url ?>/Resources/AngularJS/angular.js"></script>
    <script src="<?php echo $site_url ?>/Resources/AngularJS/angular-route.js"></script>
    <script src="<?php echo $site_url ?>/Resources/AngularJS/angular-touch.js"></script>
    <script src="<?php echo $site_url ?>/Resources/AngularJS/angular-animate.min.js"></script>

    <script src="<?php echo $site_url ?>/Resources/UIGrids/Scripts/ui-grid.min.js"></script>
    <script src="<?php echo $site_url ?>/Resources/DateTimePicker/bootstrap.min.js"></script>
    <script src="<?php echo $site_url ?>/Resources/DateTimePicker/moment.js"></script>
    <script src="<?php echo $site_url ?>/Resources/DateTimePicker/bootstrap-datetimepicker.min.js"></script>

    <script src="<?php echo $site_url ?>/Content/HighCharts/js/highcharts.js"></script>

    <script src="<?php echo $site_url ?>/Resources/Select2/js/select2.min.js"></script>
    <script src="<?php echo $site_url ?>/Resources/NG-pagination/pagination.js"></script>
    <script src="<?php echo $site_url ?>/Content/SweetAlert/sweetalert.min.js"></script>

    <script src="<?php echo $site_url ?>/Resources/ngDialog/js/ngDialog.js"></script>
    <script src="<?php echo $site_url ?>/Content/Stylesheet/DriverProfile/custom.js"></script>
    <script src="<?php echo $site_url ?>/Resources/GoogleMap/ng-map.min.js.js"></script>
    <!--<script src="http://maps.google.com/maps/api/js"></script>-->

    <script src="<?php echo $site_url ?>/Resources/FineMateResource/custom.min.js"></script>
</head>
<body>
    <span id="roleId" style="display:none"><!-- @ViewBag.UserRoleId --></span>
    <header>
        <div id="header">
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="logo">
                        <a href="Dashboard/index.php" id="logoURL"><img src="<?php echo $site_url; ?>/img/logo.png" /></a>
                    </div>
                    <nav class="main-nav">
                        <div class="trigger" id="trigger"><img src="<?php echo $site_url; ?>/img/menu.png" /></div>
                        <ul class="main-menu" id="main-menu">
                            <li id="mnu_dashboard">
                                <a href="<?php echo $site_url ?>/views/Dashboard/index.php">
                                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                                    Dashboard</a>
                            </li>
                            <li id="driver-menu-item"><a href="<?php echo $site_url ?>/views/Driver/DriverMaster.php">
                                    <i class="fa fa-car" aria-hidden="true"></i>
                                    Driver</a></li>
                            <li id="mnu_fine" class="has-sub-menu">
                                <a>
                                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                    Fine</a>
                                <ul class="sub-menu">
                                    <li id="sub_mnu_fineform"><a href="<?php echo $site_url ?>/views/Fine/FineForm.php"><i class="fa fa-file-text" aria-hidden="true"></i>Fine Form</a></li>
                                    <li id="sub_mnu_finemaster"><a  href="<?php echo $site_url ?>/views/Fine/FineMaster.php"><i class="fa fa-book" aria-hidden="true"></i>Fine Master</a></li>
                                    <li id="sub_mnu_issuelist"><a  href="<?php echo $site_url ?>/views/LicenseIssue/index.php"><i class="fa fa-list-ol" aria-hidden="true"></i>Fine Issue List</a></li>
                                </ul>
                            </li>
                            <li id="mnu_configuration" class="has-sub-menu">
                                <a>
                                    <i class="fa fa-sliders" aria-hidden="true"></i>
                                    Configurations</a>
                                <ul class="sub-menu">
                                    <li><a href="<?php echo $site_url ?>/views/Configuration/PenaltyType.php">Penalty Type</a></li>
                                </ul>
                            </li>
                            <li class="has-sub-menu user-menu">
                                <img class="main-menu-ico user-icon" src="<?php echo $site_url; ?>/img/user-icon.png" />
                                <!--<a href="#">@ViewBag.userName</a> -->
                                <ul class="sub-menu">
                                    <li id="MnuMyprof"><a href="<?php echo $site_url ?>/views/Driver/MyProfile.php"><i class="fa fa-user" aria-hidden="true"></i>My Profile</a></li>
                                    <li id="MnuMyActivity"><a href="<?php echo $site_url ?>/views/Driver/MyActivity.php"><i class="fa fa-hand-o-up" aria-hidden="true"></i>My Activity</a> </li>
                                    <li><a href="index.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="loading-overlay" id="loading-overlay">

    </div>


    <style>
        .loading-overlay {
            position: absolute;
            top: 0px;
            left: 0px;
            background-color: rgba(0,0,0,0.75);
            width: 100%;
            height: 100%;
            z-index: 999;
            display: none;
            opacity: 0;
            transition: 0.5s;
        }
        .loading-overlay.after {
            opacity: 1;
            transition: 0.5s;
            display: block;
        }
    </style>
    <script>
        $(document).ready(function () {
            $('.logo a').click(function (e) {
                e.preventDefault();
                var menuUrl = $(this).attr('href');
            });

            $('li.has-sub-menu.user-menu').click(function () {
                $('li.has-sub-menu.user-menu > ul.sub-menu').toggleClass('after');
            });

            $('nav.main-nav > ul.main-menu > li.has-sub-menu:not(.user-menu)').click(function () {
                $('li.has-sub-menu.user-menu > ul.sub-menu').removeClass('after');
            });
        });

    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            alert(document.cookie);
        });
    </script>