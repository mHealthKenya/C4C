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
            <li><a href="#">Tables</a></li>
            <li class="active">Add Tots</li>
        </ol>
    </section>

    <div id="user_table_div" class="user_table_div">


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">


                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Add ToTs</h3>

                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>

                                    <tr>
                                        <th>No . </th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>County </th>
                                        <th>Sub County </th>
                                        <th>Facility</th>
                                        <th>Phone No </th>
                                        <th>Date Added</th>
                                        <th>Add ToT</th>
                                    </tr>

                                </thead>
                                <tbody class="user_data" id="user_data">
                                    <?php
                                    $i = 1;

                                    foreach ($hcws as $value) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td>
                                                <?php echo $value['f_name'] . " "; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['l_name'] . " "; ?>
                                            </td>

                                            <td>
                                                <?php echo $value['county']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['sub_county']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['facility']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['mobile_no']; ?>
                                            </td>
                                            <td>
                                                <?php echo substr($value['created'], 0, 10); ?>
                                            </td>
                                            <td>
                                                <input type="hidden" name="hidden_user_id" class="hidden_user_id form-control" id="hidden_user_id" value="<?php echo $value['id']; ?>"/>
                                                <button class='btn btn-xs btn-default edit_user_btn' data-original-title='Edit User'><i class='fa fa-pencil'></i></button>

                                            </td>

                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>

                                <!-- </tbody> -->
                                <tfoot>
                                    <tr>
                                    <tr>
                                        <th>No . </th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>County </th>
                                        <th>Sub County </th>
                                        <th>Facility</th>
                                        <th>Phone No </th>
                                        <th>Date Added</th>
                                        <th>Add ToT</th>
                                    </tr>
                                    </tr>
                                </tfoot>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div>
    <!-- Edit User Start -->
    <!-- Modal -->
    <div id="myModal" class="modal fade edit_user_div" role="dialog">
        <form class="form-horizontal edit_user_form" id="edit_user_form">

            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Users</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" required="" class="edit_user_id form-control" id="edit_user_id"/>
                        <div class="box-body">

                            <div class="form-group">
                                <label for="Name" class="col-sm-2 control-label"> Name </label>
                                <div class="col-sm-10">
                                    <input readonly type="text" class="form-control edit_name" name="name" id="edit_name" placeholder="Name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Name" class="col-sm-2 control-label">County </label>
                                <div class="col-sm-10">
                                    <input readonly type="text" class="form-control edit_county" name="county" id="edit_county" placeholder="County">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Name" class="col-sm-2 control-label">Sub - County </label>
                                <div class="col-sm-10">
                                    <input readonly type="text" class="form-control edit_sub_county" name="sub_county" id="edit_sub_county" placeholder="Sub-County">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Name" class="col-sm-2 control-label">Facility </label>
                                <div class="col-sm-10">
                                    <input readonly type="text" class="form-control edit_facility" name="facility" id="edit_facility" placeholder="facility">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Name" class="col-sm-2 control-label">Phone Number </label>
                                <div class="col-sm-10">
                                    <input readonly type="text" class="form-control edit_phone_no" name="phone_no" id="edit_phone_no" placeholder="phone_no">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Name" class="col-sm-2 control-label">Target: </label>
                                <div class="col-sm-10">
                                    <input  type="number" class="form-control target" name="target" id="target" placeholder="target">
                                </div>
                            </div>


                        </div><!-- /.box-body -->

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info pull-right">Add ToT</button>
                        <button type="button" class="btn btn-default pull-left close_edit_modal " data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>


        </form>
    </div>


    <!-- Edit User End -->







    <!-- Delete User Start -->
    <!-- Modal -->
    <div id="myModal" class="modal fade delete_user_div" role="dialog">
        <form class="form-horizontal delete_user_form" id="delete_user_form">

            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Delete User</h4>
                    </div>
                    <div class="modal-body">

                        <div class="box-body">
                            <div class="form-group">
                                <p>Are you sure you want to delete User : </p>
                            </div>
                            <div class="form-group">

                                <div class="col-sm-10">
                                    <input type="text" class="form-control delete_user_name" name="name" id="delete_user_name" placeholder="User Name : ">
                                </div>
                            </div>
                            <input type="hidden" name="id" class="delete_user_id form-control" id="delete_user_id"/>

                        </div><!-- /.box-body -->

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info pull-right">Yes Delete!</button>
                        <button type="button" class="btn btn-danger pull-left close_delete_modal " data-dismiss="modal">No!</button>
                    </div>
                </div>

            </div>


        </form>
    </div>


    <!-- Delete User End -->








</div><!-- /.content-wrapper -->

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

<!-- page script -->
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
                url: "<?php echo base_url(); ?>home/add_tot",
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
                url: "<?php echo base_url(); ?>home/add_new_tot",
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
                url: "<?php echo base_url(); ?>home/tots/json",
                dataType: "json",
                async: true,
                crossDomain: true,
                success: function (response) {
                    $(".user_data").empty();
                    var no = 1;
                    $.each(response, function (i, item) {

                        var id = item.id;
                        var user_mobile = item.mobile_no;
                        var name = item.f_name;
                        var lname =  item.l_name;
                        var county = item.county;
                        var sub_county = item.sub_county;
                        var facility = item.facility;
                        var created = item.created;
                        var tr_data = "<tr>\n\
                                    <td>" + no + "</td>\n\
                                    <td>" + name + "</td>\n\
                                    <td>" + lname + "</td>\n\
                                    <td>" + county + "</td>\n\
                                    <td>" + sub_county + "</td>\n\
                                    <td>" + facility + "</td>\n\
                                    <td>" + user_mobile + "</td>\n\
                                    <td>" + created.split(' ')[0] + "</td>\n\
                                    <td><input type='text' name='hidden_user_id' id='hidden_user_id' class='hidden_user_id hidden' value=" + id + " /></td>\n\
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
                url: "<?php echo base_url(); ?>home/get_tot_info/" + user_id,
                dataType: "json",
                success: function (response) {
                    $('#edit_user_id').val(response[0].id);
                    $('#edit_name').val(response[0].f_name + ' ' + response[0].l_name);
                    $('#edit_county').val(response[0].county);
                    $('#edit_sub_county').val(response[0].sub_county);
                    $('#edit_phone_no').val(response[0].mobile_no);
                    $('#edit_facility').val(response[0].facility);
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
