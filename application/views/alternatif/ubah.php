<div class="content-wrapper">
    <section class="content"> 
        <?php foreach ($alternatif_model as $alternatif_model) { ?>
         <?php echo form_open_multipart('Alternatif/update'); ?>
        
        <div class="form-groub">
            <label>Nama Alternatif</label>
            <input type="hidden" name="id_alternatif" class="form-control" value="<?php echo $alternatif_model->id_alternatif ?>">
            <input type="text" name="nama_alternatif" class="form-control" value="<?php echo $alternatif_model->nama_alternatif ?>">
        </div>
       

            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <?php echo form_close(); ?>
        
        <?php } ?>
        </section>
</div>
