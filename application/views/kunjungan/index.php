<div class="row">
    <div class="col-md-12">
        <div class="box">
            <!-- <div class="box-header">
                <h3 class="box-title">Kunjungan Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('kunjungan/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div> -->
            <div class="box-body">
                <div class="row">


            <div class="box-body" >
              <div style="margin-left: 79%;">
                <?php echo form_open('kunjungan/search') ?>
                  <input type="text" name="keyword" placeholder="search">
                   <button type="submit" class="btn btn-warning pull-right"><i class="fa fa-search"></i></button> 
                <?php echo form_close() ?>
              </div>
                <table class="table table-striped">
                    <tr>
						<th>Tanggal</th>
						<th>Nama</th>
						<th>No Hp</th>
                        <th>Instansi</th>
                        <th>Tujuan</th>
                        <th>Email</th>
						<th>Keterangan</th>
						<th>Aksi</th>
                    </tr>
                    <?php foreach($kunjungan as $k){ ?>
                    <tr>
						<td><?php echo $k['tanggal']; ?></td>
						<td><?php echo $k['nama']; ?></td>
						<td><?php echo $k['no_hp']; ?></td>
                        <td><?php echo $k['instansi']; ?></td>
                        <td>
                            <?php 
                                $CI =& get_instance();
                                $CI->load->model('Tujuan_model');
                                $result= $CI->Tujuan_model->get_tujuan($k['id_tujuan']);        
                                echo $result['nama'];
                            ?>
                        </td>
                        <td><?php echo $k['email']; ?></td>
						<td><?php echo $k['keterangan']; ?></td>
						<td>
                            <a href="<?php echo site_url('kunjungan/edit/'.$k['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('kunjungan/remove/'.$k['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
