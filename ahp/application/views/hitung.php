<?php
$c = $this->db->query("SELECT * FROM tb_rel_alternatif WHERE nilai < 0 ")->row();
if (!$ALTERNATIF || !$KRITERIA) :
    echo "Tampaknya anda belum mengatur alternatif dan kriteria. Silahkan tambahkan minimal 3 alternatif dan 3 kriteria.";
elseif ($c) :
    echo "Tampaknya anda belum mengatur nilai alternatif. Silahkan atur pada menu <strong>Nilai Alternatif</strong>.";
else :
    ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Mengukur Konsistensi Kriteria</h3>
        </div>
        <div class="panel-body">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <a data-toggle="collapse" href="#c11">
                            Matriks Perbandingan Kriteria
                        </a>
                    </h3>
                </div>
                <div class="table-responsive collapse" id="c11">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <?php foreach ($KRITERIA as $key => $val) : ?>
                                    <th><?= $val->nama_kriteria ?></th>
                                <?php endforeach ?>
                            </tr>
                        </thead>
                        <?php
                        //echo '<pre>' . print_r($matriks, 1) . '</pre>';
                        foreach ($rel_kriteria as $key => $val) : ?>
                            <tr>
                                <th><?= $key ?></th>
                                <?php foreach ($val as $k => $v) : ?>
                                    <td><?= round($v, 3) ?></td>
                                <?php endforeach ?>
                            </tr>
                        <?php endforeach ?>
                        <tr>
                            <td>Total</td>
                            <?php foreach ($total as $k => $v) : ?>
                                <td><?= round($v, 3) ?></td>
                            <?php endforeach ?>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <a data-toggle="collapse" href="#c12">
                            Matriks Bobot Prioritas Kriteria
                        </a>
                    </h3>
                </div>
                <div class="table-responsive collapse" id="c12">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <?php foreach ($KRITERIA as $key => $val) : ?>
                                    <th><?= $val->nama_kriteria ?></th>
                                <?php endforeach ?>
                                <th>Prioritas</th>
                            </tr>
                        </thead>
                        <?php foreach ($ahp_normal as $key => $val) : ?>
                            <tr>
                                <td><?= $key ?></td>
                                <?php foreach ($val as $k => $v) : ?>
                                    <td><?= round($v, 3) ?></td>
                                <?php endforeach ?>
                                <td><?= round($rata[$key], 3) ?></td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <a data-toggle="collapse" href="#c13">
                            Matriks Konsistensi Kriteria
                        </a>
                    </h3>
                </div>
                <div class="table-responsive collapse" id="c13">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <?php foreach ($KRITERIA as $key => $val) : ?>
                                    <th><?= $val->nama_kriteria ?></th>
                                <?php endforeach ?>
                                <th>Consistency Measure</th>
                            </tr>
                        </thead>
                        <?php foreach ($ahp_normal as $key => $val) : ?>
                            <tr>
                                <td><?= $key ?></td>
                                <?php foreach ($val as $k => $v) : ?>
                                    <td><?= round($v, 3) ?></td>
                                <?php endforeach ?>
                                <td><?= round($cm[$key], 3) ?></td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
                <div class="panel-body">
                    Berikut tabel ratio index berdasarkan ordo matriks.
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Ordo matriks</th>
                            <?php
                            foreach ($nRI as $key => $value) {
                                if (count($KRITERIA) == $key)
                                    echo "<td class='text-primary'>$key</td>";
                                else
                                    echo "<td>$key</td>";
                            }
                            ?>
                        </tr>
                        <tr>
                            <th>Ratio index</th>
                            <?php
                            foreach ($nRI as $key => $value) {
                                if (count($KRITERIA) == $key)
                                    echo "<td class='text-primary'>$value</td>";
                                else
                                    echo "<td>$value</td>";
                            }
                            ?>
                        </tr>
                    </table>
                </div>
                <div class="panel-footer">
                    <?php
                    $CI = ((array_sum($cm) / count($cm)) - count($cm)) / (count($cm) - 1);
                    $RI = $nRI[count($KRITERIA)];
                    $CR = $CI / $RI;
                    echo "<p>Consistency Index: " . round($CI, 3) . "<br />";
                    echo "Ratio Index: " . round($RI, 3) . "<br />";
                    echo "Consistency Ratio: " . round($CR, 3);
                    if ($CR > 0.10) {
                        echo " (Tidak konsisten)<br />";
                    } else {
                        echo " (Konsisten)<br />";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Matriks Perbandingan Alternatif</h3>
        </div>
        <div class="panel-body">
            <?php foreach ($rel_alternatif as $key => $value):?>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Matriks Perbandingan Alternatif berdasarkan <strong><?=$KRITERIA[$key]->nama_kriteria?></strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <?php foreach ($ALTERNATIF as $k => $v) : ?>
                                            <th><?= $v->nama_alternatif ?></th>
                                        <?php endforeach ?>
                                    </tr>
                                </thead>
                                <?php
                        //echo '<pre>' . print_r($matriks, 1) . '</pre>';
                                foreach ($value as $k => $v) : ?>
                                    <tr>
                                        <th><?= $k ?></th>
                                        <?php foreach ($v as $ka => $va) : ?>
                                            <td><?= round($va, 3) ?></td>
                                        <?php endforeach ?>
                                    </tr>
                                <?php endforeach ?>
                                <tr>
                                    <td>Total</td>
                                    <?php foreach ($total_alternatif[$key] as $k => $v) : ?>
                                        <td><?= round($v, 3) ?></td>
                                    <?php endforeach ?>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">

                                Matriks Bobot Prioritas Alternatif berdasarkan <strong><?=$KRITERIA[$key]->nama_kriteria?>

                            </h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <?php foreach ($ALTERNATIF as $k => $v) : ?>
                                            <th><?= $v->nama_alternatif ?></th>
                                        <?php endforeach ?>
                                        <th>Bobot</th>
                                    </tr>
                                </thead>
                                <?php foreach ($ahp_normal_alternatif[$key] as $k => $v) : ?>
                                    <tr>
                                        <td><?= $k ?></td>
                                        <?php foreach ($v as $ka => $va) : ?>
                                            <td><?= round($va, 3) ?></td>
                                        <?php endforeach ?>
                                        <td><?= round($rata_alternatif[$key][$k], 3) ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Hasil Analisa</h3>
        </div>
        <div class="panel-body">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">VEKTOR EIGEN ALTERNATIF DAN KRITERIA</h3>
                </div>
                <div class="panel-body">
                   <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <?php foreach ($KRITERIA as $k => $v) : ?>
                                    <th><?= $k ?></th>
                                <?php endforeach ?>
                            </tr>
                        </thead>
                        <tr>
                            <th>&nbsp;</th>
                            <?php foreach ($total as $k => $v) : ?>
                                <td><?= round($v, 3) ?></td>
                            <?php endforeach ?>
                        </tr>
                        <?php 
                        $newdata=array();
                        foreach ($rata_alternatif as $key => $value) {
                            foreach ($value as $k => $v) {
                                $newdata[$k][$key]=$v;
                            }
                        }
                        foreach ($newdata as $key => $value):?>
                            <tr>
                                <th><?=$key?> - <?=$ALTERNATIF[$key]->nama_alternatif?></th>
                                <?php foreach ($value as $k => $v):?>
                                    <td><?=$v?></td>
                                <?php endforeach;?>
                            </tr>
                        <?php endforeach;?>
                    </table>
                </div>
            </div>

        </div>
    </div>

</div>
<?php endif ?>