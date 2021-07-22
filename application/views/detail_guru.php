
<div class="content-wrapper">
	<section class="content">
		<h4><strong>DETAIL DATA GURU</strong></h4>
		<table class="table">
			
			<tr>
				<th>NIP</th>
				<td><?php echo $detail_guru->nip?></td>
			</tr>
			<tr>
				<th>Nama Lengkap</th>
				<td><?php echo $detail_guru->nama_guru?></td>
			</tr>
			<tr>
				<th>Jabatan</th>
				<td><?php echo $detail_guru->jabatan?></td>
			</tr>
			<tr>
				<th>No Telephon</th>
				<td><?php echo $detail_guru->no_telp?></td>
			</tr>
			<tr>
				<th>Alamat</th>
				<td><?php echo $detail_guru->alamat?></td>
			</tr>

			<tr>
				<td>
					<img src="<?php echo base_url(); ?>assets/foto/<?php echo $detail_guru->foto; ?>" width="90" height="110">
				</td>
			</tr>
		</table>

		<a href="<?php echo base_url('guru/index/'); ?>" class="btn btn-primary"> Kembali</a>
	</section>
</div>