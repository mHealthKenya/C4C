<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>T4L | Users</title>
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
                <a href="<?php echo base_url();?>" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>T4</b>L</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>T4L</b></span>
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
                    <!--                    <div class="navbar-custom-menu">
                                            <ul class="nav navbar-nav">
                                                <ul class="nav navbar-nav">
                                                    <li class="active"><a href="#">Dashboard</a></li>
                                                    <li><a href="#about">Blood Test Results</a></li>
                                                    <li><a href="#contact">Sms Campaign</a></li>
                                                    <li><a href="#contact">Inbox</a></li>
                                                    <li><a href="#contact">Sent Messages</a></li>
                                                    <li><a href="#contact">Emergency Appeal</a></li>
                                                    <li><a href="#contact">Reference Data</a></li>
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reports,Admin options <span class="caret"></span></a>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="#">Reports</a></li>
                    
                    
                                                            <li role="separator" class="divider"></li>
                    
                                                            <li><a href="#">Sign Out</a></li> 
                                                        </ul>     
                    
                    
                                                    </li>
                    
                                                    </li>
                                                </ul>
                                                </li>
                                                 Control Sidebar Toggle Button 
                                                <li>
                                                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                                                </li>
                                            </ul>
                                        </div>-->
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
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
                            <a href="#">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?> "><i class="fa fa-circle-o"></i> Dashboard</a></li>
<!--                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i>Blood Test Results</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i>Sms Campaign</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i>Inbox</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i>Sent Messages</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i>Emergency Appeal</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i>Reference Data</a></li>-->
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-pie-chart"></i>
                                <span>Reports</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
<!--                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> Donations by Type </a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> Deferral Report</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> TTI Report </a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> SMS Campaign Report</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> SMS Report</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> List of Donations to be reviewed</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> Health Questionnaire Analysis</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> Risk Questionnaire Analysis</a></li>-->
                                <!--<li><a href="<?php echo base_url(); ?>home/stockuser"><i class="fa fa-circle-o"></i>Blood Stock User</a></li>-->
                                <li><a href="<?php echo base_url(); ?>home/datatables"><i class="fa fa-circle-o"></i>Blood Stock Data</a></li>
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
                                <!--<li><a href="<?php echo base_url() ?>/home/roles"><i class="fa fa-circle-o"></i> Role Manager</a></li>-->
                                <li><a href="<?php echo base_url() ?>/home/counties"><i class="fa fa-circle-o"></i> County Manager</a></li>                                
                                <li><a href="<?php echo base_url() ?>/home/stockuser"><i class="fa fa-circle-o"></i> RBTC Manager</a></li>
<!--                                <li><a href="<?php echo base_url() ?>/home/clinics"><i class="fa fa-circle-o"></i> Satellite Manager</a></li>
                                <li><a href="<?php echo base_url() ?>/home/deferrals"><i class="fa fa-circle-o"></i> Deferral Manager</a></li>
                                <li><a href="<?php echo base_url() ?>/home/csv"><i class="fa fa-circle-o"></i> Upload Log</a></li>                                -->
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
                        <li class="active">Blood Stock Users</li>
                    </ol>
                </section>

                <div id="user_table_div" class="user_table_div">


                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-default add_user_button" id="add_user_button"><i class="fa fa-plus"></i>Add User </button>

                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">Blood Stock Users</h3>
                                    </div><!-- /.box-header -->
                                    <div class="box-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No . </th>
                                                    <th>Facility Name</th>
                                                    <th>Mobile No</th>
                                                    <th>Facility Code</th>                                                    
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                    <th>Date Added</th>
                                                </tr>

                                            </thead>
                                            <tbody class="user_data" id="user_data">
                                                <?php
                                                $i = 1;

                                                foreach ($stock as $value) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td>
                                                            <?php echo $value['satellite_name']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['mobile_no']; ?>
                                                        </td> 

                                                        <td>
                                                            <?php echo $value['satellitecode']; ?>
                                                        </td> 

                                                        
                                                        <td>
                                                            <?php
                                                            $status = $value['status'];
                                                            if ($status === "Active") {
                                                                ?>
                                                                <span class="btn btn-success"><?php echo $status; ?></span>
                                                                <?php
                                                            } elseif ($status === "In Active") {
                                                                ?>
                                                                <span class="btn btn-danger"><?php echo $status; ?></span>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>



                                                        <td>
                                                            <input type="hidden" name="hidden_user_id" class="hidden_user_id form-control" id="hidden_user_id" value="<?php echo $value['id']; ?>"/>
                                                            <button class='btn btn-xs btn-default edit_user_btn' data-original-title='Edit User'><i class='fa fa-pencil'></i></button>
                                                            <button class='btn btn-xs btn-default delete_user_btn' data-original-title='Delete User'><i class='fa fa-trash-o'></i></button>
                                                        </td>
                                                        
                                                        <td>
                                                            <?php echo $value['date_added']; ?>
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
                                                    <th>Facility Name</th>
                                                    <th>Mobile No</th>
                                                    <th>Facility Code</th>                                                    
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                    <th>Date Added</th>
                                                </tr>

                                            </tfoot>
                                        </table>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </section><!-- /.content -->
                </div>

                <!--Add User Start -->

                <!-- Modal -->
                <div id="myModal" class="modal fade add_user_div" role="dialog">
                    <form class="form-horizontal add_user_form" id="add_user_form">

                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add User</h4>
                                </div>
                                <div class="modal-body">

                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="User Name" class="col-sm-2 control-label">Facility Name: </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control satellite_name" name="satellite_name" id="satellite_name" placeholder="Facility Name : ">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="Mobile  No" class="col-sm-2 control-label">Mobile   No: </label>
                                            <div class="col-sm-10">
                                                <input type="text" required="" class="form-control mobile_no" name="mobile_no" id="mobile_no" placeholder="Mobile No : ">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="Facility Code" class="col-sm-2 control-label">Facility Code: </label>
                                            <div class="col-sm-10">
                                                <input type="text" required="" class="form-control mobile_no" name="satellitecode" id="mobile_no" placeholder="Facility Code: ">
                                            </div>
                                        </div>

                                      

                                        <!-- textarea -->                 
                                        <div class="form-group">
                                            <label for="user_status" class="col-sm-2 control-label">Status:</label>
                                            <div class="col-sm-10">
                                                <select name="status" required="" class="form-control select2 add_status" id="add_status">
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




                <!-- Add User End -->


                <!-- Edit User Start -->
                <!-- Modal -->
                <div id="myModal" class="modal fade edit_user_div" role="dialog">
                    <form class="form-horizontal edit_user_form" id="edit_user_form">

                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close close_edit_modal" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Edit User</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id" required="" class="edit_user_id form-control" id="edit_user_id"/>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="Facility Name" class="col-sm-2 control-label">Facility Name : </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control edit_satellite_name" name="satellite_name" id="edit_satellite_name" placeholder="Facility Name: ">
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label for="User Name" class="col-sm-2 control-label">Mobile No: </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control edit_mobileno" name="mobile_no" id="edit_mobileno" placeholder="Mobile Number: ">
                                            </div>
                                        </div>







                                        <div class="form-group">
                                            <label for="National ID" class="col-sm-2 control-label">Facility Code: </label>
                                            <div class="col-sm-10">
                                                <input type="text" required="" class="form-control edit_national_id" name="satellitecode" id="edit_satellitecode" placeholder="Facility Code : ">
                                            </div>
                                        </div>                                        


                                        <!-- textarea -->                 
                                        <div class="form-group">
                                            <label for="user_status" class="col-sm-2 control-label">Status</label>
                                            <div class="col-sm-10">
                                                <select name="status" required="" class="form-control select2 edit_status" id="edit_status">
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


                <!-- Edit User End -->







                <!-- Delete User Start -->
                <!-- Modal -->
                <div id="myModal" class="modal fade delete_user_div" role="dialog">
                    <form class="form-horizontal delete_user_form" id="delete_user_form">

                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close close_delete_modal" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Disable User</h4>
                                </div>
                                <div class="modal-body">

                                    <div class="box-body">
                                        <div class="form-group">
                                            <p>Are you sure you want to delete Facility : <span id="delete_user_name" class="delete_user_name"></span> </p>
                                        </div>
                                        <div class="form-group">


                                        </div>
                                        <input type="hidden" name="id" class="delete_user_id form-control" id="delete_user_id"/>









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


                <!-- Delete User End -->








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

                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
                    <!-- Settings tab content -->

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
//                        pageTotal = api
//                                .column(4, {page: 'current'})
//                                .data()
//                                .reduce(function (a, b) {
//                                    return intVal(a) + intVal(b);
//                                }, 0);
                        // Update footer
//                        $(api.column(4).footer()).html(
//                                'Total ' + pageTotal + ' , Cumulative ' + total + ' '
//                                );
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
                    $(".user_table_div").show();
                });
                $('.add_user_form').submit(function (event) {
                    dataString = $(".add_user_form").serialize();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>home/add_stockuser",
                        data: dataString,
                        success: function (data) {

                            get_user_details();
                            $(".add_user_div").modal('hide');
                        }

                    });
                    event.preventDefault();
                    return false;
                });
                $('.edit_user_form').submit(function (event) {
                    dataString = $(".edit_user_form").serialize();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>home/edit_stockuser",
                        data: dataString,
                        success: function (data) {

                            get_user_details();
                            $(".user_table_div").show();
                            $(".edit_user_div").modal('hide');
                        }

                    });
                    event.preventDefault();
                    return false;
                });
                $('.delete_user_form').submit(function (event) {
                    dataString = $(".delete_user_form").serialize();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>home/delete_stockuser",
                        data: dataString,
                        success: function (data) {

                            get_user_details();
                            $(".user_table_div").show();
                            $(".delete_user_div").modal('hide');
                        }

                    });
                    event.preventDefault();
                    return false;
                });

                $('.close_delete_modal').click(function () {
                    $(".user_table_div").show();
                    $(".delete_user_div").modal('hide');
                });
                $(".add_user_button").click(function () {
                    $(".add_user_div").modal('show');
                });
                function get_user_details() {
                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url(); ?>home/stockuser/json",
                        dataType: "json",
                        async: true,
                        crossDomain: true,
                        success: function (response) {
                            $(".user_data").empty();
                            var no = 1;
                            $.each(response, function (i, item) {

                                var id = item.id;
                                //var satellite_id = item.satelliteid;
                                var satellite_name = item.satellite_name;
                                var satellite_code = item.satellitecode;
                                var mobileno = item.mobile_no;
                                var entry_status = item.status;
                                var date_added = item.date_added;
                                var timestamp = item.timestamp;
                                var status = item.status;
                                var html_status_tag;
                                if (status === "Active") {
                                    html_status_tag = "<span class=' btn btn-success'>" + status + "</span>"
                                } else if (status === "In Active") {
                                    html_status_tag = "<span class=' btn btn-danger'>" + status + "</span>"
                                }

                                var tr_data = "<tr>\n\
                                            <td>" + no + "</td>\n\ <td>" + satellite_name + "</td>\n\<td>" + mobileno + "</td>\n\<td>" + satellite_code + "</td>\n\<td>" + date_added + "</td>   <td>" + html_status_tag + "</td>  \n\
<td><input type='hidden' name='hidden_user_id' class='hidden_user_id form-control' id='hidden_user_id' value=" + id + "/> <button class='btn btn-xs btn-default edit_user_btn' data-original-title='Edit User'><i class='fa fa-pencil'></i></button> <button class='btn btn-xs btn-default delete_user_btn' data-original-title='Delete User'><i class='fa fa-trash-o'></i></button> </td></tr>";
                                $(".user_data").append(tr_data);
                                // $('.user_table_div').prop('value', 'Processing...');

                                no++;
                            });
                        }, error: function (data) {


                        }
                    });
                }





                $(document).on('click', ".delete_user_btn", function () {
                    //get data
                    var user_id = $(this).closest('tr').find('input[name="hidden_user_id"]').val();
                    //$(".modal_loading").show();
                    $("#delete_user_name").empty();
                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url(); ?>home/get_stockuser_info/" + user_id,
                        dataType: "json",
                        success: function (response) {



                            $('#delete_user_id').val(response[0].id);
                            //$('#delete_user_name').val(response[0].satellite_name);
                            $('#delete_user_name').append(response[0].satellite_name);
                            $(".delete_user_div").modal('show');
                            $(".user_table_div").hide();
                            $(".modal_loading").hide();
                        }, error: function (data) {
                            $(".modal_loading").hide();
                            //sweetAlert("Oops...", "Something went wrong!", "error");

                        }
                    });
                });
                $(document).on('click', ".edit_user_btn", function () {
                    //get data
                    var user_id = $(this).closest('tr').find('input[name="hidden_user_id"]').val();
                    //$(".modal_loading").show();

                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url(); ?>home/get_stockuser_info/" + user_id,
                        dataType: "json",
                        success: function (response) {



                            $('#edit_user_id').val(response[0].id);
                            $('#edit_satellite_name').val(response[0].satellite_name);
                            $('#edit_satellitecode').val(response[0].satellitecode);
                            $('#edit_mobileno').val(response[0].mobile_no);
                            $('#edit_email').val(response[0].status);
                            $('#edit_date_added').val(response[0].date_added);
                            $('#edit_timestamp').val(response[0].timestamp);
                            $(".edit_user_div").modal('show');
                            $(".user_table_div").hide();
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
