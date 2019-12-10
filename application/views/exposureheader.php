<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>C4C System</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/buttons.dataTables.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/spin.js/2.3.2/spin.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/sweetalert.css">
        <!--D3-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/dc.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/dc.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style>
            .welcome{
                position: absolute;
                left: 55%;
                margin-top: 20px;
                color: #fff;
            }
        </style>

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="<?php echo base_url(); ?>" class="logo">
                    <!--mini logo for sidebar mini 50x50 pixels-->
                    <span class="logo-mini"><b>C4C</b></span>
                    <!--logo for regular state and mobile devices-->
                    <span class="logo-lg"><b>C4C</b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation" style="margin-top:0">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>


                     <div class="col-xs-12 welcome "><?php
                        if ($_SESSION['user_level'] == '1') {
                            echo "Super User: ";
                        }
                        if ($_SESSION['user_level'] == '2') {
                            echo 'Nascop Admin: ';
                        }
                        if ($_SESSION['user_level'] == '3') {
                            echo 'County Admin ';
                            echo $_SESSION['county'];
                        }
                        if ($_SESSION['user_level'] == '4') {
                            echo 'Sub - County Admin ';
                            echo $_SESSION['sub_county'];
                        }
                        if ($_SESSION['user_level'] == '5') {
                            echo 'Facility Admin ';
                            echo $_SESSION['facility'];
                        }
                        ?> Welcome <?php echo $_SESSION['name']; ?> to C4C</div>
                </nav>



            </header>


            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">

                    </div>
                    <!-- search form -->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->

                    <ul class="sidebar-menu">
                        <li class="header">NAVIGATION</li>


                          <?php if(($_SESSION['user_level'] == 1 || $_SESSION['user_level'] == 2))
{?>
                            <li><a href="<?php echo base_url(); ?>home/exposuresbytype"><i class="fa fa-list-ol"></i>Exposure Type</a></li>
                            <li><a href="<?php echo base_url(); ?>home/exposuresbylocation"><i class="fa fa-list-ol"></i>Exposure Location</a></li>
                            <li><a href="<?php echo base_url(); ?>home/exposuresbysex"><i class="fa fa-list-ol"></i>Sex</a></li>
                            <li><a href="<?php echo base_url(); ?>home/exposuresbycadre"><i class="fa fa-hospital-o"></i>Cadre</a></li>
                            <li><a href="<?php echo base_url(); ?>home/exposuresbycounty"><i class="fa fa-hospital-o"></i>County</a></li>
                            <li><a href="<?php echo base_url(); ?>home/exposuresbyagegroups"><i class="fa fa-hospital-o"></i>Age Groups</a></li>
                            <li><a href="<?php echo base_url(); ?>home/exposuresbytime"><i class="fa fa-hospital-o"></i>PEP Cascade</a></li>
                            <li><a href="<?php echo base_url(); ?>home/exposuresbyfacilitylevels"><i class="fa fa-hospital-o"></i>Facility Levels</a></li>
                            <li><a href="<?php echo base_url(); ?>home/exposuresbyfacility"><i class="fa fa-hospital-o"></i>Facilities</a></li>
                            <li><a href="<?php echo base_url(); ?>Login/logout"><i class="fa fa-sign-out"></i>Logout </a></li>


                <?php }
                if($_SESSION['user_level'] == 3)
                {?>
                  <li><a href="<?php echo base_url(); ?>home/exposuresbytype"><i class="fa fa-list-ol"></i>Exposure Type</a></li>
                  <li><a href="<?php echo base_url(); ?>home/exposuresbylocation"><i class="fa fa-list-ol"></i>Exposure Location</a></li>
                  <li><a href="<?php echo base_url(); ?>home/exposuresbysex"><i class="fa fa-list-ol"></i>Sex</a></li>
                  <li><a href="<?php echo base_url(); ?>home/exposuresbycadre"><i class="fa fa-hospital-o"></i>Cadre</a></li>
                  <li><a href="<?php echo base_url(); ?>home/exposuresbysubcounty"><i class="fa fa-hospital-o"></i>Sub County</a></li>
                  <li><a href="<?php echo base_url(); ?>home/exposuresbyagegroups"><i class="fa fa-hospital-o"></i>Age Groups</a></li>
                  <li><a href="<?php echo base_url(); ?>home/exposuresbytime"><i class="fa fa-hospital-o"></i>PEP Cascade</a></li>
                  <li><a href="<?php echo base_url(); ?>home/exposuresbyfacilitylevels"><i class="fa fa-hospital-o"></i>Facility Levels</a></li>
                  <li><a href="<?php echo base_url(); ?>home/exposuresbyfacility"><i class="fa fa-hospital-o"></i>Facilities</a></li>
                  <li><a href="<?php echo base_url(); ?>Login/logout"><i class="fa fa-sign-out"></i>Logout </a></li>


                <?php }
                 if($_SESSION['user_level'] == 4)
                {?>
                  <li><a href="<?php echo base_url(); ?>home/exposuresbytype"><i class="fa fa-list-ol"></i>Exposure Type</a></li>
                  <li><a href="<?php echo base_url(); ?>home/exposuresbylocation"><i class="fa fa-list-ol"></i>Exposure Location</a></li>
                  <li><a href="<?php echo base_url(); ?>home/exposuresbysex"><i class="fa fa-list-ol"></i>Sex</a></li>
                  <li><a href="<?php echo base_url(); ?>home/exposuresbycadre"><i class="fa fa-hospital-o"></i>Cadre</a></li>
                  <li><a href="<?php echo base_url(); ?>home/exposuresbyagegroups"><i class="fa fa-hospital-o"></i>Age Groups</a></li>
                  <li><a href="<?php echo base_url(); ?>home/exposuresbytime"><i class="fa fa-hospital-o"></i>PEP Cascade</a></li>
                  <li><a href="<?php echo base_url(); ?>home/exposuresbyfacilitylevels"><i class="fa fa-hospital-o"></i>Facility Levels</a></li>
                 <li><a href="<?php echo base_url(); ?>home/exposuresbyfacility"><i class="fa fa-hospital-o"></i>Facilities</a></li>
                  <li><a href="<?php echo base_url(); ?>Login/logout"><i class="fa fa-sign-out"></i>Logout </a></li>


                <?php }
                if($_SESSION['user_level'] == 5 )
                {?>
                  <li><a href="<?php echo base_url(); ?>home/exposuresbytype"><i class="fa fa-list-ol"></i>Exposure Type</a></li>
                  <li><a href="<?php echo base_url(); ?>home/exposuresbylocation"><i class="fa fa-list-ol"></i>Exposure Location</a></li>
                  <li><a href="<?php echo base_url(); ?>home/exposuresbysex"><i class="fa fa-list-ol"></i>Sex</a></li>
                  <li><a href="<?php echo base_url(); ?>home/exposuresbycadre"><i class="fa fa-hospital-o"></i>Cadre</a></li>
                  <li><a href="<?php echo base_url(); ?>home/exposuresbyagegroups"><i class="fa fa-hospital-o"></i>Age Groups</a></li>
                  <li><a href="<?php echo base_url(); ?>home/exposuresbytime"><i class="fa fa-hospital-o"></i>PEP Cascade</a></li>
                  <li><a href="<?php echo base_url(); ?>Login/logout"><i class="fa fa-sign-out"></i>Logout </a></li>



                <?php } ?>

                        </ul>
                                                            </section>
                                        <!-- /.sidebar -->
                                        </aside>
