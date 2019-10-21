<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Ubah Kunjungan</h3>
            </div>
			<?php echo form_open('kunjungan/edit/'.$kunjungan['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_tujuan" class="control-label"><span class="text-danger">*</span>Tujuan</label>
						<div class="form-group">
							<select name="id_tujuan" class="form-control">
								<option value="">select tujuan</option>
								<?php 
								foreach($all_tujuan as $tujuan)
								{
									$selected = ($tujuan['id'] == $kunjungan['id_tujuan']) ? ' selected="selected"' : "";

									echo '<option value="'.$tujuan['id'].'" '.$selected.'>'.$tujuan['nama'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('id_tujuan');?></span>
						</div>
					</div>

					<?php echo date('d/m/Y H.i', strtotime($kunjungan['tanggal'])); ?>
					<div class="col-md-6">
						<label for="tanggal" class="control-label"><span class="text-danger">*</span>Tanggal</label>
						<div class="form-group">
							<input type="datetime-local" name="tanggal" value="<?php echo ($this->input->post('tanggal') ? $this->input->post('tanggal') : date('d/m/Y H.i', strtotime($kunjungan['tanggal']))); ?>" class="form-control" id="tanggal" />
							<span class="text-danger"><?php echo form_error('tanggal');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nama" class="control-label"><span class="text-danger">*</span>Nama</label>
						<div class="form-group">
							<input type="text" name="nama" value="<?php echo ($this->input->post('nama') ? $this->input->post('nama') : $kunjungan['nama']); ?>" class="form-control" id="nama" />
							<span class="text-danger"><?php echo form_error('nama');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="no_hp" class="control-label"><span class="text-danger">*</span>No Hp</label>
						<div class="form-group">
							<input type="text" name="no_hp" value="<?php echo ($this->input->post('no_hp') ? $this->input->post('no_hp') : $kunjungan['no_hp']); ?>" class="form-control" id="no_hp" />
							<span class="text-danger"><?php echo form_error('no_hp');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="keterangan" class="control-label"><span class="text-danger">*</span>Keterangan</label>
						<div class="form-group">
							<input type="text" name="keterangan" value="<?php echo ($this->input->post('keterangan') ? $this->input->post('keterangan') : $kunjungan['keterangan']); ?>" class="form-control" id="keterangan" />
							<span class="text-danger"><?php echo form_error('keterangan');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="email" class="control-label"><span class="text-danger">*</span>Email</label>
						<div class="form-group">
							<input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $kunjungan['email']); ?>" class="form-control" id="email" />
							<span class="text-danger"><?php echo form_error('email');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="instansi" class="control-label"><span class="text-danger">*</span>Instansi</label>
						<div class="form-group">
							<input type="text" name="instansi" value="<?php echo ($this->input->post('instansi') ? $this->input->post('instansi') : $kunjungan['instansi']); ?>" class="form-control" id="instansi" />
							<span class="text-danger"><?php echo form_error('instansi');?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Simpan
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>