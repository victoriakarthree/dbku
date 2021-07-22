<div class="content-wrapper">
	
	<section class="content-header">
      <h1>
        Data Mahasiswa
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Mahasiswa</li>
      </ol>
    </section>

    <section class="content">
    	<button class= "btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>  Tambah Data Siswa</button>
    	<table class="table">


    		<tr>
    			<th>No</th>
    			<th>Nama Siswa</th>
    			<th>NISN</th>
    			<th>Jurusan</th>
    			<th>Tanggal Lahir</th>
    			<th>Jenis kelamin</th>
    			<th>Agama</th>
    			<th>Nama ayah</th>
    			<th>Alamat</th>
    			<th colspan="2">AKSI</th>
    		</tr>
    		<?php 

    		$no=1;
    		foreach($siswa as $siswa):?>
    			<tr>
    				<td><?php echo $no++ ?></td>
    				<td><?php echo $siswa->nama_siswa ?></td>
    				<td><?php echo $siswa->nisn ?></td>
    				<td><?php echo $siswa->jurusan ?></td>
    				<td><?php echo $siswa->tanggal_lahir ?></td>
    				<td><?php echo $siswa->jenis_kel ?></td>
    				<td><?php echo $siswa->agama ?></td>
    				<td><?php echo $siswa->nama_ayah ?></td>
    				<td><?php echo $siswa->alamat ?></td>
                    <td><?php echo anchor('siswa/detail/'.$siswa->id,'<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>') ?></td>
    				<td onclick="javascript: return confirm('Anda Yakin Hapus Data Siswa ini ?')"><?php echo anchor('siswa/hapus/'.$siswa->id, '<div class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></div>') ?></td>
    				<td><?php echo anchor('siswa/edit/'.$siswa->id,'<div class="btn btn-primary btn-sm" ><i class="fa fa-edit"></i></div>') ?>
    				</td>
    			</tr>

    		<?php endforeach; ?> 
    	</table>
    	
    </section>

    <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">FORM INPUT DATA SISWA</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('siswa/tambah_aksi'); ?>
        	<div class="form-groub">
        		<label> Nama Siswa </label>
        		<input type="text" name="nama" class="form-control"><br/>
        	</div>
        	<div class="form-groub">
        		<label> NISN </label>
        		<input type="number" max="100000000" name="nisn" class="form-control"><br/>
        	</div>
        	<div class="form-groub">
        		<label> Jurusan </label>
        		<select name="jurusan" class="form-control">
        		<option>TKJ</option>
    			<option>ATPH</option>
    			<option>TBSM</option>
    			<option>OTKP</option>
    			</select><br/>
        	</div>
        	<div class="form-groub">
        		<label> Tanggal lahir </label>
        		<input type="date" name="ttl" class="form-control"><br/>
        	</div>
        	<div class="form-groub">
        		<label> Jenis Kelamin </label>
        		<select name="jenkel" class="form-control">
        		<option>perempuan</option>
    			<option>laki-laki</option>
    			</select><br/>
        	</div>
        	<div class="form-groub">
        		<label> Agama </label>
        		<select name="agama" class="form-control">
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
        		<input type="text" name="namaayah" class="form-control"><br/>
        	</div>

        	<div class="form-groub">
        		<label> Alamat </label>
        		<textarea type="text" name="alamat" class="form-control"></textarea><br/>
        	</div>

            <div class="form-groub">
                <label> Upload Foto </label>
                <input type="file" name="foto" class="form-control"><br/>
            </div>

	        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
	        <button type="Sumbit" class="btn btn-primary">Simpan</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>

</div>>