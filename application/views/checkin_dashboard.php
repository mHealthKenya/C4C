<?php $this->load->view('header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Overview</a></li>

        </ol>
    </section>



    <!--Add Partner Start -->

    <div id="patient_table_div" class="patient_table_div">


        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <a href="<?php echo base_url(); ?>home/users" ><div class="small-box bg-aqua" style="min-height:100px">
                    <div class="inner">
                        <h3><?php

                                echo $hcw;

                            ?></h3>

                        <p>Number Of Supervisors</p>
                    </div>

                    <div class="icon">
                        <i class="fa fa-user-md"></i>
                    </div>

                </div>
                </a>
            </div>


              <a href="<?php echo base_url(); ?>home/studs" ><div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua" style="min-height:100px">
                  <div class="inner">
                        <h3><?php

                                echo $exposures;

                            ?></h3>

                        <p>Number of Students</p>
                    </div>

                    <div class="icon">
                        <i class="fa fa-user-md"></i>
                    </div>

                </div>
            </div>
                </a>

          </div>
          <section class="col-lg-12">
            <div id="container" style="width: 100%; height: 400px;"></div>
          </section>




                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
                        </div> /.box-body
                    </div> /.box
                </div> /.col
            </div> /.row -->
            
            
            <!-- Modal -->
            <div id="password" class="modal fade change_password" role="dialog">
                <form class="form-horizontal change_password_form" id="change_password_form">

                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Change Password</h4>
                            </div>
                            <div class="modal-body">

                                <div class="box-body">
                                    <input type="hidden" name="hidden_user_id" class="hidden_user_id form-control" id="hidden_user_id" value="<?php echo $_SESSION['user_id']; ?>"/>

                                    <div class="form-group">
                                        <label for="new_password" class="col-sm-2 control-label ">New Password </label>
                                        <div class="col-sm-10">
                                            <input type="password" pattern=".{6,20}" required title="password requires more than 6 characters" class="form-control new_password password" name="new_password" id="new_password" placeholder="New Password... ">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="confirm_new_password" class="col-sm-2 control-label">Confirm Password </label>
                                        <div class="col-sm-10">
                                            <input type="password"  pattern=".{6,20}" required title="password requires more than 6 characters" class="form-control confirm_new_password password" name="confirm_new_password" id="confirm_new_password" placeholder="Confirm Password... ">
                                        </div>
                                    </div>

                                </div><!-- /.box-body -->

                            </div>
                            <div class="modal-footer">
                                <div class="btn_div" style="display: none;">
                                    <button type="submit" class="btn btn-info pull-right">Change Password</button>

                                </div>

                            </div>

                        </div>


                </form>
            </div>




            <!-- Add Partner End -->






        </div>
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

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/jszip.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/vfs_fonts.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/sum.js"></script>
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
draw_chart();
//    function draw_chart (){
//      $.ajax({
//          url: "<?php echo base_url(); ?>home/trends/",
//          type: 'POST',
//          dataType: 'JSON',
//          success: function (data) {
//
//            var datearray= new Array ();
//            var regarray= new Array ();
//            var reparray = new Array ();
//            var ratearray = new Array ();
//
//      for (var i = 0; i < data.length; i++) {
//
//        datearray.push(data[i].date);
//        regarray.push(parseInt(data[i].registered));
//        ratearray.push(data[i].rate);
//        reparray.push(parseInt(data[i].reported));
//
//      }
//
//      console.log(datearray);
//      console.log(regarray);
//      console.log(reparray);
//      console.log(ratearray);
//      Highcharts.setOptions({
//          colors: ['#3498DB', '#B42405','#FAB23D']
//      });
//      Highcharts.chart('container', {
//          chart: {
//              zoomType: 'xy'
//          },
//          title: {
//              text: 'Total Registrations And Exposure Trends'
//          },
//          subtitle: {
//              text: 'mhealthkenya.org'
//          },
//          xAxis: [{
//              categories: datearray,
//              crosshair: true
//          }],
//          yAxis: [{ // Primary yAxis
//              title: {
//                  text: 'Number of Registrations',
//                  style: {
//                      color: Highcharts.getOptions().colors[1]
//                  }
//              }
//          }, { // Secondary yAxis
//              title: {
//                  text: 'Crude Rate (%)',
//                  style: {
//                      color: Highcharts.getOptions().colors[0]
//                  }
//              },
//              opposite: true
//          }],
//          tooltip: {
//              shared: true
//          },
//          legend: {
//              layout: 'vertical',
//              align: 'left',
//              x: 120,
//              verticalAlign: 'top',
//              y: 100,
//              floating: true,
//              backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
//          },
//          series: [{
//              name: 'Registered HCWs',
//              type: 'column',
//              data: regarray
//
//
//          },
//          {
//              name: 'Reported Exposures',
//              type: 'column',
//              data: reparray
//
//
//          },
//          {
//              name: 'Exposure Rate',
//              type: 'spline',
//              data: ratearray,
//              yAxis: 1,
//              tooltip: {
//           valueSuffix: ' %'
//       }
//          }]
//      });
//         },error: function (errorThrown) {
//
//         }
//         });
//         }
</script>

<?php
if ($_SESSION['login'] == 'YES') {

    echo '<script> $("#password").modal("show");</script>';
}
?>

<script type="text/javascript">

    $(".password").keyup(function () {
        var password = $("#new_password").val();
        var password2 = $("#confirm_new_password").val();
        if (password == password2) {
            $(".btn_div").show();
        } else {
            $(".btn_div").hide();
        }
    });


    $('#change_password_form').submit(function (event) {
        var user_id = $("#hidden_user_id").val();
        dataString = $("#change_password_form").serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>home/change_pass/" + user_id,
            data: dataString,
            success: function (data) {
                if (data === "Fail") {
                    swal("Oops", "Could not change password..", "info");
                } else {
                    swal("Success", "Password changed successfully. You will be redirected to login again to proceed!.", "success");
                    setInterval(function () {
                        window.location.href = "<?php echo base_url(); ?>Login/logout";
                    }, 3000);

                }

            }

        });
        event.preventDefault();
        return false;
    });

<?php if ($_SESSION['login'] == 'YES') { ?>

        $("#password").on("hidden.bs.modal", function () {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Login/logout",
                success: function (data) {
                    if (data === "Fail") {
                        swal("Oops", "Error.", "error");
                    } else {


                        swal({
                            title: "Oops",
                            text: "You have to change your password to proceed!",
                            type: "warning",
                            confirmButtonClass: "btn-danger",
                            confirmButtonText: "Okay!",
                            closeOnConfirm: false
                        },
                                function (isConfirm) {
                                    if (isConfirm) {
                                        window.location.href = "<?php echo base_url(); ?>";
                                    } else {
                                        //  swal("Cancelled", "Your imaginary file is safe :)", "error");
                                    }
                                });

                    }

                }

            });
            event.preventDefault();
            return false;
        });<?php } ?>
</script>
</body>
</html>
