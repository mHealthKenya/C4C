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
            <li><a href="#">Table</a></li>            
            <li class="active">HCWs</li>
        </ol>
    </section>

    <div class="form-group">


    </div>

    <div id="county_table_div" class="county_table_div">


        <section class="content col-lg-12">
            <div class="row">
                <div class="col-xs-12"> 
                    <div class="box">
                        <div class="box-header">   
                            Filter Raw Data
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data"  action="<?php echo site_url('home/filter_registrations'); ?>">
                                
                                 <?php
                                    if ( $_SESSION['user_level'] < '4') {//                                                
                                        ?>                                        

                                        


                                        <div class="form-group">
                                            <label for="user_status" class="col-sm-2 control-label">County</label>
                                            <div class="col-sm-10">
                                                <select class="form-control county" name="county" id="county" >
                                                    <option value="">Select County:</option>

                                                    <?php foreach ($counties as $county):
                                                        ?>
                                                       <option value="<?php echo $county['name']; ?> "><?php echo $county['name']; ?>  </option>
                                                        <?php
                                                    endforeach;
                                                    ?>
                                                </select>
                                            </div>
                                        </div>                                  


                                        <?php
                                    }
                                    ?>


                                     
                                        <div class="form-group">
                                            <label for="user_status" class="col-sm-2 control-label">Date From:</label>
                                            <div class="col-sm-10">
                                                <!--<input type="date" class="form-control add_user_name" name="dob" id="dob">-->
                                                <input type="text" name="from_date" required=""  readonly="" id="from_date" class="form-control from_date " placeholder="Click to select: "/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="user_status" class="col-sm-2 control-label">Date To:</label>
                                            <div class="col-sm-10">
                                                <!--<input type="date" class="form-control add_user_name" name="dob" id="dob">-->
                                                <input type="text" name="to_date" required=""  readonly="" id="to_date" class="form-control to_date " placeholder="Click to select: "/>
                                            </div>
                                        </div>


 



                                

                                <div class="col-md-1"></div>
                                <div class="col-auto my-1">
                                    <button type="submit" class="submit btn btn-primary btn-lg btn-block">Filter</button>
                                </div>


                            </form>

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

<!-- Date Picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.css" />

<!-- page script -->
<script>
//    $(".filter_dashboard").click(function () {
//
//        var county = $(".filter_county").val();
//
//        var date_from = $(".date_from").val();
//        var date_to = $(".date_to").val();
//
//        filterdata(county, date_from, date_to);
//
//    });


//    function filterdata(county, date_from, date_to) {
//
//        console.log("county");
////        console.log(county);
////         console.log(date_from);
////         console.log(date_to);
//
//        $.ajax({
//
//            url: "<?php echo base_url(); ?>home/postclients/",
//            type: 'POST',
//            dataType: 'JSON',
//            data: {county: county, date_from: date_from, date_to: date_to},
//            success: function (data) {
//                console.log(data);
//                console.log("hapa");
//
//
//                $.each(data, function (i, item) {
//
//          var sex= item.gender;
//          var cadre= item.cadre;
//          //var num = parseInt(item.total);
//          // console.log(Jquery.type(num));
//          var tr_data = "<tr>\n\
//                      <td>" + sex + "</td><td>" + cadre + "</td>\n\
//                      </tr>";
//          $(".partner_data").append(tr_data);
//            }
//            }
//        });
//    }

//    $.ajax({
//        url: "<?php echo base_url(); ?>home/get_counties",
//        type: 'GET',
//        dataType: 'JSON',
//        success: function (data) {
//            $(".filter_county").empty();
//            var please_select = "<option value=''>Select County</option>";
//            $(".filter_county").append(please_select);
//            $.each(data, function (i, k) {
//                var option = "<option value=" + k.county_id + ">" + k.county_name + "</option>";
//                $(".filter_county").append(option);
//            });
//        }, error: function (error) {
//            console.error(error);
//        }
//    });


    var j = jQuery.noConflict();
    j(document).ready(function () {
        j('#mytable').on('processing.dt', function (e, settings, processing) {
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


<script type="text/javascript">
    var dtp = jQuery.noConflict();
    dtp(document).ready(function () {

    });


    var date_picker = jQuery.noConflict();
    date_picker(function () {


        date_picker(".from_date").datepicker({
            format: 'yyyy-mm-dd',
            endDate: '+0d',
            autoclose: true
        });


        date_picker(".to_date").datepicker({
            format: 'yyyy-mm-dd',
            endDate: '+0d',
            autoclose: true
        });

    });</script>

    <script type="text/javascript">
        var date_picker = jQuery.noConflict();
    date_picker(function () {
        date_picker(".to_date").datepicker({
            format: 'yyyy-mm-dd',
            endDate: '+0d',
            autoclose: true
        });

    });
     var date_picker = jQuery.noConflict();
    date_picker(function () {
        date_picker(".from_date").datepicker({
            format: 'yyyy-mm-dd',
            endDate: '+0d',
            autoclose: true
        });

    });
    

    </script>

</body>
</html>
