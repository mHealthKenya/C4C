<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Advanced form elements</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- daterange picker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker-bs3.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/all.css">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.css">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <!--- Header starts here -->
            <?php $this->load->view("layout/header"); ?>
            <!-- Header ends here -->

            <!-- Left side column. contains the logo and sidebar -->
            <!-- Left side column start here  -->
            <?php $this->load->view("layout/aside"); ?>
            <!-- Left side column ends here  -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        SMS Campaign 
                        <small>Create SMS Campaign</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Forms</a></li>
                        <li class="active">Send SMS Campaign </li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- SELECT2 EXAMPLE -->
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">Select2</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Send On : </label>
                                        <input type="text" name="send_date" class="send_date form-control" id="send_date"/>
                                    </div><!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Campaign Name : </label>
                                        <input type="text" name="campaign_name" class="campaign_name form-control" id="campaign_name"/>

                                    </div><!-- /.form-group -->
                                </div><!-- /.col -->



                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Message : </label>
                                        <textarea class="form-control message textarea wysihtml5-editor placeholder sent_message" name="sent_message" id="sent_message" placeholder="Please enter your Message here ...."></textarea>
                                    </div><!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Other Numbers : ( Hint : Please enter numbers     separated by ;) </label>
                                        <textarea class="form-control message textarea wysihtml5-editor placeholder other_numbers" name="other_numbers[]" id="other_numbers" placeholder="Please enter numbers seperated by ; "></textarea>

                                    </div><!-- /.form-group -->
                                </div><!-- /.col -->




                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Counties : </label>
                                        <select class="form-control select2" multiple="multiple" name="counties[]" data-placeholder="Select a County/ies" style="width: 100%;">
                                            <option value="">Please select :</option>
                                            <?php foreach ($counties as $county) {
                                                ?>
                                                <option value="<?php echo $county['id']; ?>"><?php echo $county['name']; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div><!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Target Group : </label>
                                        <select class="form-control select2" multiple="multiple" name="target_group[]" data-placeholder="Select Donor group/s" style="width: 100%;">
                                            <option value="">Please select :</option>
                                            <option value="All">All</option>
                                            <option value="Donors">Donors</option>
                                            <option value="Potential Donors">Potential Donors</option>
                                        </select>  
                                    </div><!-- /.form-group -->
                                </div><!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Blood Groups</label>
                                        <select class="form-control select2" multiple="multiple" name="blood_groups[]" data-placeholder="Select  Blood group/s" style="width: 100%;">
                                            <option value="">Please select :</option>
                                            <?php foreach ($blood_groups as $blood_group) {
                                                ?>
                                                <option value="<?php echo $blood_group['id']; ?>"><?php echo $blood_group['name']; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div><!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Venue of Last Donation</label>
                                        <select class="form-control select2" multiple="multiple" name="donation_site[]" data-placeholder="Select  Donation site" style="width: 100%;">
                                            <option value="">Please select :</option>
                                            <?php foreach ($donation_sites as $donation_site) {
                                                ?>
                                                <option value="<?php echo $donation_site['id']; ?>"><?php echo $donation_site['name']; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col -->

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Donation Date </label>
                                        <input type="text" name="ldd" class="form-control ldd"/>
                                    </div><!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Status of Last Donation</label>
                                        <select class="form-control select2" multiple="multiple" name="donation_site[]" data-placeholder="Select  Donation site" style="width: 100%;">
                                            <option value="">Please select :</option>
                                            <option value="ACCEPTED">ACCEPTED</option>
                                            <option value="TEMPORARY DEFERRAL">TEMPORARY DEFERRAL</option>
                                            <option value="PERMANENT DEFERRAL">PERMANENT DEFERRAL</option>

                                        </select>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col -->

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Has not collected blood results : <input type="checkbox" class="flat-red"></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Is due for donation : <input type="checkbox" class="flat-red"></label>
                                    </div>



                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Override age limit : <input type="checkbox" class="flat-red"></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-control select2" id="gender" name="gender" data-placeholder="Gender">
                                            <option>Please select : </option>
                                            <option value="All">All</option>
                                            <?php
                                            foreach ($genders as $gender) {
                                                ?><option value="<?php echo $gender['id']; ?>"><?php echo $gender['name']; ?></option><?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.box-body -->
                        <div class="box-footer">

                        </div>
                    </div><!-- /.box -->

                    <div class="row">


                    </div><!-- /.row -->

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            <?php $this->load->view("layout/footer"); ?>

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



                    </div><!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
                    <!-- Settings tab content -->
                    <div class="tab-pane" id="control-sidebar-settings-tab">

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
        <!-- Select2 -->
        <script src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>
        <!-- InputMask -->
        <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
        <!-- date-range-picker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap color picker -->
        <script src="<?php echo base_url(); ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
        <!-- bootstrap time picker -->
        <script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <!-- SlimScroll 1.3.0 -->
        <script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- iCheck 1.0.1 -->
        <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
        <!-- Page script -->
        <script>
            $(function () {
                //Initialize Select2 Elements
                $(".select2").select2();

                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
                //Money Euro
                $("[data-mask]").inputmask();

                //Date range picker
                $('#reservation').daterangepicker();
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
                //Date range as a button
                $('#daterange-btn').daterangepicker(
                        {
                            ranges: {
                                'Today': [moment(), moment()],
                                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                            },
                            startDate: moment().subtract(29, 'days'),
                            endDate: moment()
                        },
                function (start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
                );

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

                //Colorpicker
                $(".my-colorpicker1").colorpicker();
                //color picker with addon
                $(".my-colorpicker2").colorpicker();

                //Timepicker
                $(".timepicker").timepicker({
                    showInputs: false
                });
            });
        </script>

        <!-- CK Editor -->
        <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <script>
            $(function () {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('sent_message');
                CKEDITOR.replace('other_numbers');
            });
        </script>
    </body>
</html>
