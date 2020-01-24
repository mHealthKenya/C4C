<?php $this->load->view('ucsf_header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            <small></small>
        </h1> 
        <!--        <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Home</a></li>            
                    <li class="active">Registration Form</li>
                </ol>-->
    </section>

    <div id="hcw_div" class="hcw_div">



        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">                  

                    <!--                    <div class="box">
                                            <div class="box-header">
                                               
                    
                    
                                            </div> /.box-header 
                                            <div class="box-body">   -->




                    <form id="add_hcw_form" class="form-horizontal add_hcw_form" >
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <!--//<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                                    <h4 class="modal-title">C4C Registration Form</h4>
                                </div>
                                <div class="modal-body">

                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="First Name" class="col-sm-2 control-label">First Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" required="" class="form-control fname" name="fname" id="add_fname" placeholder="First Name ">
                                            </div>
                                        </div>




                                        <div class="form-group">
                                            <label for="User Name" class="col-sm-2 control-label">Last Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" required=""  class="form-control add_usr_name" name="lname" id="add_usr_name" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="User Name" class="col-sm-2 control-label">National ID/Passport Number</label>
                                            <div class="col-sm-10">
                                                <input type="tel" required="" minlength="8" maxlength="9" class="form-control add_usr_name" name="idno" id="idno" placeholder="Passport/National ID Number">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="Phone No" class="col-sm-2 control-label">Mobile No.</label>
                                            <div class="col-sm-10">
                                                <input type="tel"  required="" minlength="10" maxlength="10" class="form-control phone_no" name="phone_no" id="phone_no" placeholder="Input as 07XXXXXXXX"> </div>
                                        </div>                                                


                                        <div class="form-group">
                                            <label for="user_status" class="col-sm-2 control-label">Cadre</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select_partner_id" name="cadre_id" id="cadre_id" required="" ">
                                                    <option value="">Please select your Cadre:</option>

                                                    <?php foreach ($hcwcadre as $hcwcadres):
                                                        ?>
                                                        <option value="<?php echo $hcwcadres['id']; ?> "><?php echo $hcwcadres['name'];  ?>  </option>
                                                        <?php
                                                    endforeach;
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="user_status" class="col-sm-2 control-label">Gender</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select_partner_id" name="gender_id" id="gender_id" required="" >
                                                    <option value="">Please select your Gender </option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="user_status" class="col-sm-2 control-label">HBV Vaccination</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select_partner_id" name="hbv" id="hbv" required="" >
                                                    <option value="">Have you been vaccinated against HBV </option>
                                                    <option value="1">Yes</option>
                                                    <option value="2">Partially</option>
                                                    <option value="3">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="user_status" class="col-sm-2 control-label">Date Of Birth</label>
                                            <div class="col-sm-10">
                                                <!--<input type="date" class="form-control add_user_name" name="dob" id="dob">-->
                                                <input type="text" name="dob" required=""  readonly="" id="dob" class="form-control date_to " placeholder="Click to select date of birth : "/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="user_status" class="col-sm-2 control-label">MFL No.</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select_partner_id" name="facility_id" id="facility_id" required="" >
                                                    <option value="">Please Select Your Facility:</option>

                                                    <?php foreach ($mfl as $mfls):
                                                        ?>
                                                        <option value="<?php echo $mfls['code']; ?> "><?php echo $mfls['name']; ?>  </option>
                                                        <?php
                                                    endforeach;
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div><!-- /.box-body -->

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-secondary btn-lg btn-block ">Submit</button>
                                    <!--<button type="button" class="btn btn-secondary btn-lg btn-block">Danger</button>-->
                                </div>
                            </div>
                        </div>
                    </form>








                </div><!-- /.box-body -->
            </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->




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

    $(document).ready(function () {

        $('.add_hcw_form').submit(function (event) {
            dataString = $(".add_hcw_form").serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Welcome/check_no",
                data: dataString,
                success: function (data) {
                    console.log(data);
                    if (data == "Success") {

                        swal({
                            title: "Awesome!",
                            text: "You have registered to C4C successfully.",
                            imageUrl: '<?php echo base_url(); ?>assets/dist/img/thumbs-up.jpg'
                        });
                    } else if (data == "oops") {
                        //swal("Oops", "You are registered already to C4C!", "error");
                        swal({
                            title: "Oops!",
                            text: "You are registered already in C4C!",
                            imageUrl: '<?php echo base_url(); ?>assets/dist/img/oops.jpg'
                        });
                    }

                }

            });
            event.preventDefault();
            return false;
        });








    });

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.css" />



<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
    var dtp = jQuery.noConflict();
    dtp(document).ready(function () {
    });


    var date_picker = jQuery.noConflict();
    date_picker(function () {
        date_picker(".date_to").datepicker({
            format: 'yyyy-mm-dd',
            endDate: '+0d',
            autoclose: true
        });

    });</script>
</body>
</html>

