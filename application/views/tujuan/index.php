<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tujuan</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('tujuan/add'); ?>" class="btn btn-success btn-sm">Tambah</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Nama</th>
						<th>Aksi</th>
                    </tr>
                    <?php foreach($tujuan as $t){ ?>
                    <tr>
						<td><?php echo $t['nama']; ?></td>
						<td>
                            <a href="<?php echo site_url('tujuan/edit/'.$t['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Ubah</a> 
                            <a href="<?php echo site_url('tujuan/remove/'.$t['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Hapus</a>
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
