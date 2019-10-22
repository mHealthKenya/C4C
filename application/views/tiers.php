<?php $this->load->view('header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            <small></small>
        </h1> 
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>">Charts</a></li>


            <div class="btn-group">
                <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-chevron-down"></i></button>
                <ul class="dropdown-menu" role="menu" style="margin-left: -150px;">
                    <li><a href="<?php echo base_url(); ?>home/exposures"><i class="fa fa-pie-chart"></i>Exposures</a></li>
                    <li><a href="<?php echo base_url(); ?>home/tiers"><i class="fa fa-globe"></i>Tier 1,2 & 3 Counties</a></li>

                </ul>
            </div>
        </ol>


        </ol>
    </section>

    <div id="user_table_div" class="user_table_div">


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">


                    <!--                    <div>
                                            <h4>
                                                //<?php
                    echo "Welcome to C4C " . $_SESSION['name'];
//                            
                    ?>
                                                Visit the administration Panel on the left for options.</h4>
                                        </div>-->


                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Tier 1 Counties</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>                                 
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-11" id="countybar">
                                        <p class="text-center">
                                            <strong>No Of HCWs</strong>
                                        </p>
                                    </div>
                                    <!-- /.chart-responsive -->
                                </div>
                                <!-- /.col -->

                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./box-body -->

                        <!-- /.box-footer -->
                    </div>

                    

                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Tier 2 Counties</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>

                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-11" id="countycharttiertwo">
                                        <p class="text-center">
                                            <strong>No Of HCWs</strong>
                                        </p>
                                    </div>
                                    <!-- /.chart-responsive -->
                                </div>
                                <!-- /.col -->

                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./box-body -->

                        <!-- /.box-footer -->
                    </div>    
                    
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Tier 3 Counties</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>

                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-11" id="countycharttierthree">
                                        <p class="text-center">
                                            <strong>No Of HCWs</strong>
                                        </p>
                                    </div>
                                    <!-- /.chart-responsive -->
                                </div>
                                <!-- /.col -->

                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./box-body -->

                        <!-- /.box-footer -->
                    </div>  


                </div>


            </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->
</div>









</div><!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2016 <a href=""></a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->

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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/dc.js"></script>




<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/d3.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/crossfilter.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/dc.min.js"></script>

<!--<div class="modal_loading" id="modal_loading"> Place at bottom of page </div>
<style type="text/css">
    /* Start by setting display:none to make this hidden.
Then we position it in relation to the viewport window
with position:fixed. Width, height, top and left speak
for themselves. Background we set to 80% white with
our animation centered, and no-repeating */
    .modal_loading {
        display:    none;
        position:   fixed;
        z-index:    1000;
        top:        0;
        left:       0;
        height:     100%;
        width:      100%;
        background: rgba( 255, 255, 255, .8 ) 
            50% 50% 
            no-repeat;
    }
</style>-->


<!-- page script -->
<script>
    var countychart = dc.barChart("#countybar");
    var countycharttiertwo = dc.barChart("#countycharttiertwo");
    var countycharttierthree = dc.barChart("#countycharttierthree");
    var othertierchart = dc.rowChart("#othertierchart");







    d3.json('json_tier', function (error, data) {

        var ndx = crossfilter(data),
                countyDimension = ndx.dimension(function (d) {

                    return d.county;
                }),
                countyCountGroup = countyDimension.group().reduceCount(function (d) {

            return d.county;
        });
        
        countychart
                .width(190)
                .height(380)
                .x(d3.scale.ordinal())
                .xUnits(dc.units.ordinal)
                .brushOn(false)
                .xAxisLabel('County Name')
                .yAxisLabel('Number of HCWs')
                .dimension(countyDimension)
                .barPadding(0.1)
                .outerPadding(0.05)
                .group(countyCountGroup);
        countychart.render();


    });

    d3.json('json_tier_two', function (error, data) {

        var ndx = crossfilter(data),
                countyDimension = ndx.dimension(function (d) {

                    return d.county;
                }),
                countyCountGroup = countyDimension.group().reduceCount(function (d) {

            return d.county;
        });

        countycharttiertwo
                .width(190)
                .height(380)
                .x(d3.scale.ordinal())
                .xUnits(dc.units.ordinal)
                .brushOn(false)
                .xAxisLabel('County Name')
                .yAxisLabel('Number of HCWs')
                .dimension(countyDimension)
                .barPadding(0.1)
                .outerPadding(0.05)
                .group(countyCountGroup);
        countycharttiertwo.render();


    });
    
    d3.json('json_tier_three', function (error, data) {

        var ndx = crossfilter(data),
                countyDimension = ndx.dimension(function (d) {

                    return d.county;
                }),
                countyCountGroup = countyDimension.group().reduceCount(function (d) {

            return d.county;
        });

        countycharttierthree
                .width(390)
                .height(380)
                .x(d3.scale.ordinal())
                .xUnits(dc.units.ordinal)
                .brushOn(false)
                .xAxisLabel('County Name')
                .yAxisLabel('Number of HCWs')
                .dimension(countyDimension)
                .barPadding(0.1)
                .outerPadding(0.05)
                .group(countyCountGroup);
        countycharttierthree.render();


    });

    




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


</script>
</body>
</html>
