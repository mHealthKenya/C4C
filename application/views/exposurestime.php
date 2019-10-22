<?php $this->load->view('exposureheader'); ?>

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
            <li class="active">PEP Cascade</li>
        </ol>
    </section>



    <!--Add Partner Start -->

    <div id="patient_table_div" class="patient_table_div">


        <!-- Main content -->
        <section class="col-lg-12 connectedSortable" style="background-color: white;">


            <div class="form-group">
              <?php if ($_SESSION['user_level'] == 5) {?>

                <div class="col-lg-12">
                    <div class="row">
              <div>
                <h3 class="box-title" style="border-bottom: solid 1px; color: #45A3E3;">Exposures PEP Cascade</h3>
<h4>Filter results...</h4></div>

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
              <?php } ?>

              <?php if ($_SESSION['user_level'] == 4){?>
                              <div class="col-lg-12">
                                  <div class="row">
                      <div><h4>Filter results...</h4></div>


                      <div class="col-lg-4">
                          <span class="filter_partner_wait" style="display: none;">Loading , Please Wait ...</span>
                          <select class="form-control filter_facility_level" name="filter_facility_level" id="filter_facility_level">
                              <option value="">Select Facility Level </option>
                          </select>
                      </div>
                      <div class="col-lg-4">
                          <span class="filter_partner_wait" style="display: none;">Loading , Please Wait ...</span>
                          <select class="form-control filter_facility" name="filter_facility" id="filter_facility">
                              <option value="">Select Facility</option>
                          </select>
                      </div>
                      <div class="col-lg-4">
                          <span class="filter_partner_wait" style="display: none;">Loading , Please Wait ...</span>
                          <select class="form-control filter_cadre" name="filter_cadre" id="filter_cadre">
                              <option value="">Select Cadre</option>
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
              <?php }?>
              <?php if ($_SESSION['user_level'] == 3) {?>

                <div class="col-lg-12">
                    <div class="row">
              <div>
                <h3 class="box-title" style="border-bottom: solid 1px; color: #45A3E3;">Exposures PEP Cascade</h3>
<h4>Filter results...</h4></div>
              <div class="col-lg-6">
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
              <?php } ?>
              <?php if (($_SESSION['user_level'] == 1)|| ($_SESSION['user_level'] == 2) ){?>

                <div class="col-lg-12">
                    <div class="row">
        <div>
          <h3 class="box-title" style="border-bottom: solid 1px; color: #45A3E3;">Exposures PEP Cascade</h3>

          <h4>Filter results...</h4></div>
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
            <select class="form-control filter_facility" name="filter_facility" id="filter_facility">
            <span class="filter_partner_wait" style="display: none;">Loading , Please Wait ...</span>
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
<?php } ?>
            </div>
            <div class="col-lg-12" style="background-color:white; margin-bottom: 20px;">
            </div>
        </section>
        <section class="content col-lg-12">

            <div class="row">

                <div class="col-lg-12">
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


                  var selected_county ="";
                  var selected_sub_county = "";
                  var selected_facility_level = "";
                  var selected_cadre = "";
                  var selected_facility = "";
                  var selected_sex = "";
                  var selected_date_from = "";
                  var selected_date_to = "";


                  if(date_from.length>0) {
                    selected_date_from = ", From : " + $(".date_from").val() + "-";

                  }
                  if(date_to.length>0) {
                    selected_date_to = "To : " + $(".date_to").val() + "";
                  }

                  if(county != ""){
                          selected_county = "" + $(".filter_county option:selected").text() + " County ";
                  }
                  if(sub_county != ""){
                          selected_sub_county = ", " + $(".filter_sub_county option:selected").text() + " Sub-County ";
                  }
                  if(cadre != ""){
                          selected_cadre = ", Cadre: " + $(".filter_cadre option:selected").text() + " ";
                  }
                  if(facility != ""){
                          selected_facility = ", Facility: " + $(".filter_facility option:selected").text() + " ";
                  }
                  if(sex != ""){
                          selected_sex = ", Gender: " +$(".filter_sex option:selected").text() + "";
                  }
                  if(facility_level != ""){
                          selected_facility_level = ", " +  $(".filter_facility_level option:selected").text() + " Facilities ";
                  }



                  var descr1 = "For " + selected_county +" "+ selected_sub_county + " "+ selected_facility_level +" "+ selected_facility + " "+ selected_cadre + " "+ selected_sex + " ";
                  var descr2 = " "+ selected_date_from + " " + selected_date_to + " ";

        draw_chart(county, sub_county, facility, facility_level, sex, cadre, date_from, date_to, descr1, descr2);

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

    <?php if (($_SESSION['user_level'] == 1)|| ($_SESSION['user_level'] == 2) ){?>

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
  <?php } ?>
  <?php if ($_SESSION['user_level'] == 3){?>
  $.ajax({
      url: "<?php echo base_url(); ?>home/get_sub_counties_only/",
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
  <?php } ?>
  <?php if ($_SESSION['user_level'] == 4){?>
  $.ajax({
      url: "<?php echo base_url(); ?>home/get_facilities_only/",
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
  <?php } ?>


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

    function draw_chart (county, sub_county, facility, facility_level, sex, cadre, date_from, date_to, descr1, descr2){
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
          url: "<?php echo base_url(); ?>home/cascade/",
          type: 'POST',
          dataType: 'JSON',
          data: {county: county, sub_county: sub_county, facility: facility, facility_level: facility_level, sex: sex, cadre: cadre, date_from: date_from, date_to: date_to},
          success: function (data) {

                var catarray= new Array ();
                var yesarray= new Array ();
                var notyetarray = new Array();
                var noarray = new Array();

for( var i = 0; i <data.length; i++){
//    console.log(data[i].text);
    
    catarray.push(data[i].text);
    yesarray.push(parseInt(data[i].yes_response));
    notyetarray.push(parseInt(data[i].no_response));
    noarray.push(parseInt(data[i].neg_response));
}

          Highcharts.setOptions({
              colors: ['#ff0000', '#008000','#000000']
          });


          Highcharts.chart('mybarcontainer', {
          chart: {
              type: 'column'
          },
          title: {
              text: 'PEP Cascade' + final_descr
          },
          xAxis: {
              categories: catarray
          },
          yAxis: {
              min: 0,
              title: {
                  text: 'No of Individuals by Response per Category'
              }
          },
          tooltip: {
              pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
              shared: true
          },
          plotOptions: {
              column: {
                  stacking: 'value'
              }
          },
          series: [{
              name: 'No',
              data: noarray
          }, {
              name: 'Yes',
              data: yesarray
          }, {
            name: 'No response',
            data: notyetarray
        }]
      });



      $(".partner_data").empty();

      $.each(data, function (i, item) {

          var sex= item.age_group
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
