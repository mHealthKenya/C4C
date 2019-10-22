<?php
$this->load->view('header');
?>

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

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">User Permissions Module</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">









                            <form id="assign_access_form" class="assign_access_form form-horizontal">


                                <div class="div_user_name" id="div_user_name">
                                    <select name="user_name" id="user_name" class="user_name form-control">
                                        <option>Please select User Name : </option>
                                        <?php foreach ($system_users as $value) {
                                            ?>
                                            <option value="<?php echo $value['user_id']; ?>"><?php echo $value['f_name'] . ' ' . $value['l_name']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div id="rights_div" class="rights_div" style="display: none;">

                                    <div class="form-group">
                                        <span style="margin-left: 150px;">


                                            <label style="margin-left: 150px;" >System Functions :</label>


                                            <label style="margin-left: 150px;">
                                                <input type="checkbox" name="select_all_fctns" id="select_all_fctns" class="select_all_fctns  minimal"/> Select All

                                            </label> 
                                            <br/>

                                            <?php foreach ($modules as $value) {
                                                ?>
                                                <label style="margin-left: 150px;">
                                                    <input type="checkbox" name="functions[]" id="functions" value="<?php echo $value['id']; ?>"   class=" minimal functions administration_functions" /> <?php echo $value['module']; ?>

                                                </label>
                                                <hr>

                                                <br />

                                                <?php
                                            }
                                            ?>

                                        </span>

                                    </div>











                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                            <button type="submit" class="btn btn-success assign_access_btn" id="assign_access_btn">Assign Roles </button>
                                            <button type="reset" class="btn btn-primary cancel_btn" id="cancel_btn">Cancel</button>

                                        </div>
                                    </div>



                                </div>
                            </form>




















                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div>





























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





<script src="<?php echo base_url(); ?>assets/dist/js/sweetalert.min.js"></script>

<!-- Spin JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/spin.js/2.3.2/spin.min.js"></script>



<script>
    $(document).ready(function () {
   

        $("#user_name").change(function () {
            $(".rights_div").hide();
            $(".modal_loading").show();
            var user_id = this.value;
            $.ajax({
                type: "GET",
                url: "<?php echo base_url(); ?>home/get_user_permissions/" + user_id,
                dataType: "JSON",
                success: function (response) {
                    $(".rights_div").show();
                    $("input:checkbox").prop("checked", false);
                    $(".modal_loading").hide();
                    for (i = 0; i < response.length; i++) {
                        var value = response[i].function_id;
                        if (value === "No Rights Assigned") {
                            $(".rights_div").show();

                        } else {
                            $("input:checkbox[value=" + value + "]").prop("checked", true);

                        }

                    }

                }, error: function (data) {

                    $(".modal_loading").hide();
                    sweetAlert("Oops...", "Something went wrong!", "error");

                }
            });

        });

        $('#assign_access_form').submit(function (event) {
            dataString = $("#assign_access_form").serialize();
            $(".modal_loading").show();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>index.php/home/assign_new_access",
                data: dataString,
                success: function (data) {
                    //sweetAlert("Success", "success");
                    $(".modal_loading").hide();
                    swal({
                        title: "Success!",
                        text: "Rights Assigned Successfullly!",
                        type: "success",
                        confirmButtonText: "Okay!",
                        closeOnConfirm: true
                    }, function () {
                        window.location.reload();

                    });
                    $(".rights_div").hide();


                }, error: function (data) {
                    $(".modal_loading").hide();
                    sweetAlert("Oops...", "Something went wrong!", "error");

                }

            });
            event.preventDefault();
            return false;
        });




    });
</script>



<script type="text/javascript">
    $(document).ready(function () {
        $('.addministration_select_all').click(function (event) {  //on click 

            if (this.checked) { // check select status
                $('.administration_functions').each(function () { //loop through each checkbox
                    this.checked = true;  //select all checkboxes with class "checkbox1"               
                });
            } else {
                $('.administration_functions').each(function () { //loop through each checkbox
                    this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                });
            }
        });

        $('.daily_ops_select_all').click(function (event) {  //on click 

            if (this.checked) { // check select status
                $('.daily_ops_functions').each(function () { //loop through each checkbox
                    this.checked = true;  //select all checkboxes with class "checkbox1"               
                });
            } else {
                $('.daily_ops_functions').each(function () { //loop through each checkbox
                    this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                });
            }
        });

        $('.reports_select_all').click(function (event) {  //on click 

            if (this.checked) { // check select status
                $('.reports_functions').each(function () { //loop through each checkbox
                    this.checked = true;  //select all checkboxes with class "checkbox1"               
                });
            } else {
                $('.reports_functions').each(function () { //loop through each checkbox
                    this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                });
            }
        });

        $('.select_all_fctns').click(function (event) {  //on click 

            if (this.checked) { // check select status
                $('.functions').each(function () { //loop through each checkbox
                    this.checked = true;  //select all checkboxes with class "checkbox1"               
                });
            } else {
                $('.functions').each(function () { //loop through each checkbox
                    this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                });
            }
        });

    });
</script>





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








</body>
</html>
