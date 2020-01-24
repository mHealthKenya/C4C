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

            <div class="create_broadcast">
                <form class="form-horizontal broadcast_form" >

                        <div class="form-group">
                                <label for="cadre" class="col-sm-2 control-label">Select Cadre</label>
                                <select name="cadres[]" multiple="multiple">
                                <?php foreach ($cadres as $cadre):
                                            ?>
                                    <option value="<?php echo $cadre['id']; ?>"><?php echo $cadre['name']; ?></option>
                                            <?php
                                        endforeach;
                                        ?>
                                </select>
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
                                    <textarea rows="4" cols="50" id="mysms"  name="msg" required="" minlength="1" maxlength="160"  placeholder="Type text to be broadcasted here"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Broadcast_name" class="col-sm-2 control-label">Broadcast Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control broadcast_name" name="broadcastname"  required="" minlength="1" maxlength="60" id="broadcast_name" placeholder="Type the name of Broadcast">
                                </div>
                            </div>




                        </div><!-- /.box-body -->
                        <div class="form-group">
                            <div class="col-sm-10">
                                <?php echo count($hcws) ?> HCWs Selected
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit"  class="btn btn-info pull-right">Create</button>
                        <button type="button" class="btn btn-default pull-left  " data-dismiss="modal">Close</button>
                    </div>
                </div>

                  

                </form>
            </div>

        

            </div><!-- /.content-wrapper -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css" />

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


            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js"></script>
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

            </body>
            </html>


