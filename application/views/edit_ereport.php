<div class="content-wrapper">
    <section class="content"> 
        <?php foreach ($ereport as $ereport) { ?>
         <?php echo form_open_multipart('ereport/update'); ?>
        
        <div class="form-groub">
            <label>NIS</label>
            <input type="hidden" name="id" class="form-control" value="<?php echo $ereport->id ?>">
            <input type="number" max="100000000" name="nisn" class="form-control" value="<?php echo $ereport->nis ?>"><br/>
        </div>
        <div class="form-groub">
            <label> Nama Siswa </label>
            <input type="text" name="nama" class="form-control" value="<?php echo $ereport->nama_siswa ?>">
        </div>
        <div class="form-groub">
                <label> Tanggal Laporan </label>
                <input type="date" name="tanggal" class="form-control" value="<?php echo $ereport->tanggal ?>"><br/>
            </div>
           <div class="form-groub">
            <label> Kelas </label>
            <input type="text" name="kelas" class="form-control" value="<?php echo $ereport->kelas ?>">
        </div>
           <div class="form-groub">
            <label> Keterangan Laporan </label>
            <input type="text" name="ket_laporan" class="form-control" value="<?php echo $ereport->ket_laporan ?>">
        </div>
        <div class="form-groub">
                <label> Pelapor </label>
                <input type="text" name="pelapor" class="form-control" value="<?php echo $ereport->pelapor ?>"><br/>
        </div>

        <div class="form-groub">
                <label> Sanksi </label>
                <input type="text" name="sanksi" class="form-control" value="<?php echo $ereport->sanksi?>"><br/>
        </div>

        <div class="form-groub">
            <label> Level</label>
            <input type="text" name="level" class="form-control" value="<?php echo $ereport->level ?>">
        </div>

            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <?php echo form_close(); ?>
        
        <?php } ?>
        </section>
</div>
