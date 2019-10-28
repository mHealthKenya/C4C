<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>T4L | Donor </title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/all.css">
        <!-- daterange picker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker-bs3.css">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">

        <!-- Select2 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">

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
                <a href="../../t4l_web/home/" class="logo">
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
                        <li class="active">Upload Data</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!--<div class="row">-->
                    <div class="row">
                        <div class="donation_search_div" id="donation_search_div">
                            <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Upload Data</h3>
                                    </div><!-- /.box-header -->  
                                    <br>

                                    <?php if (!empty($error)): ?>
                                        <div class="alert alert-error"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                    <?php if ($this->session->flashdata('success') == TRUE): ?>
                                        <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                                    <?php endif; ?>

<!--                <caption>Import Results</caption>-->
<!--                <form method="post" action="<?php echo base_url() ?>home/csv" enctype="multipart/form-data">
                   <input type="file" name="userfile" >
                   <input type="submit" name="submit" value="upload" class="btn btn-primary">
               </form>-->

                                    <div class="form-group">               
                                        <?php echo $error; ?>
                                        <?php echo form_open_multipart('home/csv'); ?>
                                        <input type="file" name="userfile" size="20" />
                                        <br />
                                        <input type="submit" value="upload" class="btn btn-primary"/>
                                        </form>                           
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br><br>
                        <div id="stock_table_div" class="stock_table_div">
                            <!-- Main content -->
                            <section class="content">
                                <div class="row">
                                    <div class="col-xs-12">                              

                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">Data</h3>
                                            </div><!-- /.box-header -->
                                            <div class="box-body">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>SID</th>
                                                            <th>Code 1</th>
                                                            <th>Code 2</th>
                                                            <th>Code 3</th>
                                                            <th>Code 4</th>                        
                                                            <th>Notification Date</th>
                                                            <th>Upload Date</th> 
                                                            <th>Blood Group</th>
                                                        </tr>
                                                    </thead>

                                                    <?php if ($result == FALSE): ?>
                                                        <tr><td colspan="4">There are currently no Results</td></tr>
                                                    <?php else: ?>
                                                        <?php foreach ($result as $row): ?>
                                                            <tr>
                                                                <td><?php echo $row['donation_id']; ?></td>
                                                                <td><?php echo $row['hepatitisb']; ?></td>
                                                                <td><?php echo $row['hepatitisc']; ?></td>
                                                                <td><?php echo $row['hiv']; ?></td>
                                                                <td><?php echo $row['syphilis']; ?></td>
                                                                <td><?php echo $row['last_modified']; ?></td>
                                                                <td><?php echo $row['upload_date']; ?></td>                                
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>

                                                </table>


                                            </div>
                                        </div>
                                    </div></div>
                            </section>
                        </div>

                        <!-- left column -->

                        <!-- right column -->


                        <!--</div>-->    




                        </form>
                    </div><!-- /.box -->
                    <!-- general form elements disabled -->


                    <!-- /.box-body -->
            </div>

        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.1.0
    </div>
    <strong>Copyright &copy; 2016<a href=""></a>.</strong> All rights reserved.
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
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>

<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>
<script>
    $(document).ready(function () {

        $(".add_new_donor").click(function () {
            $(".enrol_new_donor").show();
        });
        $(".back_to_search").click(function () {
            $(".risk_questionnaire").hide();
            $(".health_questionnaire").hide();
            $(".declaration").hide();
            $(".donation_search_div").show();
        });



        $(".back_to_health").click(function () {
            $(".risk_questionnaire").hide();
            $(".donation_search_div").hide();
            $(".declaration").hide();
            $(".health_questionnaire").show();
        });


        $(".back_to_risk").click(function () {
            $(".risk_questionnaire").hide();
            $(".donation_search_div").hide();
            $(".declaration").hide();
            $(".risk_questionnaire").show();
        });

        $(".move_to_risk").click(function () {
            $(".donation_search_div").hide();
            $(".health_questionnaire").hide();
            $(".declaration").hide();
            $(".risk_questionnaire").show();
        });
        $(".move_to_declaration").click(function () {
            $(".risk_questionnaire").hide();
            $(".health_questionnaire").hide();
            $(".donation_search_div").hide();
            $(".declaration").show();
        });


        //Initialize Select2 Elements
        $(".select2").select2();
//Date range picker
        $('.lst_dntn_dte').datepicker();

        $('.dntn_dte').datepicker();

        $(".search_value").keyup(function () {

            if (!$("input[name='donor_search']:checked").val()) {
                alert('Nothing is checked!, Please select one of the Search Parameters...');
            } else {

                var value = $(".search_value").val();

                $.ajax({
                    type: 'GET',
                    url: "<?php echo base_url(); ?>home/search_donor/" + value,
                    dataType: 'JSON',
                    success: function (results) {
                        var check_data = jQuery.isEmptyObject(results);
                        if (check_data === true) {
                            $(".search_results_div").hide();
                        } else {
                            $(".results_tbody").empty();
                            $.each(results, function (i, donors) {


                                var tr_results = "<tr><td>" + donors.sname + "  " + donors.oname + "</td><td>" + donors.id_no + "</td><td>" + donors.cell_no + "</td><td>" + donors.home_no + "</td><td>" + donors.gender + "</td><td>" + donors.blood_group + "</td><td><input type='text' id='hidden_donor_id' class='hidden hidden_donor_id form-control' name='hidden_donor_id' value='" + donors.id + "'/><button class='btn btn-xs btn-default select_donor_btn' id='select_donor_btn' data-original-title='Select Donor'><i class='fa fa-hand-pointer-o'></i></button></td></tr>";

                                $(".results_tbody").append(tr_results);
                                $(".search_results_div").show();




                            });

                        }



                    }
                });

            }



        });














        $(document).on('click', ".select_donor_btn", function () {
            //get data
            var hidden_donor_id = $(this).closest('tr').find('input[name="hidden_donor_id"]').val();

            $(".current_donor_id").val(hidden_donor_id);

            $(".donation_search_div").hide();
            $(".questionnaire_div").show();
            $(".health_questionnaire").show();

        });





        $('#save_questionnaire_form').submit(function (event) {
            dataString = $("#save_questionnaire_form").serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>home/donate_blood",
                data: dataString,
                success: function (data) {


                }

            });
            event.preventDefault();
            return false;
        });


        $('#enroll_new_donor_form').submit(function (event) {
            dataString = $("#enroll_new_donor_form").serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>home/enroll_new_donor",
                data: dataString,
                success: function (data) {


                }

            });
            event.preventDefault();
            return false;
        });


        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });




    });
</script>
</body>
</html>
