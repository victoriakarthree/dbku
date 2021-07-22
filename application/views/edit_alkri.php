<div class="content-wrapper">
    <section class="content"> 
        <?php foreach ($m_alkri as $m_alkri) { ?>
         <?php echo form_open_multipart('alkri/update'); ?>
        
        <div class="form-groub">
            <label>id alternatif</label>
            <input type="hidden" name="id" class="form-control" value="<?php echo $m_alkri->id ?>">
            <input type="text"  name="id_alternatif" class="form-control" value="<?php echo $m_alkri->id_alternatif ?>"><br/>
        </div>
        <div class="form-groub">
            <label> id kriteria </label>
            <input type="text" name="id_kriteria" class="form-control" value="<?php echo $m_alkri->id_kriteria ?>">
        </div>
          <div class="form-groub">
            <label> id subkriteria </label>
            <input type="text" name="id_subkriteria" class="form-control" value="<?php echo $m_alkri->id_subkriteria ?>">
        </div>
        
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <?php echo form_close(); ?>
        
        <?php } ?>
        </section>
</div>
