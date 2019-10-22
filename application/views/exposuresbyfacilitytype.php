<?php $this->load->view('exposureheader'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            <small></small>
        </h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">patients</li>
        </ol> -->
    </section>



    <!--Add Partner Start -->

    <div id="patient_table_div" class="patient_table_div">


        <!-- Main content -->
        <section class="content">
          <div class="row">
              <div class="col-xs-12">
                  <div class="box">
                      <div class="box-header">
                          <h3 class="box-title">EXPOSURE BY FACILITY TYPE</h3>
                      </div><!-- /.box-header -->
                      <div class="box-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>FACILITY TYPE</th>
                                    <th>TOTAL</th>

                                </tr>

                            </thead>
                            <tbody class="partner_data" id="partner_data">
                                <?php

                                foreach ($exp_by_facility as $value) {

                                  $qry="select * from tbl_master_facility where code='$value->ftyid'";
                                  $res=$this->db->query($qry);
                                  $myres=$res->result();
                                  foreach($myres as $x){
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $x->facility_type; ?>
                                        </td>
                                        <td><?php echo $value->total; ?></td>

                                    </tr>
                                    <?php
                                  }

                                }
                                ?>
                            </tbody>

                            <!-- </tbody> -->
                            <tfoot>
                                <tr>
                                <tr>
                                    <th>FACILITY TYPE </th>
                                    <th>TOTAL</th>

                                </tr>
                                </tr>
                            </tfoot>
                          </table>
                      </div><!-- /.box-body -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->


          <div class="row">
              <div class="col-xs-12">
                  <div class="box">
                      <div class="box-header">
                          <h3 class="box-title">EXPOSURE BY FACILITY TYPE</h3>
                      </div><!-- /.box-header -->
                      <div class="box-body">

                    <div id="facility_type" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto">
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



Highcharts.chart('facility_type', {
   chart: {
   type: 'bar'
   },
           title: {
           text: 'Exposure by Facility type'
           },
           xAxis: {
           categories: [


             <?php foreach ($exp_by_facility as $ftype) {
                 ?>
                 <?php
                 $qry="select * from tbl_master_facility where code='$ftype->ftyid'";
                 $res=$this->db->query($qry);
                 $myres=$res->result();
                 foreach($myres as $nx){
                   $x = $nx->facility_type;
                   echo "'" . $x . "',";
                 }

             }
             ?>


           ],
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
                   data: [<?php foreach ($exp_by_facility as $fcount) {
   ?>
   <?php
   $x = $fcount->total;
   echo $x . ",";
}
?>
                   ]

           }]
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
                url: "<?php echo base_url(); ?>home/add_user",
                data: dataString,
                success: function (data) {
                    $(".add_user_div").modal("hide");
                    get_user_details();
                }

            });
            event.preventDefault();
            return false;
        });
        $('.edit_user_form').submit(function (event) {
            dataString = $(".edit_user_form").serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>home/edit_user",
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
                url: "<?php echo base_url(); ?>home/delete_user",
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

        $(".add_user_button").click(function () {
            $(".add_user_div").modal('show');
        });
        function get_user_details() {
            $.ajax({
                type: "GET",
                url: "<?php echo base_url(); ?>home/index/json",
                dataType: "json",
                async: true,
                crossDomain: true,
                success: function (response) {
                    $(".user_data").empty();
                    var no = 1;
                    $.each(response, function (i, item) {

                        var id = item.user_id;
                        var user_mobile = item.user_mobile;
                        var name = item.user_name;
                        var county = item.county;
                        var sub_county = item.sub_county;
                        if (item.user_level == '2') {
                            var user_level = "NASCOP";
                        }
                        var facility = item.facility;
                        var user_status = item.status;
                        var created = item.created;
                        var tr_data = "<tr>\n\
                                            <td>" + no + "</td>\n\
                                            <td>" + name + "</td>\n\
                                            <td>" + user_level + "</td>\n\
                                            <td>" + user_mobile + "</td>\n\
                                            <td>" + county + "</td>\n\
                                            <td>" + sub_county + "</td>\n\
                                            <td>" + facility + "</td>\n\
                                            <td>" + created.split(' ')[0] + "</td>\n\
                                            <td>" + user_status + "</td>\n\
                                            <td><input type='text' name='hidden_user_id' id='hidden_user_id' class='hidden_user_id hidden' value=" + id + " />\n\
                                            <button class='btn btn-xs btn-default edit_user_btn' data-original-title='Edit User'><i class='fa fa-pencil'></i></button>\n\</td>\n\
                                            <td><input type='text' name='hidden_user_id' id='hidden_user_id' class='hidden_user_id hidden' value=" + id + " />\n\
                                             <button class='btn btn-xs btn-default delete_user_btn' data-original-title='Delete User'><i class='fa fa-trash-o'></i></button></td>\n\
                                                    </tr>";
                        $(".user_data").append(tr_data);
                        $('.user_table_div').prop('value', 'Processing...');

                        no++;
                    });
                }, error: function (data) {


                }
            });
        }





        $(document).on('click', ".delete_user_btn", function () {
            //get data
            var user_id = $(this).closest('tr').find('input[name="hidden_user_id"]').val();
            $(".modal_loading").show();

            $.ajax({
                type: "GET",
                url: "<?php echo base_url(); ?>home/get_user_info/" + user_id,
                dataType: "json",
                success: function (response) {

                    var name = response[0].user_name;


                    $('#delete_user_id').val(response[0].user_id);
                    $('#delete_user_name').val(name);
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
            $(".modal_loading").show();

            $.ajax({
                type: "GET",
                url: "<?php echo base_url(); ?>home/get_user_info/" + user_id,
                dataType: "json",
                success: function (response) {



                    $('#edit_user_id').val(response[0].user_id);
                    $('#edit_name').val(response[0].user_name);
                    $('#edit_phone_no').val(response[0].user_mobile);
                    $('#edit_status').val(response[0].status);
                    $(".edit_user_div").modal('show');
                    $(".user_table_div").hide();
                    $(".modal_loading").hide();
                }, error: function (data) {
                    $(".modal_loading").hide();


                }
            });
        });
    });






</script>
</body>
</html>
