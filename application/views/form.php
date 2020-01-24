<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>T4L | Donor </title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/all.css">
        <!-- daterange picker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker-bs3.css">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">

        <!-- Select2 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">

        <!-- SweetAlert Js  -->
        <link rel="stylesheet"  href="<?php echo base_url(); ?>assets/dist/css/sweetalert.css">

        <!-- Datatables responsive -->
        <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css ">
        <link rel="stylesheet"  href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet"  href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="../../t4l_web/home/" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>T4</b>L</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>T4L</b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">

                    </div>
                    <!-- search form -->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?> "><i class="fa fa-circle-o"></i> Dashboard</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i>Blood Test Results</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i>Sms Campaign</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i>Inbox</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i>Sent Messages</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i>Emergency Appeal</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i>Reference Data</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-pie-chart"></i>
                                <span>Reports</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> Donations by Type </a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> Deferral Report</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> TTI Report </a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> SMS Campaign Report</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> SMS Report</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> List of Donations to be reviewed</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> Health Questionnaire Analysis</a></li>
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> Risk Questionnaire Analysis</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Administration Options</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url() ?>/home/users"><i class="fa fa-circle-o"></i> User Manager</a></li>
                                <li><a href="<?php echo base_url() ?>/home/roles"><i class="fa fa-circle-o"></i> Role Manager</a></li>
                                <li><a href="<?php echo base_url() ?>/home/counties"><i class="fa fa-circle-o"></i> County Manager</a></li>                                
                                <li><a href="<?php echo base_url() ?>/home/stockuser"><i class="fa fa-circle-o"></i> RBTC Manager</a></li>
                                <li><a href="<?php echo base_url() ?>/home/clinics"><i class="fa fa-circle-o"></i> Satellite Manager</a></li>
                                <li><a href="<?php echo base_url() ?>/home/deferrals"><i class="fa fa-circle-o"></i> Deferral Manager</a></li>
                                <li><a href="<?php echo base_url() ?>/home/csv"><i class="fa fa-circle-o"></i> Upload Log</a></li>                                
                            </ul>
                        </li>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>

                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../t4l_web/"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Forms</a></li>
                        <li class="active">donor</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="donation_search_div" id="donation_search_div">
                            <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <!--   --> <h3 class="box-title">Donation Search</h3>
                                    </div><!-- /.box-header -->
                                    <!-- Donation search Form  -->
                                    <form role="form" id="donor_search_form" class="donor_search_form">
                                        <div class="box-body">

                                            <div class="checkbox">
                                                <label>Search By:Cell Phone Number
                                                    <input type="radio" class="flat-red donor_search" value="Cell Phone Number" name="donor_search" checked="checked">
                                                </label>
                                                <label>Donor Number
                                                    <input type="radio" class="flat-red donor_search" value="Donor Number" name="donor_search">
                                                </label>
                                                <label>ID Number
                                                    <input type="radio" class="flat-red donor_search" value="ID Number" name="donor_search">
                                                </label>
                                            </div>

                                            <div class="search_input_div" id="search_input_div" style="display: inline;">
                                                <div class="form-group">
                                                    <label for="GG"></label>
                                                    <input type="text" class="form-control search_value" id="search_value" name="search_value"  placeholder="Enter Value ...">
                                                </div>
                                            </div>


                                        </div><!-- /.box-body -->

                                        <div class="box-footer">
                                            <!--<button type="submit" class="btn btn-primary btn-sm pull-left"><i class=" fa fa-search"></i>Search</button>-->
                                        </div>
                                    </form>

                                    <div class="search_results_div" id="search_results_div" style="display: none;">



                                    </div>


                                    <hr>
                                    <div id="enrol_recruit_button_div" class="enrol_recruit_button_div" style="display: none;">
                                        <button type="button" class="add_new_donor btn btn-primary" id="add_new_donor"><i class="fa fa-plus"></i>Enroll New Donor</button>
                                        <button type="button" class="recruit_potential_donor_btn btn btn-primary" id="recruit_potential_donor_btn"><i class="fa fa-plus"></i>Recruit Potential Donor</button>

                                    </div>


                                </div><!-- /.box -->



                                <!-- Form Element sizes -->


                            </div><!--/.col (left) -->
                        </div>





                        <!-- Edit Donor Details Start -->


                        <!-- Modal -->
                        <div id="myModal" class="modal fade edit_donor_details_modal" role="dialog" style="display: none;">



                            <div class="modal-dialog">

                                Modal content
                                <form class="form-horizontal edit_donor_details_form" id="edit_donor_details_form" >

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close cancel_update_donor" data-dismiss="modal">&times;</button>
                                            <h3 class="box-title">Edit Donor Details</h3>
                                        </div>

                                        <div class="modal-body">

                                            <input type="text" name="id" class="edit_donor_id hidden" id="edit_donor_id"/>
                                            <input type="text" name="donor_no" class="edit_donor_no hidden" id="edit_donor_no"/>
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="Surname" class="col-sm-2 control-label">Surname</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control edit_surname" id="edit_surname" name="surname" placeholder="Surname">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="OtherNames" class="col-sm-2 control-label">Other Names</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control edit_othernames" id="edit_othernames" name="othernames" placeholder="Other Names">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="studentnationalid" class="col-sm-2 control-label">Student / National Id</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control edit_national_id" id="edit_national_id" name="national_id" placeholder="Student / National Id">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="gender" class="col-sm-2 control-label">Gender : </label>
                                                    <div class="col-sm-10">
                                                        <select name="gender" id="edit_gender" class="edit_gender form-control select2">
                                                            <option value="">Please select : </option>
                                                            <?php foreach ($genders as $gender) :
                                                                ?>
                                                                <option value="<?php echo $gender['id']; ?>"><?php echo $gender['name']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="dob" class="col-sm-2 control-label">Date of Birth </label>
                                                    <div class="col-sm-10">
                                                        <input type="date" name="dob" class="form-control edit_dob" id="edit_dob" placeholder="Date of Birth">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="cell_phone" class="col-sm-2 control-label">Cell Phone Number</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" name="cell_phone" class="form-control edit_cell_phone" id="edit_cell_phone" placeholder="Cell Phone Number">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="cell_phone" class="col-sm-2 control-label">Home Number</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" name="home_phone" class="form-control edit_home_phone" id="edit_home_phone" placeholder="Home Phone Number">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="cell_phone" class="col-sm-2 control-label">Postal Address : </label>
                                                    <div class="col-sm-10">
                                                        <textarea id="edit_postal_address" class="edit_postal_address textarea wysihtml5-toolbar" name="contact_details" ></textarea>
                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <label for="email" class="col-sm-2 control-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" name="email" class="form-control edit_email" id="edit_email" placeholder="Email">
                                                    </div>
                                                </div>        

                                                <div class="form-group">
                                                    <label for="county" class="col-sm-2 control-label">Blood Group</label>
                                                    <div class="col-sm-10">
                                                        <select name="blood_group" id="edit_blood_group" class="form-control select2 edit_blood_group">  
                                                            <option value="">Please select : </option>
                                                            <?php foreach ($blood_groups as $blood_group) :
                                                                ?>
                                                                <option value="<?php echo $blood_group['id']; ?>"><?php echo $blood_group['name']; ?></option>
                                                            <?php endforeach; ?>


                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="recruiter" class="col-sm-2 control-label">Recruiter/ Mobilizer</label>
                                                    <div class="col-sm-10">
                                                        <select name="recruiter" id="edit_recruiter" class=" edit_recruiter form-control select2"> 
                                                            <option value="">Please select : </option>
                                                            <?php
                                                            foreach ($recruiters as $recruiter):
                                                                ?>
                                                                <option value="<?php echo $recruiter['id']; ?>"><?php echo $recruiter['name']; ?></option>
                                                                <?php
                                                            endforeach;
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <label for="county" class="col-sm-2 control-label">County Of Residence</label>
                                                    <div class="col-sm-10">
                                                        <select name="county_residence" id="edit_county_residence" class="form-control select2 edit_county_residence">  
                                                            <option value="">Please select : </option>
                                                            <?php foreach ($counties as $county) :
                                                                ?>
                                                                <option value="<?php echo $county['id']; ?>"><?php echo $county['name']; ?></option>
                                                            <?php endforeach; ?>


                                                        </select>
                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <label for="levelofeducation" class="col-sm-2 control-label">Level Of Education</label>
                                                    <div class="col-sm-10">
                                                        <select name="education_level" id="edit_education_level" class=" edit_education_level form-control select2">                        
                                                            <option value="">Please Select : </option>
                                                            <option value="None">None</option>
                                                            <option value="Primary">Primary</option>
                                                            <option value="Secondary">Secondary</option>
                                                            <option value="Tertiary">Tertiary</option>
                                                            <option value="University">University</option>

                                                        </select>
                                                    </div>
                                                </div> 

                                                <div class="form-group">
                                                    <label for="maritalstatus" class="col-sm-2 control-label">Marital Status</label>
                                                    <div class="col-sm-10" class="form-control">
                                                        <select name="marital_status" id="edit_marital_status" class=" edit_marital_status form-control select2">                        
                                                            <option value="">Please Select : </option>
                                                            <option value="Single">Single</option>
                                                            <option value="Married">Married</option>
                                                            <option value="Divorced/Separated/">Divorced/Separated</option>
                                                            <option value="Widowed">Widowed</option>                        
                                                        </select>
                                                    </div>

                                                </div>




                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox"  value="Yes" name="accept_consent" id="edit_accept_consent" class="flat-red edit_accept_consent">I hereby give consent to NBTS to send me SMS texts
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- /.box-body -->



                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary btn-sm pull-left ion-checkmark  ">Update Donor </button>
                                            <button type="button" class="btn btn-danger btn-sm pull-right ion-minus-circled cancel_update_donor">Cancel</button>
                                        </div>
                                    </div>

                                </form>

                            </div>

                            <!-- /.box -->


                        </div>

                        <!-- Edit Donor Details End -->





                        <!-- Recruit POtential Donor Start  -->

                        <div id="recruit_potential_donor" class="recruit_potential_donor" style="display: none;">
                            <div class="col-md-12">
                                <!-- Horizontal Form -->
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Create Potential Donor</h3>
                                    </div><!-- /.box-header -->
                                    <!-- form start -->
                                    <form class="form-horizontal recruit_potential_donor_form" id="recruit_potential_donor_form" >
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="Surname" class="col-sm-2 control-label">Surname</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="OtherNames" class="col-sm-2 control-label">Other Names</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="othernames" name="othernames" placeholder="Other Names">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="studentnationalid" class="col-sm-2 control-label">Student / National Id</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control national_id" id="national_id" name="national_id" placeholder="Student / National Id">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="gender" class="col-sm-2 control-label">Gender : </label>
                                                <div class="col-sm-10">
                                                    <select name="gender" id="gender" class="gender form-control select2">
                                                        <option value="">Please select : </option>
                                                        <?php foreach ($genders as $gender) :
                                                            ?>
                                                            <option value="<?php echo $gender['id']; ?>"><?php echo $gender['name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label for="cell_phone" class="col-sm-2 control-label">Cell Phone Number</label>
                                                <div class="col-sm-10">
                                                    <input type="number" name="cell_phone" class="form-control" id="cell_phone" placeholder="Cell Phone Number">
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label for="email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                                </div>
                                            </div>        

                                            <div class="form-group">
                                                <label for="county" class="col-sm-2 control-label">County Of Residence</label>
                                                <div class="col-sm-10">
                                                    <select name="county_residence" id="county_residence" class="form-control select2">  
                                                        <option value="">Please select : </option>
                                                        <?php foreach ($counties as $county) :
                                                            ?>
                                                            <option value="<?php echo $county['id']; ?>"><?php echo $county['name']; ?></option>
                                                        <?php endforeach; ?>


                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="recruiter" class="col-sm-2 control-label">Recruiter/ Mobilizer</label>
                                                <div class="col-sm-10">
                                                    <select name="recruiter" id="recruiter" class=" recruiter form-control select2"> 
                                                        <option value="">Please select : </option>
                                                        <?php
                                                        foreach ($recruiters as $recruiter):
                                                            ?>
                                                            <option value="<?php echo $recruiter['id']; ?>"><?php echo $recruiter['name']; ?></option>
                                                            <?php
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>





                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" required="" value="Yes" name="accept_consent" id="accept_consent" class="flat-red accept_consent">I hereby give consent to NBTS to send me SMS texts
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary btn-sm pull-left ion-checkmark  ">Create</button>
                                            <button type="button" class="btn btn-danger btn-sm pull-right ion-minus-circled cancel_recruit_donor">Cancel</button>
                                        </div><!-- /.box-footer -->
                                    </form>
                                </div><!-- /.box -->
                                <!-- general form elements disabled -->


                                <!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>     


                        <!-- Recruit Potential Donor End -->

                        <!--- Enroll Potential Donor Start  --->

                        <div id="enrol_new_donor" class="enrol_new_donor" style="display: none;">
                            <div class="col-md-12">
                                <!-- Horizontal Form -->
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Enroll New Donor</h3>
                                    </div><!-- /.box-header -->
                                    <!-- form start -->
                                    <form class="form-horizontal enroll_new_donor_form" id="enroll_new_donor_form" >
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="Donor Number" class="col-sm-2 control-label">Donor Number</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control donor_no" id="donor_no" name="donor_no" placeholder="Donor Number">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Surname" class="col-sm-2 control-label">Surname</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="OtherNames" class="col-sm-2 control-label">Other Names</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="othernames" name="othernames" placeholder="Other Names">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="studentnationalid" class="col-sm-2 control-label">Student / National Id</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control national_id" id="national_id" name="national_id" placeholder="Student / National Id">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="gender" class="col-sm-2 control-label">Gender : </label>
                                                <div class="col-sm-10">
                                                    <select name="gender" id="gender" class="gender form-control select2">
                                                        <option value="">Please select : </option>
                                                        <?php foreach ($genders as $gender) :
                                                            ?>
                                                            <option value="<?php echo $gender['id']; ?>"><?php echo $gender['name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="bloodgroup" class="col-sm-2 control-label">Blood Group</label>
                                                <div class="col-sm-10">
                                                    <select name="blood_group" id="blood_group" class="form-control blood_group select2">
                                                        <option value="">Please select : </option>
                                                        <?php foreach ($blood_groups as $blood_group) :
                                                            ?>
                                                            <option value="<?php echo $blood_group['id']; ?>"><?php echo $blood_group['name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>


                                            <!-- textarea -->                 
                                            <div class="form-group">
                                                <label for="contact_details" class="col-sm-2 control-label">Contact Details (Postal Address)</label>
                                                <div class="col-sm-10">
                                                    <!--<label>Textarea</label>-->
                                                    <textarea class="form-control" id="contact_details" name="contact_details" rows="3" placeholder="Contact Details (Postal Address)"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="cell_phone" class="col-sm-2 control-label">Cell Phone Number</label>
                                                <div class="col-sm-10">
                                                    <input type="number" name="cell_phone" class="form-control" id="cell_phone" placeholder="Cell Phone Number">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="home_phone" class="col-sm-2 control-label">Home Phone Number</label>
                                                <div class="col-sm-10">
                                                    <input type="number" name="home_phone" class="form-control" id="home_phone" placeholder="Home Phone Number">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="dateofbirth" class="col-sm-2 control-label">Date Of Birth</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="dob" class="form-control dob" id="calendar" placeholder="Date Of Birth">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                                </div>
                                            </div>                   



                                            <div class="form-group">
                                                <label for="county" class="col-sm-2 control-label">County Of Residence</label>
                                                <div class="col-sm-10">
                                                    <select name="county_residence" id="county_residence" class="form-control select2">  
                                                        <option value="">Please select : </option>
                                                        <?php foreach ($counties as $county) :
                                                            ?>
                                                            <option value="<?php echo $county['id']; ?>"><?php echo $county['name']; ?></option>
                                                        <?php endforeach; ?>


                                                    </select>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label for="levelofeducation" class="col-sm-2 control-label">Level Of Education</label>
                                                <div class="col-sm-10">
                                                    <select name="education_level" id="education_level" class=" education_level form-control select2">                        
                                                        <option value="">Please Select : </option>
                                                        <option value="none">None</option>
                                                        <option value="primary">Primary</option>
                                                        <option value="secondary">Secondary</option>
                                                        <option value="tertiary">Tertiary</option>
                                                        <option value="university">University</option>

                                                    </select>
                                                </div>
                                            </div> 

                                            <div class="form-group">
                                                <label for="maritalstatus" class="col-sm-2 control-label">Marital Status</label>
                                                <div class="col-sm-10" class="form-control">
                                                    <select name="marital_status" id="marital_status" class=" marital_status form-control select2">                        
                                                        <option value="">Please Select : </option>
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Divorced/Separated/">Divorced/Separated</option>
                                                        <option value="Widowed">Widowed</option>                        
                                                    </select>
                                                </div>

                                            </div><div class="form-group">
                                                <label for="recruiter" class="col-sm-2 control-label">Recruiter/ Mobilizer</label>
                                                <div class="col-sm-10">
                                                    <select name="recruiter" id="recruiter" class=" recruiter form-control select2"> 
                                                        <option value="">Please select : </option>
                                                        <?php
                                                        foreach ($recruiters as $recruiter):
                                                            ?>
                                                            <option value="<?php echo $recruiter['id']; ?>"><?php echo $recruiter['name']; ?></option>
                                                            <?php
                                                        endforeach;
                                                        ?>


                                                    </select>
                                                </div>
                                            </div>





                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" required="" value="Yes" name="accept_consent" id="accept_consent" class="flat-red accept_consent">I hereby give consent to NBTS to send me SMS texts
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary btn-sm pull-left ion-checkmark">Create</button>
                                            <button type="button" class="btn btn-danger btn-sm pull-right ion-minus-circled  cancel_enrol_donor" id="cancel_enrol_donor">Cancel</button>
                                        </div><!-- /.box-footer -->
                                    </form>
                                </div><!-- /.box -->
                                <!-- general form elements disabled -->


                                <!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>

                        <!-- Enroll Potential Donor End -->




                        <div id="questionnaire_div" class="questionnaire_div" style="display: none;">

                        </div>

                        <!-- Questionnaire Form Start  -->

                        <form id="save_questionnaire_form" class="save_questionnaire_form">

                            <!-- Health QUestionnaire Start  -->

                            <div id="health_questionnaire" class="health_questionnaire" style="display: none;">
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"> HEALTH QUESTIONNAIRE</h3>
                                    </div><!-- /.box-header -->

                                    <!-- form start -->

                                    <div class="box-body"> 

                                        <input type="hidden" required="" name="current_donor_id" class="current_donor_id form-control hidden" id="current_donor_id"/>

                                        <div class="form-group">
                                            <label for="home_phone" class="col-sm-10">Last donation date</label>
                                            <div class="col-sm-2">
                                                <input type="text" required="" name="lst_dntn_dte" class="lst_dntn_dte form-control" id="lst_dntn_dte" placeholder="Last Donation Date">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="home_phone" class="col-sm-10">Donation Date</label>
                                            <div class="col-sm-2">
                                                <input type="text" name="dntn_dte" required="" class="dntn_dte form-control" id="dntn_dte" placeholder="Donation Date">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="home_phone" class="col-sm-10">Donation Number</label>
                                            <div class="col-sm-2">
                                                <input type="text" name="dntn_no" required="" class="dntn_no form-control" id="dntn_no" placeholder="Donation Number">
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label for="home_phone" class="col-sm-10">Recruiter/Mobilizer</label>

                                            <div class="col-sm-2">
                                                <select class="form-control select2 recruiter" required="" name="recruiter" id="recruiter" style="width: 100%;">
                                                    <option selected="selected" value="">Please Select : </option>

                                                    <?php
                                                    foreach ($recruiters as $recruiter):
                                                        ?>
                                                        <option value="<?php echo $recruiter['id']; ?>"><?php echo $recruiter['name']; ?></option>
                                                        <?php
                                                    endforeach;
                                                    ?>

                                                </select> 
                                            </div>
                                            <!--<a href="javascript:void(0)" id="add_mobilizer" class="add_mobilizer"><span class="fa fa-plus"></span>Add</a>-->

                                        </div>

                                        <div class="form-group">
                                            <label for="home_phone" class="col-sm-10">Donation Site</label>

                                            <div class="col-sm-2">
                                                <select class="form-control select2 recruiter" required="" name="donation_site" id="donation_site" style="width: 100%;">
                                                    <option selected="selected" value="">Please Select</option>

                                                    <?php
                                                    foreach ($recruiters as $recruiter):
                                                        ?>
                                                        <option value="<?php echo $recruiter['id']; ?>"><?php echo $recruiter['name']; ?></option>
                                                        <?php
                                                    endforeach;
                                                    ?>

                                                </select> 
                                            </div>
                                            <!--<a href="javascript:void(0)" id="add_mobilizer" class="add_mobilizer"><span class="fa fa-plus"></span>Add</a>-->

                                        </div>













                                        <div class="form-group">
                                            <h4 class="col-sm-12"> <b> Health Questionnaire</b></h4>
                                        </div>


                                        <div class="form-group">
                                            <label for="H1" class="col-sm-10">1.Are you feeling well and in good health today? : </label>
                                            <div class="col-sm-2 ">
                                                <select name="H1" id="H1" required="" class="H1 select2 form-control ">
                                                    <option value="">Please Select : </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="H2" class="col-sm-10">2.Have you eaten in the last 6 hours</label>
                                            <div class="col-sm-2 ">
                                                <select name="H2" id="H2" required="" class=" H2 form-control select2">
                                                    <option value="">Please Select : </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="H3" class="col-sm-10">3.Have you ever fainted</label>
                                            <div class="col-sm-2 ">
                                                <select name="H3" id="H3" required="" class="H3 form-control select2">
                                                    <option value="">Please Select : </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5 class="col-sm-12">  In the past 6 months have you : </h5>
                                        </div>

                                        <div class="form-group">
                                            <label for="H4" class="col-sm-10">4.Been ill, received any treatment or any medication?</label>
                                            <div class="col-sm-2 ">
                                                <select name="H4" id="H4" required="" class="H4 form-control select2">
                                                    <option value="">Please Select : </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="H5" class="col-sm-10">5.Had any injection or vaccination(immunization)?</label>
                                            <div class="col-sm-2 ">
                                                <select name="H5" id="H5" required="" class="H5 form-control select2">
                                                    <option value="">Please Select : </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="H6" class="col-sm-10">6.Female donors,Have you been pregnant or breast feeding?</label>
                                            <div class="col-sm-2 ">
                                                <select name="H6" id="H6" required="" class="H6 form-control select2">
                                                    <option value="">Please Select : </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <h5 class="col-sm-12">In the past 12 months have you : </h5>
                                        </div>




                                        <div class="form-group">
                                            <label for="H7" class="col-sm-10">7.Received a blood transfusion or any blood products?</label>
                                            <div class="col-sm-2 ">
                                                <select name="H7" id="H7" required="" class="H7 form-control select2">
                                                    <option value="">Please Select : </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <h5 class="col-sm-12">Do you have or ever had :</h5>
                                        </div>


                                        <div class="form-group">
                                            <label for="H8" class="col-sm-10">8. Any problems with heart or lungs e.g asthma?</label>
                                            <div class="col-sm-2 ">
                                                <select name="H8" id="H8" required="" class="H8 form-control select2">
                                                    <option value="">Please Select : </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="H9" class="col-sm-10">9.A bleeding condition or blood disease?</label>
                                            <div class="col-sm-2 ">
                                                <select name="H9" id="H9" required="" class="H9 form-control select2">
                                                    <option value="">Please Select : </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="H10" class="col-sm-10">10.Any type of cancer?</label>
                                            <div class="col-sm-2 ">
                                                <select name="H10" id="H10" required="" class="H10 form-control select2">
                                                    <option value="">Please Select : </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="H11" class="col-sm-10">11.Diabetes,epilepsy or TB?</label>
                                            <div class="col-sm-2 ">
                                                <select name="H11" id="H11" required="" class="H11 form-control select2">
                                                    <option value="">Please Select : </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="H12" class="col-sm-10">12.Any other long term illness. Please specify?</label>
                                            <div class="col-sm-2 ">
                                                <select name="H12" id="H12" required="" class="H12 form-control select2">
                                                    <option value="">Please Select : </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group H12_Yes_Div" style="display: none;">
                                            <label for="H12_illness" class="col-sm-10">Please Specify : ?</label>
                                            <div class="col-sm-2 ">
                                                <textarea class="form-control H12_illness"  name="H12_illness" id="H12_illness"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="box-footer divider">                                        
                                        <button type="button" class="btn btn-primary btn-sm pull-right move_to_risk "><i class="fa fa-forward"></i>Next</button>
                                        <button type="button" class="btn btn-danger btn-sm pull-left back_to_search "><i class="fa fa-backward"></i>Back</button>
                                    </div><!-- /.box-footer -->



                                </div><!-- /.box-body -->
                            </div>


                            <!-- Health Questionnaire End -->

                            <!--- Risk Questionnnaire Start  -->

                            <div id="risk_questionnaire" class="risk_questionnaire" style="display: none;">
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">RISK ASSESSMENT QUESTIONNAIRE</h3>
                                    </div><!-- /.box-header -->
                                    <!-- form start -->

                                    <div class="box-body"> 

                                        <div class="form-group">
                                            <h5 class="col-sm-12">The lives of the patient who receive your blood are totally 
                                                dependant on your honesty in answering the questions below.
                                                Your answers will be treated 
                                                in a confidential manner</h5>
                                        </div>

                                        <div class="form-group">
                                            <h5 class="col-sm-12">In the past 12 months have you :</h5>
                                        </div>

                                        <div class="form-group">
                                            <label for="R1" class="col-sm-10">1.Received or given money, goods or favours in exchange for sexual activities?</label>
                                            <div class="col-sm-2 ">
                                                <select name="R1" id="R1" required="" class="form-control R1 select2">
                                                    <option value="">Please Select : </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="R2" class="col-sm-10">2.Had sexual activity with a person whose background you do ot know?</label>
                                            <div class="col-sm-2 ">
                                                <select name="R2" id="R2" required="" class="form-control R2 select2">
                                                    <option value="">Please Select : </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="R3" class="col-sm-10">3.Been raped or sodomised?</label>
                                            <div class="col-sm-2 ">
                                                <select name="R3" id="R3" required="" class="form-control R3 select2">
                                                    <option value="">Please Select : </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="R4" class="col-sm-10">4.Had a stab wound or had an 
                                                accident needle stick injury e.g injection?</label>
                                            <div class="col-sm-2 ">
                                                <select name="R4" required="" id="gender" class="form-control R4 select2">
                                                    <option value="">Please Select : </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="R5" class="col-sm-10">5.Had any tatooing or body piercing e.g ear piercing?</label>
                                            <div class="col-sm-2 ">
                                                <select name="R5" required="" id="R5" class="R5 form-control R5 select2">
                                                    <option value="">Please Select : </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="R6" class="col-sm-10">6.Had a sexually transmitted disease(STD)?</label>
                                            <div class="col-sm-2 ">
                                                <select name="R6" required="" id="R6" class="R6 form-control R6 select2">
                                                    <option value="">Please Select : </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="R7" class="col-sm-10">7.Live with or had sexual contact 
                                                with someone with yellow eyes or yellow skin?</label>
                                            <div class="col-sm-2 ">
                                                <select name="R7"  required="" id="R7" class="form-control R7 select2">
                                                    <option value="">Please Select : </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="R8" class="col-sm-10">8.Had sexual activity with anyone besides your regular sex partner?</label>
                                            <div class="col-sm-2 ">
                                                <select name="R8" required="" id="R8" class="form-control R8 select2">
                                                    <option value="">Please Select : </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5 class="col-sm-12">Have you ever</h5>
                                        </div>


                                        <div class="form-group">
                                            <label for="R9" class="col-sm-10">9.Had yellow eyes or yellow skin?</label>
                                            <div class="col-sm-2 ">
                                                <select name="R9" required="" id="R9" class="form-control R9 select2">
                                                    <option value="">Please Select : </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="R10" class="col-sm-10">10.Injected yourself or been injected, besides in a health facility?</label>
                                            <div class="col-sm-2 ">
                                                <select name="R10" required="" id="R10" class="form-control R10 select2">
                                                    <option value="">Please Select : </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="R11" class="col-sm-10">11.Used non medical drugs such as Marijuana,Cocaine etc?</label>
                                            <div class="col-sm-2 ">
                                                <select name="R11" required="" id="R11" class="form-control R11 select2">
                                                    <option value="">Please Select : </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="R12" class="col-sm-10">12.Have you or your partner been tested for HIV?</label>
                                            <div class="col-sm-2 ">
                                                <select name="R12" required="" id="R12" class="form-control R12 select2">
                                                    <option value="">Please Select : </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="R13" class="col-sm-10">13.Do you consider your blood safe to transfuse to a patient?</label>
                                            <div class="col-sm-2 ">
                                                <select name="R13" required="" id="R13" class="form-control R13 select2">
                                                    <option value="">Please Select : </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>










                                    </div>
                                    <div class="box-footer divider">                                        
                                        <button type="button" class="btn btn-primary btn-sm pull-right move_to_declaration "><i class="fa fa-forward"></i>Next</button>
                                        <button type="button" class="btn btn-danger btn-sm pull-left back_to_health "><i class="fa fa-backward"></i>Back</button>
                                    </div><!-- /.box-footer -->

                                </div><!-- /.box-body -->
                            </div>

                            <!-- Risk QUestionnaire End -->

                            <!-- Declaration Start  -->

                            <div id="declaration" class="declaration" style="display: none;">
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">DECLARATION</h3>
                                    </div><!-- /.box-header -->
                                    <!-- form start -->

                                    <div class="box-body"> 
                                        <div class="form-group">
                                            <b><h5 class="col-sm-12"><p>DECLARATION</p></b>
                                            <p>I declare that the information I have given above is correct
                                                I understand that my blood will be tested for HIV, Hepatitis B & C, and syphilis and the results of my 
                                                tests may be obtained from the National Blood Transfusion service.
                                                I understand that the Kenya National Blood Transfusion Service may use any communication medium(s)
                                                to send me important information. Such medium(s) shall include but not limited to e-mail,post office,mobile telephoned
                                                and/or fixed telephone. I hereby give consent to KNBTS to use the contact details provided in this form to communicate 
                                                to me as the need may be.</p>
                                            <p></p>
                                            </h5>
                                        </div>

                                        <div class="form-group">
                                            <label for="weight" class="col-sm-10">Weight(kgs)</label>
                                            <div class="col-sm-2">

                                                <input type="text" required="" name="weight" id="weight" class="weight form-control" placeholder="Weight(kgs)">

                                            </div>                                                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="hb" class="col-sm-10">Hb >12.5g/dl</label>
                                            <div class="col-sm-2">

                                                <input type="text" required="" name="hb" id="hb" class="haemoglobin form-control" placeholder="Haemoglogin >12.5">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="bp" class="col-sm-7">BP</label>
                                            <div class="col-sm-2">

                                                <input type="text" required="" name="systolic_range" id="systolic_range" class="systolic_range form-control" placeholder="Systolic Range is 50-210">

                                            </div>
                                            <div class="col-sm-1">
                                                <h5>/</h5>
                                            </div>
                                            <div class="col-sm-2">

                                                <input type="text" required="" name="diastolic_range" id="diastolic_range" class="diastolic_range form-control" placeholder="Diastolic Range is 33-120">                                            

                                            </div>                                    
                                        </div>
                                        <div class="form-group">
                                            <label for="pulse" class="col-sm-10">Pulse</label>
                                            <div class="col-sm-2">

                                                <input type="text" required="" name="pulse" id="pulse" class="pulse form-control" placeholder="Pusle">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="volume" class="col-sm-10">Volume</label>
                                            <div class="col-sm-2">

                                                <input type="text" required="" name="volume" id="volume" class="volume form-control" placeholder="Volume">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="donor_accepted" class="col-sm-10">>1 Venepuncture</label>
                                            <div class="col-sm-2">

                                                <input type="text" required="" name="venepuncture" id="venepuncture" class="Venepuncture form-control" placeholder="Venepuncture">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="donor_accepted" class="col-sm-6">Hematoma</label>
                                            <div class="col-sm-3">                                        
                                                <input type="radio" class="flat-red" name="hematoma"> Yes                                             </div>
                                            <div class="col-sm-3">

                                                <input type="radio" class="flat-red" name="hematoma">No

                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label for="donor_accepted" class="col-sm-10">Faint</label>
                                            <div class="col-sm-2">
                                                <select name="faint" required="" id="faint" class="form-control faint select2">
                                                    <option value="">Please select : </option>
                                                    <option value="Mild">Mild</option>
                                                    <option value="Moderate">Moderate</option>
                                                    <option value="Severe">Severe</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="donor_accepted" class="col-sm-10">Donor Status</label>
                                            <div class="col-sm-2">
                                                <select name="donor_status" required="" id="donor_status" class="form-control donor_status select2">
                                                    <option value="">Please Select : </option>
                                                    <option value="Accepted">Accepted</option>
                                                    <option value="Rejected">Rejected</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="donor_accepted" class="col-sm-2">Report</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control counselor_report" required="" id="counselor_report" name="counselor_report"  placeholder=" Interviewer's Report">
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="donor_accepted" class="col-sm-2">Interviewer Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control counselor_name" required="" id="counselor_name" name="counselor_name"   placeholder="Interviewer"/>

                                            </div>
                                        </div>  



                                    </div>
                                    <div class="box-footer divider">                                        
                                        <button type="submit" class="btn btn-primary btn-sm pull-right "><i class="fa fa-save"></i>Donate</button>
                                        <button type="button" class="btn btn-danger btn-sm pull-left back_to_risk "><i class="fa fa-backward"></i>Back</button>
                                    </div><!-- /.box-footer -->
                                </div><!-- /.box-body -->
                            </div>


                            <!-- Declaration End  -->
                        </form>
                        <!-- Questionnaire Form End  -->








                        <!-- left column -->

                        <!-- right column -->


                    </div><!--/.col (right) -->       




                    </form>
            </div><!-- /.box -->
            <!-- general form elements disabled -->


            <!-- /.box-body -->
        </div>

    </div>   <!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.1.0
    </div>
    <strong>Copyright &copy; 2016<a href=""></a>.</strong> All rights reserved.
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

        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
        <!-- Settings tab content -->

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
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>

<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>

<!-- SweetAlert Js  -->
<script src="<?php echo base_url(); ?>assets/dist/js/sweetalert.min.js"></script>




<script>
    $(document).ready(function () {

        $(".cancel_enrol_donor").click(function () {
            $(".recruit_potential_donor").hide();
            $(".enrol_new_donor").hide();
            $(".donation_search_div").show();
            $(".risk_questionnaire").hide();
            $(".health_questionnaire").hide();
            $(".declaration").hide();
        });
        $(".cancel_recruit_donor").click(function () {

            $(".recruit_potential_donor").hide();
            $(".enrol_new_donor").hide();
            $(".donation_search_div").show();
            $(".risk_questionnaire").hide();
            $(".health_questionnaire").hide();
            $(".declaration").hide();
        });
        $(".add_new_donor").click(function () {


            $(".recruit_potential_donor").hide();
            $(".enrol_new_donor").show();
            $(".donation_search_div").hide();
            $(".risk_questionnaire").hide();
            $(".health_questionnaire").hide();
            $(".declaration").hide();
        });
        $(".back_to_search").click(function () {



            $(".recruit_potential_donor").hide();
            $(".enrol_new_donor").hide();
            $(".donation_search_div").show();
            $(".risk_questionnaire").hide();
            $(".health_questionnaire").hide();
            $(".declaration").hide();
        });
        $(".back_to_health").click(function () {




            $(".recruit_potential_donor").hide();
            $(".enrol_new_donor").hide();
            $(".donation_search_div").hide();
            $(".risk_questionnaire").hide();
            $(".health_questionnaire").show();
            $(".declaration").hide();
        });
        $(".back_to_risk").click(function () {




            $(".recruit_potential_donor").hide();
            $(".enrol_new_donor").hide();
            $(".donation_search_div").hide();
            $(".risk_questionnaire").show();
            $(".health_questionnaire").hide();
            $(".declaration").hide();
        });
        $(".move_to_risk").click(function () {

            $(".recruit_potential_donor").hide();
            $(".enrol_new_donor").hide();
            $(".donation_search_div").hide();
            $(".risk_questionnaire").show();
            $(".health_questionnaire").hide();
            $(".declaration").hide();
        });
        $(".move_to_declaration").click(function () {

            $(".recruit_potential_donor").hide();
            $(".enrol_new_donor").hide();
            $(".donation_search_div").hide();
            $(".risk_questionnaire").hide();
            $(".health_questionnaire").hide();
            $(".declaration").show();
        });
        $(".recruit_potential_donor_btn").click(function () {
            $(".recruit_potential_donor").show();
            $(".enrol_new_donor").hide();
            $(".donation_search_div").hide();
            $(".risk_questionnaire").hide();
            $(".health_questionnaire").hide();
            $(".declaration").hide();
        });
        //Initialize Select2 Elements
        $(".select2").select2();
        //Date range picker
        $('.lst_dntn_dte').datepicker({dateFormat: 'dd-M-yy'});
        $('.dntn_dte').datepicker({dateFormat: 'dd-M-yy'});



        $(document).on('click', ".edit_donor_btn", function () {
            //get data
            var hidden_donor_id = $(this).closest('tr').find('input[name="hidden_donor_id"]').val();

            $(".edit_donor_id").val(hidden_donor_id);
            $.ajax({
                type: "GET",
                url: "<?php echo base_url(); ?>home/get_donor_details/" + hidden_donor_id,
                dataType: "JSON",
                success: function (data) {

                    $(".edit_blood_group").val(data[0].blood_group);
                    $(".edit_accept_consent").val(data[0].consent);
                    $(".edit_dob").val(data[0].dob);
                    $(".edit_home_phone").val(data[0].home_no);
                    $(".edit_cell_phone").val(data[0].cell_no);
                    $(".edit_county_residence").val(data[0].residence);
                    $(".edit_email").val(data[0].email);
                    $(".edit_fname").val(data[0].sname);
                    $(".edit_gender").val(data[0].gender);
                    $(".edit_national_id").val(data[0].id_no);
                    $(".edit_othermobilisingpartner").val(data[0].recruiter);
                    $(".edit_othernames").val(data[0].oname);
                    $(".edit_recruiter").val(data[0].recruiter);
                    $(".edit_sname").val(data[0].sname);
                    $(".edit_surname").val(data[0].sname);
                    $(".edit_status").val(data[0].marital_status);
                    $(".edit_user_id").val(data[0].id);
                    $(".edit_education_level").val(data[0].education_level);
                    $(".edit_donor_no").val(data[0].donor_no);
                    $(".edit_postal_address").val(data[0].address);



                    $(".edit_donor_details_modal").modal('show');
                    $(".questionnaire_div").hide();
                    $(".health_questionnaire").hide();
                    $(".recruit_potential_donor").hide();
                    $(".enrol_new_donor").hide();
                    $(".donation_search_div").hide();
                    $(".risk_questionnaire").hide();
                    $(".declaration").hide();

                }

            });


        });



        $(".cancel_update_donor").click(function () {

            $(".edit_donor_details_modal").modal('hide');
            $(".questionnaire_div").hide();
            $(".health_questionnaire").hide();
            $(".recruit_potential_donor").hide();
            $(".enrol_new_donor").hide();
            $(".donation_search_div").show();
            $(".risk_questionnaire").hide();
            $(".declaration").hide();


        });




        $(document).on('click', ".select_donor_btn", function () {
            //get data
            var hidden_donor_id = $(this).closest('tr').find('input[name="hidden_donor_id"]').val();
            console.log("Hidden Donor ID : " + hidden_donor_id);
            $(".current_donor_id").val(hidden_donor_id);
            $(".donation_search_div").hide();
            $(".questionnaire_div").show();
            $(".health_questionnaire").show();
        });




        $('#save_questionnaire_form').submit(function (event) {
            dataString = $("#save_questionnaire_form").serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>home/donate_blood",
                data: dataString,
                success: function (data) {


                }

            });
            event.preventDefault();
            return false;
        });




        $('#enroll_new_donor_form').submit(function (event) {
            dataString = $("#enroll_new_donor_form").serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>home/enroll_new_donor",
                data: dataString,
                success: function (data) {

                    if (data === "true") {




                        swal({
                            title: "Success!",
                            text: "Donor created successfully!",
                            type: "success",
                            showCancelButton: false,
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "Okay",
                            closeOnConfirm: true
                        },
                        function () {

                            $(".questionnaire_div").show();
                            $(".health_questionnaire").show();
                            $(".recruit_potential_donor").hide();
                            $(".enrol_new_donor").hide();
                            $(".donation_search_div").hide();
                            $(".risk_questionnaire").hide();
                            $(".declaration").hide();



                        });


                    } else if (data === false) {
                        swal("Grrrr!", "" + data + "", "error");
                    } else {
                        swal("Ooops!", "" + data + "", "warning");
                    }


                }
            });
            event.preventDefault();
            return false;
        });
        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    });
</script>





<!-- Datatables JS  -->
<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.0/js/responsive.bootstrap.min.js"></script>






<script type="text/javascript">
    var j = jQuery.noConflict();
    j(document).ready(function () {



        function create_results_layout() {

            var value = j(".search_value").val();
            j.ajax({
                type: 'GET',
                url: "<?php echo base_url(); ?>home/search_donor/" + value,
                dataType: 'JSON',
                "dataSrc": "results",
                success: function (results) {
                    var check_data = jQuery.isEmptyObject(results);
                    if (check_data === true) {
                        j(".search_results_div").hide();
                        j(".enrol_recruit_button_div").show();
                    } else {
                        j(".enrol_recruit_button_div").hide();
                        j(".search_results_div").empty();
                        j('.dataTables_processing').dataTable().fnDestroy();
                        var table = '<table class=" dataTables_processing  table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"> <thead> <tr> <th>Name</th> <th>ID No :</th> <th>Cell No : </th><th>Home No : </th> <th>Gender : </th><th>Blood Group : </th> <th>Enroll Potential Donor</th> <th>Edit Potential Donor</th>  </tr> </thead>  \n\
               <tbody id="results_tbody" class="results_tbody"> </tbody> </table>';
                        j('.search_results_div').append(table);

                        j.each(results, function (i, donors) {


                            var tr_results = "<tr><td>" + donors.sname + "  " + donors.oname + "</td><td>" + donors.id_no + "</td><td>" + donors.cell_no + "</td><td>" + donors.home_no + "</td><td>" + donors.gender_name + "</td><td>" + donors.blood_name + "</td><td><input type='hidden' id='hidden_donor_id' class=' hidden_donor_id form-control' name='hidden_donor_id' value='" + donors.donor_id + "'/><button class='btn btn-xs btn-default select_donor_btn' id='select_donor_btn' data-original-title='Select Donor'><i class='fa fa-hand-pointer-o'></i></button></td>   <td><input type='hidden' id='hidden_donor_id' class=' hidden_donor_id form-control' name='hidden_donor_id' value='" + donors.donor_id + "'/><button class='btn btn-xs btn-default edit_donor_btn' id='edit_donor_btn' data-original-title='Edit Donor Details'><i class='fa fa-pencil-square-o'></i></button></td></tr>";
                            j(".results_tbody").append(tr_results);
                            j(".search_results_div").show();
                        });
                        j('.dataTables_processing').DataTable({});
                    }
                }
            });
        }

        j(".search_value").keyup(function () {

            if (!j("input[name='donor_search']:checked").val()) {
                alert('Nothing is checked!, Please select one of the Search Parameters...');
            } else {
                create_results_layout();
            }
        });



        j('.recruit_potential_donor_form').submit(function (event) {
            dataString = j(".recruit_potential_donor_form").serialize();
            j.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>home/recruit_donor",
                data: dataString,
                success: function (data) {
                    swal("Success!", "Donor enrolled successfully!", "success");



                    j(".questionnaire_div").hide();
                    j(".health_questionnaire").hide();
                    j(".recruit_potential_donor").hide();
                    j(".enrol_new_donor").hide();
                    j(".donation_search_div").show();
                    j(".risk_questionnaire").hide();
                    j(".declaration").hide();

                }

            });
            event.preventDefault();
            return false;
        });








        j('.edit_donor_details_form').submit(function (event) {
            dataString = j(".edit_donor_details_form").serialize();
            j.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>home/edit_donor_details",
                data: dataString,
                success: function (data) {
                    $(".edit_donor_details_modal").modal('hide');

                    if (data === "true") {
                        swal("Success!", "Donor details updated successfully!", "success");

                    } else if (data === "false") {
                        swal("Success!", "Something went wrong ....That's all we know :) ", "success");
                    }

                    create_results_layout();

                    j(".questionnaire_div").hide();
                    j(".health_questionnaire").hide();
                    j(".recruit_potential_donor").hide();
                    j(".enrol_new_donor").hide();
                    j(".donation_search_div").show();
                    j(".risk_questionnaire").hide();
                    j(".declaration").hide();


                }

            });
            event.preventDefault();
            return false;
        });














    });
</script>

</body>
</html>
