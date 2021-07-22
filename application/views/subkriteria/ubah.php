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
                <th colspan="2">AKSI</th>

            </tr>
            <?php 

            $no=1;
            foreach($subkriteria_model as $subkriteria_model):?>
                <tr>
                    
                    <td><?php echo $subkriteria_model->id_subkriteria ?></td>
                    <td><?php echo $subkriteria_model->id_kriteria ?></td>
                    <td><?php echo $subkriteria_model->nama_subkriteria ?></td>
                    <td><?php echo $subkriteria_model->bobot ?></td>
                    <td onclick="javascript: return confirm('Anda Yakin Hapus Data Siswa ini ?')"><?php echo anchor('subkriteria/hapus/'.$subkriteria_model->id_subkriteria, '<div class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></div>') ?></td>
                    <td><?php echo anchor('subkriteria/ubah/'.$subkriteria_model->id_subkriteria,'<div class="btn btn-primary btn-sm" ><i class="fa fa-edit"></i></div>') ?>
                    </td>
                   
                    
                </tr>

            <?php endforeach; ?> 
        </table>
    </div>

   
   <section class="content"> 
        <?php foreach ($subkriteria as $subkriteria) { ?>
         <?php echo form_open_multipart('Subkriteria/update'); ?>
        
        <div class="form-groub">
            <label>ID Kriteria</label>
            <input type="hidden" name="id_subkriteria" class="form-control" value="<?php echo $subkriteria->id_subkriteria ?>">
            <input type="text" name="id_kriteria" class="form-control" value="<?php echo $subkriteria->id_kriteria ?>">
        </div><br/>
        <div class="form-groub">
                <label> Nama Subkriteria </label>
                <select type="text"  name="nama_subkriteria" class="form-control" value="<?php echo $subkriteria->nama_subkriteria ?>">
                <option>Istimewa</option>
                <option>Baik Sekali</option>
                <option>Baik</option>
                <option>Cukup</option>
                <option>Kurang</option>
                <option>Sangat Kurang</option>
                </select><br/>
           
        </div>

        <div class="form-groub">
                <label> Bobot</label>
                <input type="text"  name="bobot" class="form-control" value="<?php echo $subkriteria->bobot ?>"><br/>
        </div>
          
          

            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <?php echo form_close(); ?>
        
        <?php } ?>
        </section>

</section>
</div>