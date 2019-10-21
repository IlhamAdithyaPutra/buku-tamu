<!doctype html>
<html>

<head>
    <title>Buku Tamu</title>
     <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
     <!-- Bootstrap 3.3.6 -->
     <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css');?>">
     <!-- Font Awesome -->
     <link rel="stylesheet" href="<?php echo site_url('resources/css/font-awesome.min.css');?>">
     <!-- Ionicons -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
     <!-- Datetimepicker -->
     <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap-datetimepicker.min.css');?>">
     <!-- Theme style -->
     <link rel="stylesheet" href="<?php echo site_url('resources/css/AdminLTE.min.css');?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo site_url('resources/css/_all-skins.min.css');?>">
    <style type="text/css">
        body {
            background: #1f8dd6;
            color: #df4231;
            font-family: Arial;
        }
        
        h2 {
            margin-bottom: -5px;
        }
        
        p {
            font-size: 1.5em;
            color: #c9c9c9;
        }
        
        table {
            background: #ffffff;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
        }
        
        tr {
            height: 35px;
        }
        
        textarea {
            width: 348px;
            height: 100px;
            padding: 10px;
            font-family: Arial;
            font-size: 12px;
        }
        
        input.nama {
            background: url(images/user.png)no-repeat 7px 9px;
            border: 1px solid #c9c9c9;
            border-radius: 3px;
            height: 25px;
            padding: 8px;
            padding-left: 37px;
            margin-bottom: 8px;
            transition: 1s all;
            -moz-transition: 1s all;
            -o-transition: 1s all;
        }
        
        input.alamat {
            background: url(images/maps.png)no-repeat 7px 9px;
            border: 1px solid #c9c9c9;
            border-radius: 3px;
            height: 25px;
            padding: 8px;
            padding-left: 37px;
            margin-bottom: 8px;
            transition: 1s all;
            -moz-transition: 1s all;
            -o-transition: 1s all;
        }
        
        input.email {
            background: url(images/mail.png)no-repeat 7px 9px;
            border: 1px solid #c9c9c9;
            border-radius: 3px;
            height: 25px;
            padding: 8px;
            padding-left: 37px;
            margin-bottom: 8px;
            transition: 1s all;
            -moz-transition: 1s all;
            -o-transition: 1s all;
        }
        
        input.kota {
            background: url(images/kota.png)no-repeat 7px 9px;
            border: 1px solid #c9c9c9;
            border-radius: 3px;
            height: 25px;
            padding: 8px;
            padding-left: 37px;
            margin-bottom: 8px;
            transition: 1s all;
            -moz-transition: 1s all;
            -o-transition: 1s all;
        }
        
        input:focus {
            border: 1px solid #26C281;
            transition: 1s all;
            -moz-transition: 1s all;
            -o-transition: 1s all;
        }
        
        .button {
            background: #df4231;
            color: #ffffff;
            width: 370px;
            margin-top: 10px;
            height: 40px;
            border: 1px solid #c9c9c9;
            border-radius: 5px;
            transition: 1s all;
            -moz-transition: 1s all;
            -o-transition: 1s all;
        }
        
        .button:hover {
            background: #19B5FE;
            transition: 1s all;
            -moz-transition: 1s all;
            -o-transition: 1s all;
        }
        
        .button-gambar {
            height: 35px;
        }
    </style>
</head>

<body>
    <!-- <form name="form1" enctype="multipart/form-data" method="post" action="FormSimpan.php"> -->
    <?php echo form_open('home/index'); ?>
        <div align="center"></div>
        <table width="366" border="0" align="center">
            <tr>
                <td colspan="2">
                    <div align="center">
                        <h2>BUKU TAMU</h2>
                        <p>.....................................................</p>
                    </div>
                </td>
            </tr>

            <?php   
                if(isset($_message)) $this->load->view($_message);
            ?>
          <!--   <tr>
                <td width="350">
                    <div class="col-md-12">
                        <label for="tanggal" class="control-label"><span class="text-danger">*</span>Tanggal</label>
                        <div class="form-group">
                            <input type="text" name="tanggal" value="<?php echo $this->input->post('tanggal'); ?>" class="has-datetimepicker form-control" id="tanggal" />
                            <span class="text-danger"><?php echo form_error('tanggal');?></span>
                        </div>
                    </div>
                </td>
            </tr> -->
            <tr>
                <td>
                    <div class="col-md-12">
                        <label for="nama" class="control-label"><span class="text-danger">*</span>Nama</label>
                        <div class="form-group">
                            <input type="text" name="nama" value="<?php echo $this->input->post('nama'); ?>" class="form-control" id="nama" />
                            <span class="text-danger"><?php echo form_error('nama');?></span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-md-12">
                        <label for="no_hp" class="control-label"><span class="text-danger">*</span>No Hp</label>
                        <div class="form-group">
                            <input type="number" name="no_hp" value="<?php echo $this->input->post('no_hp'); ?>" class="form-control" id="no_hp" />
                            <span class="text-danger"><?php echo form_error('no_hp');?></span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-md-12">
                        <label for="instansi" class="control-label"><span class="text-danger">*</span>Instansi</label>
                        <div class="form-group">
                            <input type="text" name="instansi" value="<?php echo $this->input->post('instansi'); ?>" class="form-control" id="instansi" />
                            <span class="text-danger"><?php echo form_error('instansi');?></span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-md-12">
                        <label for="id_tujuan" class="control-label"><span class="text-danger">*</span>Tujuan</label>
                        <div class="form-group">
                            <select name="id_tujuan" class="form-control">
                                <?php 
                                foreach($all_tujuan as $tujuan)
                                {
                                    $selected = ($tujuan['id'] == $this->input->post('id_tujuan')) ? ' selected="selected"' : "";

                                    echo '<option value="'.$tujuan['id'].'" '.$selected.'>'.$tujuan['nama'].'</option>';
                                } 
                                ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('id_tujuan');?></span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-md-12">
                        <label for="keterangan" class="control-label"><span class="text-danger">*</span>Keterangan</label>
                        <div class="form-group">
                            <input type="text" name="keterangan" value="<?php echo $this->input->post('keterangan'); ?>" class="form-control" id="keterangan" />
                            <span class="text-danger"><?php echo form_error('keterangan');?></span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-md-12">
                        <label for="email" class="control-label">Email</label>
                        <div class="form-group">
                            <input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
                            <span class="text-danger"><?php echo form_error('email');?></span>
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <div align="center">
                        <input class="button" type="submit" name="submit" value="Simpan"> </div>
                </td>
            </tr>

        </table>
    <?php echo form_close(); ?>

    <!-- jQuery 2.2.3 -->
    <script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js');?>"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo site_url('resources/js/bootstrap.min.js');?>"></script>
    <!-- FastClick -->
    <script src="<?php echo site_url('resources/js/fastclick.js');?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo site_url('resources/js/app.min.js');?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo site_url('resources/js/demo.js');?>"></script>
    <!-- DatePicker -->
    <script src="<?php echo site_url('resources/js/moment.js');?>"></script>
    <script src="<?php echo site_url('resources/js/bootstrap-datetimepicker.min.js');?>"></script>
    <script src="<?php echo site_url('resources/js/global.js');?>"></script>
</body>

</html>  

