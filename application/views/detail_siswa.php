
<div class="content-wrapper">
	<section class="content">
		<h4><strong>DETAIL DATA SISWA</strong></h4>
		<table class="table">
			<tr>
				<th>Nama Lengkap</th>
				<td><?php echo $detail_siswa->nama_siswa?></td>
			</tr>
			<tr>
				<th>NISN</th>
				<td><?php echo $detail_siswa->nisn?></td>
			</tr>
			<tr>
				<th>Jurusan</th>
				<td><?php echo $detail_siswa->jurusan?></td>
			</tr>
			<tr>
				<th>Tanggal_Lahir</th>
				<td><?php echo $detail_siswa->tanggal_lahir?></td>
			</tr>
			<tr>
				<th>Jenis Kelamin</th>
				<td><?php echo $detail_siswa->jenis_kel?></td>
			</tr>
			<tr>
				<th>Agama</th>
				<td><?php echo $detail_siswa->agama?></td>
			</tr>
			<tr>
				<th>Nama Ayah</th>
				<td><?php echo $detail_siswa->nama_ayah?></td>
			</tr>
			<tr>
				<th>Alamat</th>
				<td><?php echo $detail_siswa->alamat?></td>
			</tr>

			<tr>
				<td>
					<img src="<?php echo base_url(); ?>assets/foto/<?php echo $detail_siswa->foto; ?>" width="90" height="110">
				</td>
			</tr>
		</table>

		<a href="<?php echo base_url('siswa/index/'); ?>" class="btn btn-primary"> Kembali</a>
	</section>
</div>