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
            <li class="active">Modules</li>
        </ol>
    </section>

    <div id="module_table_div" class="module_table_div">


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <button type="button" class="btn btn-default add_module_button" id="add_module_button"><i class="fa fa-plus"></i>Add Module </button>

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Module Management</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No . </th>
                                        <th>Module Name : </th>
                                        <th>Controller</th>
                                        <th>Function</th>
                                        <th>Level</th>
                                        <th>Date Added</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>

                                </thead>
                                <tbody class="module_data" id="module_data">
                                    <?php
                                    $i = 1;

                                    foreach ($modules as $value) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td>
                                                <?php echo $value['module']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['controller']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['function']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['level']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['date_added']; ?>
                                            </td>
                                            <td><?php echo $value['status']; ?></td>
                                            <td>
                                                <input type="hidden" name="hidden_module_id" class="hidden_module_id form-control" id="hidden_module_id" value="<?php echo $value['id']; ?>"/>
                                                <button class='btn btn-xs btn-default edit_module_btn' data-original-title='Edit Module'><i class='fa fa-pencil'></i></button>

                                            </td>

                                            <td>
                                                <input type="hidden" name="hidden_module_id" class="hidden_module_id form-control" id="hidden_module_id" value="<?php echo $value['id']; ?>"/>
                                                <button class='btn btn-xs btn-default delete_module_btn' data-original-title='Delete Module'><i class='fa fa-trash-o'></i></button>
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
                                        <th>No . </th>
                                        <th>Module Name : </th>
                                        <th>Controller</th>
                                        <th>Function</th>
                                        <th>Level</th>
                                        <th>Date Added</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div>






    <!-- Edit Module Start -->
    <!-- Modal -->
    <div id="myModal" class="modal fade edit_module_div" role="dialog">
        <form class="form-horizontal edit_module_form" id="edit_module_form">

            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Module</h4>
                    </div>
                    <div class="modal-body">

                        <div class="box-body">
                            <div class="form-group">
                                <label for="Module Name" class="col-sm-2 control-label">Module Name : </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control edit_module_name" name="module" id="edit_module_name" placeholder="Module Name : ">
                                </div>
                            </div>




                            <div class="form-group">
                                <label for="Module Name" class="col-sm-2 control-label">Controller Name : </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control edit_controller" name="controller" id="edit_controller" placeholder="Controller Name : ">
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="Module Name" class="col-sm-2 control-label">Function Name : </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control edit_function" name="function" id="edit_function" placeholder="Function Name : ">
                                </div>
                            </div>








                            <!-- textarea -->                 
                            <div class="form-group">
                                <label for="level" class="col-sm-2 control-label">Level</label>
                                <div class="col-sm-10">
                                    <select name="level" class="form-control select2 edit_level" id="edit_level">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>







                            <input type="hidden" name="id" class="edit_module_id form-control" id="edit_module_id"/>

                            <!-- textarea -->                 
                            <div class="form-group">
                                <label for="module_status" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control select2 edit_status" id="edit_status">
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


    <!-- Edit Module End -->







    <!-- Delete Module Start -->
    <!-- Modal -->
    <div id="myModal" class="modal fade delete_module_div" role="dialog">
        <form class="form-horizontal delete_module_form" id="delete_module_form">

            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Delete Module</h4>
                    </div>
                    <div class="modal-body">

                        <div class="box-body">
                            <div class="form-group">
                                <p>Are you sure you want to delete Module : </p>
                            </div>
                            <div class="form-group">

                                <div class="col-sm-10">
                                    <input type="text" class="form-control delete_module_name" name="name" id="delete_module_name" placeholder="Module Name : ">
                                </div>
                            </div>
                            <input type="hidden" name="id" class="delete_module_id form-control" id="delete_module_id"/>









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


    <!-- Delete Module End -->













    <!--Add Module Start -->

    <!-- Modal -->
    <div id="myModal" class="modal fade add_module_div" role="dialog">
        <form class="form-horizontal add_module_form" id="add_module_form">

            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Module</h4>
                    </div>
                    <div class="modal-body">

                        <div class="box-body">
                            <div class="form-group">
                                <label for="Module Name" class="col-sm-2 control-label">Module Name : </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control module_name" name="module" id="module_name" placeholder="Module Name : ">
                                </div>
                            </div>


                            <div class="box-body">
                                <div class="form-group">
                                    <label for="Controller Name" class="col-sm-2 control-label">Controller Name : </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control controller" name="controller" id="controller" placeholder="Controller Name : ">
                                    </div>
                                </div>



                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="Function Name" class="col-sm-2 control-label">Function Name : </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control function" name="function" id="functino" placeholder="Function Name : ">
                                        </div>
                                    </div>


                                    <!-- textarea -->                 
                                    <div class="form-group">
                                        <label for="level" class="col-sm-2 control-label">Level</label>
                                        <div class="col-sm-10">
                                            <select name="level" class="form-control select2 add_level" id="add_level">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- textarea -->                 
                                    <div class="form-group">
                                        <label for="module_status" class="col-sm-2 control-label">Status</label>
                                        <div class="col-sm-10">
                                            <select name="status" class="form-control select2 add_status" id="add_status">
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
            </div>

    </div>



    <!-- Add Module End -->








</div><!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2016 <a href=""></a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript::;">
                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                            <p>Will be 23 on April 24th</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <i class="menu-icon fa fa-user bg-yellow"></i>
                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                            <p>New phone +1(800)555-1234</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                            <p>nora@example.com</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <i class="menu-icon fa fa-file-code-o bg-green"></i>
                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                            <p>Execution time 5 seconds</p>
                        </div>
                    </a>
                </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript::;">
                        <h4 class="control-sidebar-subheading">
                            Custom Template Design
                            <span class="label label-danger pull-right">70%</span>
                        </h4>
                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <h4 class="control-sidebar-subheading">
                            Update Resume
                            <span class="label label-success pull-right">95%</span>
                        </h4>
                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <h4 class="control-sidebar-subheading">
                            Laravel Integration
                            <span class="label label-warning pull-right">50%</span>
                        </h4>
                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <h4 class="control-sidebar-subheading">
                            Back End Framework
                            <span class="label label-primary pull-right">68%</span>
                        </h4>
                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                        </div>
                    </a>
                </li>
            </ul><!-- /.control-sidebar-menu -->

        </div><!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">General Settings</h3>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Report panel usage
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                    <p>
                        Some information about this general settings option
                    </p>
                </div><!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Allow mail redirect
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                    <p>
                        Other sets of options are available
                    </p>
                </div><!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Expose author name in posts
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                    <p>
                        Allow the user to show his name in blog posts
                    </p>
                </div><!-- /.form-group -->

                <h3 class="control-sidebar-heading">Chat Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Show me as online
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                </div><!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Turn off notifications
                        <input type="checkbox" class="pull-right">
                    </label>
                </div><!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Delete chat history
                        <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                    </label>
                </div><!-- /.form-group -->
            </form>
        </div><!-- /.tab-pane -->
    </div>
</aside><!-- /.control-sidebar -->
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
    $(document).ready(function () {







        $(".close_edit_modal").click(function () {
            $(".module_table_div").show();
        });




        $('.add_module_form').submit(function (event) {
            dataString = $(".add_module_form").serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>home/add_module",
                data: dataString,
                success: function (data) {
                    if (data === "Fail") {
                        alert("Module already exists....");
                    } else {

                        $(".add_module_div").modal('hide');
                        get_module_details();
                    }

                }

            });
            event.preventDefault();
            return false;
        });
        $('.edit_module_form').submit(function (event) {
            dataString = $(".edit_module_form").serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>home/edit_module",
                data: dataString,
                success: function (data) {

                    get_module_details();
                    $(".module_table_div").show();
                    $(".edit_module_div").modal('hide');
                }

            });
            event.preventDefault();
            return false;
        });


        $('.delete_module_form').submit(function (event) {
            dataString = $(".delete_module_form").serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>home/delete_module",
                data: dataString,
                success: function (data) {

                    get_module_details();
                    $(".module_table_div").show();
                    $(".delete_module_div").modal('hide');
                }

            });
            event.preventDefault();
            return false;
        });

        $(".add_module_button").click(function () {
            $(".add_module_div").modal('show');
        });
        function get_module_details() {
            $.ajax({
                type: "GET",
                url: "<?php echo base_url(); ?>home/modules/json",
                dataType: "json",
                async: true,
                crossDomain: true,
                success: function (response) {
                    $(".module_data").empty();
                    var no = 1;
                    $.each(response, function (i, item) {

                        var id = item.id;
                        var module_name = item.module;
                        var module_status = item.status;
                        var date_added = item.date_added;
                        var controller = item.controller;
                        var function_name = item.function;
                        var timestamp = item.timestamp;
                        var level = item.level;
                        var tr_data = "<tr>\n\
                                    <td>" + no + "</td>\n\
                                    <td>" + module_name + "</td><td>" + controller + "</td><td>" + function_name + "</td><td>" + level + "</td>\n\
                                    <td>" + date_added + "</td>\n\
                                    <td>" + module_status + "</td>\n\
                                    <td><input type='hidden' name='hidden_module_id' id='hidden_module_id' class='hidden_module_id hidden' value=" + id + " />\n\
                                    <button class='btn btn-xs btn-default edit_module_btn' data-original-title='Edit Module'><i class='fa fa-pencil'></i></button>\n\</td>\n\
                                    <td><input type='hidden' name='hidden_module_id' id='hidden_module_id' class='hidden_module_id hidden' value=" + id + " />\n\
                                    <button class='btn btn-xs btn-default delete_module_btn' data-original-title='Delete Module'><i class='fa fa-trash-o'></i></button></td>\n\
                                            </tr>";
                        $(".module_data").append(tr_data);
                        $('.module_table_div').prop('value', 'Processing...');

                        no++;
                    });
                }, error: function (data) {


                }
            });
        }





        $(document).on('click', ".delete_module_btn", function () {
            //get data
            var module_id = $(this).closest('tr').find('input[name="hidden_module_id"]').val();
            //$(".modal_loading").show();

            $.ajax({
                type: "GET",
                url: "<?php echo base_url(); ?>home/get_module_info/" + module_id,
                dataType: "json",
                success: function (response) {



                    $('#delete_module_id').val(response[0].id);
                    $('#delete_module_name').val(response[0].name);
                    $(".delete_module_div").modal('show');
                    $(".module_table_div").hide();
                    $(".modal_loading").hide();
                }, error: function (data) {
                    $(".modal_loading").hide();
                    //sweetAlert("Oops...", "Something went wrong!", "error");

                }
            });
        });


        $(document).on('click', ".edit_module_btn", function () {
            //get data
            var module_id = $(this).closest('tr').find('input[name="hidden_module_id"]').val();
            //$(".modal_loading").show();

            $.ajax({
                type: "GET",
                url: "<?php echo base_url(); ?>home/get_module_info/" + module_id,
                dataType: "json",
                success: function (response) {



                    $('#edit_module_id').val(response[0].id);
                    $('#edit_module_name').val(response[0].module);
                    $('#edit_controller').val(response[0].controller);
                    $('#edit_function').val(response[0].function);
                    $('#edit_status').val(response[0].status);
                    $('#edit_date_added').val(response[0].date_added);
                    $('#edit_timestamp').val(response[0].timestamp);
                    $(".edit_level").val(response[0].level);
                    $(".edit_module_div").modal('show');
                    $(".module_table_div").hide();
                    $(".modal_loading").hide();
                }, error: function (data) {
                    $(".modal_loading").hide();
                    //sweetAlert("Oops...", "Something went wrong!", "error");

                }
            });
        });
    });






</script>
</body>
</html>
