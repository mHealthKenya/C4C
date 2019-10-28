<?php $this->load->view('header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <span class="info info-box">Note : Due to huge amount of datasets and complexity of the Queries , the dashboard might be a bit slow.</span>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-2 col-xs-2">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><span class="total_results"></span></h3>

                        <p> Results YTD</p>
                    </div>

                    <a href="<?php echo base_url(); ?>home/all_facility_results_report" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->





            <div class="col-lg-2 col-xs-2">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><span class="total_eid_results"></span></h3>

                        <p> EID Results YTD</p>
                    </div>

                    <a href="<?php echo base_url(); ?>home/eid_results_report" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-xs-2">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><span class="total_vl_results"></span></h3>

                        <p> VL Results YTD</p>
                    </div>

                    <a href="<?php echo base_url(); ?>home/faclty_vl_results_report" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- ./col -->



            <div class="col-lg-2 col-xs-3">
                <!-- small box -->
                <div class="small-box bg-gray">
                    <div class="inner">
                        <h3><span class="total_invalid_results"></span></h3>

                        <p> Invalid  Results YTD</p>
                    </div>

                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>








        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-6 connectedSortable">



                <!-- solid sales graph -->
                <div class="box box-solid bg-teal-gradient">
                    <div class="box-header">
                        <i class="fa fa-th"></i>

                        <h3 class="box-title">Valid vs Invalid Results YTD</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body border-radius-none">
                        <div class="chart" id="valid_invalid_ytd" style="height: 300px;"></div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-border">
                        <!-- /.row -->
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->



            </section>

            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->

            <section class="col-lg-6 connectedSortable">



                <!-- solid sales graph -->
                <div class="box box-solid bg-teal-gradient">
                    <div class="box-header">
                        <i class="fa fa-th"></i>

                        <h3 class="box-title">EID vs VL Results YTD</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body border-radius-none">
                        <div class="chart tab-pane" id="eid-vl-chart" style="position: relative; height: 300px;"></div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-border">
                        <!-- /.row -->
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->



            </section>


            <!-- right col -->







        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017-  <a href="http://mlab.org">M-Lab</a>.</strong> All rights
    reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">

</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>assets/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        get_all_results();
        setInterval(function () {

            get_all_results();
        }, 300000);


        function get_all_results() {

            $.ajax({
                type: 'GET',
                url: "<?php echo base_url() ?>home/all_facility_results",
                dataType: 'JSON',
                success: function (data) {
                    var is_empty = jQuery.isEmptyObject(data);
                    if (is_empty === true) {
                        $(".total_results").empty();
                        var no_of_messages = "0";
                        $(".total_results").append(no_of_messages);
                    } else {
                        $(".total_results").empty();
                        var no_of_messages = data[0].no_of_messages;
                        $(".total_results").append(no_of_messages);
                    }

                }
            });



            $.ajax({
                type: 'GET',
                url: "<?php echo base_url() ?>home/all_facility_ffeid_results",
                dataType: 'JSON',
                success: function (data) {
                    var is_empty = jQuery.isEmptyObject(data);
                    if (is_empty === true) {
                        $(".total_eid_results").empty();
                        var no_of_messages = "0";
                        $(".total_eid_results").append(no_of_messages);
                    } else {
                        $(".total_eid_results").empty();
                        var no_of_messages = data[0].no_of_messages;
                        $(".total_eid_results").append(no_of_messages);
                    }

                }
            });



            $.ajax({
                type: 'GET',
                url: "<?php echo base_url() ?>home/all_facility_ffviral_results",
                dataType: 'JSON',
                success: function (data) {

                    var is_empty = jQuery.isEmptyObject(data);
                    if (is_empty === true) {
                        $(".total_vl_results").empty();
                        var no_of_messages = "0";
                        $(".total_vl_results").append(no_of_messages);
                    } else {
                        $(".total_vl_results").empty();
                        var no_of_messages = data[0].no_of_messages;
                        $(".total_vl_results").append(no_of_messages);
                    }

                }
            });


            $.ajax({
                type: 'GET',
                url: "<?php echo base_url() ?>home/all_facility_invalid_ffeid_results",
                dataType: 'JSON',
                success: function (data) {

                    var is_empty = jQuery.isEmptyObject(data);
                    if (is_empty === true) {
                        $(".total_invalid_EID_results").empty();
                        var no_of_messages = "0";
                        $(".total_invalid_EID_results").append(no_of_messages);
                    } else {
                        $(".total_invalid_EID_results").empty();
                        var no_of_messages = data[0].no_of_messages;
                        $(".total_invalid_EID_results").append(no_of_messages);
                    }


                }
            });



            $.ajax({
                type: 'GET',
                url: "<?php echo base_url() ?>home/all_facility_invalid_ffviral_results",
                dataType: 'JSON',
                success: function (data) {

                    var is_empty = jQuery.isEmptyObject(data);
                    if (is_empty === true) {

                        $(".total_invalid_VL_results").empty();
                        var no_of_messages = "0";
                        $(".total_invalid_VL_results").append(no_of_messages);
                    } else {

                        $(".total_invalid_VL_results").empty();
                        var no_of_messages = data[0].no_of_messages;
                        $(".total_invalid_VL_results").append(no_of_messages);
                    }


                }
            });





            $.ajax({
                type: 'GET',
                url: "<?php echo base_url() ?>home/all_facility_invalid_results",
                dataType: 'JSON',
                success: function (data) {

                    var is_empty = jQuery.isEmptyObject(data);
                    if (is_empty === true) {
                        $(".total_invalid_results").empty();
                        var no_of_messages = "0";
                        $(".total_invalid_results").append(no_of_messages);
                    } else {
                        $(".total_invalid_results").empty();
                        var no_of_messages = data[0].no_of_messages;
                        $(".total_invalid_results").append(no_of_messages);
                    }


                }
            });



            $.ajax({
                type: 'GET',
                url: "<?php echo base_url() ?>home/all_facility_valid_results",
                dataType: 'JSON',
                success: function (data) {
                    var is_empty = jQuery.isEmptyObject(data);
                    if (is_empty === true) {
                        $(".total_valid_results").empty();
                        var no_of_messages = "0";
                        $(".total_valid_results").append(no_of_messages);
                    } else {

                        $(".total_valid_results").empty();
                        var no_of_messages = data[0].no_of_messages;
                        $(".total_valid_results").append(no_of_messages);
                    }



                }
            });
        }

        facility_eid_results();

        function facility_eid_results() {
            var ffeid;
            $.ajax({
                type: 'GET',
                url: "<?php echo base_url() ?>home/all_ffeid_chart",
                dataType: 'JSON',
                success: function (data) {
                    var is_empty = jQuery.isEmptyObject(data);
                    if (is_empty === true) {
                        ffeid = "0";
                        console.log("FFEID : " + ffeid);
                    } else {
                        ffeid = data[0].value;
                        console.log("FFEID : " + ffeid);

                    }

                    facility_vl_results(ffeid);
                }
            });

        }



        function facility_vl_results(ffeid) {
            var value;
            $.ajax({
                type: 'GET',
                url: "<?php echo base_url() ?>home/all_ffvl_chart",
                dataType: 'JSON',
                success: function (data) {
                    var is_empty = jQuery.isEmptyObject(data);
                    if (is_empty === true) {
                        value = "0";
                        console.log("VL : " + value);
                    } else {
                        value = data[0].value;
                        console.log(" VL : " + value);
                    }

                    draw_morris(value, ffeid);

                }
            });

        }


        function draw_morris(vl, ffeid) {
            var cleaned_data = [{label: "EID", value: ffeid}, {label: "VL", value: vl}];
            //Donut Chart
            var donut = new Morris.Donut({
                element: 'eid-vl-chart',
                resize: true,
                colors: ["#3c8dbc", "#f56954"],
                data: cleaned_data,
                hideHover: 'auto'
            });

            donut.redraw();
        }












        facility_rejected_eid_results();

        function facility_rejected_eid_results() {
            var ffeid;
            $.ajax({
                type: 'GET',
                url: "<?php echo base_url() ?>home/facility_ffviral_rejected_results",
                dataType: 'JSON',
                success: function (data) {
                    var is_empty = jQuery.isEmptyObject(data);
                    if (is_empty === true) {
                        ffeid = "0";

                    } else {
                        ffeid = data[0].value;


                    }

                    facility_rejected_vl_results(ffeid);
                }
            });

        }



        function facility_rejected_vl_results(ffeid) {
            var value;
            $.ajax({
                type: 'GET',
                url: "<?php echo base_url() ?>home/facility_ffeid_rejected_results",
                dataType: 'JSON',
                success: function (data) {
                    var is_empty = jQuery.isEmptyObject(data);
                    if (is_empty === true) {
                        value = "0";

                    } else {
                        value = data[0].value;
                        console.log(" VL : " + value);
                    }

                    draw_rejected_morris(value, ffeid);

                }
            });

        }


        function draw_rejected_morris(vl, ffeid) {
            var cleaned_data = [{label: "EID", value: ffeid}, {label: "VL", value: vl}];
            //Donut Chart
            var donut = new Morris.Donut({
                element: 'rejected_eid_vl_chart',
                resize: true,
                colors: ["#3c8dbc", "#f56954"],
                data: cleaned_data,
                hideHover: 'auto'
            });

            donut.redraw();
        }





        rejected_results_chart();

        function rejected_results_chart() {
            var ffeid;
            $.ajax({
                type: 'GET',
                url: "<?php echo base_url() ?>home/facility_ffviral_rejected_results",
                dataType: 'JSON',
                success: function (data) {
                    var is_empty = jQuery.isEmptyObject(data);
                    if (is_empty === true) {
                        ffeid = "0";

                    } else {
                        ffeid = data[0].value;


                    }

                    invalid_results_chart(ffeid);
                }
            });

        }



        function invalid_results_chart(ffeid) {
            var value;
            $.ajax({
                type: 'GET',
                url: "<?php echo base_url() ?>home/facility_ffeid_rejected_results",
                dataType: 'JSON',
                success: function (data) {
                    var is_empty = jQuery.isEmptyObject(data);
                    if (is_empty === true) {
                        value = "0";

                    } else {
                        value = data[0].value;
                        console.log(" VL : " + value);
                    }

                    draw_rejected_morris(value, ffeid);

                }
            });

        }


        function draw_rejected_morris(vl, ffeid) {
            var cleaned_data = [{label: "EID", value: ffeid}, {label: "VL", value: vl}];
            //Donut Chart
            var donut = new Morris.Donut({
                element: 'rejected_invalid_chart',
                resize: true,
                colors: ["#3c8dbc", "#f56954"],
                data: cleaned_data,
                hideHover: 'auto'
            });

            donut.redraw();
        }


















        facility_invalid_eid_results();

        function facility_invalid_eid_results() {
            var ffeid;
            $.ajax({
                type: 'GET',
                url: "<?php echo base_url() ?>home/all_invalid_ffeid_chart",
                dataType: 'JSON',
                success: function (data) {
                    var is_empty = jQuery.isEmptyObject(data);
                    if (is_empty === true) {
                        ffeid = "0";
                        console.log("FFEID : " + ffeid);
                    } else {
                        ffeid = data[0].value;
                        console.log("FFEID : " + ffeid);

                    }

                    facility_invalid_vl_results(ffeid);
                }
            });

        }



        function facility_invalid_vl_results(ffeid) {
            var value;
            $.ajax({
                type: 'GET',
                url: "<?php echo base_url() ?>home/all_invalid_ffvl_chart",
                dataType: 'JSON',
                success: function (data) {
                    var is_empty = jQuery.isEmptyObject(data);
                    if (is_empty === true) {
                        value = "0";
                        console.log("VL : " + value);
                    } else {
                        value = data[0].value;
                        console.log(" VL : " + value);
                    }

                    draw_invalid_morris(value, ffeid);

                }
            });

        }


        function draw_invalid_morris(vl, ffeid) {
            var cleaned_data = [{label: "EID", value: ffeid}, {label: "VL", value: vl}];
            //Donut Chart
            var donut = new Morris.Donut({
                element: 'invalid_eid_vl_chart',
                resize: true,
                colors: ["#3c8dbc", "#f56954"],
                data: cleaned_data,
                hideHover: 'auto'
            });

            donut.redraw();
        }














        //Fix for charts under tabs
        $('.box ul.nav a').on('shown.bs.tab', function () {
            donut.redraw();

        });


    })
</script>

</body>
</html>
