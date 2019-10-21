<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SIAP | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css');?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/font-awesome.min.css');?>">
        <!-- Admin LTE 2.0.5 -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/AdminLTE.css');?>">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/blue.css');?>">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login-page">
        <?php   if(isset($_errorlogin))
            $this->load->view($_errorlogin);
        ?>
        <div class="login-box">
            <div class="login-logo col-sm-12">
                
                <a href="#"><b>SIAP</b></a>
            </div><!-- /.login-logo -->
            <div class="login-box-body col-sm-12">
                <p class="login-box-msg">Sistem Informasi APBD</p>

                <form action="<?php echo site_url('auth/register') ?>" method="post">
                    <div class="form-group has-feedback">
                        <h5><span class="text-danger">*</span>Username</h5>
                        <input type="text" class="form-control" placeholder="*Username" id="username" name="username" />
                        <span class="text-danger"><?php echo form_error('username');?></span>
                    </div>
                    <div class="form-group has-feedback">
                        <h5><span class="text-danger">*</span>Password</h5>
                        <input type="password" class="form-control" placeholder="*Password" id="password" name="password" />
                        <span class="text-danger"><?php echo form_error('password');?></span>
                    </div>
                    <div class="form-group has-feedback">
                        <h5><span class="text-danger">*</span>Ulangi Password</h5>
                        <input type="password" class="form-control" placeholder="*Ulangi Password" id="repeat_password" name="repeat_password" />
                        <span class="text-danger"><?php echo form_error('repeat_password');?></span>
                    </div>
                    <div class="form-group has-feedback">
                        <h5>Nama</h5>
                        <input type="text" class="form-control" placeholder="Nama" id="nama" name="nama" />
                        <span class="text-danger"><?php echo form_error('nama');?></span>
                    </div>
                    <div class="form-group has-feedback">
                        <h5>Deskripsi</h5>
                        <input type="text" class="form-control" placeholder="Deskripsi" id="deskripsi" name="deskripsi" />
                        <span class="text-danger"><?php echo form_error('deskripsi');?></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8"> 

                        </div><!-- /.col -->
                        <div class="col-xs-4 text-center">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
                        </div><!-- /.col -->
                    </div>
                </form>

        </div><!-- /.login-box -->

        <!-- jQuery 2.2.3 -->
        <script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js');?>"></script>

        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo site_url('resources/js/bootstrap.min.js');?>"></script>
        <!-- iCheck -->
        <script src="<?php echo site_url('resources/js/icheck.min.js');?>"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
</html>