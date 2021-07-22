<div class="row">
    <div class="col-md-6">
        <form method="post">
            <div class="form-group">
                <label>Kode</label>
                <input class="form-control" name="kode" value="<?= set_value('kode', $row->kode_kriteria) ?>" readonly="" />
            </div>
            <div class="form-group">
                <label>Nama <span class="text-danger">*</span></label>
                <input class="form-control" name="nama" value="<?= set_value('nama', $row->nama_kriteria) ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="<?= site_url('kriteria') ?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>