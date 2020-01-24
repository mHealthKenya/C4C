<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>C4C Log in</title>
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
                <a href="<?php echo base_url(); ?>"><b>C4C<b/></a>
            </div><!-- /.login-logo -->
            <div class="login-box-body login_form_div" id="login_form_div">
                <p class="login-box-msg">Sign in to start your session</p>
                <form id="login_form" class="login_form" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control username" placeholder="Email/User name" name="username" id="username">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control password" placeholder="Password" name="password" id="password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">

                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div><!-- /.col -->
                    </div>
                </form>



                <!--<a href="javascript:void(0)" id="forgot_password_link" class="forgot_password_link">I forgot my password</a><br>-->

            </div><!-- /.login-box-body -->







            <div class="login-box-body reset_password_div" id="reset_password_div" style="display: none;">
                <p class="login-box-msg">Reset Password</p>
                <form id="reset_password_form" class="reset_password_form" method="post">
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>

                    <div class="row">

                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat pull-left">Reset</button>

                        </div><!-- /.col -->
                    </div>
                </form>



                <a href="javascript:void(0)" id="show_login_page" class="show_login_page">Login</a><br>


            </div><!-- /.login-box-body -->






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
                $(".forgot_password_link").click(function () {
                    $(".reset_password_div").show();
                    $(".login_form_div").hide();
                });

                $(".show_login_page").click(function () {
                    $(".reset_password_div").hide();
                    $(".login_form_div").show();
                });



                $('.reset_password_form').submit(function (event) {
                    dataString = $(".reset_password_form").serialize();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>login/reset_password",
                        data: dataString,
                        success: function (data) {
                            //console.log(data);
                            if (data == "Reset Success") {
                                swal({
                                    title: "Reset Success!",
                                    text: "If you provided the  right email, reset instructions have been sent to your account.",
                                    imageUrl: '<?php echo base_url(); ?>assets/dist/img/thumbs-up.jpg'
                                });











                            } else if (data === "User does not exist") {
                                alert("User does not exist...");
                            } else if (data === "Wrong password") {
                                alert("Wrong password");
                            }

                        }

                    });
                    event.preventDefault();
                    return false;
                });



                $('.login_form').submit(function (event) {
                    dataString = $(".login_form").serialize();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>login/check_auth",
                        data: dataString,
                        success: function (data) {
                           data = data.trim();
                            if (data == "Login Success") {
                                swal({
                                    title: "Login Success!",
                                    text: "You will be redirected to your Home page in a few.",
                                    imageUrl: '<?php echo base_url(); ?>assets/dist/img/thumbs-up.jpg'
                                });

                                setTimeout(function () {
                                    window.location.href = "<?php echo base_url('Home/index'); ?>";

                                }, 3000);

                            }  else if (data == "Invalid User") {
                                
                                swal("Oops","User does not exist!","error");
                            } 
                            else if (data == "Account Inactive") {
                                
                                swal("Oops","Account Inactive! Please consult your  admin.","warning");
                            } else if (data == "Wrong Password") {
                                
                                swal("Oops","Wrong username/password","error");
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
