<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>M-Lab | Reset Password</title>
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
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">
        <!-- SweetAlert Js  -->
        <link rel="stylesheet"  href="<?php echo base_url(); ?>assets/dist/css/sweetalert.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="<?php echo base_url(); ?>"><b>m</b>Lab</a>
            </div><!-- /.login-logo -->
            <div class="login-box-body login_form_div" id="login_form_div">
                <p class="login-box-msg">Reset password using the form below!</p>
                <form id="login_form" class="password_reset_form" method="post">

                <div class="form-group has-feedback">
                <label for="new_password" class="col-xs-12 control-label ">Confirm Email</label>
                        <input type="email" required="" name="email" class="form-control" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group">
                                <label for="new_password" class="col-xs-12 control-label ">New Password </label>
                    
                                    <input type="password" pattern=".{6,20}" required title="password requires more than 6 characters" class="form-control new_password password" name="new_password" id="new_password" placeholder="New Password... ">
                     
                            </div>

                            <div class="form-group">
                                <label for="confirm_new_password" class="col-xs-12 control-label">Confirm Password </label>
                              
                                    <input type="password"  pattern=".{6,20}" required title="password requires more than 6 characters" class="form-control confirm_new_password password" name="confirm_new_password" id="confirm_new_password" placeholder="Confirm Password... ">
                            </div> 
                    <div class="row">

                       <div class="btn_div" style="display: none;">
                            <button type="submit" class="btn btn-info pull-right">Reset Password</button>

                    </div>
                    </div>
                </form>

              
            </div><!-- /.login-box-body -

        </div><!-- /.login-box -->

        <!-- jQuery 2.1.4 -->
        <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>

        <!-- SweetAlert Js  -->
        <script src="<?php echo base_url(); ?>assets/dist/js/sweetalert.min.js"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });



            $(document).ready(function () {
                

                 $(".password").keyup(function () {
                    var password = $("#new_password").val();
                    var password2 = $("#confirm_new_password").val();
                    if (password == password2) {
                        $(".btn_div").show();
                    } else {
                        $(".btn_div").hide();
                    }
    });

         $('.password_reset_form').submit(function (event) {
                    dataString = $(".password_reset_form").serialize();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>login/password_reset",
                        data: dataString,
                        success: function (data) {

                            console.log(data);
                            if (data == "Reset Successful!!") {
                                swal({
                                    title: "Reset Success!",
                                    text: "You will be redirected to your Home page in a few.",
                                    imageUrl: '<?php echo base_url(); ?>assets/dist/img/thumbs-up.jpg'
                                });

                                setTimeout(function () {
                                   
                                    window.location.href = "<?php echo base_url(); ?>";
                                }, 3000);
                          
                            }else if (data == "Email does not exist!!") {
                               
                                swal("Oops","User does not exist","error");
                            }
                            else if (data == "Recover failed"){
                                swal("Oops", "An error was encountered", "error");
                            }
                        }

                    });
                    event.preventDefault();
                    return false;
                });


            });
        </script>
    </body>
</html>
