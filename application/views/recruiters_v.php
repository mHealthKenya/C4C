<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>T4L | Data Tables</title>
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
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="../../index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>T4L</b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>T4L </b>Data</span>
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
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown messages-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="label label-success">4</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 4 messages</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li><!-- start message -->
                                                <a href="#">
                                                    <div class="pull-left">
                                                      <!--<img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
                                                    </div>
                                                    <h4>
                                                        Support Team
                                                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li><!-- end message -->
                                            <li>
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="../../dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                                    </div>
                                                    <h4>
                                                        AdminLTE Design Team
                                                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="../../dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                                    </div>
                                                    <h4>
                                                        Developers
                                                        <small><i class="fa fa-clock-o"></i> Today</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="../../dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                                    </div>
                                                    <h4>
                                                        Sales Department
                                                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="../../dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                                    </div>
                                                    <h4>
                                                        Reviewers
                                                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">See All Messages</a></li>
                                </ul>
                            </li>
                            <!-- Notifications: style can be found in dropdown.less -->
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning">10</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 10 notifications</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-users text-red"></i> 5 new members joined
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-user text-red"></i> You changed your username
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">View all</a></li>
                                </ul>
                            </li>
                            <!-- Tasks: style can be found in dropdown.less -->
                            <li class="dropdown tasks-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-flag-o"></i>
                                    <span class="label label-danger">9</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 9 tasks</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        Design some buttons
                                                        <small class="pull-right">20%</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">20% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li><!-- end task item -->
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        Create a nice theme
                                                        <small class="pull-right">40%</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">40% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li><!-- end task item -->
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        Some task I need to do
                                                        <small class="pull-right">60%</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">60% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li><!-- end task item -->
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        Make beautiful transitions
                                                        <small class="pull-right">80%</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">80% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li><!-- end task item -->
                                        </ul>
                                    </li>
                                    <li class="footer">
                                        <a href="#">View all tasks</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <!--                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                  <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                                  <span class="hidden-xs">Alexander Pierce</span>
                                                </a>-->
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                        <p>
                                            Alexander Pierce - Web Developer
                                            <small>Member since Nov. 2012</small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                          <!--<img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
                        </div>
                        <!--            <div class="pull-left info">
                                      <p>Alexander Pierce</p>
                                      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                                    </div>-->
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?> "><i class="fa fa-circle-o"></i> Dashboard</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i>Blood Test Results</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i>Sms Campaign</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i>Inbox</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i>Sent Messages</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i>Emergency Appeal</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i>Reference Data</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-pie-chart"></i>
                                <span>Reports</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> Donations by Type </a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> Deferral Report</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> TTI Report </a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> SMS Campaign Report</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> SMS Report</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> List of Donations to be reviewed</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> Health Questionnaire Analysis</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> Risk Questionnaire Analysis</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Administration Options</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url() ?>/home/users"><i class="fa fa-circle-o"></i> User Manager</a></li>
                                <li><a href="<?php echo base_url() ?>/home/roles"><i class="fa fa-circle-o"></i> Role Manager</a></li>
                                <li><a href="<?php echo base_url() ?>/home/counties"><i class="fa fa-circle-o"></i> County Manager</a></li>                                
                                <li><a href="<?php echo base_url() ?>/home/stockuser"><i class="fa fa-circle-o"></i> RBTC Manager</a></li>
                                <li><a href="<?php echo base_url() ?>/home/clinics"><i class="fa fa-circle-o"></i> Satellite Manager</a></li>
                                <li><a href="<?php echo base_url() ?>/home/deferrals"><i class="fa fa-circle-o"></i> Deferral Manager</a></li>
                                <li><a href="<?php echo base_url() ?>/home/csv"><i class="fa fa-circle-o"></i> Upload Log</a></li>                                
                            </ul>
                        </li>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>

                        <small></small>
                    </h1> 
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Data tables</li>
                    </ol>
                </section>

                <div id="clinic_table_div" class="clinic_table_div">


                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="button" class="btn btn-default add_clinic_button" id="add_clinic_button"><i class="fa fa-plus"></i>Add Clinic </button>

                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">Clinic Data</h3>
                                    </div><!-- /.box-header -->
                                    <div class="box-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No . </th>
                                                    <th>Clinic Name : </th>
                                                    <th>County Name : </th>
                                                    <th>Recruiter</th>
                                                    <th>Venue</th>
                                                    <th>Contact</th>
                                                    <th>Date Added</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>

                                            </thead>
                                            <tbody class="clinic_data" id="clinic_data">
                                                <?php
                                                $i = 1;

                                                foreach ($clinics as $value) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td>
                                                            <?php echo $value['clinic_name']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['county_name']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['recruiter']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['venue']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['contact']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['date_added']; ?>
                                                        </td>
                                                        <td><?php echo $value['status']; ?></td>
                                                        <td>
                                                            <input type="hidden" name="hidden_clinic_id" class="hidden_clinic_id form-control" id="hidden_clinic_id" value="<?php echo $value['clinic_id']; ?>"/>
                                                            <button class='btn btn-xs btn-default edit_clinic_btn' data-original-title='Edit Clinic'><i class='fa fa-pencil'></i></button>
                                                            <button class='btn btn-xs btn-default delete_clinic_btn' data-original-title='Delete Clinic'><i class='fa fa-trash-o'></i></button></td>

                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $i++;
                                                }
                                                ?>
                                            </tbody>

                                            <!-- </tbody> -->
                                            <tfoot>

                                                <tr>
                                                    <th>No . </th>
                                                    <th>Clinic Name : </th>
                                                    <th>County Name : </th>
                                                    <th>Recruiter</th>
                                                    <th>Venue</th>
                                                    <th>Contact</th>
                                                    <th>Date Added</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>

                                            </tfoot>
                                        </table>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </section><!-- /.content -->
                </div>

                <!--Add Clinic Start -->

                <!-- Modal -->
                <div id="myModal" class="modal fade add_clinic_div" role="dialog">
                    <form class="form-horizontal add_clinic_form" id="add_clinic_form">

                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add Clinic</h4>
                                </div>
                                <div class="modal-body">

                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="Clinic Name" class="col-sm-2 control-label">Clinic Name : </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control clinic_name" name="clinic_name" id="clinic_name" placeholder="Clinic Name : ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Clinic Name" class="col-sm-2 control-label">County Name : </label>
                                            <div class="col-sm-10">



                                                <select class="form-control county_name" name="county_name" id="county_name" placeholder="County Name : ">
                                                    <option value="">Please select : </option>
                                                    <?php foreach ($counties as $county):
                                                        ?>
                                                        <option value="<?php echo $county['id']; ?>"><?php echo $county['name']; ?></option>
                                                        <?php
                                                    endforeach;
                                                    ?>
                                                </select>


                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Clinic Name" class="col-sm-2 control-label">Recruiter : </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control recruiter" name="recruiter" id="recruiter" placeholder="Recruiter : ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Clinic Name" class="col-sm-2 control-label">Venue : </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control venue" name="venue" id="venue" placeholder="Venue : ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Clinic Name" class="col-sm-2 control-label">Contact : </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control contact" name="contact" id="contact" placeholder="Contact : ">
                                            </div>
                                        </div>


                                        <!-- textarea -->                 
                                        <div class="form-group">
                                            <label for="clinic_status" class="col-sm-2 control-label">Status</label>
                                            <div class="col-sm-10">
                                                <select name="status" class="form-control select2 add_status" id="add_status">
                                                    <option value="">Please select : </option>
                                                    <option value="Active">Active</option>
                                                    <option value="In Active">In Active</option>
                                                </select>
                                            </div>
                                        </div>








                                    </div><!-- /.box-body -->

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info pull-right">Create</button>
                                    <button type="button" class="btn btn-default pull-left  " data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>


                    </form>
                </div>




                <!-- Add Clinic End -->


                <!-- Edit Clinic Start -->
                <!-- Modal -->
                <div id="myModal" class="modal fade edit_clinic_div" role="dialog">
                    <form class="form-horizontal edit_clinic_form" id="edit_clinic_form">

                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Edit Clinic</h4>
                                </div>
                                <div class="modal-body">

                                    <div class="box-body">

                                        <input type="text" name="edit_clinic_id" class="edit_clinic_id form-control" id="edit_clinic_id"/>
                                        <div class="form-group">
                                            <label for="Clinic Name" class="col-sm-2 control-label">Clinic Name : </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control edit_clinic_name" name="edit_clinic_name" id="edit_clinic_name" placeholder="Clinic Name : ">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="County Name" class="col-sm-2 control-label">County Name : </label>
                                            <div class="col-sm-10">

                                                <select class="form-control edit_county_name" name="edit_county_name" id="edit_county_name" placeholder="County Name : ">
                                                    <option value="">Please select : </option>
                                                    <?php foreach ($counties as $county):
                                                        ?>
                                                        <option value="<?php echo $county['id']; ?>"><?php echo $county['name']; ?></option>
                                                        <?php
                                                    endforeach;
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="Recruiter Name" class="col-sm-2 control-label">Recruiter Name : </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control edit_recruiter" name="edit_recruiter" id="edit_recruiter" placeholder="Recruiter Name : ">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="Venue Name" class="col-sm-2 control-label">Venue Name : </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control edit_venue" name="edit_venue" id="edit_venue" placeholder="Venue Name : ">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="Contact" class="col-sm-2 control-label">Contact  : </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control edit_contact" name="edit_contact" id="edit_contact" placeholder="Contact : ">
                                            </div>
                                        </div>


                                        <!-- textarea -->                 
                                        <div class="form-group">
                                            <label for="clinic_status" class="col-sm-2 control-label">Status</label>
                                            <div class="col-sm-10">
                                                <select name="edit_status" class="form-control select2 edit_status" id="edit_status">
                                                    <option value="">Please select : </option>
                                                    <option value="Active">Active</option>
                                                    <option value="In Active">In Active</option>
                                                </select>
                                            </div>
                                        </div>








                                    </div><!-- /.box-body -->

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info pull-right">Update</button>
                                    <button type="button" class="btn btn-default pull-left close_edit_modal " data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>


                    </form>
                </div>


                <!-- Edit Clinic End -->







                <!-- Delete Clinic Start -->
                <!-- Modal -->
                <div id="myModal" class="modal fade delete_clinic_div" role="dialog">
                    <form class="form-horizontal delete_clinic_form" id="delete_clinic_form">

                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Delete Clinic</h4>
                                </div>
                                <div class="modal-body">

                                    <div class="box-body">
                                        <div class="form-group">
                                            <p>Are you sure you want to delete Clinic : </p>
                                        </div>
                                        <div class="form-group">

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control delete_clinic_name" name="name" id="delete_clinic_name" placeholder="Clinic Name : ">
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" class="delete_clinic_id form-control" id="delete_clinic_id"/>









                                    </div><!-- /.box-body -->

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info pull-right">Yes Delete!</button>
                                    <button type="button" class="btn btn-danger pull-left close_delete_modal " data-dismiss="modal">No!</button>
                                </div>
                            </div>

                        </div>


                    </form>
                </div>


                <!-- Delete Clinic End -->








            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0.0
                </div>
                <strong>Copyright &copy; 2016 <a href=""></a>.</strong> All rights reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">
                        <h3 class="control-sidebar-heading">Recent Activity</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript::;">
                                    <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                                        <p>Will be 23 on April 24th</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript::;">
                                    <i class="menu-icon fa fa-user bg-yellow"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                                        <p>New phone +1(800)555-1234</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript::;">
                                    <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                                        <p>nora@example.com</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript::;">
                                    <i class="menu-icon fa fa-file-code-o bg-green"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                                        <p>Execution time 5 seconds</p>
                                    </div>
                                </a>
                            </li>
                        </ul><!-- /.control-sidebar-menu -->

                        <h3 class="control-sidebar-heading">Tasks Progress</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript::;">
                                    <h4 class="control-sidebar-subheading">
                                        Custom Template Design
                                        <span class="label label-danger pull-right">70%</span>
                                    </h4>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript::;">
                                    <h4 class="control-sidebar-subheading">
                                        Update Resume
                                        <span class="label label-success pull-right">95%</span>
                                    </h4>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript::;">
                                    <h4 class="control-sidebar-subheading">
                                        Laravel Integration
                                        <span class="label label-warning pull-right">50%</span>
                                    </h4>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript::;">
                                    <h4 class="control-sidebar-subheading">
                                        Back End Framework
                                        <span class="label label-primary pull-right">68%</span>
                                    </h4>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                    </div>
                                </a>
                            </li>
                        </ul><!-- /.control-sidebar-menu -->

                    </div><!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
                    <!-- Settings tab content -->
                    <div class="tab-pane" id="control-sidebar-settings-tab">
                        <form method="post">
                            <h3 class="control-sidebar-heading">General Settings</h3>
                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Report panel usage
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                                <p>
                                    Some information about this general settings option
                                </p>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Allow mail redirect
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                                <p>
                                    Other sets of options are available
                                </p>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Expose author name in posts
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                                <p>
                                    Allow the user to show his name in blog posts
                                </p>
                            </div><!-- /.form-group -->

                            <h3 class="control-sidebar-heading">Chat Settings</h3>

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Show me as online
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Turn off notifications
                                    <input type="checkbox" class="pull-right">
                                </label>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Delete chat history
                                    <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                                </label>
                            </div><!-- /.form-group -->
                        </form>
                    </div><!-- /.tab-pane -->
                </div>
            </aside><!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->

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




            var j = jQuery.noConflict();
            j(document).ready(function () {
                j('#example1').on('processing.dt', function (e, settings, processing) {
                    $('#processingIndicator').css('display', processing ? 'block' : 'none');
                }).DataTable({
                    dom: 'Bfrtip',
                    "bProcessing": true,
                    buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5',
                        'pageLength'],
                    lengthMenu: [
                        [5, 10, 25, 50, -1],
                        ['5 rows', '10 rows', '25 rows', '50 rows', 'Show all rows']
                    ],
                    "footerCallback": function (row, data, start, end, display) {
                        var api = this.api(), data;
                        // Remove the formatting to get integer data for summation
                        var intVal = function (i) {
                            return typeof i === 'string' ?
                                    i.replace(/[\$,]/g, '') * 1 :
                                    typeof i === 'number' ?
                                    i : 0;
                        };
                        // Total over all pages
                        total = api
                                .column(4)
                                .data()
                                .reduce(function (a, b) {
                                    return intVal(a) + intVal(b);
                                }, 0);
                        // Total over this page
                        pageTotal = api
                                .column(4, {page: 'current'})
                                .data()
                                .reduce(function (a, b) {
                                    return intVal(a) + intVal(b);
                                }, 0);
                        // Update footer
                        $(api.column(4).footer()).html(
                                'Total ' + pageTotal + ' , Cumulative ' + total + ' '
                                );
                    },
                    initComplete: function () {
                        this.api().columns().every(function () {
                            var column = this;
                            var select = $('<select><option value=""></option></select>')
                                    .appendTo($(column.footer()).empty())
                                    .on('change', function () {
                                        var val = $.fn.dataTable.util.escapeRegex(
                                                $(this).val()
                                                );
                                        column
                                                .search(val ? '^' + val + '$' : '', true, false)
                                                .draw();
                                    });
                            column.data().unique().sort().each(function (d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>')
                            });
                        });
                    }
                });
            });
            $(document).ready(function () {







                $(".close_edit_modal").click(function () {
                    $(".clinic_table_div").show();
                });




                $('.add_clinic_form').submit(function (event) {
                    dataString = $(".add_clinic_form").serialize();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>home/add_clinic",
                        data: dataString,
                        success: function (data) {

                            get_clinic_details();
                        }

                    });
                    event.preventDefault();
                    return false;
                });
                $('.edit_clinic_form').submit(function (event) {
                    dataString = $(".edit_clinic_form").serialize();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>home/edit_clinic",
                        data: dataString,
                        success: function (data) {

                            get_clinic_details();
                            $(".clinic_table_div").show();
                            $(".edit_clinic_div").modal('hide');
                        }

                    });
                    event.preventDefault();
                    return false;
                });


                $('.delete_clinic_form').submit(function (event) {
                    dataString = $(".delete_clinic_form").serialize();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>home/delete_clinic",
                        data: dataString,
                        success: function (data) {

                            get_clinic_details();
                            $(".clinic_table_div").show();
                            $(".delete_clinic_div").modal('hide');
                        }

                    });
                    event.preventDefault();
                    return false;
                });

                $(".add_clinic_button").click(function () {
                    $(".add_clinic_div").modal('show');
                });
                function get_clinic_details() {
                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url(); ?>home/clinics/json",
                        dataType: "json",
                        async: true,
                        crossDomain: true,
                        success: function (response) {
                            $(".clinic_data").empty();
                            var no = 1;
                            $.each(response, function (i, item) {

                                var id = item.clinic_id;
                                var clinic_name = item.clinic_name;
                                var clinic_status = item.status;
                                var date_added = item.date_added;
                                var timestamp = item.timestamp;
                                var county_name = item.county_name;
                                var recruiter = item.recruiter;
                                var contact = item.contact;
                                var venue = item.venue;

                                var tr_data = "<tr>\n\
                                            <td>" + no + "</td>\n\
                                            <td>" + clinic_name + "</td><td>" + county_name + "</td><td>" + recruiter + "</td>\n\
                                            <td>" + contact + "</td><td>" + venue + "</td><td>" + date_added + "</td>\n\
\n\
                                            <td>" + clinic_status + "</td>\n\
                                            <td><input type='text' name='hidden_clinic_id' id='hidden_clinic_id' class='hidden_clinic_id hidden' value=" + id + " />\n\
                                            <button class='btn btn-xs btn-default edit_clinic_btn' data-original-title='Edit Clinic'><i class='fa fa-pencil'></i></button>\n\
                                            <button class='btn btn-xs btn-default delete_clinic_btn' data-original-title='Delete Clinic'><i class='fa fa-trash-o'></i></button></td>\n\
                                                    </tr>";
                                $(".clinic_data").append(tr_data);
                                $('.clinic_table_div').prop('value', 'Processing...');

                                no++;
                            });
                        }, error: function (data) {


                        }
                    });
                }





                $(document).on('click', ".delete_clinic_btn", function () {
                    //get data
                    var clinic_id = $(this).closest('tr').find('input[name="hidden_clinic_id"]').val();
                    //$(".modal_loading").show();

                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url(); ?>home/get_clinic_info/" + clinic_id,
                        dataType: "json",
                        success: function (response) {



                            $('#delete_clinic_id').val(response[0].id);
                            $('#delete_clinic_name').val(response[0].name);
                            $(".delete_clinic_div").modal('show');
                            $(".clinic_table_div").hide();
                            $(".modal_loading").hide();
                        }, error: function (data) {
                            $(".modal_loading").hide();
                            //sweetAlert("Oops...", "Something went wrong!", "error");

                        }
                    });
                });


                $(document).on('click', ".edit_clinic_btn", function () {
                    //get data
                    var clinic_id = $(this).closest('tr').find('input[name="hidden_clinic_id"]').val();
                    //$(".modal_loading").show();

                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url(); ?>home/get_clinic_info/" + clinic_id,
                        dataType: "json",
                        success: function (response) {



                            $('#edit_clinic_id').val(response[0].clinic_id);
                            $('.edit_clinic_name').val(response[0].clinic_name);
                            $('.edit_county_name').val(response[0].county_id);
                            $('.edit_recruiter').val(response[0].recruiter);
                            $('.edit_venue').val(response[0].venue);
                            $('.edit_contact').val(response[0].contact);
                            $('#edit_status').val(response[0].status);
                            $('#edit_date_added').val(response[0].date_added);
                            $('#edit_timestamp').val(response[0].timestamp);
                            $(".edit_clinic_div").modal('show');
                            $(".clinic_table_div").hide();
                            $(".modal_loading").hide();
                        }, error: function (data) {
                            $(".modal_loading").hide();
                            //sweetAlert("Oops...", "Something went wrong!", "error");

                        }
                    });
                });
            });






        </script>
    </body>
</html>
