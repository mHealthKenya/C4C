<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> Unique Loo! | </title>

        <!-- Bootstrap core CSS -->

        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet">

        <!-- Custom styling plus plugins -->
        <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/icheck/flat/green.css" rel="stylesheet">
        <!-- editor -->
        <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/editor/index.css" rel="stylesheet">
        <!-- select2 -->
        <link href="<?php echo base_url(); ?>assets/css/select/select2.min.css" rel="stylesheet">
        <!-- switchery -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/switchery/switchery.min.css" />

        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

        <!--[if lt IE 9]>
            <script src="../assets/js/ie8-responsive-file-warning.js"></script>
            <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

    </head>


    <body class="nav-md">

        <div class="container body">


            <div class="main_container">

                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">

                        <div class="navbar nav_title" style="border: 0;">


                            <a href="<?php echo base_url(); ?>"> <img  style="margin-left: 60px; margin-right: 0px; margin-bottom: 0px; margin-top: 0px;" src="<?php echo base_url(); ?>images/logo.png" alt="logo"  /></a>

                        </div>

                        <div class="clearfix"></div>



                        <br />

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                            <div class="menu_section">
                                <h3>General</h3>
                                <ul class="nav side-menu">
                                    <li><a href="<?php echo base_url(); ?>" ><i class="fa fa-home"></i> HOME <span class="fa fa-chevron-right"></span></a> </li>




                                    <li><a><i class="fa fa-edit"></i> ADMINISTRATION <span class="fa fa-chevron-down"></span></a>

                                        <ul class="nav child_menu" style="display: none">

                                            <li>


                                                <?php
                                                $base_url = base_url();
                                                foreach ($admin_functions as $value) {
                                                    $controller_name = $value['controller_name'];
                                                    $function_name = $value['functions_name'];
                                                    $i_tag = $value['i_tag'];
                                                    $description = $value['description'];
                                                    $span_tag = $value['span_tag'];
                                                    ?>
                                                <li><a href="<?php echo base_url(); ?><?php echo $controller_name; ?>/<?php echo $function_name; ?>"><?php echo $i_tag; ?> <?php echo $description; ?> <?php echo $span_tag; ?> </a>

                                                    <?php
                                                }
                                                ?> </li>



                                        </ul> 

                                    </li>

                                    <li><a><i class="fa fa-edit"></i> DAILY OPERATIONS <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">

                                            <?php
                                            $base_url = base_url();
                                            foreach ($daily_functions as $value) {
                                                $controller_name = $value['controller_name'];
                                                $function_name = $value['functions_name'];
                                                $i_tag = $value['i_tag'];
                                                $description = $value['description'];
                                                $span_tag = $value['span_tag'];
                                                ?>
                                                <li><a href="<?php echo base_url(); ?><?php echo $controller_name; ?>/<?php echo $function_name; ?>"><?php echo $i_tag; ?> <?php echo $description; ?> <?php echo $span_tag; ?> </a>

                                                    <?php
                                                }
                                                ?> </li>






                                        </ul>
                                    </li>



                                    <li><a><i class="fa fa-edit"></i> REPORTS <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">

                                            <?php
                                            $base_url = base_url();
                                            foreach ($reports_functions as $value) {
                                                $controller_name = $value['controller_name'];
                                                $function_name = $value['functions_name'];
                                                $i_tag = $value['i_tag'];
                                                $description = $value['description'];
                                                $span_tag = $value['span_tag'];
                                                ?>
                                                <li><a href="<?php echo base_url(); ?><?php echo $controller_name; ?>/<?php echo $function_name; ?>"><?php echo $i_tag; ?> <?php echo $description; ?> <?php echo $span_tag; ?> </a>

                                                    <?php
                                                }
                                                ?> </li>







                                        </ul>
                                    </li>



                                </ul>
                            </div>

                        </div>
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" href="<?php echo base_url(); ?>home/do_logout" title="Logout">
                                <span class="glyphicon glyphicon-off"  aria-hidden="true"></span>
                            </a>
                        </div>
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">

                    <div class="nav_menu">
                        <nav class="" user="navigation">
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="<?php echo base_url(); ?>assets/images/img.jpg" alt=""><?php
                                        $username = $this->session->userdata('user_name');
                                        echo $username;
                                        ?>
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                        <li><a href="<?php echo base_url(); ?>admin/profile">  Profile</a>
                                        </li>


                                        <li><a href="<?php echo base_url(); ?>home/do_logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                        </li>
                                    </ul>
                                </li>


                            </ul>
                        </nav>
                    </div>

                </div>
                <!-- /top navigation -->







                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">



                        <div class="row">
                            <div class="col-md-6 col-xs-12">



                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Access Rights  Form <small>Assign Rigths to Users</small></h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li><a class="close_function_dialog"><i class="fa fa-close"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">

                                        <form id="assign_access_form" class="assign_access_form">


                                            <div class="div_user_name" id="div_user_name">
                                                <select name="user_name" id="user_name" class="user_name form-control">
                                                    <option>Please select User Name : </option>
                                                    <?php foreach ($system_users as $value) {
                                                        ?>
                                                        <option value="<?php echo $value['id']; ?>"><?php echo $value['user_name']; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div id="rights_div" class="rights_div" style="display: none;">


                                                <label>System Functions :</label>
                                                <p style="padding: 5px;">
                                                <p style="padding: 5px;">
                                                    <input type="checkbox" name="select_all_fctns" id="select_all_fctns" class="select_all_fctns  form-control"/> Select All
                                                    <br/>
                                                </p>

                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                    <th>
                                                        Administrations
                                                    </th>
                                                    <th>
                                                        Daily Operations
                                                    </th>
                                                    <th>
                                                        Reports
                                                    </th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="administration_select_all" class="addministration_select_all form-control" id="administration_select_all"/> Select All Admin Functions
                                                            </td>
                                                            <td> <input type="checkbox" name="daily_ops_select_all" class="daily_ops_select_all form-control" id="daily_ops_select_all"/> Select All Daily Ops Functions
                                                            </td>
                                                            <td> <input type="checkbox" name="reports_select_all" class="reports_select_all form-control" id="reports_select_all"/> Select All Reports Functions 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <?php foreach ($admin_rights_functions as $value) {
                                                                    ?>
                                                                    <input type="checkbox" name="functions[]" id="functions" value="<?php echo $value['id']; ?>"   class=" form-control functions administration_functions" /> <?php echo $value['name']; ?>
                                                                    <hr>

                                                                    <br />

                                                                    <?php
                                                                }
                                                                ?>

                                                            </td>
                                                            <td>

                                                                <?php foreach ($daily_rights_functions as $value) {
                                                                    ?>
                                                                    <input type="checkbox" name="functions[]" id="functions" value="<?php echo $value['id']; ?>"   class=" form-control functions daily_ops_functions" /> <?php echo $value['name']; ?>
                                                                    <hr>

                                                                    <br />

                                                                    <?php
                                                                }
                                                                ?>

                                                            </td>
                                                            <td>
                                                                <?php foreach ($reports_rights_functions as $value) {
                                                                    ?>
                                                                    <input type="checkbox" name="functions[]" id="functions" value="<?php echo $value['id']; ?>"  class="form-control functions reports_functions" /> <?php echo $value['name']; ?>
                                                                    <hr>
                                                                    <br />

                                                                    <?php
                                                                }
                                                                ?>

                                                            </td>
                                                        </tr>

                                                    </tbody>


                                                </table>

                                                <p>


                                                <div class="ln_solid"></div>
                                                <div class="form-group">
                                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                        <button type="submit" class="btn btn-success assign_access_btn" id="assign_access_btn">Assign Roles </button>
                                                        <button type="reset" class="btn btn-primary cancel_btn" id="cancel_btn">Cancel</button>

                                                    </div>
                                                </div>



                                            </div>
                                        </form>




                                    </div>
                                </div>


                            </div>



                        </div>








                    </div>
                    <!-- /page content -->

                    <!-- footer content -->
                    <footer>
                        <div class="">
                            <p class="pull-right">Unique Loo ! by <a>Harris Dindi</a>. |
                                <span class="lead"> <i class="fa fa-paw"></i> Unique Loo!</span>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </footer>
                    <!-- /footer content -->

                </div>

            </div>
        </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>



        <!-- Sweet Alert Library -->
        <script src="<?php echo base_url(); ?>assets/dist/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/sweetalert.css">
        <!--.......................-->


        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

        <!-- chart js -->
        <script src="<?php echo base_url(); ?>assets/js/chartjs/chart.min.js"></script>
        <!-- bootstrap progress js -->
        <script src="<?php echo base_url(); ?>assets/js/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- icheck -->
        <script src="<?php echo base_url(); ?>assets/js/icheck/icheck.min.js"></script>
        <!-- tags -->
        <script src="<?php echo base_url(); ?>assets/js/tags/jquery.tagsinput.min.js"></script>
        <!-- switchery -->
        <script src="<?php echo base_url(); ?>assets/js/switchery/switchery.min.js"></script>
        <!-- daterangepicker -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment.min2.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datepicker/daterangepicker.js"></script>
        <!-- richtext editor -->
        <script src="<?php echo base_url(); ?>assets/js/editor/bootstrap-wysiwyg.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/editor/external/jquery.hotkeys.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/editor/external/google-code-prettify/prettify.js"></script>
        <!-- select2 -->
        <script src="<?php echo base_url(); ?>assets/js/select/select2.full.js"></script>
        <!-- form validation -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/parsley/parsley.min.js"></script>
        <!-- textarea resize -->
        <script src="<?php echo base_url(); ?>assets/js/textarea/autosize.min.js"></script>
        <!-- Autocomplete -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/autocomplete/countries.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/autocomplete/jquery.autocomplete.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
        
        
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
                        url: "<?php echo base_url(); ?>admin/get_user_permissions/" + user_id,
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
                        url: "<?php echo base_url() ?>index.php/admin/assign_new_access",
                        data: dataString,
                        success: function (data) {
                            //sweetAlert("Success", "success");
                             $(".modal_loading").hide();
                            swal({
                                title:"Success!",
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