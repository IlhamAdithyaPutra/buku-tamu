<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Kunjungan Add</h3>
            </div>
            <?php echo form_open('kunjungan/add'); ?>
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
									$selected = ($tujuan['id'] == $this->input->post('id_tujuan')) ? ' selected="selected"' : "";

									echo '<option value="'.$tujuan['id'].'" '.$selected.'>'.$tujuan['id'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('id_tujuan');?></span>
						</div>
					</div>
					<!-- <div class="col-md-6">
						<label for="tanggal" class="control-label"><span class="text-danger">*</span>Tanggal</label>
						<div class="form-group">
							<input type="text" name="tanggal" value="<?php echo $this->input->post('tanggal'); ?>" class="has-datepicker form-control" id="tanggal" />
							<span class="text-danger"><?php echo form_error('tanggal');?></span>
						</div>
					</div> -->
					<div class="col-md-6">
						<label for="nama" class="control-label"><span class="text-danger">*</span>Nama</label>
						<div class="form-group">
							<input type="text" name="nama" value="<?php echo $this->input->post('nama'); ?>" class="form-control" id="nama" />
							<span class="text-danger"><?php echo form_error('nama');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="no_hp" class="control-label"><span class="text-danger">*</span>No Hp</label>
						<div class="form-group">
							<input type="text" name="no_hp" value="<?php echo $this->input->post('no_hp'); ?>" class="form-control" id="no_hp" />
							<span class="text-danger"><?php echo form_error('no_hp');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="email" class="control-label">Email</label>
						<div class="form-group">
							<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="instansi" class="control-label">Instansi</label>
						<div class="form-group">
							<input type="text" name="instansi" value="<?php echo $this->input->post('instansi'); ?>" class="form-control" id="instansi" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>