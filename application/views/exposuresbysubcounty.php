<?php $this->load->view('exposurheader'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            <small></small>
        </h1>
        <ol class="breadcrumb" style="z-index: 999;">
            <li><a href="<?php echo base_url(); ?>home/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>home/">Exposures</a></li>
            <li class="active">by Sub-County</li>
        </ol>
    </section>



    <!--Add Partner Start -->

    <div id="patient_table_div" class="patient_table_div">


        <!-- Main content -->
        <section class="col-lg-12 connectedSortable" style="background-color: white;">


            <div class="form-group">
                <div class="col-lg-12">
                    <div class="row">
        <div>
          <h3 class="box-title" style="border-bottom: solid 1px; color: #45A3E3;">Exposures by Sub-County</h3>
<h4>Filter results...</h4></div>
        <div class="col-lg-4">
            <span class="filter_partner_wait" style="display: none;">Loading , Please Wait ...</span>
            <select class="form-control filter_facility_level" name="filter_facility_level" id="filter_facility_level">
                <option value="">Select Facility Level </option>
            </select>
        </div>

        <div class="col-lg-4">
            <span class="filter_partner_wait" style="display: none;">Loading , Please Wait ...</span>
            <select class="form-control filter_cadre" name="filter_cadre" id="filter_cadre">
                <option value="">Select Cadre </option>
            </select>
        </div>

        <div class="col-lg-4">
            <span class="filter_partner_wait" style="display: none;">Loading , Please Wait ...</span>
            <select class="form-control filter_sex" name="filter_sex" id="filter_sex">
                <option value="">Select Gender</option>
            </select>
        </div>
      </div>
      <div class="row" style="margin-top: 20px;">

        <div class="col-lg-4">
            <span class="filter_partner_wait" style="display: none;">Loading , Please Wait ...</span>
            <select class="form-control filter_age_group" name="filter_age_group" id="filter_age_group">
                <option value="">Select Age group</option>
            </select>
        </div>

                        <div class="col-lg-4">
                            <input type="text" name="date_from" id="date_from" class="form-controL date_from " placeholder="Date From : "/>
                        </div>

                        <div class="col-lg-4">
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
                                        <th>Sub-County</th>
                                        <th>Total</th>

                                    </tr>

                                </thead>
                                <tbody class="partner_data" id="partner_data">

                                </tbody>

                                <!-- </tbody> -->

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


                  var facility_level = $(".filter_facility_level").val();
                  var cadre = $(".filter_cadre").val();
                  var sex = $(".filter_sex").val();
                  var age_group = $(".filter_age_group").val();
                  var date_from = $(".date_from").val();
                  var date_to = $(".date_to").val();

                  var selected_facility_level = "";
                  var selected_cadre = "";
                  var selected_sex = "";
                  var selected_age_group = "";
                  var selected_date_from = "";
                  var selected_date_to = "";



                  if(date_from.length>0) {
                    selected_date_from = ", From : " + $(".date_from").val() + "-";
                  }
                  if(date_to.length>0) {
                    selected_date_to = "To : " + $(".date_to").val() + "";
                  }

                  if(cadre != ""){
                          selected_cadre = ", Cadre: " + $(".filter_cadre option:selected").text() + " ";
                  }
                  if(sex != ""){
                          selected_sex = ", Gender: " + $(".filter_sex option:selected").text() + " ";
                  }
                  if(age_group != ""){
                          selected_age_group = ", Age-Group: " +$(".filter_age_group option:selected").text() + " Yrs";
                  }
                  if(facility_level != ""){
                          selected_facility_level = "" +  $(".filter_facility_level option:selected").text() + " Facilities ";
                  }


var descr1 = "For " + selected_facility_level +" "+ selected_cadre + " "+ selected_sex + " "+selected_age_group+ " ";
var descr2 = " "+ selected_date_from + " " + selected_date_to + " ";


        draw_chart(facility_level, cadre, sex, age_group, date_from, date_to, descr1, descr2);

    });

    var facility_level = $(".filter_facility_level").val();
    var cadre = $(".filter_cadre").val();
    var sex = $(".filter_sex").val();
    var age_group = $(".filter_age_group").val();
    var date_from = $(".date_from").val();
    var date_to = $(".date_to").val();


draw_chart(facility_level, cadre, sex, age_group, date_from, date_to);

$.ajax({
    url: "<?php echo base_url(); ?>home/get_cadre",
    type: 'GET',
    dataType: 'JSON',
    success: function (data) {
        $(".filter_cadre").empty();
        var please_select = "<option value=''>Select Cadre</option>";
        $(".filter_cadre").append(please_select);
        $.each(data, function (i, k) {
            var option = "<option value=" + k.cadre_id + ">" + k.cadre + "</option>";
            $(".filter_cadre").append(option);
        });
    }, error: function (error) {
        console.error(error);
    }
});

$.ajax({
    url: "<?php echo base_url(); ?>home/get_age_group",
    type: 'GET',
    dataType: 'JSON',
    success: function (data) {
        $(".filter_age_group").empty();
        var please_select = "<option value=''>Select Age Group</option>";
        $(".filter_age_group").append(please_select);
        $.each(data, function (i, k) {
            var option = "<option value=" + k.age_group_id + ">" + k.age_group+ "</option>";
            $(".filter_age_group").append(option);
        });
    }, error: function (error) {
        console.error(error);
    }
});

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
        url: "<?php echo base_url(); ?>home/get_age_group",
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $(".filter_age_group").empty();
            var please_select = "<option value=''>Select Age Group</option>";
            $(".filter_age_group").append(please_select);
            $.each(data, function (i, k) {
                var option = "<option value=" + k.age_group_id + ">" + k.age_group+ "</option>";
                $(".filter_age_group").append(option);
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

    function draw_chart (facility_level, cadre, sex, age_group, date_from, date_to){

      var final_descr;
      if(descr1 == undefined && descr2 != undefined){
        final_descr = " " + descr2;
      }
      if(descr1 != undefined && descr2 == undefined){
        final_descr = " " + descr1;
      }
      if(descr1 == undefined && descr2 == undefined){
        final_descr = " " ;
      }
      if(descr1 != undefined && descr2 != undefined){
        final_descr = " " + descr1 + " " + descr2;
      }
      $.ajax({
          url: "<?php echo base_url(); ?>home/get_exposuresbysubcounty/",
          type: 'POST',
          dataType: 'JSON',
          data: { facility_level: facility_level, cadre: cadre, sex: sex, age_group: age_group, date_from: date_from, date_to: date_to},
          success: function (data) {

            var yarray= new Array ();
                var myarray= new Array ();

          for (var i = 0; i < data.length; i++) {

            myarray.push(data[i].sub_county);
            yarray.push(parseInt(data[i].total));
          }
      console.log(yarray);

      Highcharts.chart('mybarcontainer', {
          chart: {
          type: 'column'
          },
                  title: {
                  text: 'Exposures by Sub-County' + final_descr + ' '
                  },
                  xAxis: {
                  categories: myarray,
                          crosshair: true
                  },
                  yAxis: {
                  min: 0,
                          title: {
                          text: 'Total Number'
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
                  name: 'Registered Health Workers',
                  data: yarray

                  }]
          });




      $(".partner_data").empty();
      var total = 0;
      $.each(data, function (i, item) {

          var sex= item.sub_county
          var num = parseInt(item.total)
          var tr_data = "<tr>\n\
                      <td>" + sex + "</td><td>" + num + "</td>\n\
                      </tr>";
          $(".partner_data").append(tr_data);
          $('.partner_table_div').prop('value', 'Processing...');
          total = total+num;
               });

               var tr_data = "<tr>\n\
                           <td><b>Total </td><td>" + total + "</b></td>\n\
                           </tr>";
               $(".partner_data").append(tr_data);
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
                     "searching": false,
                     "scrollY": '33vh',
                     "scrollCollapse": true,
                     "bInfo": false,
                     "bPaginate": false,
                     buttons: [
                         'copyHtml5',
                         'excelHtml5',
                         'csvHtml5',
                         'pdfHtml5'],
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
