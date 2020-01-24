<?php $this->load->view('header');?>

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
                                <button class="btn btn-default add_user_button" id="add_user_button"><i class="fa fa-plus"></i>Add Notifiable Person </button>

                                <div class="box">
                                    <div class="box-header">
                                        <h2 class="box-title">Notifiable Persons</h2>
                                    </div><!-- /.box-header -->
                                    <div class="box-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No . </th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Phone No </th>
                                                    <th>Email : </th>
                                                    <th>Date Added</th>
                                                    <th>Cadre</th>
                                                    <th>Notification</th>
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
                                                            <?php echo $value['f_name'] . " "; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo " " . $value['l_name']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['phone_no']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['email']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo substr($value['time_stamp'], 0,10); ?>
                                                        </td>
                                                        
                                                        
                                                        <td>
                                                            <?php 
                                                                if ($value['cadre'] == '1'){
                                                                    echo "Clinician";
                                                                }
                                                                else {
                                                                    echo "Lab Assistant";
                                                                }
                                                            ?>
                                                        </td>
                                                        <td><?php

                                                                if ($value['notification'] == '1'){
                                                                    echo "VL";
                                                                }
                                                                elseif ($value['notification'] == '2'){
                                                                    echo "EID";
                                                                }
                                                                else {
                                                                    echo "VL & EID";
                                                                }
                                                            ?></td>
                                                        <td><?php echo $value['status']; ?></td>
                                                        <td>
                                                            <input type="hidden" name="hidden_user_id" class="hidden_user_id form-control" id="hidden_user_id" value="<?php echo $value['user_id']; ?>"/>
                                                            <button class='btn btn-xs btn-default edit_notifiable_person_btn' data-original-title='Edit User'><i class='fa fa-pencil'></i></button>

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
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Phone No </th>
                                                    <th>Email : </th>
                                                    <th>Date Added</th>
                                                    <th>Cadre</th>
                                                    <th>Notification</th>
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
                    <form class="form-horizontal add_notifiable_person_form" id="add_notifiable_person_form">

                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add Notifiable Person</h4>
                                </div>
                                <div class="modal-body">

                                    <div class="box-body">
                                    
                                      <input type="hidden" name="user_level" value="<?php echo $_SESSION['user_level'] ;?>">
                                      <input type="hidden" name="facility_id_session" value="<?php echo $_SESSION['facility_id'] ;?>">
                                        <div class="form-group">
                                            <label for="User Name" class="col-sm-2 control-label">First Name : </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control fname" name="fname" id="fname" placeholder="First Name : ">
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label for="User Name" class="col-sm-2 control-label">Last Name : </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control sname" name="sname" id="sname" placeholder="Sur Name : ">
                                            </div>
                                        </div>







                                        <div class="form-group">
                                            <label for="Phone No" class="col-sm-2 control-label">Phone No : </label>
                                            <div class="col-sm-10">
                                                <input type="text" pattern="[0]\d+" required="" minlength="10" maxlength="10" class="form-control phone_no" name="phone_no" id="phone_no" placeholder="Input as 07XXXXXXXX" oninvalid="this.setCustomValidity('Please enter a valid phone number! ')"
    oninput="setCustomValidity('')">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="Email Address" class="col-sm-2 control-label">Email Address : </label>
                                            <div class="col-sm-10">
                                                <input type="email" required="" class="form-control add_email" name="email" id="add_email" placeholder="Email Address : ">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="cadre" class="col-sm-2 control-label"> Cadre :</label>
                                            <div class="col-sm-10">
                                                <select class=" form-control" name="cadre" id="cadre">
                                                    <option value="">Select one option</option>
                                                    <option value="1">Clinician</option>
                                                    <option value="2">Lab Assistant</option>
                                                </select>
                                             </div>
                                         </div>

                                         <div class="form-group">
                                            <label for="notification" class="col-sm-2 control-label"> Notification :</label>
                                            <div class="col-sm-10">
                                                <select class=" form-control" name="notification" id="notification">
                                                    <option value="">Select one option</option>
                                                    <option value="1">VL</option>
                                                    <option value="2">EID</option>
                                                    <option value="3">VL & EID</option>
                                                </select>
                                            </div>
                                        </div>



                                        


                                        <!--
                                        <div class="form-group">
                                            <label for="partneer" class="col-sm-2 control-label">Partner </label>
                                            <div class="col-sm-10">

                                                <select class="form-control partner_name" name="partner_id" id="partner_name" placeholder="Partner Name : ">
                                                    <option value="">Please select : </option>
                                                    <?php foreach ($partners as $partner):
                                                        ?>
                                                        <option value="<?php echo $partner['id']; ?>"><?php echo $partner['name']; ?></option>
                                                        <?php
                                                    endforeach;
                                                    ?>
                                                </select>
                                            </div>
                                        </div> -->





                                        <!--<div class="form-group">
                                            <label for="facility_name" class="col-sm-2 control-label">Facility Name </label>
                                            <div class="col-sm-10">

                                                <select class="form-control facility_name" name="facility_id" id="facility_name" placeholder="Facility Name : ">
                                                    <option value="">Please select : </option>
                                                    <?php foreach ($facilities as $facility):
                                                        ?>
                                                        <option value="<?php echo $facility['facility_id']; ?>"><?php echo $facility['facility_name']; ?></option>
                                                        <?php
                                                    endforeach;
                                                    ?>
                                                </select>
                                            </div>
                                        </div>-->





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




                <!-- Add User End -->


                <!-- Edit User Start -->
                <!-- Modal -->
                <div id="myModal" class="modal fade edit_user_div" role="dialog">
                    <form class="form-horizontal edit_notifiable_person_form" id="edit_notifiable_person_form">

                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Edit Notifiable Person</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="facility_id_session" value="<?php echo $_SESSION['facility_id'] ;?>">
                                    <input type="hidden" name="id" required="" class="edit_user_id form-control" id="edit_user_id"/>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="User Name" class="col-sm-2 control-label">First Name : </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control edit_fname" name="fname" id="edit_fname" placeholder="First Name : ">
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label for="User Name" class="col-sm-2 control-label">Last Name : </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control edit_sname" name="sname" id="edit_sname" placeholder="Sur Name : ">
                                            </div>
                                        </div>







                                        <div class="form-group">
                                            <label for="Phone No" class="col-sm-2 control-label">Phone No : </label>
                                            <div class="col-sm-10">
                                           <input type="text" pattern="[0]\d+" required="" minlength="10" maxlength="10" class="form-control edit_phone_no" name="phone_no" id="edit_phone_no" placeholder="Input as 07XXXXXXXX" oninvalid="this.setCustomValidity('Please enter a valid phone number! ')"
    oninput="setCustomValidity('')">
                                            </div>
                                        </div>




                                        <div class="form-group">
                                            <label for="Email Address" class="col-sm-2 control-label">Email Address : </label>
                                            <div class="col-sm-10">
                                                <input type="email" required="" class="form-control edit_email" name="email" id="edit_email" placeholder="Email Address : ">
                                            </div>
                                        </div>


                              



                                        <div class="form-group">
                                            <label for="partneer" class="col-sm-2 control-label">Cadre :</label>
                                            <div class="col-sm-10">

                                                <select class="form-control edit_cadre" required="" name="cadre" id="edit_cadre" placeholder="Cadre : ">
                                                    <option value="">Please select : </option>
                                                    <option value="1">Clinician</option>
                                                    <option value="2">Lab Assistant</option>
                                                </select>
                                            </div>
                                        </div>





                                        <div class="form-group">
                                            <label for="facility_name" class="col-sm-2 control-label">Notification</label>
                                            <div class="col-sm-10">

                                                <select class="form-control edit_notification" required="" name="notification" id="notification" placeholder="Notification : ">
                                                    <option value="">Please select : </option>
                                                    <option value="1">VL</option>
                                                    <option value="2">EID</option>
                                                    <option value="3">VL & EID</option>
                                                </select>
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
                    <form class="form-horizontal delete_notifiable_person_form" id="delete_notifiable_person_form">

                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Delete Notifiable Person</h4>
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
                    $(".user_table_div").show();
                });




                $('.add_user_form').submit(function (event) {
                    dataString = $(".add_user_form").serialize();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>home/add_notifiable_person",
                        data: dataString,
                        success: function (data) {
                            $(".add_user_div").modal("hide");
                            get_user_details();
                        }

                    });
                    event.preventDefault();
                    return false;
                });

                 $('.add_notifiable_person_form').submit(function (event) {
                    dataString = $(".add_notifiable_person_form").serialize();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>home/add_notifiable_person",
                        data: dataString,
                        success: function (data) {
                            $(".add_user_div").modal("hide");
                            get_notifiable_persons();
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

                            get_notifiable_persons();
                            $(".user_table_div").show();
                            $(".edit_user_div").modal('hide');
                        }

                    });
                    event.preventDefault();
                    return false;
                });

                $('.edit_notifiable_person_form').submit(function (event) {
                    dataString = $(".edit_notifiable_person_form").serialize();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>home/edit_notifiable_person",
                        data: dataString,
                        success: function (data) {

                            get_notifiable_persons();
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

                            get_notifiable_persons();
                            $(".user_table_div").show();
                            $(".delete_user_div").modal('hide');
                        }

                    });
                    event.preventDefault();
                    return false;
                });

                $('.delete_notifiable_person_form').submit(function (event) {
                    dataString = $(".delete_notifiable_person_form").serialize();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>home/delete_user",
                        data: dataString,
                        success: function (data) {

                            get_notifiable_persons();
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

                function get_notifiable_persons() {
                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url(); ?>home/notifiable_persons/json",
                        dataType: "json",
                        async: true,
                        crossDomain: true,
                        success: function (response) {
                            $(".user_data").empty();
                            var no = 1;
                            $.each(response, function (i, item) {

                                var id = item.user_id;
                                var phone_no = item.phone_no;
                                var fname = item.f_name;
                                var sname = item.l_name;
                                var email = item.email;
                                var date_added = item.time_stamp;
                                if(item.cadre == '1'){
                                    var cadre = 'Clinician';
                                }
                                else if (item.cadre == '2'){
                                    var cadre = 'Lab Assistant';

                                }
                                if(item.notification == '1'){
                                    var notification = 'VL';
                                }

                                else if (item.notification == '2')
                                {
                                    var notification = 'EID';
                                }

                                else if (item.notification == '3'){

                                    var notification = 'VL & EID';
                                }

                                var user_status = item.status;
                               
                                var tr_data = "<tr>\n\
                                            <td>" + no + "</td>\n\
                                            <td>" + fname + "</td>\n\
                                            <td>" + sname + "</td>\n\
                                            <td>" + phone_no + "</td>\n\
                                            <td>" + email + "</td>\n\
                                            <td>" + date_added.split(' ')[0] + "</td>\n\
                                            <td>" + cadre + "</td>\n\
                                            <td>" +  notification  + "</td>\n\
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

                            var fname = response[0].f_name;
                            var sname = response[0].l_name;
                            var name = fname + " " + sname;

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


                $(document).on('click', ".edit_notifiable_person_btn", function () {
                    //get data
                    var user_id = $(this).closest('tr').find('input[name="hidden_user_id"]').val();
                    $(".modal_loading").show();

                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url(); ?>home/get_user_info/" + user_id,
                        dataType: "json",
                        success: function (response) {



                            $('#edit_user_id').val(response[0].user_id);
                            $('#edit_fname').val(response[0].f_name);
                            $('#edit_sname').val(response[0].l_name);
                            $('#edit_email').val(response[0].email);
                            $("#edit_cadre").val(response[0].cadre);
                            $("#edit_notification").val(response[0].notification);
                            $('#edit_phone_no').val(response[0].phone_no);
                            $('#edit_status').val(response[0].status);
                            $('#edit_date_added').val(response[0].date_added);
                            $('#edit_timestamp').val(response[0].timestamp);
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
