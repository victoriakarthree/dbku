<h1>Laporan Kriteria</h1>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Kriteria</th>
            <th>Mimmax</th>
            <th>Tipe Preferensi</th>
            <th>Q</th>
            <th>P</th>
            <th>S</th>
        </tr>
    </thead>
    <?php
    $no = 0;
    foreach ($rows as $row) : ?>
        <tr>
            <td><?= ++$no ?></td>
            <td><?= $row->kode_kriteria ?></td>
            <td><?= $row->nama_kriteria ?></td>
            <td><?= $row->minmax ?></td>
            <td><?= $row->tipe ?></td>
            <td><?= $row->par_q ?></td>
            <td><?= $row->par_p ?></td>
            <td><?= $row->par_s ?></td>
        </tr>
    <?php endforeach ?>
</table>