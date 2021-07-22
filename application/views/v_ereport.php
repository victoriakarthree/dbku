<div class="content-wrapper">
    
    <section class="content-header">
      <h1>
        Data E-Report
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data E-Report</li>
      </ol>
    </section>

    <section class="content">
        <button class= "btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>  Tambah Data E-Report</button>
        <table class="table">


            <tr>
                <th>No</th>
                <th>Nis</th>
                <th>Nama Siswa</th>
                <th>Tanggal</th>
                <th>Kelas</th>
                <th>Keterangan Laporan</th>
                <th>Pelapor</th>
                <th>Sanksi</th>
                <th>Level</th>
                <th colspan="2">AKSI</th>
            </tr>
            <?php 

            $no=1;
            foreach($ereport as $ereport):?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $ereport->nis ?></td>
                    <td><?php echo $ereport->nama_siswa ?></td>
                    <td><?php echo $ereport->tanggal ?></td>
                    <td><?php echo $ereport->kelas ?></td>
                    <td><?php echo $ereport->ket_laporan ?></td>
                    <td><?php echo $ereport->pelapor ?></td>
                    <td><?php echo $ereport->sanksi ?></td>
                    <td><?php echo $ereport->level ?></td>
                    <td onclick="javascript: return confirm('Anda Yakin Hapus Data Siswa ini ?')"><?php echo anchor('ereport/hapus/'.$ereport->id, '<div class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></div>') ?></td>
                    <td><?php echo anchor('ereport/edit/'.$ereport->id,'<div class="btn btn-primary btn-sm" ><i class="fa fa-edit"></i></div>') ?>
                    </td>
                 
                </tr>

            <?php endforeach; ?> 
        </table>
        
    </section>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">FORM INPUT DATA E-REPORT</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('ereport/tambah_aksi'); ?>
            <div class="form-groub">
                <label> NIS </label>
                <input type="number" max="100000000" name="nis" class="form-control"><br/>
                
            </div>
            <div class="form-groub">
                <label> Nama Siswa </label>
                <input type="text" name="nama" class="form-control"><br/>
            </div>
            <div class="form-groub">
                <label> Tanggal Laporan </label>
                <input type="date" name="tanggal" class="form-control"><br/>
            </div>
            <div class="form-groub">
                <label> Kelas</label>
                <input type="text"  name="kelas" class="form-control">
                <br/>
            </div>
            <div class="form-groub">
                <label> Keterangan Laporan</label>
                <input type="text" name="ket_laporan"class="form-control"><br/>
            </div>

            <div class="form-groub">
                <label> Pelapor </label>
                <input type="text" name="pelapor" class="form-control"><br/>
            </div>

            <div class="form-groub">
                <label> Sanksi </label>
                <textarea type="text" name="sanksi" class="form-control"></textarea><br/>
            </div>

            <div class="form-groub">
                <label> level</label>
                <input type="text" name="level" class="form-control"><br/>
            </div>

            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
            <button type="Sumbit" class="btn btn-primary">Simpan</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
</div>