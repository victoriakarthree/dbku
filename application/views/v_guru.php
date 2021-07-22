<div class="content-wrapper">
	
	<section class="content-header">
      <h1>
        Data Guru
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Guru</li>
      </ol>
    </section>

    <section class="content">
    	<button class= "btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>  Tambah Data guru</button>
    	<table class="table">


    		<tr>
    			<th>No</th>
    			<th>NIP</th>
    			<th>Nama Guru</th>
    			<th>Jabatan</th>
    			<th>No Telephon</th>
    			<th>Alamat</th>
    			<th colspan="2">AKSI</th>
    		</tr>
    		<?php 

    		$no=1;
    		foreach($guru as $guru):?>
    			<tr>
    				<td><?php echo $no++ ?></td>
    				<td><?php echo $guru->nip ?></td>
    				<td><?php echo $guru->nama_guru ?></td>
    				<td><?php echo $guru->jabatan ?></td>
    				<td><?php echo $guru->no_telp ?></td>
    				<td><?php echo $guru->alamat ?></td>
                    <td><?php echo anchor('guru/detail/'.$guru->id,'<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>') ?></td>
    				<td onclick="javascript: return confirm('Anda Yakin Hapus Data Guru ini ?')"><?php echo anchor('guru/hapus/'.$guru->id, '<div class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></div>') ?></td>
    				<td><?php echo anchor('guru/edit/'.$guru->id,'<div class="btn btn-primary btn-sm" ><i class="fa fa-edit"></i></div>') ?>
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
        <h4 class="modal-title" id="exampleModalLabel">FORM INPUT DATA GURU</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('guru/tambah_aksi'); ?>
        	<div class="form-groub">
        		<label> NIP </label>
                <input type="number" max="100000000000" name="nip" class="form-control"><br/>
        	</div>
        	<div class="form-groub">
        		<label> Nama Guru</label>
        		<input type="text" name="nama" class="form-control"><br/>
        	</div>
        	<div class="form-groub">
        		<label> Jabatan </label>
        		<input type="text" name="jabatan" class="form-control"><br/>
        	</div>
        	<div class="form-groub">
        		<label> Nomor Telepon </label>
                  <input type="number" max="100000000000" name="notelp" class="form-control">
        		<br/>
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