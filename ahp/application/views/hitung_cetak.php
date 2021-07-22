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
            <h3 class="panel-title">Mengukur Konsistensi Kriteria (AHP)</h3>
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
                        <?php foreach ($matriks as $key => $val) : ?>
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
                                if (count($matriks) == $key)
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
                                if (count($matriks) == $key)
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
                    $RI = $nRI[count($matriks)];
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
            <h3 class="panel-title">Hasil Analisa</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <td rowspan="2">Kriteria</td>
                        <td rowspan="2">Min Maks</td>
                        <td rowspan="2">Bobot</td>
                        <td colspan="<?= count($ALTERNATIF) ?>">Alternatif</td>
                        <td rowspan="2">Tipe Preferensi</td>
                        <td colspan="3">Parameter</td>
                    </tr>
                    <tr>
                        <?php foreach ($ALTERNATIF as $key => $val) : ?>
                            <td><?= $val->nama_alternatif ?></td>
                        <?php endforeach ?>
                        <td>q</td>
                        <td>p</td>
                        <td>s</td>
                    </tr>
                </thead>
                <?php foreach ($KRITERIA as $key => $val) : ?>
                    <tr>
                        <td><?= $val->nama_kriteria ?></td>
                        <td><?= $val->minmax ?></td>
                        <td><?= round($rata[$key], 4) ?></td>
                        <?php foreach ($ALTERNATIF as $k => $v) : ?>
                            <td><?= $data[$k][$key] ?></td>
                        <?php endforeach ?>
                        <td><?= nama_tipe($val->tipe) ?></td>
                        <td><?= $val->par_q ?></td>
                        <td><?= $val->par_p ?></td>
                        <td><?= $val->par_s ?></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
    <?php foreach ($normal as $key => $val) : ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Kriteria <?= $KRITERIA[$key]->nama_kriteria ?></h3>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <th colspan="2"><?= $KRITERIA[$key]->nama_kriteria ?></th>
                        <th>a</th>
                        <th>b</th>
                        <th>d(jarak)</th>
                        <th>|d|</th>
                        <th>P (Preferensi)</th>
                        <th>IP (Indeks Preferensi)</th>
                    </thead>
                    <?php foreach ($val as $k => $v) : ?>
                        <tr>
                            <td><?= $ALTERNATIF[$v[0]]->nama_alternatif ?></td>
                            <td><?= $ALTERNATIF[$v[1]]->nama_alternatif ?></td>
                            <td><?= $data[$v[0]][$key] ?></td>
                            <td><?= $data[$v[1]][$key] ?></td>
                            <td><?= $selisih[$key][$k] ?></td>
                            <td><?= abs($selisih[$key][$k]) ?></td>
                            <td><?= round($preferensi[$key][$k], 4) ?></td>
                            <td><?= round($index_pref[$key][$k], 4) ?></td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    <?php endforeach ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Total Indeks Preferensi</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th colspan="2">Alternatif</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <?php foreach ($komposisi as $key => $val) : ?>
                    <tr>
                        <td><?= $ALTERNATIF[$val[0]]->nama_alternatif ?></td>
                        <td><?= $ALTERNATIF[$val[1]]->nama_alternatif ?></td>
                        <td><?= round($total_index_pref[$key], 4) ?></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Perbandingan Alternatif</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Alternatif</th>
                        <?php foreach ($matriks as $key => $val) : ?>
                            <th><?= $ALTERNATIF[$key]->nama_alternatif ?></th>
                        <?php endforeach ?>
                        <th>Jumlah</th>
                        <th>Leaving</th>
                    </tr>
                </thead>
                <?php foreach ($matriks as $key => $val) : ?>
                    <tr>
                        <td><?= $ALTERNATIF[$key]->nama_alternatif ?></td>
                        <?php foreach ($val as $k => $v) : ?>
                            <td><?= round($v, 4) ?></td>
                        <?php endforeach ?>
                        <td><?= round($total_baris[$key], 4) ?></td>
                        <td><?= round($leaving[$key], 4) ?></td>
                    </tr>
                <?php endforeach ?>
                <tr>
                    <td>Jumlah</td>
                    <?php foreach ($total_kolom as $k => $v) : ?>
                        <td><?= round($v, 4) ?></td>
                    <?php endforeach ?>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Entering</td>
                    <?php foreach ($entering as $k => $v) : ?>
                        <td><?= round($v, 4) ?></td>
                    <?php endforeach ?>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Hasil Akhir</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Alternatif</th>
                        <th>Leaving Flow</th>
                        <th>Entering Flow</th>
                        <th>Net Flow</th>
                        <th>Urutan</th>
                    </tr>
                </thead>
                <?php
                //print_r($net_flow);
                foreach ($rank as $key => $val) :
                    $this->db->query("UPDATE tb_alternatif set lf='$leaving[$key]', ef='$entering[$key]', nf='$net_flow[$key]' WHERE id_alternatif='$key'");
                ?>
                    <tr>
                        <td><?= $ALTERNATIF[$key]->nama_alternatif ?></td>
                        <td><?= round($leaving[$key], 4) ?></td>
                        <td><?= round($entering[$key], 4) ?></td>
                        <td><?= round($net_flow[$key], 4) ?></td>
                        <td><?= $rank[$key] ?></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
    <?php
    arsort($net_flow);
    ?>
    <p class="text-center">
        Alternatif produk terbaik adalah <strong><?= $ALTERNATIF[key($net_flow)]->nama_alternatif ?></strong> dengan total: <strong><?= round(current($net_flow), 4) ?></strong><br />
    </p>
<?php endif ?>