<div class="content-wrapper">
    
    <section class="content-header">
    <div class="box-header with-border">
        <h3 class="box-title">Penilaian</h3>
    </div>
    <div class="box-body">
        <div class='table-responsive'>
            <table class='table table-bordered tabel-header'>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Alternatif</th>
                        <?php foreach ($query_kriteria as $row) : ?>
                            <th><?php echo $row->nama_kriteria; ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($query_alt as $row) : ?>
                        <tr>
                            <td class="text-center"><?php echo $i; ?></td>
                            <td><?php echo $row->nama_alternatif; ?></td>
                            <?php foreach ($query_kriteria as $row2) : ?>
                                <td class="text-center"><?php echo $sub[$row->id_alternatif][$row2->id_kriteria]; ?></td>
                            <?php endforeach; ?>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class='table-responsive'>
            <table class='table table-bordered tabel-header'>
                <thead>
                    <tr>
                        <th>Alternatif</th>
                        <?php foreach ($query_kriteria as $row) : ?>
                            <th><?php echo $row->kode_kriteria; ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($query_alt as $row) : ?>
                        <tr>
                            <td width="200"><?php echo $row->nama_alternatif; ?></td>
                            <?php foreach ($query_kriteria as $row2) : ?>
                                <td class="text-center"><?php echo $bobot[$row->id_alternatif][$row2->id_kriteria]; ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php echo empty($rumus) ? '' : $rumus; ?>
        <br>
        <h3 class="page-header">Hasil</h3>
        <div class='table-responsive'>
            <table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Alternatif</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($hasil)) : ?>
                        <?php $i = 1; ?>
                        <?php foreach ($hasil as $row) : ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row['nama_alternatif']; ?></td>
                                <td><?php echo $row['nilai']; ?></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <p>
                <a href="<?php echo site_url('penilaian/pdf'); ?>" target='blank' class='btn btn-default'><img src="<?php echo base_url('assets/images/pdf.png'); ?>">&nbsp; Export ke PDF</a>
            </p>
        </div>
    </div>
</section>
</div>