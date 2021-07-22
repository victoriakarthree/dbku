<div class="content-wrapper">
	<section class="content"> 
		<?php foreach ($guru as $guru) { ?>
		 <?php echo form_open_multipart('guru/update'); ?>
		
		<div class="form-groub">
			<label>Nip</label>
			<input type="hidden" name="id" class="form-control" value="<?php echo $guru->id ?>">
            <input type="number" max="100000000000" name="nip" class="form-control" value="<?php echo $guru->nip ?>"><br/>
			
		</div>
		<div class="form-groub">
        		<label> Nama guru </label>
        		<input type="text" name="nama" class="form-control" value="<?php echo $guru->nama_guru ?>">
        	</div>
        	<div class="form-groub">
        		<label> Jabatan </label>
        		<input type="text" name="jabatan" class="form-control" value="<?php echo $guru->jabatan ?>"><br/>
        	</div>
        	<div class="form-groub">
        		<label> No telp </label>
        		 <input type="number" max="10000000000" name="notelp" class="form-control" value="<?php echo $guru->no_telp ?>"><br/>
        	</div>

        	<div class="form-groub">
        		<label> Alamat </label>
        		<input type="text" name="alamat" class="form-control" value="<?php echo $guru->alamat ?>"><br/>
        	</div>

             <div class="form-groub">
                <label> Upload Foto </label>
                <input type="file" name="foto" class="form-control"><br/>
            </div>

			<button type="reset" class="btn btn-danger">Reset</button>
        	<button type="submit" class="btn btn-primary">Simpan</button>
            <?php echo form_close(); ?>
		
		<?php } ?>
		</section>
</div>
