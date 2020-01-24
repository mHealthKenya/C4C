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
        <embed src="/IPC/National Policy on Prevention and containment of Antimicrobial Resistance_ Jun 2017.pdf" type="application/pdf"   height="300px" width="100%" class="responsive">
<a href="/IPC/National Policy on Prevention and containment of Antimicrobial Resistance_ Jun 2017.pdf">download</a>
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
//var date_to = $(".date_to").val();

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

