<div class="content-wrapper">

    <section class="content">
        
    <div class="box-header with-border">
        <h3 class="box-title">Tambah Data Alternatif</h3>
    </div>
    
    <div class="box-body">
       
         <?php echo form_open_multipart('Alternatif/tambah_aksi'); ?>
        
            <div class="form-groub">
                <label> Nama Alternatif </label>
                <input type="text" name="nama_alternatif" class="form-control" >
                <br/>
            </div>
            
            
            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
            <button type="Sumbit" class="btn btn-primary">Simpan</button>
        <?php echo form_close(); ?>
        
        
    </div>
  

</section>
</div>