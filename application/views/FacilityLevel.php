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
            <li><a href="#">Reports</a></li>            
            <li class="active">All</li>
        </ol>
    </section>

    <div class="form-group">

        <?php if (($_SESSION['user_level'] == 1) || ($_SESSION['user_level'] == 2)) { ?>

        <?php } ?>


    </div>

    <div id="county_table_div" class="county_table_div">


       







        <!--County selected  <?php echo $county; ?>-->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12"> 



                    <div class="box">
                        <div class="box-header">                           


                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <?php
                            $client_ip_addess = $_SERVER['REMOTE_ADDR'];



                            $username = 'viewer'; // Username  
                            // if ($_SERVER['REMOTE_ADDR'] == "41.215.81.58") {
                            //     $server = 'http://192.168.0.7/trusted';  // Tableau URL  
                            // } else {

                            //     $server = 'https://tableau.mhealthkenya.co.ke/trusted';  // Tableau URL  
                            // }
                                                            $server = 'https://tableau.mhealthkenya.co.ke/trusted';  // Tableau URL  



                            $access_level = $this->session->userdata('user_level');
                            $limit = '';
                            if ($access_level === '1' || $access_level === '2') {

                                $view = "/views/c4cdash_4/SummaryPage_?iframeSizedToWindow=true&:embed=y&:showAppBanner=false&:display_count=no&:showVizHome=no";  // View URL 
                            }
                            if ($access_level === '3') {
                                $county = $this->session->userdata('county');
                                $embeded_url .= "&County=" . $county;

                               $view = "/views/c4cdash_5/CountySummaryPage_?iframeSizedToWindow=true&:embed=y&:showAppBanner=false&:display_count=no&:showVizHome=no.$embeded_url";  // View URL  
                            }
                            if ($access_level === '4') {
                                $sub_county = $this->session->userdata('sub_county');
                                $embeded_url .= "&sub_county=" . $sub_county;

                                $view = "/views/c4cdash_6/SubCountySummaryPage_?iframeSizedToWindow=true&:embed=y&:showAppBanner=false&:display_count=no&:showVizHome=no.$embeded_url";  // View URL  
                            }
                            if ($access_level === '5') {
                                $facility = $this->session->userdata('facility');
                                $embeded_url .= "&facility=" . $facility;

                                $view = "/views/c4cdash_8/FacilitySummaryPage_?iframeSizedToWindow=true&:embed=y&:showAppBanner=false&:display_count=no&:showVizHome=no.$embeded_url";  // View URL  
                            }
                            if ($access_level === '6') {
                                $partner = $this->session->userdata('partner_name');
                                $embeded_url .= "&Partner=" . $partner;

                                $view = "/views/c4cdash_15/PartnerSummaryPage_?iframeSizedToWindow=true&:embed=y&:showAppBanner=false&:display_count=no&:showVizHome=no.$embeded_url";  // View URL 
                            }
                            $ch = curl_init($server); // Initializes cURL session 


                            $data = array('username' => $username); // What data to send to Tableau Server  



                            curl_setopt($ch, CURLOPT_POST, true); // Tells cURL to use POST method  
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // What data to post  
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return ticket to variable 
                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);

                            curl_setopt($ch, CURLOPT_DNS_USE_GLOBAL_CACHE, false);
                            curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 2);
                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

                            curl_setopt($ch, CURLOPT_DNS_USE_GLOBAL_CACHE, false);
                            curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 2);
                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);


                            //curl_close($ch); // Close cURL session  
                            $ticket = curl_exec($ch); // Execute cURL function and retrieve ticket

                            $err = curl_error($ch);

                            curl_close($ch);

                            if ($err) {
                                echo "cURL Error #:" . $err;
                            } else {
                                
                            }





                            $clnd_view = str_replace(' ', '%20', $view);
                            $url = $server . '/' . $ticket . '/' . $clnd_view;
                            ?>  


                            <iframe src="<?= $server ?>/<?= $ticket ?>/<?= $view ?>" width="100%" height="652px;" ></iframe> 


                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->





    <!--    <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2016 <a href=""></a>.</strong> All rights reserved.
        </footer>    -->

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



    var j = jQuery.noConflict();
    j(document).ready(function () {
        
    });




   

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
   </script>
</body>
</html>


































