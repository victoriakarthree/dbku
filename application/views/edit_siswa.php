<div class="content-wrapper">
	<section class="content"> 
		<?php foreach ($siswa as $siswa) { ?>
		 <?php echo form_open_multipart('siswa/update'); ?>
		
		<div class="form-groub">
			<label>Nama Siswa</label>
			<input type="hidden" name="id" class="form-control" value="<?php echo $siswa->id ?>">
			<input type="text" name="nama" class="form-control" value="<?php echo $siswa->nama_siswa ?>">
		</div>
		<div class="form-groub">
        		<label> NISN </label>
        		<input type="number" max="100000000" name="nisn" class="form-control" value="<?php echo $siswa->nisn ?>"><br/>
        	</div>
        	<div class="form-groub">
        		<label> Jurusan </label>
        		<select name="jurusan" class="form-control" value="<?php echo $siswa->jurusan ?>">
        		<option>TKJ</option>
    			<option>ATPH</option>
    			<option>TBSM</option>
    			<option>OTKP</option>
    			</select><br/>
        	</div>
        	<div class="form-groub">
        		<label> Tanggal lahir </label>
        		<input type="date" name="ttl" class="form-control" value="<?php echo $siswa->tanggal_lahir ?>"><br/>
        	</div>
        	<div class="form-groub">
        		<label> Jenis Kelamin </label>
        		<select name="jenkel" class="form-control" value="<?php echo $siswa->jenis_kel ?>">
        		<option>perempuan</option>
    			<option>laki-laki</option>
    			</select><br/>
        	</div>
        	<div class="form-groub">
        		<label> Agama </label>
        		<select name="agama" class="form-control" value="<?php echo $siswa->agama ?>">
        		<option>Islam</option>
    			<option>Protestan</option>
    			<option>Katolik</option>
    			<option>Hindu</option>
    			<option>Buddha</option>
    			<option>Khonghucu</option>
    			</select><br/>
        	</div>

        	<div class="form-groub">
        		<label> Nama Ayah </label>
        		<input type="text" name="namaayah" class="form-control" value="<?php echo $siswa->nama_ayah ?>"><br/>
        	</div>

        	<div class="form-groub">
        		<label> Alamat </label>
        		<input type="text" name="alamat" class="form-control" value="<?php echo $siswa->alamat ?>"><br/>
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
