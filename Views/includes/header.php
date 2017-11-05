<head>
    <?php $site_url = "http://" . $_SERVER['SERVER_NAME'] . "/finemate"; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo $site_url ?>/Resources/Bootstrap/CSS/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo $site_url ?>/Resources/Bootstrap/CSS/bootstrap-datetimepicker.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="<?php echo $site_url ?>/Resources/UIGrids/CSS/ui-grid.css" rel="stylesheet" />
    <link href="<?php echo $site_url ?>/Resources/Select2/css/select2.min.css" rel="stylesheet" />
    <link href="<?php echo $site_url ?>/Content/SweetAlert/sweetalert.css" rel="stylesheet" />

    <!--custom styles begins-->
    <!--<link href="<?php echo $site_url ?>/Content/Stylesheet/custom.css" rel="stylesheet" />-->
    <link href="<?php echo $site_url ?>/custom/css/style.css" rel="stylesheet" />
    <link href="<?php echo $site_url ?>/custom/css/custom.css" rel="stylesheet" />
    <!--<link href="<?php echo $site_url ?>/Resources/FineMateResource/responsive.min.css" rel="stylesheet" />-->
    <link href="<?php echo $site_url ?>/Content/Stylesheet/responsive.css" rel="stylesheet" />
    <!--custom styles ends-->


    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="<?php echo $site_url ?>/Resources/AngularJS/angular.js"></script>
    <script src="<?php echo $site_url ?>/Resources/AngularJS/angular-route.js"></script>
    <script src="<?php echo $site_url ?>/Resources/AngularJS/angular-touch.js"></script>
    <script src="<?php echo $site_url ?>/Resources/AngularJS/angular-animate.min.js"></script>

    <script src="<?php echo $site_url ?>/ScriptsNG/Module/LoginModule.js"></script>
    <script src="<?php echo $site_url ?>/ScriptsNG/Service/LoginService.js"></script>
    <script src="<?php echo $site_url ?>/ScriptsNG/Controller/LoginController.js"></script>


    <script src="<?php echo $site_url ?>/Resources/UIGrids/Scripts/ui-grid.min.js"></script>
    <script src="<?php echo $site_url ?>/Resources/DateTimePicker/bootstrap.min.js"></script>
    <script src="<?php echo $site_url ?>/Resources/DateTimePicker/moment.js"></script>
    <script src="<?php echo $site_url ?>/Resources/DateTimePicker/bootstrap-datetimepicker.min.js"></script>

    <script src="<?php echo $site_url ?>/Resources/Select2/js/select2.min.js"></script>
    <script src="<?php echo $site_url ?>/Resources/NG-pagination/pagination.js"></script>
    <script src="<?php echo $site_url ?>/Content/SweetAlert/sweetalert.min.js"></script>

    <script src="<?php echo $site_url ?>/Resources/FineMateResource/custom.min.js"></script>
</head>
<body>
    <span id="roleId" style="display:none"><!-- @ViewBag.UserRoleId --></span>
    <header>
        <div id="header">
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="logo">
                        <a href="#" id="logoURL"><img src="../img/logo.png" /></a>
                    </div>
                    <nav class="main-nav">
                        <div class="trigger" id="trigger"><img src="img/menu.png" /></div>
                        <ul class="main-menu" id="main-menu">
                            <li id="mnu_dashboard"><img class="main-menu-ico" src="../img/dashboard-icon.png" /><a href="Dashboard/index.php">Dashboard</a></li>
                            <li id="driver-menu-item"><img class="main-menu-ico" src="../img/driver-icon.png" /><a href="Driver/DriverMaster.php">Driver</a></li>
                            <li id="mnu_fine" class="has-sub-menu">
                                <img class="main-menu-ico" src="../img/fine-icon.png" />
                                <a>Fine</a>
                                <ul class="sub-menu">
                                    <li id="sub_mnu_fineform"><a href="Fine/FineForm.php">Fine Form</a></li>
                                    <li id="sub_mnu_finemaster"><a  href="Fine/FineMaster.php">Fine Master</a></li>
                                    <li id="sub_mnu_issuelist"><a  href="LicenseIssue/index.php">Fine Issue List</a></li>
                                </ul>
                            </li>
                            <li id="mnu_configuration" class="has-sub-menu">
                                <img class="main-menu-ico" src="../img/config-icon.png" />
                                <a>Configurations</a>
                                <ul class="sub-menu">
                                    <li><a href="Configuration/PenaltyType.php">Penalty Type</a></li>
                                </ul>
                            </li>
                            <li class="has-sub-menu">
                                <img class="main-menu-ico" src="../img/user-icon.png" />
                                <!--<a href="#">@ViewBag.userName</a> -->
                                <ul class="sub-menu">
                                    <li id="MnuMyprof"><a href="Driver/MyProfile.php">My Profile</a></li>
                                    <li id="MnuMyActivity"><a href="Driver/MyActivity.php">My Activity</a> </li>
                                    <li><a href="index.php">Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    

    <script>
        $('#page-loader').load('/Dashboard/index.php');
        $('nav.main-nav ul li a').click(function (e) {
            e.preventDefault();
            var menuUrl = $(this).attr('href');
            $('#page-loader').load(menuUrl);
        });
    </script>