<div class="content-wrapper">
    
    <section class="content-header">
      <h1>
        Data Alternatif
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Altrnstif</li>
      </ol>
    </section>

    <section class="content">
        <button class= "btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>  Tambah Data Alternatif</button>
        <table class="table">


            <tr>
                <th> Id Alternatif</th>
                <th> Nama Alternatif</th>
                
                <th colspan="2">AKSI</th>
            </tr>
            <?php 

            $no=1;
            foreach($alternatif_model as $alternatif_model):?>
                <tr>
                    <td><?php echo $alternatif_model->id_alternatif ?></td>
                    <td><?php echo $alternatif_model->nama_alternatif ?></td>
                    
                    <td onclick="javascript: return confirm('Anda Yakin Hapus Data Siswa ini ?')"><?php echo anchor('alternatif/hapus/'.$alternatif_model->id_alternatif, '<div class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></div>') ?></td>
                    <td><?php echo anchor('alternatif/edit/'.$alternatif_model->id_alternatif,'<div class="btn btn-primary btn-sm" ><i class="fa fa-edit"></i></div>') ?>
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
        <?php echo form_open_multipart('alternatif/tambah_aksi'); ?>
            <div class="form-groub">
                <label> Nama alternatif </label>
                <input type="name"  name="nama_alternatif" class="form-control"><br/>
                
            </div>
            

            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
            <button type="Sumbit" class="btn btn-primary">Simpan</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
</div>