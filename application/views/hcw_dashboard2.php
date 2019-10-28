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
                            <a href="#"><i class="fa fa-dashboard"></i><span>HCWs Dashboard</span>
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
                        HCWs Dashboard
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
                                    <h3><?php
                                        foreach ($no_hcws as $values) {
                                            echo $values->no_hcw;
                                        }
                                        ?></h3>

                                    <p>No of Registered HCW's</p>
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
                                    <h3>
                                        <?php
                                        foreach ($no_of_counties as $value) {
                                            echo $value->no_counties;
                                        }
                                        ?>

                                    </h3>

                                    <p>No of Counties</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-map"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        $count = 0;
                                        foreach ($no_of_sub_counties as $value) {
                                            $count += 1;
                                        }
                                        echo $count;
                                        ?>

                                    </h3>

                                    <p>No of Sub Counties</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-map-o"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-gray">
                                <div class="inner">
                                    <h3><?php
                                        $count_facility = 0;
                                        foreach ($health_facilities as $value) {
                                            $count_facility += 1;
                                        }
                                        echo $count_facility;
                                        ?></h3>

                                    <p>No of Facilities</p>
                                </div>
                                <div class="icon">
                                    <i class=" fa fa-hospital-o"></i>
                                </div>

                            </div>
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
                                                <h3 class="box-title"></h3>
                                            </div><!-- /.box-header -->
                                            <div class="box-body" id="sex">

                                            </div><!-- /.box-body -->
                                            <div class="box-footer clearfix">

                                            </div>
                                        </div><!-- /.box -->


                                    </div>





                                    <div class="col-md-6">
                                        <div class="box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title"></h3>
                                            </div><!-- /.box-header -->
                                            <div class="box-body" id="cadre">

                                            </div><!-- /.box-body -->
                                            <div class="box-footer clearfix">

                                            </div>
                                        </div><!-- /.box -->


                                    </div>

                                    <div class="col-md-6">
                                        <div class="box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title"></h3>
                                            </div><!-- /.box-header -->
                                            <div class="box-body" id="facility_type">

                                            </div><!-- /.box-body -->
                                            <div class="box-footer clearfix">

                                            </div>
                                        </div><!-- /.box -->


                                    </div>



                                    <div class="col-md-6">
                                        <div class="box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title"></h3>
                                            </div><!-- /.box-header -->
                                            <div class="box-body" id="exposure_types">

                                            </div><!-- /.box-body -->
                                            <div class="box-footer clearfix">

                                            </div>
                                        </div><!-- /.box -->


                                    </div>

                                    <div class="col-md-6">
                                        <div class="box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title"></h3>
                                            </div><!-- /.box-header -->
                                            <div class="box-body" id="exposures_per_facility">

                                            </div><!-- /.box-body -->
                                            <div class="box-footer clearfix">

                                            </div>
                                        </div><!-- /.box -->




                                    </div>

                                    <div class="col-md-6">
                                        <div class="box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title"></h3>
                                            </div><!-- /.box-header -->
                                            <div class="box-body" id="sex_exposures">

                                            </div><!-- /.box-body -->
                                            <div class="box-footer clearfix">

                                            </div>
                                        </div><!-- /.box -->


                                    </div>


                                    <div class="col-md-6">
                                        <div class="box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title"></h3>
                                            </div><!-- /.box-header -->
                                            <div class="box-body" id="cadre_exposures">

                                            </div><!-- /.box-body -->
                                            <div class="box-footer clearfix">

                                            </div>
                                        </div><!-- /.box -->


                                    </div>

                                    <div class="col-md-6">
                                        <div class="box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title"></h3>
                                            </div><!-- /.box-header -->
                                            <div class="box-body" id="exposures_location">

                                            </div><!-- /.box-body -->
                                            <div class="box-footer clearfix">

                                            </div>
                                        </div><!-- /.box -->


                                    </div>

<!--                                   <section class="content-header">
                    <h1>
                        HCWs Dashboard
                    </h1>

                </section>-->






                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">HCW by County </h3>
                                    </div><!-- /.box-header -->
                                    <div class="box-body">
                                        <table id="table1" class="table table-bordered table-condensed table-hover table-responsive table-striped dataTable">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>County</th>
                                                    <th>No</th>
                                                    <th style="width: 40px">%</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sum = 0;
                                                $no = 1;
                                                foreach ($hcw_by_county as $value) {
                                                    ?>

                                                    <?php
                                                    $sum += $value->no_hcw;
                                                }
                                                ?>


                                                <?php
                                                foreach ($hcw_by_county as $value1) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $value1->county; ?> </td>
                                                        <td><?php echo $value1->no_hcw; ?></td>
                                                        <td><?php
                                                            echo round(($value1->no_hcw / $sum) * 100, 2)
                                                            ?></td>
                                                    </tr>
                                                    <?php
                                                    $no++;
                                                }
                                                ?>
                                                <tr>
                                                    <td><?php echo $no + 1; ?></td>
                                                    <td>Total : </td>
                                                    <td> <?php echo $sum; ?></td>
                                                    <td><?php echo '100%'; ?></td>
                                                </tr>
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
                                        <h3 class="box-title">NO of HCW by Cadre</h3>
                                    </div><!-- /.box-header -->
                                    <div class="box-body">
                                        <table id="table2" class="table table-bordered table-condensed table-hover table-responsive table-striped dataTable">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>Cadre</th>
                                                    <th>No</th>
                                                    <th style="width: 40px">%</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sum = 0;
                                                $no = 1;
                                                foreach ($hcw_by_cadre as $value) {
                                                    ?>

                                                    <?php
                                                    $sum += $value->no_hcw;
                                                }
                                                ?>


                                                <?php
                                                foreach ($hcw_by_cadre as $value1) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $value1->cadre; ?> </td>
                                                        <td><?php echo $value1->no_hcw; ?></td>
                                                        <td><?php
                                                            echo round(($value1->no_hcw / $sum) * 100, 2)
                                                            ?></td>
                                                    </tr>
                                                    <?php
                                                    $no++;
                                                }
                                                ?>
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

                        </div><!-- /.row -->


                        <div class="row">
                            <div class="col-md-12">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">HCW by Tiers/County</h3>
                                    </div><!-- /.box-header -->
                                    <div class="box-body">
                                        <table id="table3" class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>Tier</th>
                                                    <th>County</th>
                                                    <th>No</th>
                                                    <th style="width: 40px">%</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sum = 0;
                                                $no = 1;
                                                foreach ($hcw_by_tiers as $value) {
                                                    ?>

                                                    <?php
                                                    $sum += $value->no_hcw;
                                                }
                                                ?>


                                                <?php
                                                foreach ($hcw_by_tiers as $value1) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $value1->tiers; ?></td>
                                                        <td><?php echo $value1->county; ?> </td>
                                                        <td><?php echo $value1->no_hcw; ?></td>
                                                        <td><?php
                                                            echo round(($value1->no_hcw / $sum) * 100, 2)
                                                            ?></td>
                                                    </tr>
                                                    <?php
                                                    $no++;
                                                }
                                                ?>
                                                <tr>
                                                    <td><?php echo $no + 1; ?></td>
                                                    <td></td>
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
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>


<script type="text/javascript">
    Highcharts.chart('sex', {
    chart: {
    plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
    },
            title: {
            text: 'Registration By Sex'
            },
            tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
            pie: {
            allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                            style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                    }
            }
            },
            series: [{
            name: '',
                    colorByPoint: true,
                    data: [{
                    name: 'Male',
                            y: <?php echo $male_count; ?>
                    }, {
                    name: 'Female',
                            y:<?php echo $female_count; ?>
                    }]
            }]
    });
    Highcharts.chart('cadre', {
    chart: {
    type: 'column'
    },
            title: {
            text: 'Registration by Cadre'
            },
            xAxis: {
            categories: [


<?php foreach ($hcw_by_cadre as $cadre) {
    ?>
    <?php
    $x = $cadre->cadre;
    echo "'" . $x . "',";
}
?>


            ],
                    crosshair: true
            },
            yAxis: {
            min: 0,
                    title: {
                    text: 'Number'
                    }
            },
            tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">' +
                    '<td style="padding:0"><b>{point.y:.1f} </td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
            },
            plotOptions: {
            column: {
            pointPadding: 0.2,
                    borderWidth: 0
            }
            },
            series: [{
            name: 'Cadre',
                    data: [<?php foreach ($count_cadre as $cadre) {
    ?>
    <?php
    $x = $cadre->no_hcw;
    echo $x . ",";
}
?>
                    ]

            }]
    });
    Highcharts.chart('facility_type', {
    chart: {
    type: 'bar'
    },
            title: {
            text: 'Registered HCWs by Facility type'
            },
            xAxis: {
            categories: [


<?php foreach ($facility_type as $ftype) {
    ?>
    <?php
    $x = $ftype->facility_type;
    echo "'" . $x . "',";
}
?>


            ],
                    crosshair: true
            },
            yAxis: {
            min: 0,
                    title: {
                    text: 'Number'
                    }
            },
            tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">' +
                    '<td style="padding:0"><b>{point.y:.1f} </td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
            },
            plotOptions: {
            column: {
            pointPadding: 0.2,
                    borderWidth: 0
            }
            },
            series: [{
            name: 'Facility Type',
                    data: [<?php foreach ($facility_count as $fcount) {
    ?>
    <?php
    $x = $fcount->f_count;
    echo $x . ",";
}
?>
                    ]

            }]
    });
    Highcharts.chart('exposure_types', {
    chart: {
    type: 'column'
    },
            title: {
            text: 'Type of Exposure'
            },
            xAxis: {
            categories: [


<?php foreach ($exposure_type as $ftype) {
    ?>
    <?php
    $x = $ftype->type;
    echo "'" . $x . "',";
}
?>


            ],
                    crosshair: true
            },
            yAxis: {
            min: 0,
                    title: {
                    text: 'Number'
                    }
            },
            tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">' +
                    '<td style="padding:0"><b>{point.y:.1f} </td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
            },
            plotOptions: {
            column: {
            pointPadding: 0.2,
                    borderWidth: 0
            }
            },
            series: [{
            name: 'Exposure Type',
                    data: [<?php foreach ($exposure_type_count as $fcount) {
    ?>
    <?php
    $x = $fcount->count_exposure;
    echo $x . ",";
}
?>
                    ]

            }]
    });
    Highcharts.chart('cadre_exposures', {
    chart: {
    type: 'bar'
    },
            title: {
            text: 'Exposure By Cadre'
            },
            xAxis: {
            categories: [


<?php foreach ($hcw_by_cadre as $cadre) {
    ?>
    <?php
    $x = $cadre->cadre;
    echo "'" . $x . "',";
}
?>


            ],
                    crosshair: true
            },
            yAxis: {
            min: 0,
                    title: {
                    text: 'Number'
                    }
            },
            tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">' +
                    '<td style="padding:0"><b>{point.y:.1f} </td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
            },
            plotOptions: {
            column: {
            pointPadding: 0.2,
                    borderWidth: 0
            }
            },
            series: [{
            name: 'Cadre',
                    data: [
<?php foreach ($exposures_cadre_count as $cadre) {
    ?>
    <?php
    $x = $cadre->no_hcw;
    echo $x . ",";
}
?>
                    ]

            }]
    });
    Highcharts.chart('exposures_location', {
    chart: {
    type: 'line'
    },
            title: {
            text: 'Exposure By Location'
            },
            xAxis: {
            categories: [


<?php foreach ($exposures_location as $cadre) {
    ?>
    <?php
    $x = $cadre->location_name;
    echo "'" . $x . "',";
}
?>


            ],
                    crosshair: true
            },
            yAxis: {
            min: 0,
                    title: {
                    text: 'Number'
                    }
            },
            tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">' +
                    '<td style="padding:0"><b>{point.y:.1f} </td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
            },
            plotOptions: {
            column: {
            pointPadding: 0.2,
                    borderWidth: 0
            }
            },
            series: [{
            name: 'Location',
                    data: [
<?php foreach ($exposures_location_count as $cadre) {
    ?>
    <?php
    $x = $cadre->location_count;
    echo $x . ",";
}
?>
                    ]

            }]
    });
    Highcharts.chart('exposures_per_facility', {
    chart: {
    type: 'bar'
    },
            title: {
            text: 'Exposure by type of facility'
            },
            xAxis: {
            categories: [


<?php foreach ($facility_type as $ftype) {
    ?>
    <?php
    $x = $ftype->facility_type;
    echo "'" . $x . "',";
}
?>



            ],
                    crosshair: true
            },
            yAxis: {
            min: 0,
                    title: {
                    text: 'Number'
                    }
            },
            tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">' +
                    '<td style="padding:0"><b>{point.y:.1f} </td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
            },
            plotOptions: {
            column: {
            pointPadding: 0.2,
                    borderWidth: 0
            }
            },
            series: [{
            name: 'Facility',
                    data: [
<?php foreach ($exposures_facility_count as $cadre) {
    ?>
    <?php
    $x = $cadre->f_count;
    echo $x . ",";
}
?>
                    ]

            }]
    });
    Highcharts.chart('sex_exposures', {
    chart: {
    plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
    },
            title: {
            text: 'Exposure By Sex'
            },
            tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
            pie: {
            allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                            style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                    }
            }
            },
            series: [{
            name: 'Male',
                    colorByPoint: true,
                    data: [{
                    name: 'Male',
                            y: <?php echo $male_exposure; ?>
                    }, {
                    name: 'Female',
                            y:<?php echo $female_exposure; ?>
                    }]
            }]
    });
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
