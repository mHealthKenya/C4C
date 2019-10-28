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
            <li class="active">Users</li>
        </ol>
    </section>

    <div id="user_table_div" class="user_table_div">


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <button class="btn btn-default add_user_button" id="add_user_button"><i class="fa fa-plus"></i> Add Sub County User </button>

                    <div class="box">
                        <div class="box-header">

                            <h3 class="box-title">Users</h3>

                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>

                                    <tr>
                                        <th>No . </th>
                                        <th>Name</th>
                                        <th>Level</th>
                                        <th>Phone No </th>
                                        <th>Sub County </th>
                                        <th>Date Added</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>

                                </thead>
                                <tbody class="user_data" id="user_data">
                                    <?php
                                    $i = 1;

                                    foreach ($users as $value) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td>
                                                <?php echo $value['user_name'] . " "; ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($value['user_level'] == '2') {
                                                    echo "NASCOP";
                                                } elseif ($value['user_level'] == '3') {
                                                    echo "County";
                                                } elseif ($value['user_level'] == '4') {
                                                    echo "Sub-County";
                                                } elseif ($value['user_level'] == '5') {
                                                    echo "Facility";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo $value['user_mobile']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['sub_county']; ?>
                                            </td>

                                            <td>
                                                <?php echo substr($value['created'], 0, 10); ?>
                                            </td>
                                            <td><?php echo $value['status']; ?></td>
                                            <td>
                                                <input type="hidden" name="hidden_user_id" class="hidden_user_id form-control" id="hidden_user_id" value="<?php echo $value['user_id']; ?>"/>
                                                <button class='btn btn-xs btn-default edit_user_btn' data-original-title='Edit User'><i class='fa fa-pencil'></i></button>

                                            </td>

                                            <td>
                                                <input type="hidden" name="hidden_user_id" class="hidden_user_id form-control" id="hidden_user_id" value="<?php echo $value['user_id']; ?>"/>
                                                <button class='btn btn-xs btn-default delete_user_btn' data-original-title='Delete User'><i class='fa fa-trash-o'></i></button> </td>
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
                                        <th>Name</th>
                                        <th>Level</th>
                                        <th>Phone No </th>
                                        <th>Sub -County </th>
                                        <th>Date Added</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
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

    <!--Add User Start -->

    <!-- Modal -->
    <div id="myModal" class="modal fade add_user_div" role="dialog">
        <form class="form-horizontal add_user_form" id="add_user_form">

            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add User</h4>
                    </div>
                    <div class="modal-body">

                        <div class="box-body">
                            <div class="form-group">
                                <label for="Name" class="col-sm-2 control-label">First Name : </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control fname" name="name" id="name" placeholder="Name ">
                                </div>
                            </div>


                            <input type="hidden" name="user_level" value="<?php echo $_SESSION['user_level']; ?>">
                            <div class="form-group">
                                <label for="User Name" class="col-sm-2 control-label">Username </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control add_user_name" name="username" id="add_user_name" placeholder="User Name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Phone No" class="col-sm-2 control-label">Phone No : </label>
                                <div class="col-sm-10">
                                    <input type="text" pattern="[0]\d+" required="" minlength="10" maxlength="10" class="form-control phone_no" name="phone_no" id="phone_no" placeholder="Input as 07XXXXXXXX" oninvalid="this.setCustomValidity('Please enter a valid phone number! ')"
                                           oninput="setCustomValidity('')"> </div>
                            </div>


                            <div class="form-group">
                                <label for="county_name" class="col-sm-2 control-label">Sub_County </label>
                                <div class="col-sm-10">

                                    <select class="form-control add_sub_county_id" name="sub_county" id="add_sub_county_id" placeholder="County ">
                                        <option value="">Please select : </option>
                                        <?php foreach ($subcounties as $subcounty):
                                            ?>
                                            <option value="<?php echo $subcounty['id']; ?>"><?php echo $subcounty['name']; ?></option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>               
                            <div class="form-group">
                                <label for="user_status" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" required="" class="form-control select2 add_status" id="add_status">
                                        <option value="">Please select : </option>
                                        <option value="Active">Active</option>
                                        <option value="In Active">In Active</option>
                                    </select>
                                </div>
                            </div>








                        </div><!-- /.box-body -->

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info pull-right">Create</button>
                        <button type="button" class="btn btn-default pull-left  " data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>


        </form>
    </div>




    <!-- Add User End -->


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
                                <label for="Name" class="col-sm-2 control-label">Name </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control edit_name" name="name" id="edit_name" placeholder="Name">
                                </div>
                            </div>
                            <input type="hidden" name="county" value="<?php echo $_SESSION['county_id']; ?>">
                            <div class="form-group">
                                <label for="county_name" class="col-sm-2 control-label">Sub_County </label>
                                <div class="col-sm-10">

                                    <select class="form-control edit_county" name="sub_county" id="add_sub_county_id" placeholder="County ">
                                        <option value="">Please select : </option>
                                        <?php foreach ($subcounties as $subcounty):
                                            ?>
                                            <option value="<?php echo $subcounty['id']; ?>"><?php echo $subcounty['name']; ?></option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="Phone No" class="col-sm-2 control-label">Phone No : </label>
                                <div class="col-sm-10">
                                    <input type="text" pattern="[0]\d+" required="" minlength="10" maxlength="10" class="form-control edit_phone_no" name="phone_no" id="edit_phone_no" placeholder="Input as 07XXXXXXXX" oninvalid="this.setCustomValidity('Please enter a valid phone number! ')"
                                           oninput="setCustomValidity('')">
                                </div>
                            </div>





                            <!-- textarea -->                 
                            <div class="form-group">
                                <label for="user_status" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" required="" class="form-control select2 edit_status" id="edit_status">
                                        <option value="">Please select : </option>
                                        <option value="Active">Active</option>
                                        <option value="In Active">In Active</option>
                                    </select>
                                </div>
                            </div>








                        </div><!-- /.box-body -->

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info pull-right">Update</button>
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
                url: "<?php echo base_url(); ?>home/add_county_user",
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
                url: "<?php echo base_url(); ?>home/countyusers/json",
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
                        } else if (item.user_level == '3') {
                            var user_level = "County";
                        } else if (item.user_level == '4') {
                            var user_level = "Sub County";
                        }
                        var facility = item.facility;
                        var user_status = item.status;
                        var created = item.created;
                        var tr_data = "<tr>\n\
                                            <td>" + no + "</td>\n\
                                            <td>" + name + "</td>\n\
                                            <td>" + user_level + "</td>\n\
                                            <td>" + user_mobile + "</td>\n\
                                            <td>" + sub_county + "</td>\n\
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
                    $('#edit_county').val(response[0].sub_county);
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
