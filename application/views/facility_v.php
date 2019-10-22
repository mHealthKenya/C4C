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
            <li class="active">Facilities</li>
        </ol>
    </section>

    <div id="facility_table_div" class="facility_table_div">


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                   
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">MFL LIST</h3>
                             <p>Add a facility from the MFL list below, please note that approval may take up to 24 hrs.</p>
                                               
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No . </th>
                                        <th>Facility Name : </th>
                                        <th>MFL Code</th>
                                        <th>County</th>
                                        <th>Add Facility</th>
                                    </tr>

                                </thead>
                                <tbody class="facility_data" id="facility_data">
                                    <?php
                                    $i = 1;

                                    foreach ($facilities as $value) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td>
                                                <?php echo $value['facility_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['mfl']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['county_name']; ?>
                                            </td>
                                            <td>
                                                <input type="hidden" name="hidden_facility_id" class="hidden_facility_id form-control" id="hidden_facility_id" value="<?php echo $value['facility_id']; ?>"/>
                                                <button class='btn btn-xs btn-default edit_facility_btn' data-original-title='Edit Facility'><i class='fa fa-plus'></i></button>
                                                </td>

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
                                        <th>Facility Name : </th>
                                        <th>MFL Code</th>
                                        <th>County</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div>


    <!-- Edit Facility Start -->
    <!-- Modal -->
    <div id="myModal" class="modal fade edit_facility_div" role="dialog">
        <form class="form-horizontal edit_facility_form" id="edit_facility_form">

            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Facility</h4>
                    </div>
                    <div class="modal-body">

                        <div class="box-body">
                            <div class="form-group">
                                <label for="Facility Name" class="col-sm-2 control-label">Facility Name : </label>
                                <div class="col-sm-10">
                                    <input readonly type="text" class="form-control edit_facility_name" name="name" id="edit_facility_name" placeholder="Facility Name : ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  for="MFL" class="col-sm-2 control-label">MFL Code: </label>
                                <div class="col-sm-10">
                                    <input readonly type="text" class="form-control edit_mfl_code" name="mfl" id="edit_mfl_code" placeholder="MFL Code : ">
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <label for="County" class="col-sm-2 control-label">County : </label>
                                <div class="col-sm-10">
                                    <input readonly type="text" class="form-control edit_county_name" name="county" id="edit_county" placeholder="County : ">
                                </div>
                            </div>
                            <input type="hidden" name="id" class="edit_facility_id form-control" id="edit_facility_id"/>

                            <input type="hidden" name="partner_id" class="partner_id form-control" id="partner_id" value="<?php echo $_SESSION['partner_id'];?>"/>



                            <div class="form-group">
                                <label for="Mobile  No" class="col-sm-2 control-label">Mobile No : </label>
                                <div class="col-sm-10">
                            <input type="text" pattern="[0]\d+" required="" minlength="10" maxlength="10" class="form-control edit_mobileno" name="mobile" id="edit_mobileno" placeholder="Input as 07XXXXXXXX" oninvalid="this.setCustomValidity('Please enter a valid phone number! ')"
    oninput="setCustomValidity('')"></div>
                            </div>

							<div class="form-group">
                                            <label for="Email Address" class="col-sm-2 control-label">Email Address : </label>
                                            <div class="col-sm-10">
                                                <input type="email" required="" class="form-control add_email" name="email" id="add_email" placeholder="Email Address : ">
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


    <!-- Edit Facility End -->







    <!-- Delete Facility Start -->
    <!-- Modal -->
    <div id="myModal" class="modal fade delete_facility_div" role="dialog">
        <form class="form-horizontal delete_facility_form" id="delete_facility_form">

            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Delete Facility</h4>
                    </div>
                    <div class="modal-body">

                        <div class="box-body">
                            <div class="form-group">
                                <p>Are you sure you want to delete Facility : </p>
                            </div>
                            <div class="form-group">

                                <div class="col-sm-10">
                                    <input type="text" class="form-control delete_facility_name" name="name" id="delete_facility_name" placeholder="Facility Name : ">
                                </div>
                            </div>
                            <input type="hidden" name="id" class="delete_facility_id form-control" id="delete_facility_id"/>









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


    <!-- Delete Facility End -->








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

<div class="modal_loading" id="modal_loading"><!-- Place at bottom of page --></div>
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
            </style>

            <script type="text/javascript">
			
                $(document).ready(function () {
                    var opts = {
                        lines: 12             // The number of lines to draw
                        , length: 7             // The length of each line
                        , width: 5              // The line thickness
                        , radius: 10            // The radius of the inner circle
                        , scale: 1.0            // Scales overall size of the spinner
                        , corners: 1            // Roundness (0..1)
                        , color: '#000'         // #rgb or #rrggbb
                        , opacity: 1 / 4          // Opacity of the lines
                        , rotate: 0             // Rotation offset
                        , direction: 1          // 1: clockwise, -1: counterclockwise
                        , speed: 1              // Rounds per second
                        , trail: 100            // Afterglow percentage
                        , fps: 20               // Frames per second when using setTimeout()
                        , zIndex: 2e9           // Use a high z-index by default
                        , className: 'spinner'  // CSS class to assign to the element
                        , top: '50%'            // center vertically
                        , left: '50%'           // center horizontally
                        , shadow: false         // Whether to render a shadow
                        , hwaccel: false        // Whether to use hardware acceleration (might be buggy)
                        , position: 'absolute'  // Element positioning
                    }
                    var target = document.getElementById('modal_loading');
                    var spinner = new Spinner(opts).spin(target);
                });
            </script>

<!-- page script -->
<script>




    var j = jQuery.noConflict();
    j(document).ready(function () {
        j('#example1').on('processing.dt', function (e, settings, processing) {
            $('#processingIndicator').css('display', processing ? 'block' : 'none');
        }).DataTable({
            dom: 'Bfrtip',
            "bProcessing": false,
            buttons: [
                //'copyHtml5',
                //'excelHtml5',
                //'csvHtml5',
                //'pdfHtml5',
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
            $(".facility_table_div").show();
        });




        $('.add_facility_form').submit(function (event) {
            dataString = $(".add_facility_form").serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>home/add_facility",
                data: dataString,
                success: function (data) {
                    if (data === "Fail") {
                        alert("Facility already exists....");
                    } else {

                        $(".add_facility_div").modal('hide');
                        get_facility_details();
                    }

                }

            });
            event.preventDefault();
            return false;
        });
        $('.edit_facility_form').submit(function (event) {
            dataString = $(".edit_facility_form").serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>home/partner_add_facility",
                data: dataString,
                success: function (data) {

                    get_facility_details();
                    $(".facility_table_div").show();
                    $(".edit_facility_div").modal('hide');
                }

            });
            event.preventDefault();
            return false;
        });


        $('.delete_facility_form').submit(function (event) {
            dataString = $(".delete_facility_form").serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>home/delete_facility",
                data: dataString,
                success: function (data) {

                    get_facility_details();
                    $(".facility_table_div").show();
                    $(".delete_facility_div").modal('hide');
                }

            });
            event.preventDefault();
            return false;
        });

        $(".add_facility_button").click(function () {
            $(".add_facility_div").modal('show');
        });
        function get_facility_details() {
            $.ajax({
                type: "GET",
                url: "<?php echo base_url(); ?>home/facilities/json",
                dataType: "json",
                async: true,
                crossDomain: true,
                success: function (response) {
                    $(".facility_data").empty();
                    var no = 1;
                    $.each(response, function (i, item) {

                        var id = item.id;
                        var facility_name = item.facility_name;
                        var mfl = item.mfl;
                        var county = item.county_name
                        var tr_data = "<tr>\n\
                                    <td>" + no + "</td>\n\
                                    <td>" + facility_name + "</td><td>" + mfl + "</td><td>"  + county + "</td>\n\
                                    <td><input type='hidden' name='hidden_facility_id' id='hidden_facility_id' class='hidden_facility_id hidden' value=" + id + " />\n\
                                          <button class='btn btn-xs btn-default edit_facility_btn' data-original-title='Edit Facility'><i class='fa fa-plus'></i></button></td>  </tr>";
                        $(".facility_data").append(tr_data);
                        $('.facility_table_div').prop('value', 'Processing...');

                        no++;
                    });
                }, error: function (data) {


                }
            });
        }





        $(document).on('click', ".delete_facility_btn", function () {
            //get data
            var facility_id = $(this).closest('tr').find('input[name="hidden_facility_id"]').val();
            $(".modal_loading").show();

            $.ajax({
                type: "GET",
                url: "<?php echo base_url(); ?>home/get_facility_info/" + facility_id,
                dataType: "json",
                success: function (response) {



                    $('#delete_facility_id').val(response[0].id);
                    $('#delete_facility_name').val(response[0].name);
                    $(".delete_facility_div").modal('show');
                    $(".facility_table_div").hide();
                    $(".modal_loading").hide();
                }, error: function (data) {
                    $(".modal_loading").hide();
                    //sweetAlert("Oops...", "Something went wrong!", "error");

                }
            });
        });


        $(document).on('click', ".edit_facility_btn", function () {
            //get data
            var facility_id = $(this).closest('tr').find('input[name="hidden_facility_id"]').val();
            $(".modal_loading").show();

            $.ajax({
                type: "GET",
                url: "<?php echo base_url(); ?>home/get_facility_info/" + facility_id,
                dataType: "json",
                success: function (response) {



                    $('#edit_facility_id').val(response[0].facility_id);
                    $('#edit_facility_name').val(response[0].facility_name);
                    $('#edit_mfl_code').val(response[0].mfl)
                    $(".edit_county_name").val(response[0].county_name);
                    $(".edit_mobileno").val(response[0].mobile);
                    $(".edit_facility_div").modal('show');
                    $(".facility_table_div").hide();
                    $(".modal_loading").hide();
                }, error: function (data) {
                    $(".modal_loading").hide();
                    //sweetAlert("Oops...", "Something went wrong!", "error");

                }
            });
        });


        generate_api();

        function generate_api() {
        
            var form = new FormData();
            form.append("name", "Trial Account ver One");

            var settings = {
                "async": true,
                "crossDomain": true,
                "url": "http://api.infobip.com/2fa/1/applications",
                "method": "POST",
                "headers": {
                    "authorization": "Basic bUhlYWx0aEtlbnlhOiBUZXN0MTIzNA==",
                    "cache-control": "no-cache",
                    "postman-token": "2c0c5007-7eab-b208-96e5-d5f94404a831"
                },
                "processData": false,
                "cache": false,
                "contentType": "application/json",
                "mimeType": "multipart/form-data",
                dataType: 'json',
                "data": form
            }

            $.ajax(settings).done(function (response) {
                console.log(response);
            });
        }


    });






</script>

</body>
</html>
