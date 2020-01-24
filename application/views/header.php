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
        <script src="<?php echo base_url(); ?>assets/dist/js/sweetalert.min.js"></script>
        <script src="https://public.tableau.com/javascripts/api/tableau-2.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>



        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/sweetalert.css">
        <!--D3-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/dc.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/dc.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrap.css">        
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/multiple-select.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrap-multiselect.css">

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
                <a href="<?php echo base_url(); ?>home/" class="logo">
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
                        if ($_SESSION['user_level'] == '6' || $_SESSION['user_level'] == '0') {
                            echo 'Partner Admin  ';
                            echo $_SESSION['Partner admin'];
                        }
                        ?> Welcome <?php echo $_SESSION['name']; ?> to C4C
                    <!--PartnerName = <?php echo $_SESSION['user_level']; ?></div>-->
                    
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
                        <li class="header">MAIN NAVIGATION</li>


                        <li class="treeview">

                            <a href="#"><i class="fa fa-cogs" aria-hidden="true"></i><span>Administration Options</span>
                                <i class="fa fa-angle-left pull-right"></i>
                                <ul class="treeview-menu">
                                    <?php
                                    if (( $_SESSION['user_level'] == '6' && $_SESSION['partner_id'] != '4') || $_SESSION['user_level'] == '0') {//                                                
                                        ?>
                                        <li><a href="<?php echo base_url(); ?>home/upload"><i class="fa fa-user-plus"></i>Upload Members</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/broadcastsms"><i class="fa fa-comment"></i>Broadcast SMS</a></li>
                                        <?php
                                    }                                    
                                     ?>
                                    <?php
                                    if ( $_SESSION['user_level'] == '5') {//                                                
                                        ?>
                                        
                                        <li><a href="<?php echo base_url(); ?>home/broadcastsms"><i class="fa fa-comment"></i>Broadcast SMS</a></li>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if ($_SESSION['partner_id'] == '4') {//                                                
                                        ?>
                                        <li><a href="<?php echo base_url(); ?>home/users"><i class="fa fa-user-plus"></i>Manage Supervisors</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/studs"><i class="fa fa-users"></i>Manage Students</a></li> 
                                        <li><a href="<?php echo base_url(); ?>home/broadcastsms"><i class="fa fa-comment"></i>Broadcast SMS</a></li>
                                        <?php
                                    }
                                    ?>
                                    <?php if ($_SESSION['user_level'] == '4') {
                                        ?>
                                        <li><a href="<?php echo base_url(); ?>home/subcountyusers"><i class="fa fa-user"></i>Users</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/broadcastsms"><i class="fa fa-comment"></i>Broadcast SMS</a></li>

                                    <?php }
                                    ?>

                                    <?php if ($_SESSION['user_level'] == '3') {
                                        ?>
                                        <li><a href="<?php echo base_url(); ?>home/countyusers"><i class="fa fa-user"></i>Users</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/broadcastsms"><i class="fa fa-comment"></i>Broadcast SMS</a></li>

                                    <?php }
                                    ?>
                                    <?php if ($_SESSION['user_level'] == '2') {
                                        ?>
                                        <li><a href="<?php echo base_url(); ?>home/nascopusers"><i class="fa fa-user"></i>Users</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/broadcastsms"><i class="fa fa-comment"></i>Broadcast SMS</a></li>
                                        <!--<li><a href="<?php echo base_url(); ?>home/addtots"><i class="fa fa-users"></i>Add ToT Targets</a></li>-->
                                        <!-- <li><a href="<?php echo base_url(); ?>home/tots"><i class="fa fa-users"></i>TOTs</a></li> -->

                                    <?php }
                                    ?>
                                    <?php if ($_SESSION['user_level'] == '1') {
                                        ?>

                                        <li><a href="<?php echo base_url(); ?>home/users"><i class="fa fa-user"></i>Users</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/broadcastsms"><i class="fa fa-comment"></i>Broadcast SMS</a></li>
<!--                                        <li><a href="<?php echo base_url(); ?>home/addtots"><i class="fa fa-users"></i>Add ToT Targets</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/tots"><i class="fa fa-users"></i>TOTs</a></li>-->
                                        

                                    <?php }
                                    ?>
                                        
                                        
                                        
                                       <ul class="treeview-menu">
                                    <?php
                                    if (( $_SESSION['user_level'] == '6' && $_SESSION['partner_id'] != '4') || $_SESSION['user_level'] == '0') {//                                                
                                        ?>
                                        <!--<li><a href="<?php echo base_url(); ?>home/upload"><i class="fa fa-user-plus"></i>Upload Members</a></li>-->
                                        <li><a href="<?php echo base_url(); ?>home/broadcastsms"><i class="fa fa-comment"></i>Broadcast SMS</a></li>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if ($_SESSION['partner_id'] == '4') {//                                                
                                        ?>
                                        <li><a href="<?php echo base_url(); ?>home/users"><i class="fa fa-user-plus"></i>Manage Supervisors</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/studs"><i class="fa fa-users"></i>Manage Students</a></li> 
                                        <li><a href="<?php echo base_url(); ?>home/broadcastsms"><i class="fa fa-comment"></i>Broadcast SMS</a></li>
                                        <?php
                                    }
                                    ?>
                                    <?php if ($_SESSION['user_level'] == '4') {
                                        ?>
                                        <li><a href="<?php echo base_url(); ?>home/subcountyusers"><i class="fa fa-user"></i>Users</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/broadcastsms"><i class="fa fa-comment"></i>Broadcast SMS</a></li>

                                    <?php }
                                    ?>

                                    <?php if ($_SESSION['user_level'] == '3') {
                                        ?>
                                        <li><a href="<?php echo base_url(); ?>home/countyusers"><i class="fa fa-user"></i>Users</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/broadcastsms"><i class="fa fa-comment"></i>Broadcast SMS</a></li>

                                    <?php }
                                    ?>
                                    <?php if ($_SESSION['user_level'] == '2') {
                                        ?>
                                      <!--   <li><a href="<?php echo base_url(); ?>home/nascopusers"><i class="fa fa-user"></i>Users</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/broadcastsms"><i class="fa fa-comment"></i>Broadcast SMS</a></li>
                                        <!--<li><a href="<?php echo base_url(); ?>home/addtots"><i class="fa fa-users"></i>Add ToT Targets</a></li>-->
                                        <!-- <li><a href="<?php echo base_url(); ?>home/tots"><i class="fa fa-users"></i>TOTs</a></li>  -->


                                        
                                      <!--  <li><a href="<?php echo base_url(); ?>home/Egender"><i class="fa fa-database"></i>Exposures By Gender</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/Ecounty"><i class="fa fa-database"></i>Exposures By County</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/Ecadre"><i class="fa fa-database"></i>Exposures By Cadre</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/Eagegroup"><i class="fa fa-database"></i>Exposures By Age Group</a></li> -->

                                    <?php }
                                    ?>
                                    <?php if ($_SESSION['user_level'] == '1') {
                                        ?>

                                        
                                        
                                                     
                                        <!--<li><a href="<?php echo base_url(); ?>home/Rfacility"><i class="fa fa-database"></i>Exposures</a></li>-->
                                       <!-- <li><a href="<?php echo base_url(); ?>home/Egender"><i class="fa fa-database"></i>Exposures By Gender</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/Ecounty"><i class="fa fa-database"></i>Exposures By County</a></li>                                        
                                        <li><a href="<?php echo base_url(); ?>home/Ecadre"><i class="fa fa-database"></i>Exposures By Cadre</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/Eagegroup"><i class="fa fa-database"></i>Exposures By Age Group</a></li>
                                       <!--  <li><a href="<?php echo base_url(); ?>home/pepcascade"><i class="fa fa-database"></i>PEP Cascade</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/adapp"><i class="fa fa-database"></i>Adherence To Appointmennts</a></li> -->
                                       <!--  <li><a href="<?php echo base_url(); ?>home/pepinit"><i class="fa fa-database"></i>PEP Initialization</a></li> -->
                                       <!-- <li><a href="<?php echo base_url(); ?>home/etype"><i class="fa fa-database"></i>Exposures By Type</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/esubcnty"><i class="fa fa-database"></i>Exposures By Subcounty</a></li>                                       
                                            -->

                                    <?php }
                                    ?>
                                    </li>
                                </ul> 
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                    </li>
                                </ul>


                                <?php if ($_SESSION['partner_id'] == '4') {
                                    ?>
                                    <a href="#"><i class="fa fa-cogs" aria-hidden="true"></i><span>Reports</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                        <ul class="treeview-menu">
                                            <li><a href="<?php echo base_url(); ?>home/UONStud"><i class="fa fa-users"></i>Checked-In Students</a></li>
                                            <li><a href="<?php echo base_url(); ?>home/attendancereport"><i class="fa fa-users"></i>Attendance Report</a></li>
                                        </ul>
                                    <?php }
                                    ?>                                        
                                   
                                    
                                    <li class="treeview">
                                      
<!--
                                        <a href="#"><i class="fa fa-table" aria-hidden="true"></i><span>Registration Reports</span>
                                <i class="fa fa-angle-left pull-right"></i>
                                <ul class="treeview-menu">                                    
                                   
                                    

                                        
                                      
                                    
                                        
                                    
                                    </li>
                                </ul>-->
                                
                                 <?php if ($_SESSION['user_level'] == '1' || $_SESSION['user_level'] == '2') {
                                        ?>
                                
                                
                                <a href="<?php echo base_url(); ?>home/Rgender"><i class="fa fa-table" aria-hidden="true"></i><span>Registration Reports</span>
                                <i class="fa fa-angle-left pull-right"></i>                               
                               
                                
                                <a href="<?php echo base_url(); ?>home/Rfacility"><i class="fa fa-table" aria-hidden="true"></i><span>Exposure Reports</span>
                                <i class="fa fa-angle-left pull-right"></i>
                                
                                
<!--                                 <a href="<?php echo base_url(); ?>home/pepcascade"><i class="fa fa-table" aria-hidden="true"></i><span>PEP Cascade</span>
                                <i class="fa fa-angle-left pull-right"></i>-->
                                
                                
                                 <a href="#"><i class="fa fa-table" aria-hidden="true"></i><span>Raw Data</span>
                                <i class="fa fa-angle-left pull-right"></i>
                                <ul class="treeview-menu">                                    
                                   
                                    

                                        
                                        <!--<li><a href="<?php echo base_url(); ?>home/allclients"><i class="fa fa-list-ol "></i>Registration Report</a></li>-->
                                        <li><a href="<?php echo base_url(); ?>home/allclients"><i class="fa fa-table "></i>All Clients</a></li>
                                       <!--  <li><a href="<?php echo base_url(); ?>home/sentsms"><i class="fa fa-comments-o"></i>Sent SMSs</a></li> -->
                                       <!--  <li><a href="<?php echo base_url(); ?>home/cascadetbl"><i class="fa fa-list-ol "></i>PEP Cascade</a></li> -->
                                        <li><a href="<?php echo base_url(); ?>home/rawExposures"><i class="fa fa-database"></i>All Exposures</a></li>
                                        
                                    
                                    </li>
                                </ul>
                                
                                

                               <?php }
                                    ?>
                                
                                
                                <?php if ($_SESSION['user_level'] > '2') {
                                        ?>
                                
                                
                               <a href="<?php echo base_url(); ?>home/Rgender"><i class="fa fa-table" aria-hidden="true"></i><span>Registration Reports</span>
                                <i class="fa fa-angle-left pull-right"></i>                               
                               
                                
                                <a href="<?php echo base_url(); ?>home/Rfacility"><i class="fa fa-table" aria-hidden="true"></i><span>Exposure Reports</span>
                                <i class="fa fa-angle-left pull-right"></i>


                                <a href="#"><i class="fa fa-table" aria-hidden="true"></i><span>Raw Data</span>
                                <i class="fa fa-angle-left pull-right"></i>
                                <ul class="treeview-menu">                              
                                                               

                                        
                                        
                                        <li><a href="<?php echo base_url(); ?>home/allclients"><i class="fa fa-table "></i>All Clients</a></li>
                                       <!--  <li><a href="<?php echo base_url(); ?>home/sentsms"><i class="fa fa-comments-o"></i>Sent SMSs</a></li> -->
                                       <!--  <li><a href="<?php echo base_url(); ?>home/cascadetbl"><i class="fa fa-list-ol "></i>PEP Cascade</a></li> -->
                                        <li><a href="<?php echo base_url(); ?>home/rawExposures"><i class="fa fa-database"></i>All Reports</a></li>
                                        
                                    
                                    </li>
                                </ul>














                                
                                
<!--                                 <a href="<?php echo base_url(); ?>home/pepcascade"><i class="fa fa-table" aria-hidden="true"></i><span>PEP Cascade</span>
                                <i class="fa fa-angle-left pull-right"></i>-->
                                
                                
                                
<!--                                 <a href="<?php echo base_url(); ?>home/pepcascade"><i class="fa fa-table" aria-hidden="true"></i><span>PEP Cascade</span>
                                <i class="fa fa-angle-left pull-right"></i>-->
                                
                                
<!--                                 <a href="#"><i class="fa fa-table" aria-hidden="true"></i><span>Raw Data</span>
                                <i class="fa fa-angle-left pull-right"></i>-->
                                <ul class="treeview-menu">                                    
                                   
                                    

                                        
                                       
                                        
                                    
                                    </li>
                                </ul>
                                
                                

                               <?php }
                                    ?>


                                
                                 
                                


                                      



                                        

                            <!--<a href="#"><i class="fa fa-list-ol" aria-hidden="true"></i><span>Other options</span>-->
                        

                                <?php if ($_SESSION['partner_id'] == '4') {
                                    ?>
                                    <a href="#"><i class="fa fa-cogs" aria-hidden="true"></i><span>Reports</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                        <ul class="treeview-menu">
                                            <li><a href="<?php echo base_url(); ?>home/UONStud"><i class="fa fa-users"></i>Checked-In Students</a></li>
                                            <li><a href="<?php echo base_url(); ?>home/attendancereport"><i class="fa fa-users"></i>Attendance Report</a></li>
                                        </ul>
                                        
                                    <?php }
                                    ?>                                        
                                   
                                    <li class="treeview">



                                        
                                                                         
                                    <li><a href="<?php echo base_url(); ?>Login/logout"><i class="fa fa-sign-out"></i>Logout </li>
                                    
                                    
                                    
                                                                   
                                   
                                    
                                    
                                    
                                    </section>
                                    <!-- /.sidebar -->
                                    </aside>
            
            