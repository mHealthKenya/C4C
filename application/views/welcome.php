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
<!--                <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-chevron-down"></i></button>
                <ul class="dropdown-menu" role="menu" style="margin-left: -150px;">

                    <li><a href="<?php echo base_url(); ?>home/subcountyusers"><i class="fa fa-pie-chart"></i>Exposures</a></li>
                    <li><a href="<?php echo base_url(); ?>home/tiers"><i class="fa fa-globe"></i>Tier 1,2 & 3 Counties</a></li>
                    <li><a href="<?php echo base_url(); ?>"><i class="fa fa-globe"></i>Tier 2 Counties</a></li>
                    <li><a href="<?php echo base_url(); ?>"><i class="fa fa-globe"></i>Tier 3 Counties</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                </ul>-->
            </div>
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
                                <h3 class="box-title">Select</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>

                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <p class="text-left">
                                            <strong>Select County</strong>
                                        </p>
                                        <div  id="countyselect">   
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <p class="text-left">
                                            <strong>Select Sub-County</strong>
                                        </p>
                                        <div  id="subcountyselect">   
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-left">
                                            <strong>Select Facility</strong>
                                        </p>
                                        <div  id="facilityselect">   
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <p class="text-left">
                                            <strong>Select Cadre</strong>
                                        </p>
                                        <div  id="cadreselect">   
                                        </div>
                                    </div>

<!--                                    <div class="col-md-2">
                                        <p class="text-left">
                                            <strong>Select Gender</strong>
                                        </p>
                                        <div  id="genderselect">   
                                        </div>
                                    </div>-->
                                    <!--                                    <div class="col-md-2">
                                                                            <p class="text-left">
                                                                                <strong>Select Age</strong>
                                                                            </p>
                                                                            <div  id="ageselect">   
                                                                            </div>
                                                                        </div>-->



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

                    <div class="col-md-8">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Counties</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <!--                                    <div class="btn-group">
                                                                            <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                                                                                <i class="fa fa-wrench"></i></button>
                                                                            <ul class="dropdown-menu" role="menu">
                                                                                <li><a href="#">Action</a></li>
                                                                                <li><a href="#">Another action</a></li>
                                                                                <li><a href="#">Something else here</a></li>
                                                                                <li class="divider"></li>
                                                                                <li><a href="#">Separated link</a></li>
                                                                            </ul>
                                                                        </div>-->
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-11" id="countybar">
                                        <p class="text-center">
                                            <strong>HCWs Per County</strong>
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
                    <!-- /.box -->

                    <div class="col-md-4">                     
                        <!-- PRODUCT LIST -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Cadres</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->

                            <div class="box-body"  >
                                <div class="row">
                                    <div class="col-md-12" id="cadrebar">

                                    </div>
                                    <!-- /.chart-responsive -->
                                </div>
                                <!-- /.col -->

                                <!-- /.col -->
                            </div>
                            <!-- /.box-body -->

                        </div>
                        <!-- /.box -->
                    </div>


                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Sub-Counties</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>                                    
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="text-center">
                                            <strong>HCWs Per Sub-County</strong>
                                        </p>
                                        <div  id="subcountybar">   
                                        </div>
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
                    <!-- /.box -->

                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Facilities</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>                                    
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="text-center">
                                            <strong>HCWs Per Facility</strong>
                                        </p>
                                        <div  id="facilitybar">   
                                        </div>
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
                    <!-- /.box -->



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
    var subcountychart = dc.barChart("#subcountybar");
    var cadrechart = dc.pieChart("#cadrebar");
//    var facilitychart = dc.barChart("#facilitybar");

    //Selec Chart
    var countyselect = dc.selectMenu("#countyselect");
    var subcountyselect = dc.selectMenu("#subcountyselect");
    var facilityselect = dc.selectMenu("#facilityselect");
    var cadreselect = dc.selectMenu("#cadreselect");
    var ageselect = dc.selectMenu("#ageselect");
    var genderselect = dc.selectMenu("#genderselect");

    var widthcounty = document.getElementById('countybar').offsetWidth;
    var heightcounty = document.getElementById('countybar').offsetHeight;
    var widthsubcounty = document.getElementById('subcountybar').offsetWidth;
    var heightsubcounty = document.getElementById('subcountybar').offsetHeight;
    var widthcadre = document.getElementById('cadrebar').offsetWidth;
    var widthfacility = document.getElementById('facilitybar').offsetWidth;
    var heightfacility = document.getElementById('facilitybar').offsetHeight;



    d3.json('home/jsondata', function (error, data) {

        var ndx = crossfilter(data),
                countyDimension = ndx.dimension(function (d) {

                    return d.county;
                }),
                countyCountGroup = countyDimension.group().reduceCount(function (d) {

            return d.county;
        }),
                cadreDimension = ndx.dimension(function (d) {

                    return d.cadre;
                }),
                cadreGroup = cadreDimension.group().reduceCount(function (d) {

            return d.cadre;
        }),
                subcountybarDimension = ndx.dimension(function (d) {

                    return d.sub_county;
                }),
                subcountybarGroup = subcountybarDimension.group().reduceCount(function (d) {

            return d.sub_county;
        }),
                facilitybarDimension = ndx.dimension(function (d) {

                    return d.facility;
                }),
                facilitybarGroup = facilitybarDimension.group().reduceCount(function (d) {

            return d.facility;
        }),
                genderDimension = ndx.dimension(function (d) {

                    return d.gender;
                }),
                genderGroup = genderDimension.group().reduceCount(function (d) {

            return d.gender;
        });

        countyselect
                .dimension(countyDimension)
                .group(countyDimension.group())
                .controlsUseVisibility(true)
                .render();
        subcountyselect
                .dimension(subcountybarDimension)
                .group(subcountybarDimension.group())
                .multiple(false)
                .controlsUseVisibility(true)
                .render();
        facilityselect
                .dimension(facilitybarDimension)
                .group(facilitybarDimension.group())
                .multiple(false)
                .controlsUseVisibility(true)
                .render();
        cadreselect
                .dimension(cadreDimension)
                .group(cadreDimension.group())
                .multiple(false)
                .controlsUseVisibility(true)
                .render();
//        ageselect
//                .dimension(agebarDimension)
//                .group(agebarDimension.group())
//                .multiple(false)
//                .controlsUseVisibility(true)
//                .render();
        genderselect
                .dimension(genderDimension)
                .group(genderDimension.group())
                .multiple(false)
                .controlsUseVisibility(true)
                .render();


        countychart
                .width(widthcounty)
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

        subcountychart
                .width(990)
                .height(380)
                .x(d3.scale.ordinal())
                .xUnits(dc.units.ordinal)
                .brushOn(true)
                .xAxisLabel('Sub-County Name')
                .yAxisLabel('Number of HCWs')
                .dimension(subcountybarDimension)
                .barPadding(0.1)
                .outerPadding(0.05)
                .group(subcountybarGroup);
        subcountychart.render();
        
        


//        facilitychart
//                .width(widthcounty)
//                .height(380)
//                .x(d3.scale.ordinal())
//                .xUnits(dc.units.ordinal)
//                .brushOn(false)
//                .xAxisLabel('Facility Name')
//                .yAxisLabel('Number of HCWs')
//                .dimension(facilitybarDimension)
//                .barPadding(0.9)
//                .outerPadding(0.15)
//                .group(facilitybarGroup);
//        facilitychart.render();


//        subcountychart
//                .width(widthsubcounty)
//                .height(700)
//                .x(d3.scale.linear().domain([6, 20]))
//                .elasticX(true)
//                .dimension(subcountybarDimension)
//                .group(subcountybarGroup)
//        subcountychart.render();


//        facilitychart
//                .width(900)
//                .height(4000)
//                .x(d3.scale.linear().domain([6, 20]))
//                .elasticX(true)
//                .dimension(facilitybarDimension)
//                .group(facilitybarGroup)
//        facilitychart.render();


        cadrechart
//                .width(368)
//                .height(280)
//                .slicesCap(40)
//                .innerRadius(30)
//                .dimension(cadreDimension)
//                .group(cadreGroup)
//                .legend(dc.legend())
//                // workaround for #703: not enough data is accessible through .label() to display percentages
//                .on('pretransition', function (chart) {
//                    chart.selectAll('text.pie-slice').text(function (d) {
//                        return d.data.key + ' ' + dc.utils.printSingleValue((d.endAngle - d.startAngle) / (2 * Math.PI) * 100) + '%';
//                    })
//                });
                .width(widthcadre)
                .height(410)
                .slicesCap(14)
                .innerRadius(30)
                .externalLabels(10)
                .externalRadiusPadding(79)
                .drawPaths(true)
                .dimension(cadreDimension)
                .group(cadreGroup)
                .legend(dc.legend().x(4).itemWidth(130));
        // example of formatting the legend via svg
        // http://stackoverflow.com/questions/38430632/how-can-we-add-legends-value-beside-of-legend-with-proper-alignment
        cadrechart.on('pretransition', function (chart) {
            chart.selectAll('.dc-legend-item text')
                    .text('')
                    .append('tspan')
                    .text(function (d) {
                        return d.name;
                    })
                    .append('tspan')
                    .attr('x', 150)
                    .attr('text-anchor', 'end')
                    .text(function (d) {
                        return d.data;
                    });
        });

        cadrechart.render();

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
