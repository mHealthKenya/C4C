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
                <nav class="navbar navbar-static-top" role="navigation">
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
                            echo 'County Admin: ';
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
                        <li class="header">MAIN NAVIGATION</li>



                        <li class="treeview">
                            <a href="#"><i class="fa fa-dashboard"></i><span>Dashboard</span>
                                <i class="fa fa-angle-left pull-right"></i>                             

                                <ul class="treeview-menu">   

                                    <li><a href="<?php echo base_url(); ?>home/hcw_dashboard"><i class="fa fa-circle-o"></i>HCW Dashboard</a></li>

                                    <li><a href="<?php echo base_url(); ?>home/exposure_dashboard"><i class="fa fa-circle-o"></i>Exposures Dashboard</a></li>


                                </ul>
                        </li>  



                        <li class="treeview">
                            <a href="#"><i class="fa fa-line-chart"></i><span>Reports</span>
                                <i class="fa fa-angle-left pull-right"></i>                             

                                <ul class="treeview-menu">   


                                    <?php if ($_SESSION['user_level'] == '1') {
                                        ?> 
                                        <li><a href="<?php echo base_url(); ?>home/exposures"><i class="fa fa-bar-chart"></i>Exposures</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/tiers"><i class="fa fa-globe"></i>Tiers</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/patients"><i class="fa fa-user-md"></i>HCWs</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/reports"><i class="fa fa-medkit"></i>Reports</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/tots"><i class="fa fa-users"></i>TOTs</a></li>


                                    <?php }
                                    ?>

                                </ul>
                        </li>  

                        <li class="treeview">
                            <a href="#"><i class="fa fa-cogs" aria-hidden="true"></i><span>Administration Options</span>
                                <i class="fa fa-angle-left pull-right"></i>                   
                                <ul class="treeview-menu">
                                    <?php if ($_SESSION['user_level'] == '5') {
                                        ?>
                                        <li><a href="<?php echo base_url(); ?>home/facilitypatients"><i class="fa fa-list-ol"></i>HCWs</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/facilityreports"><i class="fa fa-hospital-o"></i>Reports</a></li>

                                    <?php }
                                    ?>
                                    <?php if ($_SESSION['user_level'] == '4') {
                                        ?>
                                        <li><a href="<?php echo base_url(); ?>home/subcountyusers"><i class="fa fa-user"></i>Users</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/subcountypatients"><i class="fa fa-list-ol"></i>HCWs</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/subcountyreports"><i class="fa fa-hospital-o"></i>Reports</a></li>

                                    <?php }
                                    ?>

                                    <?php if ($_SESSION['user_level'] == '3') {
                                        ?>
                                        <li><a href="<?php echo base_url(); ?>home/countyusers"><i class="fa fa-user"></i>Users</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/countypatients"><i class="fa fa-list-ol"></i>HCWs</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/countyreports"><i class="fa fa-hospital-o"></i>Reports</a></li>

                                    <?php }
                                    ?>
                                    <?php if ($_SESSION['user_level'] == '2') {
                                        ?>
                                        <li><a href="<?php echo base_url(); ?>home/nascopusers"><i class="fa fa-user"></i>Users</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/patients"><i class="fa fa-list-ol"></i>HCWs</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/reports"><i class="fa fa-hospital-o"></i>Reports</a></li>

                                    <?php }
                                    ?>
                                    <?php if ($_SESSION['user_level'] == '1') {
                                        ?>

                                        <li><a href="<?php echo base_url(); ?>home/users"><i class="fa fa-user"></i>Users</a></li>
                                        <li><a href="<?php echo base_url(); ?>home/broadcastsms"><i class="fa fa-comment"></i>Broadcast SMS</a></li>

                                    <?php }
                                    ?>

                                </ul>
                        </li>  

                        <li class="treeview">
                            <a href="#"><i class="fa fa-lock"></i><span>Logout</span>
                                <i class="fa fa-angle-left pull-right"></i>

                                <ul class="treeview-menu">                            
                                    <li><a href="<?php echo base_url(); ?>Login/logout"><i class="fa fa-sign-out"></i>Logout </li>
                                </ul>
                        </li>





                </section>
                <!-- /.sidebar -->
            </aside>


            <!-- jQuery 2.1.4 -->
            <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>












            <?php //$this->load->view('header'); ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Exposure Dashboard
                        <small>C4C</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        $sum1 = 0;

                                        foreach ($all_hcw_exposed as $value) {

                                            $sum1 += 1;
                                        }
                                        echo $sum1;
                                        ?>




                                    </h3>

                                    <p>No of HCW's Exposed </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user-md"></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3><?php
                                        foreach ($all_exposures as $value) {
                                            $no_exposed = $value->no_exposed;
                                            echo $no_exposed;
                                        }
                                        ?></h3>

                                    <p>No of Exposures  </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-ambulance"></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h4><?php
                                        foreach ($exposure_location as $value) {
                                            $exposure_location = $value->location;
                                            echo $exposure_location;
                                        }
                                        ?></h4>

                                    <p>Most Common Exposure Location</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-ambulance"></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-gray">
                                <div class="inner">
                                    <h4><?php
                                        foreach ($exposure_type as $value) {
                                            $msg_exptype = $value->msg_exptype;
                                            echo $msg_exptype;
                                        }
                                        ?></h4>

                                    <p>Most Common Exposure Type</p>
                                </div>
                                <div class="icon">
                                    <i class=" fa fa-ambulance"></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">
                        <!-- One col -->
                        <section class="col-lg-12 connectedSortable">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="box">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">No of Exposures Reported </h3>
                                        </div><!-- /.box-header -->
                                        <div class="box-body">
                                            <table id="table1" class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>Total HCWs registered</th>
                                                        <th>Exposed</th>
                                                        <th style="width: 40px">%</th>
                                                    </tr>  
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $total_hcw = 0;

                                                    foreach ($all_hcws as $value) {

                                                        $total_hcw += $value->no_hcw;
                                                    }



                                                    $total_exposures = 0;

                                                    foreach ($all_exposures as $value) {

                                                        $total_exposures += $value->no_exposed;
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>
                                                            <?php
                                                            echo $total_hcw;
                                                            ?>
                                                        </td>
                                                        <td> <?php
                                                            echo $total_exposures;
                                                            ?></td>
                                                        <td><?php
                                                            $percentage = round(($total_exposures / $total_hcw ) * 100, 2);
                                                            echo $percentage . '%';
                                                            ?></td>
                                                    </tr>


                                                    <tr>
                                                        <td><?php echo $no + 1; ?></td>
                                                        <td>Total : </td>
                                                        <td> <?php echo $sum; ?></td>
                                                        <td><?php echo '100%'; ?></td>
                                                    </tr>



                                                </tbody>




                                            </table>
                                        </div><!-- /.box-body -->
                                        <div class="box-footer clearfix">

                                        </div>
                                    </div><!-- /.box -->


                                </div><!-- /.col -->


                                <div class="col-md-6">
                                    <div class="box">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">No of HCW exposed by County</h3>
                                        </div><!-- /.box-header -->
                                        <div class="box-body">
                                            <table id="table2" class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>County</th>
                                                        <th>Total HCW </th>
                                                        <th>Total Exposed</th>
                                                        <th style="width: 40px">%</th>
                                                    </tr>  
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sum = 0;
                                                    $no = 1;
                                                    foreach ($exposures_by_county as $value) {
                                                        ?>

                                                        <?php
                                                        $sum += $value->exposed;
                                                        $no_hcw = $value->no_hcw;
                                                    }
                                                    ?>


                                                    <?php
                                                    foreach ($exposures_by_county as $value1) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no; ?></td>
                                                            <td><?php echo $value1->county_name; ?> </td>



                                                            <td><?php
                                                                $total_count = $value1->no_hcw;

                                                                if (is_null($total_count)) {
                                                                    $zero = "0";
                                                                    echo $zero;
                                                                } else {
                                                                    echo $total_count;
                                                                }
                                                                ?></td>
                                                            <td><?php
                                                                $exposed = $value1->exposed;

                                                                if (is_null($exposed)) {
                                                                    $zero = "0";
                                                                    echo $zero;
                                                                } else {
                                                                    echo $exposed;
                                                                }
                                                                ?></td>



                                                            <td><?php
                                                                echo round(($value1->exposed / $sum) * 100, 2)
                                                                ?></td>
                                                        </tr>
                                                        <?php
                                                        $no++;
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no + 1; ?></td>
                                                        <td>Total : </td>
                                                        <td><?php echo $no_hcw; ?></td>
                                                        <td> <?php echo $sum; ?></td>
                                                        <td><?php echo ''; ?></td>
                                                    </tr>



                                                </tbody>




                                            </table>
                                        </div><!-- /.box-body -->
                                        <div class="box-footer clearfix">

                                        </div>
                                    </div><!-- /.box -->


                                </div><!-- /.col -->

                            </div><!-- /.row -->


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">HCW Exposed by Cadre</h3>
                                        </div><!-- /.box-header -->
                                        <div class="box-body">
                                            <table id="table3"  class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>Cadre</th>
                                                        <th>No of HCW</th>
                                                        <th>No Exposed</th>
                                                        <th style="width: 40px">%</th>
                                                    </tr>  
                                                </thead>


                                                <tbody>
                                                    <?php
                                                    $sum = 0;
                                                    $total_sum = 0;
                                                    $no = 1;
                                                    foreach ($exposures_by_cadre as $value) {
                                                        ?>

                                                        <?php
                                                        $sum += $value->Exposed;
                                                        $total_sum += $value->total_count;
                                                    }
                                                    ?>


                                                    <?php
                                                    foreach ($exposures_by_cadre as $value1) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no; ?></td>
                                                            <td><?php echo $value1->main_cadre_name; ?> </td>
                                                            <td><?php
                                                                $total_count = $value1->total_count;

                                                                if (is_null($total_count)) {
                                                                    $zero = "0";
                                                                    echo $zero;
                                                                } else {
                                                                    echo $total_count;
                                                                }
                                                                ?></td>
                                                            <td><?php
                                                                $exposed = $value1->Exposed;

                                                                if (is_null($exposed)) {
                                                                    $zero = "0";
                                                                    echo $zero;
                                                                } else {
                                                                    echo $exposed;
                                                                }
                                                                ?></td>
                                                            <td><?php
                                                                echo round(($value1->Exposed / $value1->total_count) * 100, 2)
                                                                ?></td>
                                                        </tr>
                                                        <?php
                                                        $no++;
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no + 1; ?></td>
                                                        <td>Total : </td>
                                                        <td><?php echo $total_sum; ?></td>
                                                        <td> <?php echo $sum; ?></td>
                                                        <td><?php echo ''; ?></td>
                                                    </tr>



                                                </tbody>





                                            </table>
                                        </div><!-- /.box-body -->
                                        <div class="box-footer clearfix">

                                        </div>
                                    </div><!-- /.box -->


                                </div><!-- /.col -->




                            </div><!-- /.row -->







                        </section>
                        <!-- /.One col -->

                    </div>
                    <!-- /.row (main row) -->

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.3.3
                </div>
                <strong>Copyright &copy; 2016 <a href="http://mhealthkenya,org">mHealth Kenya Ltd</a>.</strong> All rights
                reserved.
            </footer>


            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->







        <!-- jQuery 2.1.4 -->
        <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/jquery-1.12.0.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/jszip.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/pdfmake.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/vfs_fonts.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/sum.js"></script>
        <!-- page script -->
        <script>
            var dt = jQuery.noConflict();
            dt(function () {
                dt('#table1').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
                dt('#table2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
                dt('#table3').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
                dt('#table4').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
            });
        </script>


    </body>
</html>
