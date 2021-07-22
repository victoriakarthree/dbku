<div class="content-wrapper">
  
<section class="content">


    <div class="box-header with-border">
        <h3 class="box-title">Data Kriteria</h3>
        <div class="button-right">
            <a href="<?php echo site_url('subkriteria/tambah'); ?>" class="btn btn-primary">Tambah Sub-Kriteria</a>
        </div>
    </div>
    <div class="box-body">

            <table class="table table-striped table-bordered" id="dataTables1">
                <thead>
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
                    <td>
                            <a href="<?php echo site_url('kriteria/ubah/' . $row->id_kriteria); ?>" class="btn btn-success btn-xs" title="Ubah">Ubah</a> &nbsp;
                            <a href="#" data-href="<?php echo site_url('kriteria/hapus/' . $row->id_kriteria); ?>" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-xs" title="Hapus">Hapus</a> &nbsp;
                            <a href="<?php echo site_url('SubKriteria' . $row->id_kriteria); ?>" class="btn btn-info btn-xs">Subkriteria</a>
                        </td>
                    </tr>
                   
                </tbody>
            </table>
   

</div>


</section>
</div>