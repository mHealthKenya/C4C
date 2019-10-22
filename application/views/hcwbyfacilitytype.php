<?php $this->load->view('hcwheader'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            <small></small>
        </h1>

    </section>



    <!--Add Partner Start -->

    <div id="patient_table_div" class="patient_table_div">


        <!-- Main content -->
        <section class="col-lg-12 connectedSortable" style="background-color: white;">


            <div class="form-group">
                <div class="col-lg-12">
                    <div class="row">
        <div><h4>Filter results...</h4></div>
        <div class="col-lg-3">
            <span class="filter_partner_wait" style="display: none;">Loading , Please Wait ...</span>
            <select class="form-control filter_county" name="filter_county" id="filter_county">
                <option value="">Select County : </option>
            </select>
        </div>
        <div class="col-lg-3">
            <span class="filter_partner_wait" style="display: none;">Loading , Please Wait ...</span>
            <select class="form-control filter_sub_county" name="filter_sub_county" id="filter_sub_county">
                <option value="">Select Sub-County : </option>
            </select>
        </div>

        <div class="col-lg-3">
            <span class="filter_partner_wait" style="display: none;">Loading , Please Wait ...</span>
            <select class="form-control filter_facility_level" name="filter_facility_level" id="filter_facility_level">
                <option value="">Select Facility Level </option>
            </select>
        </div>
        <div class="col-lg-3">
            <span class="filter_partner_wait" style="display: none;">Loading , Please Wait ...</span>
            <select class="form-control filter_facility" name="filter_facility" id="filter_facility">
                <option value="">Select Facility</option>
            </select>
        </div>
</div>
<div class="row" style="margin-top: 20px;">

        <div class="col-lg-3">
            <span class="filter_partner_wait" style="display: none;">Loading , Please Wait ...</span>
            <select class="form-control filter_sex" name="filter_sex" id="filter_sex">
                <option value="">Select Gender</option>
            </select>
        </div>
        <div class="col-lg-3">
            <span class="filter_partner_wait" style="display: none;">Loading , Please Wait ...</span>
            <select class="form-control filter_cadre" name="filter_cadre" id="filter_cadre">
                <option value="">Select Cadre</option>
            </select>
        </div>

                        <div class="col-lg-3">
                            <input type="text" name="date_from" id="date_from" class="form-controL date_from " placeholder="Date From : "/>
                        </div>

                        <div class="col-lg-3">
                            <input type="text" name="date_to" id="date_to" class="form-control date_to " placeholder="Date To : "/>
                        </div>
<div></div>
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-default filter_dashboard" name="filter_dashboard" id="filter_dashboard"> <span class="glyphicon glyphicon-filter"></span></button>
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-lg-12" style="background-color:white; margin-bottom: 20px;">
<h4 class="box-title" style="border-bottom: solid 1px;">Registration by Age Group</h4>
            </div>
        </section>
        <section class="content col-lg-12">

            <div class="row">
                <div class="col-lg-6">
                    <div class="box">
                        <div class="box-header">
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Facility Type</th>
                                        <th>TOTAL</th>

                                    </tr>

                                </thead>
                                <tbody class="partner_data" id="partner_data">

                                </tbody>

                                <!-- </tbody> -->
                                <tfoot>
                                    <tr>
                                    <tr>
                                        <th>Facility Type</th>
                                        <th>TOTAL</th>

                                    </tr>
                                    </tr>
                                </tfoot>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->

                <div class="col-lg-6">
                    <div class="box">
                        <div class="box-header">
                        </div><!-- /.box-header -->
                        <div class="box-body">

                      <div id="mybarcontainer"  style="height: 300px;">
                      </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div>







</div><!-- /.box-body -->

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

<!-- page script -->
<script>
    $(".filter_dashboard").click(function () {


                  var county = $(".filter_county").val();
                  var sub_county = $(".filter_sub_county").val();
                  var facility = $(".filter_facility").val();
                  var facility_level = $(".filter_facility_level").val();
                  var sex = $(".filter_sex").val();
                  var cadre = $(".filter_cadre").val();
                  var date_from = $(".date_from").val();
                  var date_to = $(".date_to").val();


console.log(cadre);

        draw_chart(county, sub_county, facility, facility_level, sex, cadre, date_from, date_to);

    });

    var county = $(".filter_county").val();
    var sub_county = $(".filter_sub_county").val();
    var facility = $(".filter_facility").val();
    var facility_level = $(".filter_facility_level").val();
    var sex = $(".filter_sex").val();
    var cadre = $(".filter_cadre").val();
    var date_from = $(".date_from").val();
    var date_to = $(".date_to").val();

draw_chart(county, sub_county, facility, facility_level, sex, cadre, date_from, date_to);

    $.ajax({
        url: "<?php echo base_url(); ?>home/get_level",
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $(".filter_facility_level").empty();
            var please_select = "<option value=''>Select Facility Level</option>";
            $(".filter_facility_level").append(please_select);
            $.each(data, function (i, k) {
                var option = "<option value= '" + k.level+ "'>" + k.level + "</option>";
                $(".filter_facility_level").append(option);
            });
        }, error: function (error) {
            console.error(error);
        }
    });
    $.ajax({
        url: "<?php echo base_url(); ?>home/get_counties",
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $(".filter_county").empty();
            var please_select = "<option value=''>Select County</option>";
            $(".filter_county").append(please_select);
            $.each(data, function (i, k) {
                var option = "<option value=" + k.county_id + ">" + k.county_name + "</option>";
                $(".filter_county").append(option);
            });
        }, error: function (error) {
            console.error(error);
        }
    });

    $(".filter_county").on('change', function () {
        var county_id = this.value;
        $.ajax({
            url: "<?php echo base_url(); ?>home/get_sub_counties/" + county_id,
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {

                $(".filter_sub_county").empty();
                var please_select = "<option value=''>Select Sub-County : </option>";
                $(".filter_sub_county").append(please_select);
                $.each(data, function (i, k) {
                    var option = "<option value=" + k.sub_county_id + ">" + k.sub_county_name + "</option>";
                    $(".filter_sub_county").append(option);
                });
            }, error: function (error) {
                console.log(error);
            }
        });
    });

    $(".filter_sub_county").on('change', function () {
        var sub_county_id = this.value;
        $.ajax({
            url: "<?php echo base_url(); ?>home/get_facilities/" + sub_county_id,
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {

                $(".filter_facility").empty();
                var please_select = "<option value=''>Select Facility: </option>";
                $(".filter_facility").append(please_select);
                $.each(data, function (i, k) {
                    var option = "<option value=" + k.facility_id + ">" + k.facility_name + "</option>";
                    $(".filter_facility").append(option);
                });
            }, error: function (error) {
                console.log(error);
            }
        });
    });

    $.ajax({
        url: "<?php echo base_url(); ?>home/get_cadre",
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $(".filter_cadre").empty();
            var please_select = "<option value=''>Select Cadre</option>";
            $(".filter_cadre").append(please_select);
            $.each(data, function (i, k) {
                var option = "<option value=" + k.cadre_id + ">" + k.cadre+ "</option>";
                $(".filter_cadre").append(option);
            });
        }, error: function (error) {
            console.error(error);
        }
    });
    $.ajax({
        url: "<?php echo base_url(); ?>home/get_sex",
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $(".filter_sex").empty();
            var please_select = "<option value=''>Select Gender</option>";
            $(".filter_sex").append(please_select);
            $.each(data, function (i, k) {
                var option = "<option value=" + k.sex + ">" + k.sex + "</option>";
                $(".filter_sex").append(option);
            });
        }, error: function (error) {
            console.error(error);
        }
    });

    function draw_chart (county, sub_county, facility, facility_level, sex, cadre, date_from, date_to){
      $.ajax({
          url: "<?php echo base_url(); ?>home/get_hcwbyfacilitytype/",
          type: 'POST',
          dataType: 'JSON',
          data: {county: county, sub_county: sub_county, facility: facility, facility_level: facility_level, sex: sex, cadre: cadre, date_from: date_from, date_to: date_to},
          success: function (data) {

                var myarray= new Array ();
                  var yarray= new Array ();

          for (var i = 0; i < data.length; i++) {

            myarray.push(data[i].facility_type);
            yarray.push(parseInt(data[i].total));
          }
      console.log(yarray);


      Highcharts.chart('mybarcontainer', {
         chart: {
         type: 'bar'
         },
                 title: {
                 text: 'Registered HCWs by Facility Type'
                 },
                 xAxis: {
                 categories: myarray,
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
                         data: yarray

                 }]
         });




      $(".partner_data").empty();

      $.each(data, function (i, item) {

          var sex= item.facility_type
          var num = item.total
          var tr_data = "<tr>\n\
                      <td>" + sex + "</td><td>" + num + "</td>\n\
                      </tr>";
          $(".partner_data").append(tr_data);
          $('.partner_table_div').prop('value', 'Processing...');

      });
        },error: function (errorThrown) {

        }
        });
    }
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.css" />



<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
    var dtp = jQuery.noConflict();
    dtp(document).ready(function () {

    });


    var date_picker = jQuery.noConflict();
    date_picker(function () {


        date_picker(".date_from").datepicker({
            format: 'dd-mm-yyyy',
            endDate: '+0d',
            autoclose: true
        });


        date_picker(".date_to").datepicker({
            format: 'dd-mm-yyyy',
            endDate: '+0d',
            autoclose: true
        });

    });</script>


</body>
</html>
