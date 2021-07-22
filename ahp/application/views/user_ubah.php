<div class="row">
    <div class="col-md-6">
        <?=validation_errors(); ?>
        <?=form_open('user/ubah/' . $row->uid); ?>
            <div class="form-group">
                <label>Username <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="user" value="<?=set_value('user', $row->user)?>" readonly="" />
                <p class="help-block">Username tidak bisa diubah</p>
            </div>
            <div class="form-group">
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="pass" value="<?=set_value('pass', $row->pass)?>" />
            </div>
            <div class="form-group">
                <label>Jurusan <span class="text-danger">*</span></label>
                <select class="form-control" name="jurusan">
                    <option value="">Admin (Semua jurusan)</option>
                    <?=get_jurusan_option(set_value('jurusan', $row->jurusan))?>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="<?=site_url('user')?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>