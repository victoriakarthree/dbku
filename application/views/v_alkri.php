<div class="content-wrapper">

    <section class="content">

    <div class="box-header with-border">
        <h3 class="box-title">Tambah Data Subkriteria</h3>
    </div>

      <div class="box-header with-border">
        <h3 class="box-title">Data Kriteria</h3>
    </div>

 <div class="box-body"> 

            <table class="table">


            <tr>
                <th> Id Alternatif</th>
                <th> Nama Alternatif</th>
                
            </tr>
            <?php 

            $no=1;
            foreach($alternatif_model as $alternatif_model):?>
                <tr>
                    <td><?php echo $alternatif_model->id_alternatif ?></td>
                    <td><?php echo $alternatif_model->nama_alternatif ?></td>
                    
                 
                </tr>

            <?php endforeach; ?> 
        </table>
        
<table class="table">

            <tr>
                <th>No</th>
                <th>Id Kriteria</th>
                <th>Kode Kriteria</th>
                <th>Nama Kriteria</th>
                <th>Bobot</th>
                <th>Type</th>

                
            </tr>
            <?php 

            $no=1;
            foreach($kriteria_model as $kriteria_model):?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $kriteria_model->id_kriteria ?></td>
                    <td><?php echo $kriteria_model->kode_kriteria ?></td>
                    <td><?php echo $kriteria_model->nama_kriteria ?></td>
                    <td><?php echo $kriteria_model->bobot ?></td>
                    <td><?php echo $kriteria_model->tipe ?></td>
                    
                </tr>

            <?php endforeach; ?> 
        </table>
    </div>

    

    <div class="box-body"> 
        <table class="table">

            <tr>
                <th>Id Subkriteria</th>
                <th>Id Kriteria</th>
                <th>Nama SubKriteria</th>
                <th>Bobot</th>
            </tr>
            <?php 

            $no=1;
            foreach($subkriteria_model as $subkriteria_model):?>
                <tr>
                    
                    <td><?php echo $subkriteria_model->id_subkriteria ?></td>
                    <td><?php echo $subkriteria_model->id_kriteria ?></td>
                    <td><?php echo $subkriteria_model->nama_subkriteria ?></td>
                    <td><?php echo $subkriteria_model->bobot ?></td>
                </tr>

            <?php endforeach; ?> 
        </table>
    </div>

<div class="box-body"> 
        <table class="table">

            <tr>
                <th>ID Alkri</th>
                <th>ID Alternatif</th>
                <th>ID Kriteria</th>
                <th>ID SubKriteria</th>
                <th colspan="2">AKSI</th>
            </tr>
            <?php 

            $no=1;
            foreach($m_alkri as $m_alkri):?>
                <tr>
                    <td><?php echo $m_alkri->id ?></td>
                    <td><?php echo $m_alkri->id_alternatif ?></td>
                    <td><?php echo $m_alkri->id_kriteria ?></td>
                    <td><?php echo $m_alkri->id_subkriteria ?></td>
                    <td onclick="javascript: return confirm('Anda Yakin Hapus Data Siswa ini ?')"><?php echo anchor('alkri/hapus/'.$m_alkri->id, '<div class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></div>') ?></td>
                    <td><?php echo anchor('alkri/edit/'.$m_alkri->id,'<div class="btn btn-primary btn-sm" ><i class="fa fa-edit"></i></div>') ?>
                    </td>
                </tr>

            <?php endforeach; ?> 
        </table>
    </div>
   
<div class="box-body">
       
         <?php echo form_open_multipart('alkri/tambah_aksi'); ?>
        
            <div class="form-groub">
                <label> Id Alternatif </label>
                <input type="text" name="id_alternatif" class="form-control" >
                <br/>
            </div>
            <div class="form-groub">
                <label> Id Kiteria</label>
                <input type="text"  name="id_kriteria" class="form-control"><br/>
            </div>
             <div class="form-groub">
                <label> Id Subkriteria</label>
                <input type="text"  name="id_subkriteria" class="form-control"><br/>
            </div>
            
            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
            <button type="Sumbit" class="btn btn-primary">Simpan</button>
        <?php echo form_close(); ?>
        
        
    </div>
  
</section>
</div>