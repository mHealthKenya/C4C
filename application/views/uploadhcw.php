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
            <li class="active">Upload</li>
        </ol>
    </section>

    <div id="user_table_div" class="user_table_div">


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                   
                    <div class="donation_search_div" id="donation_search_div">
                            <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                         <h3 class="box-title">Upload Data</h3>
                                    </div><!-- /.box-header -->  
                        <br>

                        <?php if (!empty($error)): ?>
                            <div class="alert alert-error"><?php echo $error; ?></div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('success') == TRUE): ?>
                            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                        <?php endif; ?>


                        <div class="form-group">               
                                <?php echo $error; ?>
                                <?php echo form_open_multipart('home/csv'); ?>
                                <input type="file" name="userfile" size="20" />
                                <br />
                                <input type="submit" value="upload" class="btn btn-primary"/>
                                </form>                           
                        </div>
                               
                           
                        
                    
                    <div class="box">
                        <div class="box-header">

                            <h3 class="box-title">Uploaded Health Care Workers</h3>

                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>

                                    <tr>
                                        <th>No. </th>
                                        <!-- <th>First Name</th>
                                        <th>Last Name</th> -->
                                        <th>Cadre</th>
                                        <th>Gender</th>
                                        <!-- <th>Mobile Number</th>                                         -->
                                        <th>Date Of Birth</th>
                                       
                                        
                                    </tr>

                                </thead>
                                <tbody class="user_data" id="user_data">
                                    <?php
                                    $i = 1;
                                    foreach ($PartnerHcw as $value) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <!-- <td><?php echo $value['f_name']; ?></td>
                                            <td><?php echo $value['l_name']; ?></td> -->
                                            <td><?php echo $value['cadre']; ?></td>
                                            <td><?php echo $value['gender']; ?></td>
                                            <!-- <td><?php echo $value['mobile_no']; ?></td>                                           -->
                                            <td><?php echo $value['DOB']; ?></td>
                                           
                                            
                                          
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No. </th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Cadre</th>
                                        <th>Gender</th>
                                        <th>Mobile Number</th>                                        
                                        <th>Date Of Birth</th>
                                     
                                    </tr>
                                </tfoot>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div>




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

    





</script>
</body>
</html>


