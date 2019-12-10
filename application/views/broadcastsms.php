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
            <li class="active">Broadcast</li>
        </ol>
    </section>

    <div id="user_table_div" class="user_table_div">


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <button class="btn btn-default add_broadcast_button" id="add_broadcast_button"><i class="fa fa-plus"></i>Create A Broadcast </button>

                    <div class="box">
                        <div class="box-header">

                            <h3 class="box-title">Broadcast SMS </h3>

                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>

                                    <tr>
                                        <th>No. </th>
                                        <th>Broadcast Name</th>
                                        <th>Text</th>
                                        <!-- <th>County</th> -->
                                      <!--   <th>Sub-County</th>
                                        <th>Facility</th>                                        
                                        <th>Cadre</th>
                                        <th>Send Date</th>
                                        <th>Date Created</th> -->
                                        <?php if ($_SESSION['user_level'] < 3) { ?>
                                            <!-- <th>Edit</th> -->
                                        <?php } ?>
                                    </tr>

                                </thead>
                                <tbody class="user_data" id="user_data">
                                    <?php
                                    $i = 1;
                                    foreach ($broadcast as $value) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $value['broadcastname']; ?></td>
                                            <td><?php echo $value['msg']; ?></td>
                                            <!-- <td><?php echo $value['county']; ?></td>
                                            <td><?php echo $value['sub_county']; ?></td>
                                            <td><?php echo $value['facility']; ?></td> -->                                          
                                            <!-- <td><?php echo $value['cadre']; ?></td>
                                            <td><?php echo $value['sms_datetime']; ?></td>
                                            <td><?php echo $value['date_created']; ?></td>
                                            <?php if ($_SESSION['user_level'] < 3) { ?> -->



<!-- 
                                                <td>
                                                    <input type="hidden" name="hidden_user_id" class="hidden_user_id form-control" id="hidden_user_id" value="<?php echo $value['id']; ?>"/>
                                                    <button class='btn btn-xs btn-default edit_user_btn' data-original-title='Edit User'><i class='fa fa-pencil'></i></button>

                                                </td> -->
                                            <?php } ?>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                                
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div>

    <!--Create broadcast Start -->

    <!-- Modal -->
    <div id="b_Modal" class="modal fade add_broadcast_div" role="dialog">
        <form class="form-horizontal add_broadcast_form" id="add_broadcast_form">

            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Create a new Broadcast</h4>
                    </div>
                    <div class="modal-body">

                        <div class="box-body">
                            <!--                            <div class="form-group">
                                                            <label for="Name" class="col-sm-2 control-label">Select Cadre : </label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control fname" name="name" id="name" placeholder="Name ">
                                                            </div>
                                                        </div>-->

                            <!--                            <div class="form-group">
                                                            <label for="cadre" class="col-sm-2 control-label">Select Cadre</label>
                                                            <div class="col-sm-10">
                                                                <label class="checkbox-inline" >
                            <?php foreach ($subcountypatients as $spatients):
                                ?>
                                                                                                                                <p><p>
                                                                                                                                    <input type="checkbox" value="<?php echo $spatients['cadre']; ?>" name="cadre">
                                <?php echo $spatients['cadre']; ?>
                                <?php
                            endforeach;
                            ?>
                                                                </label>
                                                            </div>
                                                        </div>  -->



                            <div class="form-group">
                                <label for="county_name" class="col-sm-2 control-label">Select Cadre</label>
                                <div class="col-sm-10">
                                    <select  name="cadre" id="cdre" multiple="multiple">
                                        <?php foreach ($cadre as $cadres):
                                            ?>
                                            <option ><?php echo $cadres['name']; ?> <?php $cadres['id']; ?>   </option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>




                            <div class="form-group">
                                <label for="county_name" class="col-sm-2 control-label">Select County</label>
                                <div class="col-sm-10"> 
                                    <select  name="county" id="cty_id" onchange="getsubcounty()" multiple="multiple">

                                        <?php foreach ($counties as $county):
                                            ?>
                                            <option ><?php echo $county['name']; ?><?php $county['id']; ?>  </option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="county_name" class="col-sm-2 control-label">Select Sub County</label>
                                <div class="col-sm-10">
                                    <select  name="county" id="sub_county" onchange="getfacility()" multiple="multiple">              

                                    </select>
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="county_name" class="col-sm-2 control-label">Select Facility</label>
                                <div class="col-sm-10">
                                    <select  name="facility" id="facility" multiple="multiple">                                      
                                    </select>
                                </div>
                            </div>

                            <input type="hidden"  value="<?php echo $_SESSION['user_id']; ?>" id="uid">
                            <input type="hidden"  value="<?php echo $_SESSION['county_id']; ?>" id="cid">
                            <input type="hidden"  value="<?php echo $_SESSION['sub_county_id']; ?>" id="sbctyid">
                            <input type="hidden"  value="<?php echo $_SESSION['user_level']; ?>" id="ulvl">
                            <div class="form-group">
                                <label for="User Name" class="col-sm-2 control-label">Send On </label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control add_user_name"  name="sms_datetime" id="add_broadcast_date"
                                           required="" minlength="1">
                                </div>

                            </div>


                            <div class="form-group">
                                <label for="Phone No" class="col-sm-2 control-label" >Broadcast SMS: </label>
                                <div class="col-sm-10">
<!--                                                                <textarea rows="4" cols="50"  form="usrform" required="" minlength="1" maxlength="160" class="form-control msg"
                                              placeholder="Type text to be sent" oninvalid="this.setCustomValidity('Please type text! ')"
                                              oninput="setCustomValidity('')" placeholder="Type text to be broadcasted here" name="msg" ></textarea> -->
                                    <textarea rows="4" cols="50" id="mysms"  name="msg" required="" minlength="1" maxlength="160"  placeholder="Type text to be broadcasted here"></textarea>
                                </div>
                            </div>

                            <!--                            <div class="form-group">
                                                            <label for="Broadcast_name" class="col-sm-2 control-label">Broadcast SMS:</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control broadcast_name" name="msg"  required="" minlength="1" maxlength="60" id="broadcast_name" placeholder="Type the name of Broadcast">
                                                            </div>
                                                        </div>-->

                            <div class="form-group">
                                <label for="Broadcast_name" class="col-sm-2 control-label">Broadcast Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control broadcast_name" name="broadcastname"  required="" minlength="1" maxlength="60" id="broadcast_name" placeholder="Type the name of Broadcast">
                                </div>
                            </div>




                        </div><!-- /.box-body -->

                    </div>
                    <div class="modal-footer">
                        <button type="submit"  class="btn btn-info pull-right">Create</button>
                        <button type="button" class="btn btn-default pull-left  " data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>


        </form>
    </div>




    <!-- Create broadcast End -->


    <!-- Edit Broadcast Start -->
    <!-- Modal -->
    <div id="myModal" class="modal fade edit_user_div" role="dialog">
        <form class="form-horizontal edit_broadcast_form" id="edit_user_form">

            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Broadcast</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" required="" class="edit_user_id form-control" id="edit_user_id"/>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="Name" class="col-sm-2 control-label">Broadcast Name </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control edit_name" name="name" id="edit_name" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Name" class="col-sm-2 control-label">Broadcast Message </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control edit_user_name" name="bmsg" id="edit_user_name" placeholder="Name">
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="county_name" class="col-sm-2 control-label">Broadcast Status </label>
                                <div class="col-sm-10">

                                    <select class="form-control edit_county" name="ap_status" id="add_sub_county_id" placeholder="County ">
                                        <option value="">Please select : </option>

                                        <option value=1>Approved</option>
                                        <option value="2">Rejected</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Phone No" class="col-sm-2 control-label">Comment: </label>
                                <div class="col-sm-10">
                                    <input type="textarea" class="form-control edit_name" name="comment" id="edit_name" >
                                </div>
                            </div>

                            <!-- textarea -->


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
<script src="<?php echo base_url(); ?>assets/dist/js/multiple-select.min.js"></script>



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

<script>

                                        function getsubcounty() {

                                            var ct = {county: $("#cty_id").val()};
                                            console.log("the selected is " + ct);

                                            $.ajax({
                                                url: "<?php echo base_url('home/getmysubcounties') ?>",
                                                type: "post",
                                                dataType: "json",
                                                data: ct,
                                                success: function (data) {
                                                    console.log("the subcounties are:");
                                                    console.log(data);
                                                    var options = '<option value="" disabled selected></option>';
                                                    for (var y = 0; y < data.length; y++) {

                                                        options += '<option value="' + data[y] + '">' + data[y] +
                                                                '</option>';

                                                    }


                                                    $('#sub_county')
                                                            .html(options);

                                                    $(function () {
                                                        $('#sub_county').change(function () {
                                                            console.log($(this).val());
                                                            //   getfacility($this.val());
                                                        }).multipleSelect({
                                                            width: '100%',
                                                            filter: true
                                                        });
                                                    });


                                                },
                                                error: function () {

                                                    alert("error occured getting subcounties");
                                                    $('#facility')
                                                            .html(options);

                                                }
                                            });
                                        }



                                        function getfacility() {

                                            var sb = {sub_county: $("#sub_county").val()};
                                            console.log("the selected is " + sb);

                                            $.ajax({
                                                url: "<?php echo base_url('home/getmyfacilities') ?>",
                                                type: "post",
                                                dataType: "json",
                                                data: sb,
                                                success: function (data) {
                                                    console.log("the facilities are:");
                                                    console.log(data);
//                                        var options = '<option value="" disabled selected>Select Facility</option>';
                                                    var options = '';
                                                    for (var y = 0; y < data.length; y++) {


                                                        options += '<option value="' + data[y] + '">' + data[y] +
                                                                '</option>';
                                                    }

                                                    $('#facility').html(options);

                                                    $(function () {
                                                        $('#facility').change(function () {
                                                            console.log($(this).val());
                                                        }).multipleSelect({
                                                            width: '100%',
                                                            filter: true
                                                        });
                                                    });
                                                },
                                                error: function () {

                                                    alert("error occured getting subcounties");
                                                    $('#facility')
                                                            .html(options);

                                                }
                                            });
                                        }


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

        $('.add_broadcast_form').submit(function (event) {
            var cadre = $("#cdre").val();
            var cty = $("#cty_id").val();
            var sbcty = $("#sub_county").val();
            var facility = $("#facility").val();
            var bdate = $("#add_broadcast_date").val();
            var sms = $("#mysms").val();
            var bname = $("#broadcast_name").val();
            var uid = $("#uid").val();
            var cid = $("#cid").val();
            var sbctyid = $("#sbctyid").val();
            var ulvl = $("#ulvl").val();

            var mydata = {cadrev: cadre, ctyv: cty, sbctyv: sbcty, ftyv: facility, bdatev: bdate, smsv: sms, bnamev: bname, uidv: uid, cidv: cid, sbctyidv: sbctyid, ulvlv: ulvl};

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>home/create_new_broadcast",
                dataType: "json",
                data: mydata,
                success: function (data) {
                    console.log(data)
                   $(".add_broadcast_div").modal("hide");
                    swal("Success!", "Broadcast created succesfully!!", "success");
                }

            });












            event.preventDefault();
            return false;
        });




        $(".add_broadcast_button").click(function () {
            $(".add_broadcast_div").modal('show');
        });


        $('.edit_broadcast_form').submit(function (event) {
            dataString = $(".edit_broadcast_form").serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>home/edit_broadcast",
                data: dataString,
                success: function (data) {

                    swal("Success!", "Broadcast updated succesfully!!", "success");


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
        $(".close_edit_modal").click(function () {
            $(".user_table_div").show();
        });

        $(document).on('click', ".edit_user_btn", function () {
//get data
            var user_id = $(this).closest('tr').find('input[name="hidden_user_id"]').val();
            $(".modal_loading").show();

            $.ajax({
                type: "GET",
                url: "<?php echo base_url(); ?>home/get_broadcast/" + user_id,
                dataType: "json",
                success: function (response) {



                    $('#edit_user_id').val(response[0].id);
                    $('#edit_name').val(response[0].broadcastname);
                    $('#edit_user_name').val(response[0].msg);
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


    $(function () {
        $('#cty_id').change(function () {
        }).multipleSelect({
            width: '100%',
            filter: true
        });
    });

    $(function () {

        $("#cdre").change(function () {

        }).multipleSelect({
            width: '100%',
            filter: true
        });

    });







</script>
</body>
</html>


