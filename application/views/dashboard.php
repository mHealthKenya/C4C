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

    <div id="county_table_div" class="county_table_div">



        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <?php
                    if ($_SESSION['user_level'] == '1' || $_SESSION['user_level'] == '2') {
                        ?>
                        <button class="btn btn-success add_user_button" id="add_user_button"><i class="fa fa-plus"></i> Add Nascop Admin </button>
                        <button class="btn btn-primary add_partner_button" id="add_partner_button"><i class="fa fa-user-plus "></i> Add Partner Admin</button>

                        <?php
                    }
                    ?>

                    <?php
                    if ($_SESSION['partner_id'] == '4') {
                        ?>
                        <button class="btn btn-default add_supervisor_button" id="add_supervisor_button"><i class="fa fa-user-plus "></i> Add A Supervisor</button>

                        <?php
                    }
                    ?>

                    <div class="box">
                        <div class="box-header">
                            <?php
                            if ($_SESSION['partner_id'] != '4') {
                                ?>
                                <h3 class="box-title">Users</h3>
                                <?php
                            }
                            ?>
                            <?php
                            if ($_SESSION['partner_id'] == '4') {
                                ?>
                                <h3 class="box-title">Supervisors</h3>
                                <?php
                            }
                            ?>


                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>

                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Level</th>
                                        <th>Phone No </th>
                                        <th>County </th>
                                        <th>Sub County </th>
                                        <th>Facility</th>
                                        <th>Date Added</th>
                                        <!--<th>Status</th>-->
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
                                                } elseif ($value['user_level'] == '6') {
                                                    echo "Partner";
                                                } elseif ($value['user_level'] == '7') {
                                                    echo "UON";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo $value['user_mobile']; ?>
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
                                                <?php echo substr($value['created'], 0, 10); ?>
                                            </td>
                                            <!--<td><?php echo $value['user_status']; ?></td>-->
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
                                        <th>County </th>
                                        <th>Sub County </th>
                                        <th>Facility</th>
                                        <th>Date Added</th>
                                        <!--<th>Status</th>-->
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

    </div><!-- /.content-wrapper -->

    <!--Add User Start -->

    <!-- Modal -->
    <div id="myModal" class="modal fade add_user_div" role="dialog">
        <form class="form-horizontal add_user_form" id="add_user_form">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Nascop Admin</h4>
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
                                    <input type="tel"  required="" minlength="10" maxlength="10" class="form-control phone_no" name="phone_no" id="phone_no" placeholder="Input as 07XXXXXXXX" > </div>
                            </div>

                            <!-- textarea -->                 
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

    <!--Add Partner  User Start -->

    <!-- Modal -->
    <div id="PartnerModal" class="modal fade add_partner_div" role="dialog">
        <form class="form-horizontal add_partner_form" id="add_partner_form">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Partner Admin</h4>
                    </div>
                    <div class="modal-body">

                        <div class="box-body">
                            <div class="form-group">
                                <label for="county_name" class="col-sm-2 control-label">Select Partner</label>
                                <div class="col-sm-10">
                                    <select class="form-control select_partner_id" name="partnerid" id="partner_id" >
                                        <option value="">Please Select A Patrner:</option>

                                        <?php foreach ($partner as $partners):
                                            ?>
                                            <option value="<?php echo $partners['id']; ?> "><?php echo $partners['name']; ?>  </option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Name" class="col-sm-2 control-label">First Name</label>
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
                                <label for="Phone No" class="col-sm-2 control-label">Phone No</label>
                                <div class="col-sm-10">
                                    <input type="tel" minlength="10" maxlength="10" class="form-control phone_no" name="phone_no" id="phone_no" placeholder="Input as 07XXXXXXXX" oninvalid="this.setCustomValidity('Please enter a valid mobile number! ')"
                                           oninput="setCustomValidity('')"> </div>

                            </div>

                            <!-- textarea -->                 
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

    <!--Add Partner  User End -->

    <!--Add Supervisor Start -->

    <!-- Modal -->
    <div id="myModal" class="modal fade add_supervisor_div" role="dialog">
        <form class="form-horizontal add_supervisor_form" id="add_supervisor_form">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Supervisor</h4>
                    </div>
                    <div class="modal-body">

                        <div class="box-body">
                            <div class="form-group">
                                <label for="county_name" class="col-sm-2 control-label">Select Facility</label>
                                <div class="col-sm-10">
                                    <select class="form-control select_partner_id" name="SupFacility" id="partner_id" >
                                        <option value="">Please Select A Facility:</option>

                                        <?php foreach ($sup_facility as $sup_facilities):
                                            ?>
                                            <option value="<?php echo $sup_facilities['code']; ?> "><?php echo $sup_facilities['name']; ?>  </option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="Name" class="col-sm-2 control-label">First Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control fname" name="fname" id="fname" placeholder="First Name ">
                                </div>
                            </div>

                            <input type="hidden" name="user_level" value="<?php echo $_SESSION['user_level']; ?>">

                            <div class="form-group">
                                <label for="User Name" class="col-sm-2 control-label">Last Name </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control add_user_name" name="lname" id="add_user_name" placeholder="Last Name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Phone No" class="col-sm-2 control-label">Phone No</label>
                                <div class="col-sm-10">
                                    <input type="tel"  required="" minlength="10" maxlength="10" class="form-control phone_no" name="phone_no" id="phone_no" placeholder="Input as 07XXXXXXXX" oninvalid="this.setCustomValidity('Please enter a valid mobile number! ')"
                                           oninput="setCustomValidity('')"> </div>
                            </div>

                            <!-- textarea -->                 
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

    <!--Add supervisor Start -->

    <!-- Modal -->
    <div id="myModal" class="modal fade add_supervisor_form" role="dialog">
        <form class="form-horizontal add_supervisor_formadd_supervisor_form" id="add_supervisor_form">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Partner Admin</h4>
                    </div>
                    <div class="modal-body">

                        <div class="box-body">
                            <div class="form-group">
                                <label for="county_name" class="col-sm-2 control-label">Select Partner</label>
                                <div class="col-sm-10">
                                    <select class="form-control select_partner_id" name="partnerid" id="partner_id" >
                                        <option value="">Please Select A Patrner:</option>

                                        <?php foreach ($partner as $partners):
                                            ?>
                                            <option value="<?php echo $partners['id']; ?> "><?php echo $partners['name']; ?>  </option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Name" class="col-sm-2 control-label">First Name</label>
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
                                <label for="Phone No" class="col-sm-2 control-label">Phone No</label>
                                <div class="col-sm-10">
                                    <input type="tel" required="" minlength="10" maxlength="10" class="form-control phone_no" name="phone_no" id="phone_no" placeholder="Input as 07XXXXXXXX" oninvalid="this.setCustomValidity('Please enter a valid mobile number! ')"
                                           oninput="setCustomValidity('')"> </div>
                            </div>

                            <!-- textarea -->                 
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


    <!-- Edit User Start -->
    <!-- Modal -->
    <div id="myModal" class="modal fade edit_user_div" role="dialog">
        <form class="form-horizontal edit_user_form" id="edit_user_form">

            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>



                        <?php
                        if ($_SESSION['partner_id'] == '4') {
                            ?>
                            <h4 class="modal-title">Edit Supervisor</h4>
                            <?php
                        } else {
                            ?>
                            <h4 class="modal-title">Edit Users</h4>
                            <?php
                        }
                        ?>


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



                            <div class="form-group">
                                <label for="Phone No" class="col-sm-2 control-label">Phone No : </label>
                                <div class="col-sm-10">
                                    <input type="tel" required="" minlength="10" maxlength="10" class="form-control edit_phone_no" name="phone_no" id="edit_phone_no" placeholder="Input as 07XXXXXXXX" oninvalid="this.setCustomValidity('Please enter a valid phone number! ')"
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
                        <button type="submit" class="btn btn-info pull-right submit-btn">Update</button>
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

    <!--    <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2016 <a href=""></a>.</strong> All rights reserved.
        </footer>    -->

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
<!-- Multi select js-->
<!--<script src="<?php echo base_url(); ?>assets/dist/js/jquery.min.js"></script>-->
<!-- Multi select js-->
<script src="<?php echo base_url(); ?>assets/dist/js/multiple-select.js"></script>



<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/jszip.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/vfs_fonts.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/sum.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.4/sweetalert2.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.4/sweetalert2.min.js"></script>



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
        $(".submit-btn").click(function () {
            $(".user_table_div").show();
        });
        
        

        $('#myModal').on('hidden.bs.modal', function (e) {
            $(this).find('#add_user_form')[0].reset();

        });

        $('#PartnerModal').on('hidden.bs.modal', function (e) {
            $(this).find('#add_partner_form')[0].reset();
        });
        $('.add_user_form').submit(function (event) {
            dataString = $(".add_user_form").serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>home/add_user",
                data: dataString,
                success: function (data) {
                    $(".add_user_div").modal("hide");


                    if (data == "Success") {

                        swal({
                            title: "Awesome!",
                            text: "User added successfully",
                            imageUrl: '<?php echo base_url(); ?>assets/images/thumbs-up.jpg'
                        }, function () {
//                            window.location.reload(1);
                            window.location.reload();
                            get_user_details();
                        });
                    } else if (data == "PhoneExists") {
                        swal({
                            title: "Oops!",
                            text: "Mobile No. provided exists in the system",
                            imageUrl: '<?php echo base_url(); ?>assets/images/oops.jpg'
                        });
                    } else if (data == "UserExists") {
                        swal({
                            title: "Oops!",
                            text: "Username provided exists in the system",
                            imageUrl: '<?php echo base_url(); ?>assets/images/oops.jpg'
                        });
                    }
                }


            });
            event.preventDefault();
            return false;
        });
        $('.add_supervisor_form').submit(function (event) {
            dataString = $(".add_supervisor_form").serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>home/SuperVisor",
                data: dataString,
                success: function (data) {
                    $(".add_supervisor_form").modal("hide");
                    swal("Success!", "Supervisor Added Successfully!!", "success");
                    get_user_details();
                    console.log("success");
                    console.log(data);

                }


            });
            event.preventDefault();
            return false;
        });
        $('.add_partner_form').submit(function (event) {
            dataString = $(".add_partner_form").serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>home/PartnerUser",
                data: dataString,
                success: function (data) {
                    $(".add_partner_div").modal("hide");


                    if (data == "Success") {

                        swal({
                            title: "Awesome!",
                            text: "User added successfully",
                            imageUrl: '<?php echo base_url(); ?>assets/images/thumbs-up.jpg'
                        }, function () {
                            window.location.reload(1);
                            get_user_details();
                        });
                    } else if (data == "PhoneExists") {
                        swal({
                            title: "Oops!",
                            text: "Mobile No. provided exists in the system",
                            imageUrl: '<?php echo base_url(); ?>assets/images/oops.jpg'
                        });
                    } else if (data == "UserExists") {
                        swal({
                            title: "Oops!",
                            text: "Username provided exists in the system",
                            imageUrl: '<?php echo base_url(); ?>assets/images/oops.jpg'
                        });
                    }

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
        $(".add_partner_button").click(function () {
            $(".add_partner_div").modal('show');
        });
        $(".add_supervisor_button").click(function () {
            $(".add_supervisor_div").modal('show');
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
                    $('#edit_user_name').val(response[0].username);
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
//        $(function () {
//            $('#SupFacility').change(function () {
//                console.log($(this).val());
//               // getsubcounty($(this).val());
//            }).multipleSelect({
//                width: '100%',
//                filter: true
//            });
//        });
    });

</script>
</body>
</html>
